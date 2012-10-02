<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH . 'libraries/facebook.php' );

class Home extends CI_Controller {
	
	public $facebook;
	private $conf;
	private $qstring;
	private $mc_config;
	private $session;
	
	public function __construct(){
		parent::__construct();
		$this->qstring = $_SERVER['QUERY_STRING'];
		header('P3P: CP="CAO PSA OUR"');
		parse_str($_SERVER['QUERY_STRING'], $_GET);
		if( isset($_GET['fb_sig_iframe_key'])){
			session_id(preg_replace("/[^A-Za-z0-9-]/", "", $_GET['fb_sig_iframe_key']));
		}
		
		session_start();
		
		$this->load->helper( array('form', 'url', 'html', 'my', 'debug') );
		$this->config->load('quiz',TRUE,TRUE);
		$this->conf = $this->config->item('quiz');
		$this->config->load('multicache',TRUE,TRUE);
		$this->mc_config = $this->config->item('multicache');
		$this->load->library('multicache',$this->mc_config);
		
		$this->facebook = new Facebook(array(
            'appId'  => $this->conf['appId'],
            'secret' => $this->conf['secret'],
            'cookie' => true,
            'domain' => $this->conf['domain'] 
        ));
		$this->session = $this->facebook->getAccessToken();
		$this->facebook->setAccessToken($this->session);
		if (!$this->session) {
        	if( !$this->conf['local'] ){
	        	$url = $this->facebook->getLoginUrl(array('canvas' => 1, 'fbconnect' => 0, 'req_perms' => $this->conf['perms']));
	            echo "<script type='text/javascript'>top.location.href = '$url';</script>";	            
	            log_message('debug', 'No session found!');
	            exit();
        	}
        }
		
	}

	public function index(){
		$this->load->model('quiz_model', 'quiz');		
		if(isset($_GET['error'])){
			# log error
			$error_code = $_GET['error'];
			$error_desc = isset($_GET['error_description'])?$_GET['error_description']:"";
			$this->quiz->logError($error_code, $error_desc);
		}
		else {
			$info = $this->facebook->api('/me');
			$user_id = $this->facebook->getUser();
			if(!empty($info)){
				$user_name = isset($info['name'])?$info['name']:"";
				$user_link = isset($info['link'])?$info['link']:"";
				$user_gender = isset($info['gender'])?$info['gender']:"";
				$user_email = isset($info['email'])?$info['email']:"";
				$user_birthday = isset($info['birthday'])?$info['birthday']:"";
				$data = array("fb_id"=>$user_id,
							  "link"=>$user_link,
							  "name"=>$user_name,
							  "email"=>$user_email,
							  "birthday"=>$user_birthday,
							  "gender"=>$user_gender);
				# log user
				$this->quiz->logUser($data);
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
				
				# post to wall
				# enable this block for wall posting
//				$url = base_url()."/post/?fb_id={$user_id}";
//				$this->__getpage($url);
				# end of post
				
				$q = $this->quiz->getQuizzes($group_id);
				$qCount = count($q);
				$data['questions'] = $q;
				$data['qCount'] = $qCount;
				$this->load->view('common');
				$this->load->view('home', $data);
				$this->load->view('common-footer');
			}
		}
	}
	
	private	function toAlpha($numeric){
	    $alphabet =   array('a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z');
	    $alpha_flip = array_flip($alphabet);
        if($numeric <= 25){
          return $alphabet[$numeric];
        }
        elseif($numeric > 25){
          $dividend = ($numeric + 1);
          $alpha = '';
          $modulo;
          while ($dividend > 0){
            $modulo = ($dividend - 1) % 26;
            $alpha = $alphabet[$modulo] . $alpha;
            $dividend = floor((($dividend - $modulo) / 26));
          }
          return $alpha;
        }
	}
	
	public function process(){
		$this->load->model('quiz_model', 'quiz');
		$res = array();
		$res['status'] = 0;
		$res['message'] = "Failed to process your request";
		$post = json_decode($this->input->post('data'));
		$correct = array();
		$param = array();
		$score = 0;
		$valid = false;
		foreach ($post as $item){
			# validates user answer
			if(substr($item->name,0,3) == "id_"){
				$valid = true;
				$q_id = substr($item->name,3,strlen($item->name));
				$ans = $this->toAlpha($item->value);
				$isCorrect = $this->quiz->validatesAnswer($q_id, $ans);
				$correct[$q_id] = $isCorrect;
				$score = $isCorrect?$score+1:$score+0;
			}
			else{
				$param[$item->name] = $item->value;
			}
		}
		if($valid){
			$res['status'] = 1;
			$correct_answer_in_percent = $score / $param['qCount'] * 100;
			$correct_answer_in_percent = number_format($correct_answer_in_percent);
			# get ranking
			$res['message'] = "You've got {$correct_answer_in_percent} percent of the correct answers";
		}
		print_r(json_encode($res));
	}
	
	public function displayMessage(){
		$get = $this->input->get();
		$data['message'] = $get['message'];
		$this->load->view('common');
		$this->load->view('display_message', $data);
		$this->load->view('common-footer');
	}
	
    /**
     * CURL method to interface with FB API
     * @param string $url
     * @return json
     */
    private function __getpage($url)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        $return = curl_exec($ch);
        $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        // check if it returns 200, or else return false
        if ($http_code === 200)
        {
            curl_close($ch);
            return $return;
        }
        else
        {
            // store the error. I may want to return this instead of FALSE later
            $error = curl_error($ch);
            curl_close($ch);
            return FALSE;
        }
    }
	
}