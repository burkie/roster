<?php
    include('../header.php');
    include('../config.php');
    $user_id = $_GET['user_id'];
?>

<div class="holder">

<?php
if($user_id) { ?>

<?php if($status == 1) { ?>
<ul class="nav">
	<li><a class="selection" href="/staff/<?php echo $user_id-1; ?>">Previous</a></li> 
	<li><a class="selection" href="/staff/<?php echo $user_id+1; ?>">Next</a></li>
</ul>
<?php } ?>
<?php
	$SQL_player	= "SELECT * FROM staff WHERE user_id='$user_id'";
	$resultset = mysql_query($SQL_player);
		while($geg  = mysql_fetch_array($resultset)) {
			$position = $geg['position'];
			$username  = $geg['username'];
			$user_id  = $geg['user_id'];
			$email = $geg['email'];
			$name = $geg['name'];
			$teamname = $geg['teamname'];
			$totalweekpoints = $geg['totalweekpoints'];
			$start = $geg['start'];
} ?>

<h3><?php echo $username; ?> &ndash; <?php echo $position; ?> 
<?php if($status == 1) { ?>
(<a href="/staff/<?php echo $user_id; ?>/edit">edit</a>)
<?php } ?></h3>

<?php
$user_id = $_GET['user_id'];
if($user_id) {  ?>

<ul class="row">
	<li>Week</li>
	<li>Mon</li>
	<li>Tue</li>
	<li>Wed</li>
	<li>Thu</li>
	<li>Fri</li>
	<li>Sat</li>
	<li>Sun</li></ul>


<?php 
	$SQL_player	= "SELECT * FROM rota WHERE user_id='$user_id' and week >='1' GROUP BY week ASC";
	$resultset = mysql_query($SQL_player);
		while($geg  = mysql_fetch_array($resultset)) {
			$user_id = $geg['user_id'];
			$username = $geg['username'];
			$monday			= $geg['monday'];	
			$tuesday			= $geg['tuesday'];	
			$wednesday			= $geg['wednesday'];	
			$thursday			= $geg['thursday'];	
			$friday			= $geg['friday'];	
			$saturday			= $geg['saturday'];	
			$sunday			= $geg['sunday'];	
			$week			= $geg['week'];	
 ?>

<ul class="row">
<li><a href="/staff/<?php echo $user_id; ?>/week/<?php echo $week; ?>"><?php echo $week; ?></a></li>
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

<?php } } ?>

<!-- use while to loop through rota where user_id -->




<!--

<?php

$user_id = $_GET['user_id'];
if($user_id) { 
	$SQL_player	= "SELECT  FROM staff WHERE user_id='$user_id'";
	$resultset = mysql_query($SQL_player);
	 ?>

<? if(!$_POST['submit']){ ?>

<form action="/staff/<?php echo $user_id; ?>" method="post">

<?php for($i=0;$i<=3;$i++){ ?>


<ul class="rota">
		<input type="hidden" name="submit" value="1" />
		<input type="hidden" name="user_id[]" size="25" value="<?php echo $user_id; ?>" />
		
		<input type="hidden" name="username[]" size="25" value="<?php echo $username; ?>" />
		
		<input type="hidden" name="position[]" size="25" value="<?php echo $position; ?>" />
		
		<li>Monday <input type="text" name="monday[]" size="25" /></li>
		  
		<li>Tuesday <input type="text" name="tuesday[]" size="25" /></li>
		   
		<li>Wednesday <input type="text" name="wednesday[]" size="25" /></li>
		     
		<li>Thursday <input type="text" name="thursay[]" size="25" /></li>
		       
		<li>Friday <input type="text" name="friday[]" size="25" /></li>

		<li>Saturday <input type="text" name="saturday[]" size="25" /></li>
	
		<li>Sunday <input type="text" name="sunday[]" size="25" /></li>
	
		<li>Week <input type="text" name="week[]" size="20" /></li>
		
		</ul>
		
		<br clear="both" />
		
		<?php } ?>
		
				<input name="submit2" type="submit" value="Submit Hours" />
		
		</form>
		<? } else {
		
		$user_id		=	$_POST['user_id'];
		$username		=	$_POST['username'];
		$monday		=	$_POST['monday'];
		$tuesday		=	$_POST['tuesday'];
		$wednesday		=	$_POST['wednesday'];
		$thursday		=	$_POST['thursday'];
		$position		=	$_POST['position'];
		$friday		=	$_POST['friday'];
		$saturday		=	$_POST['saturday'];
		$sunday		=	$_POST['sunday'];
		$week		=	$_POST['week'];
		

			if($week) {
			
			for($i=0;$i<=3;$i++){

			mysql_query("INSERT INTO rota (user_id,username,position,monday,tuesday,wednesday,thursday,friday,saturday,sunday,week) VALUES ('$user_id[$i]','$username[$i]','$position[$i]','$monday[$i]', '$tuesday[$i]','$wednesday[$i]','$thursday[$i]','$friday[$i]','$saturday[$i]','$sunday[$i]','$week[$i]')") or die(mysql_error());
			?>
			
			<?php } ?>
			<p>You have submitted their hours &ndash; <a href="/">view rota</a>.</p>
			<?php
		
			} else { ?>You didn't fill al the required fields.<br><a href="javascript:history.go(-1)">Go back</a>
		
		<? } } } ?>
		
		-->

<?php } else { ?>

<h3>Staff <?php if($status == 1) { ?>/ <a href="/staff/edit">edit</a><?php } ?></h3>

<?php
	$SQL_player	= "SELECT * FROM staff WHERE status='0' ORDER BY position";
	$resultset = mysql_query($SQL_player);
		while($geg  = mysql_fetch_array($resultset)) {
			$position = $geg['position'];
			$username  = $geg['username'];
			$user_id  = $geg['user_id'];
			$email = $geg['email'];
			$name = $geg['name'];
			$teamname = $geg['teamname'];
			$status = $geg['status'];
			$totalweekpoints = $geg['totalweekpoints'];
			$start = $geg['start']; ?>
		<ul class="row r2">	
			<li><a href="/staff/<?php echo $user_id; ?>"><?php echo $username; ?></a></li>
			<li><a href="/position/<?php echo $position; ?>"><?php echo $position; ?></a></li>
		</ul>	
<?php } ?>

<?php } ?>