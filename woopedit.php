<?php

include("config.php"); 

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



<?php } ?>
