<? 
include ("../config.php"); 
include ("../header.php"); 
?>

<?php if($status == 1) { ?>

<h3>Requested Holidays (<a href="/holidays/edit">edit</a>)</h3>

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
	<li><?php echo $approved; ?></li>
</ul>

<?php } ?>
<?php } else { ?>

<? if(!$_POST['submit']) { ?>

<br /><br />

<h3>Request Holidays</h3>

<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
  
<script>
  $(function() {
      $( "#from" ).datepicker({
        defaultDate: "+1w",
        changeMonth: false,
        numberOfMonths: 1,
        dateFormat: "dd-mm-yy",
        onClose: function( selectedDate ) {
          $( "#to" ).datepicker( "option", "minDate", selectedDate );
        }
      });
      $( "#to" ).datepicker({
        defaultDate: "+1w",
        changeMonth: false,
        numberOfMonths: 1,
        dateFormat: "dd-mm-yy",
        onClose: function( selectedDate ) {
          $( "#from" ).datepicker( "option", "maxDate", selectedDate );
        }
      });
    });
  </script>
  
<form action="/holidays/" method="post">

<ul class="row holidays">
	<li>Start</li>
	<li>End</li>
</ul>

<input type="hidden" name="submit" value="1" />
<input type="hidden" name="user_id" size="25" value="<?php echo $user_id; ?>" />
<input type="hidden" name="username" size="25" value="<?php echo $username; ?>" />

<ul class="row holidays">
	<li><input type="text" name="startdate" id="from" placeholder="Enter Date"></li>
	<li><input type="text" name="enddate" id="to" placeholder="Enter Date"></li>
</ul>
	
<input name="submit2" type="submit" value="Submit" />

</form>
		<? } else {
		
		$user_id		=	$_POST['user_id'];
		$startdate		=	$_POST['startdate'];
		$enddate		=	$_POST['enddate'];
		$approved		=	$_POST['approved'];
		
		

			if($user_id) {

			mysql_query("INSERT INTO holidays (user_id,username,startdate,enddate,approved) VALUES ('$user_id', '$username', '$startdate','$enddate','$approved')") or die(mysql_error());
			?>
			<h3>Holidays Submitted</h3>
			<p>We will let you know if approved.</p>
			<?php
		
			} else { ?>You didn't fill al the required fields.<br><a href="javascript:history.go(-1)">Go back</a>
		
		<? } } ?>
		
<?php } ?>