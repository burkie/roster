<?php
    include('../header.php');
    include('../config.php');
    $position = $_GET['position'];
?>

<?
$year = date("Y");
$week = $weekNumber = date("W");

?>

<div class="holder">

<?php if($position) {  ?>

<ul class="nav">
	<li><a class="selection" href="/position/<?php echo $position; ?>/week/<?php echo $weekNumber = date("W")-1; ?>">Previous</a></li> 
	<li><a class="selection" href="/position/<?php echo $position; ?>/week/<?php echo $weekNumber = date("W")+1; ?>">Next</a></li>
</ul>

<h3><?php echo $position; ?> rota <?php if($status == 1) { ?>(<a href="/position/<?php echo $position; ?>/week/<?php echo $weekNumber = date("W"); ?>">edit</a>)<?php } ?></h3>

<ul class="row r9">
	<li>username</li>
	<li>week</li>
	<li>sun</li>
	<li>mon</li>
	<li>tue</li>
	<li>wed</li>
	<li>thu</li>
	<li>fri</li>
	<li>sat</li>
</ul>

<?php $week = $weekNumber = date("W"); ?>

<?php 

$SQL_sh		= "SELECT * FROM rota WHERE position='$position' and week ='$week' ORDER BY week";
$result		= mysql_query($SQL_sh);
while($sh  	= mysql_fetch_array($result)){
$user_id			= $sh['user_id'];
$monday				= $sh['monday'];	
$tuesday			= $sh['tuesday'];	
$wednesday			= $sh['wednesday'];	
$thursday			= $sh['thursday'];	
$friday			= $sh['friday'];	
$saturday			= $sh['saturday'];	
$sunday			= $sh['sunday'];	
$week			= $sh['week'];		
	$SQL_players	= "SELECT * FROM staff WHERE user_id='$user_id'";
	$resultset	= mysql_query($SQL_players);
	while($geg  = mysql_fetch_array($resultset)){
	$username			= $geg['username'];

?>

<ul class="row r9">
	<li><a href="/staff/<?php echo $user_id; ?>"><?php echo $username; ?></a></li>
	<li><?php echo $week; ?></li>
	<li>
		<?php if($monday == "") { ?>
			<span>n/a</span>
		<?php } else { ?>
			<?php echo $monday; ?>
		<?php } ?>
	</li>
	<li>
		<?php if($tuesday == "") { ?>
			<span>n/a</span>
		<?php } else { ?>
			<?php echo $tuesday; ?>
		<?php } ?>
	</li> 
	<li>
		<?php if($wednesday == "") { ?>
			<span>n/a</span>
		<?php } else { ?>
			<?php echo $wednesday; ?>
		<?php } ?>
	</li> 
	<li>
		<?php if($thursday == "") { ?>
			<span>n/a</span>
		<?php } else { ?>
			<?php echo $thursday; ?>
		<?php } ?>
	</li> 
	<li>
		<?php if($friday == "") { ?>
			<span>n/a</span>
		<?php } else { ?>
			<?php echo $friday; ?>
		<?php } ?>
	</li> 
	<li>	
		<?php if($saturday == "") { ?>
			<span>n/a</span>
		<?php } else { ?>
			<?php echo $saturday; ?>
		<?php } ?>
	</li> 
	<li>
		<?php if($sunday == "") { ?>
			<span>n/a</span>
		<?php } else { ?>
			<?php echo $sunday; ?>
		<?php } ?>
	</li> 
</ul>

<?php } } } ?>

<?php

$position = $_GET['position'];
if($position) { ?>
<br /><br />
<h3>Current <?php echo $position; ?></h3>
<ul class="row r8">
<?php
	$SQL_player	= "SELECT * FROM staff WHERE position='$position'";
	$resultset = mysql_query($SQL_player);
		while($geg  = mysql_fetch_array($resultset)) {
			$position = $geg['position'];
			$username  = $geg['username'];
			$user_id  = $geg['user_id'];
			$email = $geg['email'];
			$name = $geg['name'];
			$teamname = $geg['teamname'];
			$totalweekpoints = $geg['totalweekpoints'];
			$start = $geg['start']; ?>


	<li><a href="/staff/<?php echo $user_id; ?>"><?php echo $username; ?></a></li>

<?php } ?>

</ul>

<?php } else { ?>

<h3>Postions</h3>

<ul class="row r6">
<?php
	$SQL_player	= "SELECT * FROM staff GROUP BY position";
	$resultset = mysql_query($SQL_player);
		while($geg  = mysql_fetch_array($resultset)) {
			$position = $geg['position'];
			$username  = $geg['username'];
			$user_id  = $geg['user_id'];
			$email = $geg['email'];
			$name = $geg['name'];
			$teamname = $geg['teamname'];
			$totalweekpoints = $geg['totalweekpoints'];
			$start = $geg['start']; ?>
			
		<li><a href="/position/<?php echo $position; ?>"><?php echo $position; ?></a></li>	
		
<?php } ?>
</div>
<?php } ?>