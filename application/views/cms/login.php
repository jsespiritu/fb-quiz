<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CMS beta</title>
<link rel="stylesheet" type="text/css" href="/assets/css/general.css" />
<link rel="stylesheet" type="text/css" href="/assets/css/ui.css" />
<link rel="stylesheet" type="text/css" href="/assets/css/reset.css" />
<link rel="stylesheet" type="text/css" href="/assets/css/style.css" />
<link rel="stylesheet" type="text/css" href="/assets/css/grids.css" />
<link rel="stylesheet" type="text/css" href="/assets/css/calendar/ui-lightness/jquery-ui-1.8.16.custom.css" media="screen" />
<script src="/assets/js/jquery-1.6.2.min.js"></script>
<script src="/assets/js/calendar/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
<script src="/assets/js/global.js"></script>
</head>
<body>
<div id="bg">
  <div id="wrap">
    <div class="float-l left">
      <ul id="nav">
      </ul>
      <div id="menu">
      	<br/><br/>
      	<ul>
      		<li style="text-decoration:none;">
	      		Username <input type="text" name="username" id="form-username" />
	      	</li>
	      	<li>
	      		Password <input type="password" name="password" id="form-password" />
	      	</li>
	      	<li>
	      		Signin <br/><input type="button" value="Submit" class="class_button" onclick="global.login()"/>
	      	</li>
      	</ul>
      </div>
    </div>
    <div class="float-r right">
      <div id="logo">
        <h1>Login</h1>
        <div>Content Management System</div>
      </div>
      <div id="main">
      	<div id="message"></div>
      </div>
    </div>
    <div id="footer">
      <div class="float-l">
        <div id="ftlink"> </div>
      </div>
      <div id="xhtml" class="float-r"></div>
    </div>
    <!-- /footer -->
  </div>
</div>
</body>
</html>