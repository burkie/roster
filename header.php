<?
if(!session_id())session_start();
include ("config.php");
if($_SESSION['user_id']){
	$user_id = $_SESSION['user_id'];
	$query = mysql_query("SELECT * FROM staff WHERE user_id='$user_id'");
	while($object = mysql_fetch_object($query)) {
	$username		= $object->username;
	$user			= $user_id;
	$teamname		= $object->teamname;
	$money			= $object->money;
	$totalweekpoints= $object->totalweekpoints;
	$status			= $object->status;
	$hide			= $object->hide;
	}
}
?>
<!DOCTYPE html>
<html lang="en-US">
<head>

<title>roster.so</title>

<!-- META -->
<meta name="keywords" content="Roster" />
<meta name="description" content="Simple app to manage staff and working hours" />
<meta charset="UTF-8">
<meta name="viewport" content="initial-scale=1"/>
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="apple-mobile-web-app-title" content="Roster">
<meta name="google-site-verification" content="l873ZIHA4DzJIqcbD4IFcCrtposC3gwaV1pRWfVo4-k" />

<!-- LINKS -->
<link rel="apple-touch-icon" href="/img/roster.png"/>
<link rel="stylesheet" href="/css/style.css?v=1">
<link rel="stylesheet" href="/css/print.css" type="text/css" media="print" />
<link type="text/css" rel="stylesheet" media="only screen and (max-width: 579px)" href="/css/iphone.css" />

<!--SCRIPTS -->
<script type="text/javascript" src="/js/colophon.js"></script>
<script type="text/javascript" src="//use.typekit.net/tho1ovt.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>

</head>

<body>

<header>

<div class="wrapper">

<nav>
	<ul>
		<?php if($_SESSION['user_id']) { ?>
		<?php if($status == 0) { ?>
			<li><a href="/">home</a></li>
			<li><a href="/holidays">holidays</a></li>
		<?php } ?>
		
		<?php if($status == 1) { ?>
			<li><a href="/">home</a></li>
			<li><a href="/manage/week/<?php echo $weekNumber = date("W"); ?>">manage</a></li>
			<li><a href="/staff">staff</a></li>
			<li><a href="/position">positions</a></li>
			<li><a href="/holidays">holidays</a></li>
		<?php } ?>
		<?php } ?>
		
		<?php if($_SESSION['user_id']) { ?>
			<li><a href="/exit">exit</a></li>
		<?php } ?>
	</ul>
</nav>
		
	<hgroup>
		<h1><a href="/">Roster</a></h1>
	</hgroup>
	
</div>

</header>

<div class="wrapper">
