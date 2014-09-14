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

<form action="/woopadd.php" method="post">

<h3>Add Staff</h3>

<ul class="row r9">
	<li>Name</li>
	<li>Position</li>
	<?
	$year = date("Y");
	$week = $week = $_GET['week'];
	
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
$SQL_clubs	= "SELECT * FROM staff WHERE status='0' ORDER BY user_id ";
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
		