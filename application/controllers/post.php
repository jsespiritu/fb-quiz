<?php
 
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
 
require_once(APPPATH . 'libraries/facebook.php' );

class Post extends CI_Controller {
 
 	private $conf;
 	private $facebook;
 	private $session;
 	
    public function __construct(){
        parent::__construct();
        // replace these with Application ID and Application Secret.
		$this->load->helper( array('form', 'url', 'html', 'my', 'debug') );
		$this->config->load('quiz',TRUE,TRUE);
		$this->conf = $this->config->item('quiz');
		$this->facebook = new Facebook(array(
            'appId'  => $this->conf['appId'],
            'secret' => $this->conf['secret'],
            'cookie' => true,
            'domain' => $this->conf['domain'] 
        ));
        $this->session = $this->facebook->getAccessToken();        
    }
 
    /**
     * if you have a Facebook login button on your site, link it here
     */
    public function index()
    {
    	$fb_id = "";
    	if(isset($_POST['fb_id'])){
    		$fb_id = $_POST['fb_id'];
    	}
    	if(isset($_GET['fb_id'])){
    		$fb_id = $_GET['fb_id'];
    	}
    	if($fb_id){
    		# load model
    		$this->load->model('quiz_model', 'quiz');
    		
	        // application URL
	        $redirect = "http://quiz.bee.loc/auth/";
	        
	        // now to get the auth token. '__getpage' is just a CURL method
	        $gettoken = "https://graph.facebook.com/oauth/access_token?client_id={$this->conf['appId']}&redirect_uri={$redirect}&client_secret={$this->conf['secret']}&grant_type=client_credentials";
	        $return = $this->__getpage($gettoken);
	        // if CURL didn't return a valid 200 http code, die
	        if (!$this->session){
	        	# log post sending
	        	$data = array("fb_id"=>$fb_id, "message"=>"unable to get token");
	        	$this->quiz->logPostResponse($data);
	        	debug_var("Unable to get token");
	        }
	        else {
				$attachment = array();
				$attachment['access_token'] = $this->session;
				$attachment['picture'] = $this->conf['feed_image'];
				$attachment['link'] = $this->conf['feed_link'];
				$attachment['name'] = "Top Quiz";
				$attachment['description'] = "Test your skill by answering the quiz";
				$result = $this->facebook->api("/{$fb_id}/feed", "POST", $attachment);
		        
				$result = is_array($result)?json_encode($result):$result;
				
	        	# log post sending
	        	$data = array("fb_id"=>$fb_id, "message"=>$result);
	        	$this->quiz->logPostResponse($data);
	        	
	        }
    	}
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