<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends CI_Controller{

	public function __construct(){
		parent::__construct();
		$this->load->helper( array('form', 'url', 'html', 'my', 'debug') );
	}
	
	public function playQuiz(){
    	$this->load->library('fb_connect');
    	$param['scope'] = "publish_stream,email,user_birthday,read_stream";
        $param['redirect_uri'] = "http://apps.facebook.com/quiz_bee/";
        redirect($this->fb_connect->getLoginUrl($param));
	}
	
	public function facebook() {
        $this->load->library('fb_connect');
        if (!$this->fb_connect->user_id) {
            //Handle not logged in,
        } else {
           $fb_uid = $this->fb_connect->user_id;
           $fb_usr = $this->fb_connect->user;
           //Hanlde user logged in, you can update your session with the available data
    	   //print_r($fb_usr) will help to see what is returned
        }
	}
}
