<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Login extends CI_Controller {
	
	private $privateKey;
	private $conf;
	
	public function __construct(){
		parent::__construct();
		$this->load->library(array('session','encrypt'));
		$this->load->helper(array('url','debug'));
		$this->config->load('quiz',TRUE,TRUE);
		$this->conf = $this->config->item('quiz');
	}
	
	public function index(){
		$this->session->sess_destroy();
		$this->load->view('cms/login');
	}
	
	public function doLogin(){
		$res = array();
		$res['status'] = 0;
		$res['message'] = "Invalid username / password!";
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$this->load->model('cms_model');
		$access = $this->cms_model->validateAccess($username, $password);
		if($access){
			$res['status'] = 1;
			$res['message'] = "Login Successfully!";
			$userId = $access[0]->id;
			$key = $this->conf['encryption_key'] . "|" . $userId;
			$userData = array("key"=>$key, "username"=>$access[0]->username, "name"=>$access[0]->name);
			$this->session->set_userdata($userData);
		}
		print_r(json_encode($res));
	}
	
}