<?php
	include('../header.php');
    include('../config.php');
?>

<!--
<ul class="nav">
	<li><a class="selection" href="/edit/week/<?php echo $week-1; ?>">Previous</a></li> 
	<li><a class="selection" href="/edit/week/<?php echo $week+1; ?>">Next</a></li>
</ul>
-->

<h3>Update staff members</h3> 

<ul class="row r5">
	<li>Name</li>
	<li>Position</li>
	<li>Name</li>
	<li>Pin</li>
	<li>Email</li>
</ul>

<form action="/staff/edit" method="post">
	
<?php	
$SQL_sh		= "SELECT * FROM staff ORDER BY username";
$result		= mysql_query($SQL_sh);
$user_id			= $sh['user_id'];
$username			= $sh['username'];
$position			= $sh['position'];
$name			= $sh['name'];	
$password			= $sh['password'];	
$email			= $sh['email'];	


$count=mysql_num_rows($result);
while($rows=mysql_fetch_array($result)){ 
?>

<ul class="row r5">

<li class="hide"><?php $id[]=$rows['id']; ?><?php echo $rows['id']; ?></li>

<li class="hide"><input name="user_id[]" type="text" id="user_id" value="<?php echo $rows['user_id']; ?>"></li>

<li><input name="username[]" type="text" id="username" value="<?php echo $rows['username']; ?>"></li>
<li><input name="position[]" type="text" id="position" value="<?php echo $rows['position']; ?>"></li>
<li><input name="name[]" type="text" id="name" value="<?php echo $rows['name']; ?>" placeholder="name" ></li>

<!--
<input name="username[]" type="text" id="username" value="<?php echo $rows['username']; ?>">
-->

<li><input name="password[]" type="text" id="password" value="<?php echo $rows['password']; ?>"></li>

<li><input name="email[]" type="text" id="email" value="<?php echo $rows['email']; ?>" placeholder="sun" ></li>

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
		$position = $_POST['position'];
		$name = $_POST['name'];
		$password = $_POST['password'];
		$email = $_POST['email'];
	
	for($i=0;$i<=$count;$i++){
	$sql1="UPDATE staff SET user_id='$user_id[$i]', username='$username[$i]', position='$position[$i]', name='$name[$i]', password='$password[$i]', email='$email[$i]' WHERE user_id='$user_id[$i]'";
	$result1=mysql_query($sql1);
	}
	}
	if(isset($result1)) { ?>
	Sorted!
	
	<meta http-equiv="refresh" content="0">
	
	<?php } ?>