<?php
/**
 * Created by PhpStorm.
 * User: sethsandaru
 * Date: 1/21/18
 * Time: 6:26 PM
 */

class AdminItemController extends CI_Controller
{
	private $limitPerPage = 10;
	private $data = array();

	public function __construct()
	{
		parent::__construct();

		// load database
		$this->load->database();

		// load session
		$this->load->library('session');

		// load library helper
		$this->load->library('pagination');


		// load model
		$this->load->model('User');
		$this->load->model('Item');
		$this->load->model('Category');

		// check auth
		if (isset($this->session->uid) && isset($this->session->upass))
		{
			$userID = $this->session->uid;
			$pass = strtolower($this->session->upass);

			// get user
			$user = $this->User->GetByID($userID);

			if ($user == null || strtolower(md5($user->password)) != $pass)
			{
				$this->session->unset_userdata('uid');
				$this->session->unset_userdata('upass');
				redirect(base_url() . "index.php/admincp/login");
			}

			// still stayed in this page if logged ok
			$this->data['logged'] = true;

		}
		else {
			redirect(base_url() . "index.php/admincp/login");
		}
	}

	public function index($page = 1)
	{
		// set title
		$this->data['title'] = "Quản lý bài viết - AdminCP Download";
		$this->data['body'] = "admincp/list_item";

		// get item and calculate pagination
		$calculatePage = ($page - 1) * $this->limitPerPage;
		$this->data['allItem'] = $this->Item->Retrieve($calculatePage, $this->limitPerPage);

		// pagination helper class
		// load config
		$this->config->load('bootstrap_pagination');
		$config = $this->config->item('pagination');
		$config['base_url'] = base_url() . "index.php/page/";
		$config['first_url'] = '1';
		$config['total_rows'] = $this->Item->totalRows();
		$config['per_page'] = $this->limitPerPage;
		$config['use_page_numbers'] = TRUE;

		// init the pagination
		$this->pagination->initialize($config);

		// get link pagination
		$this->data['pagination'] = $this->pagination->create_links();

		// return view
		$this->load->view('admincp/template', $this->data);
	}

	public function showAOU($id)
	{
		// get all categories
		$this->data['allCate'] = $this->Category->GetAll();

		if ($id == 0)
		{
			// add
			$this->data['title'] = "Thêm bài viết - AdminCP Download";
			$this->data['body'] = "admincp/edit_item";

			// return view
			$this->load->view('admincp/template', $this->data);
		}
		else {
			// edit
			$item = $this->Item->GetByID($id);

			if ($item != null)
			{
				$this->data['title'] = "Sửa bài viết - AdminCP Download";
				$this->data['body'] = "admincp/edit_item";
				$this->data['item'] = $item;

				// return view
				$this->load->view('admincp/template', $this->data);
			}
			else {
				echo "<script>alert('Bài viết này không tồn tại');window.location = '".base_url()."index.php/admincp/category';</script>";
			}
		}
	}

	private function validate($title, $content, $category_id, $download_url)
	{
		if (strlen($title) > 0 && strlen($content) > 0 && strlen($download_url) > 0 && is_numeric($category_id))
			return true;
		return false;
	}

	public function addOrUpdate()
	{
		// retrieve data
		$title = $this->input->post('title');
		$content = $this->input->post('content');
		$category_id = $this->input->post('category_id');
		$download_url = $this->input->post('download_url');
		$is_upload = $_FILES['image']['size'] > 0;

		// config for upload image
		$upPath = "uploads/items";
		$config = array(
			'upload_path' => $upPath,
			'allowed_types' => "gif|jpg|png|jpeg",
			'overwrite' => TRUE,
			'max_size' => "2048000",
			'file_name' => time() . "_" . md5(rand(0,999999999)),
		);
		$this->load->library('upload', $config);

		if ($this->validate($title, $content, $category_id, $download_url))
		{
			$id = $this->input->post('id');

			if ($id == null)
			{
				// add

				// solving upload
				if ($is_upload == false) {
					echo "<script>alert('Cần phải upload hình khi thêm mới!'); window.history.back();</script>";
					return;
				}

				// upload image
				$full_path = "";
				if(!$this->upload->do_upload('image'))
				{
					echo "<script>alert('Lỗi khi upload hình, xin hãy thử lại sau!'); window.history.back();</script>";
					return;
				}
				else
				{
					$imageDetailArray = $this->upload->data();
					$full_path =  "/" . $upPath . "/" . $imageDetailArray['file_name'];
				}

				$this->Item->Insert($title, $content, $category_id, $download_url, $full_path, $this->session->uid);
				echo "<script>alert('Đã thêm thành công!');window.location = '".base_url()."index.php/admincp/item';</script>";
				return;
			}
			else {
				// update
				$item = $this->Item->GetByID($id, false);

				if ($item != null)
				{
					// solving upload if exists
					if ($is_upload == true) {
						// upload image
						if(!$this->upload->do_upload('image'))
						{
							echo "<script>alert('Lỗi khi upload hình, xin hãy thử lại sau!'); window.history.back();</script>";
							return;
						}
						else
						{
							$imageDetailArray = $this->upload->data();
							$item->image_url = "/" . $upPath . "/" . $imageDetailArray['file_name'];
						}
					}

					// update info
					$item->title = $title;
					$item->content = $content;
					$item->download_url = $download_url;
					$item->category_id = $category_id;
					$item->modified_date = time();
					$item->modified_id = $this->session->uid;


					// do update
					$this->Item->Update($id, $item);

					echo "<script>alert('Đã sửa thành công!');window.location = '".base_url()."index.php/admincp/item';</script>";
					return;
				}
			}
		}

		echo "<script>alert('Cập nhập thất bại!');window.history.back();</script>";
	}

	public function delete($id)
	{
		// edit
		$item = $this->Item->GetByID($id);

		if ($item != null) {
			$this->Item->Delete($id);
			echo "<script>alert('Đã xóa thành công!');window.location = '".base_url()."index.php/admincp/item';</script>";
		} else {
			echo "<script>alert('Bài viết này không tồn tại');window.location = '" . base_url() . "index.php/admincp/item';</script>";
		}

	}
}
