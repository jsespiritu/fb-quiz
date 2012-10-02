<?php
require_once(APPPATH.'libraries/facebook.php');

class Fb_connect extends Facebook{

	//declare public variables
	public 	$user 			= NULL;
	public 	$user_id 		= FALSE;

	public $fb 			= FALSE;
	public $fbSession	= FALSE;
	public $appkey		= 0;

	//constructor method.
	public function __construct()
	{
        $CI = & get_instance();
        $CI->config->load("quiz",TRUE);
        $config = $CI->config->item('quiz');
        parent::__construct($config);
        $this->user_id = $this->getUser(); // New code

        $me = null;
        if ($this->user_id) {
            try {
                $me = $this->api('/me');
                $this->user = $me;
                } catch (FacebookApiException $e) {
                    error_log($e);
                }
		}
	}	
} // end class