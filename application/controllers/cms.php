<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cms extends CI_Controller {
	
	public function __construct(){
		parent::__construct();
		$this->load->helper(array('url', 'debug'));
		$this->load->library(array('session','encrypt'));
		$this->load->model('cms_model');
		if(!isset($this->session->userdata['key'])){
			redirect('/login/index');
		}
	}
	
	private function loadView($page){
		$this->load->view('cms-header');
		if(is_array($page) && isset($page['url'])){
			$this->load->view($page['url'], isset($page['data'])?$page['data']:"");
		}
		$this->load->view('cms-footer');
	}
	
	public function index(){
		$content = $this->cms_model->listContent();
		$page['url'] = "cms/index";
		$page['data']['content'] = $content;
		$this->loadView($page);
	}
	
	public function listScheduler(){
		$content = $this->cms_model->listScheduler();
		$page['data']['content'] = $content;
		$page['url'] = "cms/scheduler";
		$this->loadView($page);
	}
	
	public function schedulerForm(){
		$page['url'] = "cms/schedulerForm";
		if(isset($_GET['id'])){
			$isAddRequest = false;
			$id = $_GET['id'];
			$sched = $this->cms_model->getSched($id);
			$page['data']['sched'] = $sched;
		}
		else {
			$isAddRequest = true;
		}
		$page['data']['isAddRequest'] = $isAddRequest;
		$this->loadView($page);
	}
	
	public function saveScheduler(){
		$res = array();
		$res['status'] = 0;
		
		$post = $this->input->post('data');
		$post = json_decode($post);
		$param = array();
		
		foreach ($post as $item){
			if($item->name == "id"){
				$id = $item->value + 0;
			}
			else {
				$param[$item->name] = $item->value;
			}
		}
		
		if($id == 0){
			$isSaved = $this->cms_model->saveScheduler($param);
		}
		else {
			$isSaved = true;
			$this->cms_model->saveEditedScheduler($param, $id);
		}
		
		if($isSaved){
			$res['status'] = 1;
			$res['message'] = "Scheduler has been successfully saved!";
		}
		
		print_r(json_encode($res));
	}
	
	public function viewContentForm(){
		$sched = $this->cms_model->listScheduler();
		if(isset($_GET['id'])){
			$page['data']['isAddRequest'] =false;
			$id = $this->input->get('id');
			$content = $this->cms_model->getContent($id);
			$page['data']['content'] = $content;
		}
		else{
			# get scheduler
			$page['data']['isAddRequest'] = true;
		}
		$page['url'] = "cms/contentForm";
		$page['data']['schedule'] = $sched;
		$this->loadView($page);
	}
	
	public function saveContent(){
		$res = array();
		$res['status'] = 0;
		$res['message'] = "Failed to save record!";
		
		$post = $this->input->post('data');
		$post = json_decode($post);
		$choices = array();
		
		foreach ($post as $item){
			if(substr($item->name,0,6) == "option"){
				# store only with a value
				if($item->value !=""){
					$choices[] = $item->value;
				}
			}
			else{
				if($item->name == "id"){
					$id = $item->value + 0;
				}
				else {
					$param[$item->name] = $item->value;
				}
			}
		}
		$param['correct_answer'] = trim($param['correct_answer']);
		$param['correct_answer'] = substr($param['correct_answer'],0,1);
		$param['choices'] = json_encode($choices);
		
		if($id==0){
			$isSaved = $this->cms_model->saveContent($param);
		}
		else{
			$isSaved = true;
			$this->cms_model->saveEditedContent($param, $id);
		}
		# inserted in database
		# if false, returns default value
		if($isSaved){
			$res['status'] = 1;
			$res['message'] = "Content has been successfully saved!";
		}
		print_r(json_encode($res));
	}
	
	public function displayGroup(){
		
		$this->load->model('quiz_model', 'quiz');
		
		$sched = $this->quiz->listScheduler();
		
		$currentDate = date('Y-m-d');
		$currentDate = strtotime($currentDate);
		
		$counter = 0;
		
		for($i=0; $i<count($sched);$i++){
			$schedDate = strtotime($sched[$i]->date);
			
			if($currentDate>=$schedDate){
				$counter++;
				$group_id = $sched[$i]->id;
				break;
			}
		}
		 debug_var($group_id);
	}
}