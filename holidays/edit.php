<?php
	include('../header.php');
    include('../config.php');
    $week = $_GET['week'];
    $user_id = $_GET['user_id'];
?>

	<h3>Approve Holidays </h3> 

<ul class="row r4">
	<li>Username</li>
	<li>Start</li>
	<li>End</li>
	<li>Approval</li>
	
</ul>

<form action="/holidays/edit" method="post">
	
<?php	
$x=0;
$SQL_sh		= "SELECT * FROM holidays";
$result		= mysql_query($SQL_sh);

$user_id			= $sh['user_id'];
$username			= $sh['username'];
$startdate			= $sh['startdate'];	
$enddate			= $sh['enddate'];	
$approved			= $sh['approved'];	
	
	// Count table rows 
	$count=mysql_num_rows($result);
	?>
	
	
	<?php
	while($rows=mysql_fetch_array($result)){

	
	?>

<ul class="row r4">

<li class="hide"><?php $id[]=$rows['id']; ?><?php echo $rows['id']; ?></li>

<li class="hide"><input name="user_id[]" type="text" id="user_id" value="<?php echo $rows['user_id']; ?>"></li>
<li><input name="username[]" type="text" id="username" value="<?php echo $rows['username']; ?>"></li>

<li><input name="startdate[]" type="text" id="startdate" value="<?php echo $rows['startdate']; ?>"></li>
<li><input name="enddate[]" type="text" id="enddate" value="<?php echo $rows['enddate']; ?>"></li>
<li><input name="approved[]" type="text" id="approved" value="<?php echo $rows['approved']; ?>"></li>

<!--
<input name="user_id[]" type="text" id="user_id" value="<?php echo $rows['user_id']; ?>">
<input name="username[]" type="text" id="username" value="<?php echo $rows['username']; ?>">
-->


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
		$username = $_POST['username'];
		$startdate = $_POST['startdate'];
		$enddate = $_POST['enddate'];
		$approved = $_POST['approved'];

	
	for($i=0;$i<=$count;$i++){
	$sql1="UPDATE holidays SET user_id='$user_id[$i]', username='$username[$i]', startdate='$startdate[$i]', enddate='$enddate[$i]', approved='$approved[$i]' WHERE id='$id[$i]'";
	$result1=mysql_query($sql1);
	}
	}
	if(isset($result1)){
	?>
	Sorted!
	
	<meta http-equiv="refresh" content="0">
	
	<?php }?>
	
	