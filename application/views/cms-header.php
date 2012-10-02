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
<script>
    $(function() {
        $("#startDate").datepicker();
        $("#startDate").change(function() {
            $("#startDate").datepicker( "option", "dateFormat", "yy-mm-dd" );
        });
    });     
</script>
</head>
<body>
<div id="bg">
  <div id="wrap">
    <div class="float-l left">
      <ul id="nav">
        <li><a href="/cms">Home</a></li>
        <li><a href="/logout/index">Logout</a></li>
      </ul>
      <div id="menu">
        <h2>Sections</h2>
        <ul>
          <li><a href="/cms/listScheduler">View Scheduler</a></li>
          <li><a href="/cms/schedulerForm">Add Scheduler</a></li>
          <li><a href="/cms/index">View Content</a></li>
          <li><a href="/cms/viewContentForm">Add Content</a></li>
        </ul>
      </div>
    </div>
    <div class="float-r right">
      <div id="logo">
        <h1>CMS</h1>
        <div>Content Management System</div>
      </div>
