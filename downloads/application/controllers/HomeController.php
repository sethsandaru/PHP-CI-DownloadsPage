<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Class HomeController
 * @property Category $Category
 * @property Item $Item
 */
class HomeController extends CI_Controller
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
	 * Index page
	 */
	public function index($page = 1)
	{
		$this->data['title'] = "SethPhat's Download Zone";

		// set body
		$this->data['body'] = "template/homepage";

		// get newest item and pagination
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

		$this->load->view('template/template', $this->data);
	}

	/*
	 * Single item page
	 */
	public function show($id)
	{
		$item = $this->Item->GetByID($id);

		if (isset($item))
		{
			$this->data['item'] = $item;


			// set template
			$this->data['body'] = 'template/item';

			// title web
			$this->data['title'] = $item->title . " - SethPhat's Download Zone";

			// load view
			$this->load->view('template/template', $this->data);
		}
		else
			redirect(base_url());
	}
}
