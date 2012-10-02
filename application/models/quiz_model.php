<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Quiz_model extends CI_Model
{
	private $db;
	
	public function __construct(){
		parent::__construct();
		$this->db = $this->load->database('app', true);
	}
	
	public function getQuizzes($group_id){
		$this->db->select('id, question, choices');
		$this->db->where('group_id',$group_id);
		$query = $this->db->get('quizzes');
		if($query->num_rows()>0){
			return $query->result();
		}
		else{
			return array();
		}
	}
	
	public function validatesAnswer($q_id="", $ans=""){
		if($q_id && $ans){
			$this->db->select('correct_answer');
			$this->db->where(array("id"=>$q_id, "correct_answer"=>$ans));
			$query = $this->db->get('quizzes');
			if($query->num_rows()>0){
				return true;
			}
			else {
				return false;
			}
		}
	}
	
	public function listScheduler(){
		$this->db->order_by('date', 'desc');
		$query = $this->db->get('scheduler');
		if($query->num_rows()>0){
			return $query->result();
		}
		else {
			return array();
		}
	}
	
	
	public function logUser($data){
		if(!$this->userExist($data['fb_id'])){
			$this->db->insert('users', $data);
		}
	}
	
	public function logPostResponse($data){
		$this->db->insert('post_history', $data);
	}
	
	public function userExist($user_id){
		$this->db->select('fb_id');
		$this->db->where('fb_id',$user_id);
		$query = $this->db->get('users');
		if($query->num_rows()>0){
			return true;
		}
		else{
			return false;
		}
	}
	
	public function logError($error_code, $error_desc){
		$data = array("error_code"=>$error_code, "description"=>$error_desc);
		$this->db->insert('error_log', $data);
	}
}