<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['app_name'] = "quiz_bee";

$config['cache_type'] = "memcache";
// $config['cache_type'] = "apc";

			
$config['memcache_servers'][] = array(
	'host' => 'localhost',
	'port' => 11211
);
								
$config['expiration']['generic'] = 30;

$config['prefix']['friends'] = $config['app_name'] . "FRIENDS_"; // FRIENDS_0121222432
$config['prefix']['item'] = $config['app_name'] . "ITEM_";
$config['prefix']['items'] = $config['app_name'] . "ITEMS";
$config['prefix']['relationship'] = $config['app_name'] . "RELATIONSHIP_";
$config['prefix']['relationships'] = $config['app_name'] . "RELATIONSHIPS";
$config['prefix']['reason'] = $config['app_name'] . "REASON_";
$config['prefix']['reasons'] = $config['app_name'] . "REASONS";