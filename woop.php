<?php 

include("config.php"); 


		$user_id	=	$_POST['user_id'];
		$username	=	$_POST['username'];
		$sunday	=	$_POST['sunday'];
		$monday	=	$_POST['monday'];
		$tuesday	=	$_POST['tuesday'];
		$wednesday	=	$_POST['wednesday'];
		$thursday	=	$_POST['thursday'];
		$friday	=	$_POST['friday'];
		$saturday	=	$_POST['saturday'];
		$position		=	$_POST['position'];
		$week		=	$_POST['week'];

		$query = mysql_query("");



for($i=0;$i<=20;$i++){ 
		
		//mysql_query("INSERT INTO rota (user_id,monday,tuesday,wednesday,thursday,friday,saturday,sunday,week) VALUES ('$user_id[$i]','$monday[$i]','$tuesday[$i]','$wednesday[$i]','$thursday[$i]','$friday[$i]','$saturday[$i]','$sunday[$i]','$week[$i]')");
		
		mysql_query("INSERT INTO rota set user_id = '$user_id[$i]', username = '$username[$i]', sunday = '$sunday[$i]', monday = '$monday[$i]', tuesday = '$tuesday[$i]', wednesday = '$wednesday[$i]', thursday = '$thursday[$i]', friday = '$friday[$i]', saturday = '$saturday[$i]', week = '$week[$i]', position = '$position[$i]'"); 
		
$result1=mysql_query($sql1);
}

if(isset($result1)){
?>
Sorted!

<meta http-equiv="refresh" content="0;url=/">

<?php } ?>