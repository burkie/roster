<?php
include("header.php"); 
include("config.php");  
if($_SESSION['user_id']){ ?>

<?php if($status == 0) { ?>

<ul class="nav">
	<li><a class="selection" href="/staff/<?php echo $user_id; ?>/week/<?php echo $weekNumber = date("W")-1; ?>">Previous</a></li> 
	<li><a class="selection" href="/staff/<?php echo $user_id; ?>/week/<?php echo $weekNumber = date("W")+1; ?>">Next</a></li>
</ul>

<h3>Hi <?php echo $username; ?></h3>

<div class="table user">
<ul class="row r8">
	<li>Week</li>
	<?
	$year = date("Y");
	$week = $weekNumber = date("W");
	
	$weekoffset = $week-1;	// make week offset zero based
	$soytime = strtotime("1/1/$year");	// get the timestamp for the 1st day of
	//the year
	$soyoffset = date('w',$soytime);	// get the number of days past sunday
	$soydatetime = strtotime("-$soyoffset day",$soytime);	// get the timestamp
	//for the sunday before or == to the start date of the year
	$soweektime = strtotime("+$weekoffset week",$soydatetime);	// get the
	//timestamp for the sunday of the week
	
	// Now $soweektime contains the timestamp for the first day of the week
	
	for ($i=0;$i<7;$i++)
	echo '<li>' .date('D jS',strtotime("+$i day",$soweektime)).'</li>';
	?>
</ul>

<?php 
$x=0;
$SQL_sh	= "SELECT * FROM rota WHERE user_id>='$user_id' and week ='$week' ORDER BY week";
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
$x++;	
}
	$SQL_players	= "SELECT * FROM staff WHERE user_id='$user_id'";
	$resultset	= mysql_query($SQL_players);
	while($geg  = mysql_fetch_array($resultset)){
	$username			= $geg['username'];

?>

<ul class="row r8">

<li>
	<?php if($week == "") { ?>
		<span>n/a</span>
	<?php } else { ?>
		<a href="/staff/<?php echo $user_id; ?>/week/<?php echo $week; ?>"><?php echo $week; ?></a>
	<?php } ?>
</li>
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

<?php } ?>
</div>

<br /><br />
<h3>Holidays</h3>

<ul class="row r4">
	<li>Username</li>
	<li>Leave</li>
	<li>Return</li>
	<li>Approval</li>
</ul>

<?php	
$x=0;
$SQL_sh		= "SELECT * FROM holidays WHERE user_id='$user_id'";
$result		= mysql_query($SQL_sh);
while($sh  	= mysql_fetch_array($result)){

$user_id			= $sh['user_id'];
$username			= $sh['username'];
$startdate			= $sh['startdate'];
$enddate			= $sh['enddate'];
$approved			= $sh['approved'];
	
	$SQL_players	= "SELECT * FROM staff WHERE user_id='$user_id'";
	$resultset	= mysql_query($SQL_players);
	while($geg  = mysql_fetch_array($resultset)){
	$user_id		= $geg['user_id'];
	$username		= $geg['username'];
	$position		= $geg['position'];
	
	}
	$x++;
?>

<ul class="row r4">
	<li><a href="/staff/<?php echo $user_id; ?>"><?php echo $username; ?></a></li>
	<li><?php echo $startdate; ?></li>
	<li><?php echo $enddate; ?></li>
	<li><?php if ($approved == 'no') { ?>
	No
	<?php } elseif ($approved == 'yes') { ?>
	Yes
	<?php } else { ?>
	Being Reviewed
	<?php } ?></li>
	
</ul>

<?php } ?>

<?php } ?>


<?php if($status == 1) { ?>

<ul class="nav">
	<li><a class="selection" href="/manage/week/<?php echo $weekNumber = date("W")-1; ?>">Previous</a></li> 
	<li><a class="selection" href="/manage/week/<?php echo $weekNumber = date("W")+1; ?>">Next</a></li>
</ul>

<h3>Current Rota / <?php if($status == 1) { ?><a href="/manage/week/<?php echo $weekNumber = date("W"); ?>">Edit</a><?php } ?></h3>

<ul class="row r10">
	<li>Username</li>
	<li>Position</li>
	<li>Week</li>
	<?
	$year = date("Y");
	$week = $weekNumber = date("W");
	
	$weekoffset = $week-1;	// make week offset zero based
	$soytime = strtotime("1/1/$year");	// get the timestamp for the 1st day of
	//the year
	$soyoffset = date('w',$soytime);	// get the number of days past sunday
	$soydatetime = strtotime("-$soyoffset day",$soytime);	// get the timestamp
	//for the sunday before or == to the start date of the year
	$soweektime = strtotime("+$weekoffset week",$soydatetime);	// get the
	//timestamp for the sunday of the week
	
	// Now $soweektime contains the timestamp for the first day of the week
	
	for ($i=0;$i<7;$i++)
	echo '<li>' .date('D jS',strtotime("+$i day",$soweektime)).'</li>';
	?>
	
	</ul>

<?php $week = $weekNumber = date("W"); ?>
<?php	
$x=0;
$SQL_sh	= "SELECT * FROM rota WHERE user_id >='1' AND week='$week' ORDER BY position ASC";
//$SQL_sh		= "SELECT * FROM rota ORDER BY week DESC";
$result		= mysql_query($SQL_sh);
while($sh  	= mysql_fetch_array($result)){
$user_id			= $sh['user_id'];
$position			= $sh['position'];
$monday				= $sh['monday'];	
$tuesday			= $sh['tuesday'];	
$wednesday			= $sh['wednesday'];	
$thursday			= $sh['thursday'];	
$friday			= $sh['friday'];	
$saturday			= $sh['saturday'];	
$sunday			= $sh['sunday'];	
$week				= $sh['week'];	
$x++;	
	$SQL_players	= "SELECT * FROM staff WHERE user_id='$user_id'";
	$resultset	= mysql_query($SQL_players);
	while($geg  = mysql_fetch_array($resultset)){
	$user_id		= $geg['user_id'];
	$username		= $geg['username'];
	$position		= $geg['position'];
	$status		= $geg['status'];
	
	}
	
?>

<ul class="row r10">

<li><a href="/staff/<?php echo $user_id; ?>"><?php echo $username; ?></a></li> 
<li><a href="/position/<?php echo $position; ?>"><?php echo $position; ?></a></li>
<li><a href="/manage/week/<?php echo $week; ?>"><?php echo $week; ?></a></li>
<li>
	<?php if($sunday == "") { ?>
		<span>n/a</span>
	<?php } else { ?>
		<?php echo $sunday; ?>
	<?php } ?>
</li> 
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

</ul>

<?php } ?>

<?php if ($x==0) { ; ?>
<?php } else { ?>
<?php } ?>
<!--
<h3>View Upcoming Weeks</h3>
<?php	
$x=0;
$SQL_sh		= "SELECT * FROM rota WHERE week >='1' GROUP BY week";
//$SQL_sh		= "SELECT * FROM rota ORDER BY week DESC";
$result		= mysql_query($SQL_sh);
while($sh  	= mysql_fetch_array($result)){
$user_id			= $sh['user_id'];
$monday				= $sh['monday'];	
$tuesday			= $sh['tuesday'];	
$week				= $sh['week'];		
	$SQL_players	= "SELECT * FROM staff WHERE user_id='$user_id'";
	$resultset	= mysql_query($SQL_players);
	while($geg  = mysql_fetch_array($resultset)){
	$user_id		= $geg['user_id'];
	$username		= $geg['username'];
	
	}
?>

<a href="/week/<?php echo $week; ?>">Week <?php echo $week; ?></a>

<?php } ?>

-->

<div class="column">

<h3>Holiday Requests (<a href="/holidays/edit">edit</a>)</h3>
<ul class="row r4">
	<li>Username</li>
	<li>Leave</li>
	<li>Return</li>
	<li>Approved</li>
</ul>

<?php	
$x=0;
$SQL_sh		= "SELECT * FROM holidays";
$result		= mysql_query($SQL_sh);
while($sh  	= mysql_fetch_array($result)){

$user_id			= $sh['user_id'];
$username			= $sh['username'];
$startdate			= $sh['startdate'];
$enddate			= $sh['enddate'];
$approved			= $sh['approved'];

	
	$SQL_players	= "SELECT * FROM staff WHERE user_id='$user_id'";
	$resultset	= mysql_query($SQL_players);
	while($geg  = mysql_fetch_array($resultset)){
	$user_id		= $geg['user_id'];
	$username		= $geg['username'];
	$position		= $geg['position'];
	
	}
	$x++;
?>

<ul class="row r4">
	<li><a href="/staff/<?php echo $user_id; ?>"><?php echo $username; ?></a></li>
	<li><?php echo $startdate; ?></li>
	<li><?php echo $enddate; ?></li>
	<li>
		<?php if($approved == 'yes') { ?>
			Yes
		<?php } elseif($approved == 'no') { ?>
			No
		<?php } else { ?>
			<a href="/holidays/edit">View</a>
		<?php } ?>
	</li>
</ul>

<?php } ?>

<? } } else {
	if($_POST['submit']) {
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	$query = mysql_query("SELECT * FROM staff WHERE username='$username' AND password='$password'");
	$result = mysql_num_rows($query);
	
		if(!$result) { ?>
		
		<div class="note"><p>Forget <a href="/forgot">pin number</a>?</p></div>
		
		<form method="post" action="/">
			<ul class="form">
				<input type="hidden" name="submit" value="1">
					<li class="username">
						<input name="username" type="text" size="10" autocapitalize="off" autocorrect="off" placeholder="username" />
					</li>
					<li class="pin">
						<input name="password" type="tel" size="10" autocapitalize="off" autocorrect="off" placeholder="pin number (4)" />
					</li>
					<li>
						<input type="submit" value="Log in" />
					</li>
				</ul>
		</form>
		
		<?php }
		else {
			while($object = mysql_fetch_object($query)){ $user_id = $object->user_id; }
			$_SESSION['user_id'] = $user_id;
			$_SESSION['login'] = 1; ?>
			
			<meta http-equiv="refresh" content="0">
		
			<?php } } else { ?>
	
	<form method="post" action="/">
		<ul class="form">
			<input type="hidden" name="submit" value="1">
				<li class="username">
					<input name="username" type="text" size="10" autocapitalize="off" autocorrect="off" placeholder="username" />
				</li>
				<li class="pin">
					<input name="password" type="tel" size="10" autocapitalize="off" autocorrect="off" placeholder="pin number (4)" />
				</li>
				<li>
					<input type="submit" value="Log in" />
				</li>
			</ul>
	</form>
	
	<p><a href="/register" class="center">Register?</a></p>
	
<?php } } ?>

<?php if($_SESSION['user_id']) { ?>
<p><a href="/clean">clean database</a></p>
<?php } ?>

</div>
