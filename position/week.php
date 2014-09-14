<?php
	include('../header.php');
    include('../config.php');
    $week = $_GET['week'];
    $position = $_GET['position'];
?>

<ul class="nav">
	<li><a class="selection" href="/position/<?php echo $position?>/week/<?php echo $week-1; ?>">Previous</a></li> 
	<li><a class="selection" href="/position/<?php echo $position?>/week/<?php echo $week+1; ?>">Next</a></li>
</ul>


<?php $week = $week = $_GET['week'];

$week = mysql_query("SELECT week from rota WHERE week = '$week'");

if (!$week) {
    //die('Query failed to execute for some reason');
}

if (mysql_num_rows($week) > 0) { ?>

<!-- EDIT IF IT EXISTS -->

<h3>Update week <?php echo $week = $_GET['week']; ?></h3> 

<ul class="row r9">
	<li>Name</li>
	<li>Position</li>
	<li>Sun</li>
	<li>Mon</li>
	<li>Tues</li>
	<li>Wed</li>
	<li>Thu</li>
	<li>Fri</li>
	<li>Sat</li>

	
</ul>

<?php $week = $week = $_GET['week']; ?>

<form action="" method="post">
	
<?php	
$SQL_sh		= "SELECT * FROM rota WHERE position='$position' AND week='$week' ORDER BY username";
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
$count=mysql_num_rows($result);
while($rows=mysql_fetch_array($result)){ 
?>

<ul class="row r9">

<li class="hide"><?php $id[]=$rows['id']; ?><?php echo $rows['id']; ?></li>

<li><input name="username[]" type="text" id="username" value="<?php echo $rows['username']; ?>"></li>
<li><input name="position[]" type="text" id="position" value="<?php echo $rows['position']; ?>"></li>

<!--
<input name="user_id[]" type="text" id="user_id" value="<?php echo $rows['user_id']; ?>">
<input name="username[]" type="text" id="username" value="<?php echo $rows['username']; ?>">
-->

<li class="hide"><input name="user_id[]" type="text" id="user_id" value="<?php echo $rows['user_id']; ?>"></li>

<li><input name="sunday[]" type="text" id="sunday" value="<?php echo $rows['sunday']; ?>" placeholder="sun" ></li>

<li><input name="monday[]" type="text" id="monday" value="<?php echo $rows['monday']; ?>" placeholder="mon" /></li>
	
<li><input name="tuesday[]" type="text" id="tuesday" value="<?php echo $rows['tuesday']; ?>" placeholder="tue" ></li>
	
<li><input name="wednesday[]" type="text" id="wednesday" value="<?php echo $rows['wednesday']; ?>" placeholder="wed" ></li>
	
<li><input name="thursday[]" type="text" id="thursday" value="<?php echo $rows['thursday']; ?>" placeholder="thu" ></li>
	
<li><input name="friday[]" type="text" id="friday" value="<?php echo $rows['friday']; ?>" placeholder="fri" ></li>
	
<li><input name="saturday[]" type="text" id="saturday" value="<?php echo $rows['saturday']; ?>" placeholder="sat" ></li>
	
<li class="hide"><input name="week[]" type="text" id="week" value="<?php echo $rows['week']; ?>"></li>

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

	
<?php } else { ?>

<!-- CREATE IF DOES NOT EXIST -->


<form action="/woop.php" method="post">

<h3>Create Rota</h3>

<ul class="row r9">
	<li>Name</li>
	<li>Position</li>
	<li>Sun</li>
	<li>Mon</li>
	<li>Tues</li>
	<li>Wed</li>
	<li>Thu</li>
	<li>Fri</li>
	<li>Sat</li>
</ul>
	
<?php
$SQL_clubs	= "SELECT * FROM staff WHERE status='0' AND position='$position' ORDER BY user_id ";
$resultset	= mysql_query($SQL_clubs);
while($geg  = mysql_fetch_array($resultset)){
$user_id    = $geg['user_id'];
$username      = $geg['username']; 
$position      = $geg['position']; 

?>

	<ul class="row r9">
	<input type="hidden" name="submit" value="1" />
	<input type="hidden" name="user_id[]" size="25" placeholder="id" value="<?php echo $user_id; ?>" />
	
	<li><input type="text" name="username[]" size="30" value="<?php echo $username; ?>" /></li>
	<li><input type="text" name="position[]" size="30" value="<?php echo $position; ?>" /></li>
	<li class="hide"><input type="text" name="week[]" size="12" maxlength="4" value="<?php echo "" . $_GET["week"] . ""; ?>" /></li>
	<li><input type="text" name="sunday[]" size="30" placeholder="n/a" /></li>
	<li><input type="text" name="monday[]" size="30" placeholder="n/a" /></li>
	<li><input type="text" name="tuesday[]" size="30" placeholder="n/a" /></li>
	<li><input type="text" name="wednesday[]" size="30" placeholder="n/a" /></li>
	<li><input type="text" name="thursday[]" size="30" placeholder="n/a" /></li>
	<li><input type="text" name="friday[]" size="30" placeholder="n/a" /></li>
	<li><input type="text" name="saturday[]" size="30" placeholder="n/a" /></li>
	</ul>

		<? } ?>
	
			<input name="submit2" type="submit" value="Submit" />
		</form>
		
<?php } ?>

</div>