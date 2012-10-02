<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cms_model extends CI_Model {
	
	private $db;
	
	public function __construct(){
		parent::__construct();
		$this->db = $this->load->database('app', true);
	}
	
	public function validateAccess($username, $password){
		$this->db->where(array("username"=>$username, "password"=>md5($password)));
		$query = $this->db->get('cms_users');
		if($query->num_rows()>0){
			return $query->result();
		}
		else{
			return array();
		}
	}
	
	public function listContent(){
		$this->db->order_by('group_id, priority', 'asc');
		$query = $this->db->get('quizzes');
		if($query->num_rows()>0){
			return $query->result();
		}
		else{
			return array();
		}
	}
	
	public function getContent($id){
		$this->db->where('id',$id);
		$query = $this->db->get('quizzes');
		if($query->num_rows()>0){
			return $query->result();
		}
		else {
			return array();
		}
	}
	
	public function saveEditedContent($param, $id){
		$this->db->where('id', $id);
		$this->db->update('quizzes', $param);
	}
	
	public function listScheduler(){
		$this->db->order_by('date', 'asc');
		$query = $this->db->get('scheduler');
		if($query->num_rows()>0){
			return $query->result();
		}
		else {
			return array();
		}
	}
	
	public function getSched($id){
		$this->db->where('id', $id);
		$query = $this->db->get('scheduler');
		if($query->num_rows()>0){
			return $query->result();
		}
		else {
			return array();
		}
	}
	
	public function saveScheduler($param){
		$insertId = 0;
		if($param){
			$this->db->insert('scheduler', $param);
			$insertId = $this->db->insert_id();
		}
		return $insertId;
	}
	
	public function saveEditedScheduler($param, $id){
		$this->db->where('id', $id);
		$this->db->update('scheduler', $param);
	}
	
	public function saveContent($param){
		$insertId = 0;
		if($param){
			$this->db->insert('quizzes', $param);
			$insertId = $this->db->insert_id();
		}
		return $insertId;
	}
}