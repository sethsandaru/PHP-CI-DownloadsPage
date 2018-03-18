<?php
/**
 * Created by PhpStorm.
 * User: sethsandaru
 * Date: 1/21/18
 * Time: 3:52 PM
 */

class AuthController extends CI_Controller
{
	private $data = array();

	public function __construct()
	{
		parent::__construct();

		// load database
		$this->load->database();

		// load model
		$this->load->model('User');

		// load session
		$this->load->library('session');

		// check auth
		if (isset($this->session->uid) && isset($this->session->upass))
		{
			redirect(base_url() . "index.php/admincp");
		}
	}

	public function login()
	{
		// show login page
		/// set data
		$this->data['title'] = 'Đăng nhập hệ thống';
		$this->data['body'] = 'admincp/login';
		$this->data['logged'] = false;

		// LOAD login view
		$this->load->view('admincp/template', $this->data);
	}

	public function doLogin()
	{
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$login = $this->User->login($username, $password);

		if ($login > 0) {
			// logged in, set session

			$newdata = array(
				'uid'  => $login,
				'upass'     => md5(md5($password)),
			);

			$this->session->set_userdata($newdata);

			// go to admincp
			redirect(base_url() . "index.php/admincp");
		}
		else {
			$this->data['title'] = "Đăng nhập hệ thống";
			$this->data['body'] = 'admincp/login';
			$this->data['logged'] = false;
			$this->data['error'] = "Đăng nhập thất bại!";

			$this->load->view('admincp/template', $this->data);
		}
	}
}
