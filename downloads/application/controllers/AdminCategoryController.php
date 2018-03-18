<?php
/**
 * Created by PhpStorm.
 * User: sethsandaru
 * Date: 1/21/18
 * Time: 5:08 PM
 */

class AdminCategoryController extends CI_Controller
{
	private $data = array();

	public function __construct()
	{
		parent::__construct();

		// load database
		$this->load->database();

		// load session
		$this->load->library('session');

		// load model
		$this->load->model('User');
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

	public function index()
	{
		// set title
		$this->data['title'] = "Quản lý chuyên mục - AdminCP Download";
		$this->data['body'] = "admincp/list_cate";

		// get all categories
		$this->data['allCate'] = $this->Category->GetAll();

		// return view
		$this->load->view('admincp/template', $this->data);
	}

	public function showAOU($id)
	{

		if ($id == 0)
		{
			// add
			$this->data['title'] = "Thêm chuyên mục - AdminCP Download";
			$this->data['body'] = "admincp/edit_cate";

			// return view
			$this->load->view('admincp/template', $this->data);
		}
		else {
			// edit
			$category = $this->Category->GetByID($id);

			if ($category != null)
			{
				$this->data['title'] = "Sửa chuyên mục - AdminCP Download";
				$this->data['body'] = "admincp/edit_cate";
				$this->data['item'] = $category;

				// return view
				$this->load->view('admincp/template', $this->data);
			}
			else {
				echo "<script>alert('Chuyên mục này không tồn tại');window.location = '".base_url()."index.php/admincp/category';</script>";
			}
		}
	}

	private function validate($name, $position)
	{
		if (is_numeric($position) && strlen($name) > 0)
			return true;
		return false;
	}

	public function addOrUpdate()
	{
		$name = $this->input->post('name');
		$position = $this->input->post('position');

		if ($this->validate($name, $position))
		{
			$id = $this->input->post('id');

			if ($id == null)
			{
				// add
				$this->Category->Add($name, $position);
				echo "<script>alert('Đã thêm thành công!');window.location = '".base_url()."index.php/admincp/category';</script>";
				return;
			}
			else {
				// update
				$category = $this->Category->GetByID($id);

				if ($category != null)
				{
					$this->Category->Edit($id, $name, $position);
					echo "<script>alert('Đã sửa thành công!');window.location = '".base_url()."index.php/admincp/category';</script>";
					return;
				}
			}
		}

		echo "<script>alert('Cập nhập thất bại!');window.history.back();</script>";
	}

	public function delete($id)
	{
		// edit
		$category = $this->Category->GetByID($id);

		if ($category != null) {
			$this->Category->delete($id);
			echo "<script>alert('Đã xóa thành công!');window.location = '".base_url()."index.php/admincp/category';</script>";
		} else {
			echo "<script>alert('Chuyên mục này không tồn tại');window.location = '" . base_url() . "index.php/admincp/category';</script>";
		}

	}
}
