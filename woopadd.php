<?php 

include("config.php"); 


		$user_id	=	$_POST['user_id'];
		$username	=	$_POST['username'];
		$name	=	$_POST['name'];
		$password	=	$_POST['password'];
		$email	=	$_POST['email'];
		$position	=	$_POST['position'];
		

		$query = mysql_query("");



for($i=0;$i<=20;$i++){ 
		
		//mysql_query("INSERT INTO rota (user_id,monday,tuesday,wednesday,thursday,friday,saturday,sunday,week) VALUES ('$user_id[$i]','$monday[$i]','$tuesday[$i]','$wednesday[$i]','$thursday[$i]','$friday[$i]','$saturday[$i]','$sunday[$i]','$week[$i]')");
		
		mysql_query("INSERT INTO staff set user_id = '$user_id[$i]', username = '$username[$i]', name = '$name[$i]', password = '$password[$i]', email = '$email[$i]', position = '$position[$i]'"); 
		
$result1=mysql_query($sql1);
}

if(isset($result1)){
?>
Sorted!

<meta http-equiv="refresh" content="0;url=/">

<?php } ?>