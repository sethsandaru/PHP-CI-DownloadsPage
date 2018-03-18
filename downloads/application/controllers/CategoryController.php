<?php
/**
 * Created by PhpStorm.
 * User: sethsandaru
 * Date: 1/19/18
 * Time: 11:42 PM
 */

class CategoryController extends CI_Controller
{
	private $limitPerPage = 10;
	private $data = array();

	public function __construct()
	{
		parent::__construct();

		// load database
		$this->load->database();

		// load model
		$this->load->model('Category');
		$this->load->model('Item');

		// load library helper
		$this->load->library('pagination');

		// load all Categories
		$this->data['allCate'] = $this->Category->GetAll();
	}

	/*
	 * Category index page
	 */
	public function index($id, $page = 1)
	{
		// check if category is exists
		$cateInfo = $this->Category->GetByID($id);

		// if categories not exists
		if ($cateInfo == null)
		{
			redirect(base_url());
			return;
		}

		// else we continue

		$this->data['title'] = $cateInfo->name . " - Page: $page - SethPhat's Download Zone";

		// set body
		$this->data['body'] = "template/homepage";

		// get newest item and pagination
		$calculatePage = ($page - 1) * $this->limitPerPage;
		$this->data['allItem'] = $this->Item->Retrieve($calculatePage, $this->limitPerPage, $cateInfo->id);

		// pagination helper class
		// load config
		$this->config->load('bootstrap_pagination');
		$config = $this->config->item('pagination');
		$config['base_url'] = base_url() . "index.php/category/$id/";
		$config['first_url'] = '1';
		$config['total_rows'] = $this->Item->totalRows($cateInfo->id);
		$config['per_page'] = $this->limitPerPage;
		$config['use_page_numbers'] = TRUE;

		// init the pagination
		$this->pagination->initialize($config);

		// get link pagination
		$this->data['pagination'] = $this->pagination->create_links();

		$this->load->view('template/template', $this->data);
	}
}
