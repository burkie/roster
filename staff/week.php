<?php
	include('../header.php');
    include('../config.php');
    $week = $_GET['week'];
    $user_id = $_GET['user_id'];
?>

<ul class="nav">
	<li><a class="selection" href="/staff/<?php echo $user_id; ?>/week/<?php echo $week-1; ?>">Previous</a></li> 
	<li><a class="selection" href="/staff/<?php echo $user_id; ?>/week/<?php echo $week+1; ?>">Next</a></li>
</ul>

	<h3>Week <?php echo $week; ?> (<?
	$year = 2014;
	$week = $week;
	
	$weekoffset = $week-1;	// make week offset zero based
	$soytime = strtotime("1/1/$year");	// get the timestamp for the 1st day of
	//the year
	$soyoffset = date('w',$soytime);	// get the number of days past sunday
	$soydatetime = strtotime("-$soyoffset day",$soytime);	// get the timestamp
	//for the sunday before or == to the start date of the year
	$soweektime = strtotime("+$weekoffset week",$soydatetime);	// get the
	//timestamp for the sunday of the week
	
	// Now $soweektime contains the timestamp for the first day of the week
	
	for ($i=0;$i<1;$i++)
	echo date('F',strtotime("+$i day",$soweektime));
	?>) <?php if($status == 1) { ?>/ <a href="/edit/week/<?php echo $week; ?>">edit</a><?php } ?></h3> 

<div class="table user">
<ul class="row r10">
	<li>Name</li>
	<li>Position</li>
	<?
	$year = date("Y");
	$week = $_GET['week'];
	
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
$SQL_sh		= "SELECT * FROM rota WHERE user_id='$user_id' AND week='$week'";
$result		= mysql_query($SQL_sh);

$user_id			= $sh['user_id'];
$username			= $sh['username'];
$position			= $sh['position'];
$monday			= $sh['monday'];	
$tuesday			= $sh['tuesday'];	
$wednesday			= $sh['wednesday'];	
$thursday			= $sh['thursday'];	
$friday			= $sh['friday'];	
$saturday			= $sh['saturday'];	
$sunday			= $sh['sunday'];	
$week			= $sh['week'];	
	
	// Count table rows 
	$count=mysql_num_rows($result);
	?>
	
	
	<?php
	while($rows=mysql_fetch_array($result)){

	
	?>

<ul class="row r10">

<li class="hide"><?php $id[]=$rows['id']; ?><?php echo $rows['id']; ?></li>

<li><?php echo $rows['username']; ?></li>
<li><?php echo $rows['position']; ?></li>

<!--
<input name="user_id[]" type="text" id="user_id" value="<?php echo $rows['user_id']; ?>">
<input name="username[]" type="text" id="username" value="<?php echo $rows['username']; ?>">
-->
<li>
	<?php if(empty($rows['sunday'])){ ?>
		<span>n/a</span>
	<?php } else { ?>
		<?php echo $rows['sunday']; ?>
	<?php } ?>
</li>

<li>
	<?php if(empty($rows['monday'])){ ?>
		<span>n/a</span>
	<?php } else { ?>
		<?php echo $rows['monday']; ?>
	<?php } ?>
</li>

<li>
	<?php if(empty($rows['tuesday'])){ ?>
		<span>n/a</span>
	<?php } else { ?>
		<?php echo $rows['tuesday']; ?>
	<?php } ?>
</li>

<li>
	<?php if(empty($rows['wednesday'])){ ?>
		<span>n/a</span>
	<?php } else { ?>
		<?php echo $rows['wednesday']; ?>
	<?php } ?>
</li>

<li>
	<?php if(empty($rows['thursday'])){ ?>
		<span>n/a</span>
	<?php } else { ?>
		<?php echo $rows['thursday']; ?>
	<?php } ?>
</li>

<li>
	<?php if(empty($rows['friday'])){ ?>
		<span>n/a</span>
	<?php } else { ?>
		<?php echo $rows['friday']; ?>
	<?php } ?>
</li>

<li>
	<?php if(empty($rows['saturday'])){ ?>
		<span>n/a</span>
	<?php } else { ?>
		<?php echo $rows['saturday']; ?>
	<?php } ?>
</li>

</ul>
	<?php
	}
	?>
</div>

	<?php
	// Check if button name "submit" is active, do this 
	if(isset($_POST['submit'])){
		$user_id = $_POST['user_id'];
		$username = $_POST['username'];
		$position = $_POST['position'];
		$monday = $_POST['monday'];
		$tuesday = $_POST['tuesday'];
		$wednesday = $_POST['wednesday'];
		$thursday = $_POST['thursday'];
		$friday = $_POST['friday'];
		$saturday = $_POST['saturday'];
		$sunday = $_POST['sunday'];
		$week = $_POST['week'];
	
	for($i=0;$i<=$count;$i++){
	$sql1="UPDATE rota SET user_id='$user_id[$i]', username='$username[$i]', position='$position[$i]', monday='$monday[$i]', tuesday='$tuesday[$i]', wednesday='$wednesday[$i]', thursday='$thursday[$i]', friday='$friday[$i]', saturday='$saturday[$i]', sunday='$sunday[$i]', week='$week[$i]' WHERE id='$id[$i]'";
	$result1=mysql_query($sql1);
	}
	}
	if(isset($result1)){
	?>
	Sorted!
	
	<meta http-equiv="refresh" content="0">
	
	<?php }?>
	
	
<!--
	<h3>Update Upcoming Weeks</h3>
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
	
	<a href="/update/<?php echo $week; ?>">Week <?php echo $week; ?></a>
	
	<?php } ?>

-->		