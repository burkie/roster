<?php
	include('../header.php');
    include('../config.php');
    $week = $_GET['week'];
    $user_id = $_GET['user_id'];
?>

<!--
<ul class="nav">
	<li><a class="selection" href="/edit/week/<?php echo $week-1; ?>">Previous</a></li> 
	<li><a class="selection" href="/edit/week/<?php echo $week+1; ?>">Next</a></li>
</ul>
-->

	<h3>Update Staff</h3> 

<ul class="row r10">
	<li>Name</li>
	<li>Position</li>
	<li>Week</li>
	<li>Mon</li>
	<li>Tue</li>
	<li>Wed</li>
	<li>Thu</li>
	<li>Fri</li>
	<li>Sat</li>
	<li>Sun</li>
</ul>

<form action="/staff/<?php echo $user_id; ?>/edit" method="post">
	
<?php	
$x=0;
$SQL_sh		= "SELECT * FROM rota WHERE user_id='$user_id'";
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

<li><input name="username[]" type="text" id="username" value="<?php echo $rows['username']; ?>"></li>
<li><input name="position[]" type="text" id="position" value="<?php echo $rows['position']; ?>"></li>
<li><input name="week[]" type="text" id="week" value="<?php echo $rows['week']; ?>"></li>

<!--
<input name="user_id[]" type="text" id="user_id" value="<?php echo $rows['user_id']; ?>">
<input name="username[]" type="text" id="username" value="<?php echo $rows['username']; ?>">
-->

<li class="hide"><input name="user_id[]" type="text" id="user_id" value="<?php echo $rows['user_id']; ?>"></li>
<li><input name="monday[]" type="text" id="monday" value="<?php echo $rows['monday']; ?>"></li>
<li><input name="tuesday[]" type="text" id="tuesday" value="<?php echo $rows['tuesday']; ?>"></li>
<li><input name="wednesday[]" type="text" id="wednesday" value="<?php echo $rows['wednesday']; ?>"></li>
<li><input name="thursday[]" type="text" id="thursday" value="<?php echo $rows['thursday']; ?>"></li>
<li><input name="friday[]" type="text" id="friday" value="<?php echo $rows['friday']; ?>"></li>
<li><input name="saturday[]" type="text" id="saturday" value="<?php echo $rows['saturday']; ?>"></li>
<li><input name="sunday[]" type="text" id="sunday" value="<?php echo $rows['sunday']; ?>"></li>


</ul>
	<?php
	}
	?>
<input type="submit" name="submit" value="Submit">
</form>

	<?php
	// Check if button name "submit" is active, do this 
	if(isset($_POST['submit'])){
		$user_id = $_POST['user_id'];
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
	$sql1="UPDATE rota SET user_id='$user_id[$i]', position='$position[$i]', monday='$monday[$i]', tuesday='$tuesday[$i]', wednesday='$wednesday[$i]', thursday='$thursday[$i]', friday='$friday[$i]', saturday='$saturday[$i]', sunday='$sunday[$i]', week='$week[$i]' WHERE id='$id[$i]'";
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