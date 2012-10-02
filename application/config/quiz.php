<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config['appId'] = "470931302930888";
$config['apiKey'] = "";
$config['secret'] = "2f7597c12de3fdaa7a870b0f2e8704c3";

$config['canvas_url'] = "http://quiz.bee.loc/home/";
$config['domain'] = "quiz.bee.loc";

//$config['canvas_url'] = "http://apps.facebook.com/bigkahona/";
//$config['domain'] = "bigkahona.speedtyping.net";

$config['perms'] = "publish_stream,email,user_about_me,friends_about_me,user_activities,friends_activities,user_birthday,friends_birthday,user_education_history,friends_education_history,user_events,friends_events,user_groups,friends_groups,user_hometown,friends_hometown,user_interests,friends_interests,user_likes,friends_likes,user_location,friends_location,user_notes,friends_notes,user_photo_video_tags,friends_photo_video_tags,user_photos,friends_photos,user_relationships,friends_relationships,user_religion_politics,friends_religion_politics,user_status,friends_status,user_videos,friends_videos,user_website,friends_website,user_work_history,friends_work_history,read_friendlists,read_requests";
$config['perms'] = "publish_stream,email,user_about_me,user_birthday,user_education_history,user_hometown,user_interests,user_likes,user_location,user_relationships";
$config['perms'] = "offline_access,publish_stream,email,user_about_me,user_birthday,user_hometown,user_location";

$config['perms'] = "publish_stream,email,user_birthday,user_hometown,user_location";
$config['perms'] = "publish_stream,email,user_birthday,offline_access,read_stream";

$config['feed_image'] = "http://quiz.bee.loc/assets/images/icon.png";
$config['feed_link'] = "http://quiz.bee.loc/user/loginByFacebook/";

$config['local'] = 1;
$config['publish_stream'] = 1;

$config['encryption_key'] = 'mYeCrYpTiOnKeY';