<?php
/**
 * Created by PhpStorm.
 * User: sethsandaru
 * Date: 1/21/18
 * Time: 3:37 PM
 */

class AdminCPController extends CI_Controller
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
		$this->data['title'] = "AdminCP Downloads";
 		$this->data['body'] = "admincp/main";

		$this->load->view('admincp/template', $this->data);
	}

	public function logout()
	{
		$this->session->unset_userdata('uid');
		$this->session->unset_userdata('upass');
		redirect(base_url() . "index.php/admincp/login");
	}
}
