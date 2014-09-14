<?php session_start();
include "header.php"; //connects to the database
include "config.php"; //connects to the database
if (isset($_POST['username'])){
	$username = $_POST['username'];
	$query="select * from staff where username='$username'";
	$result   = mysql_query($query);
	$count=mysql_num_rows($result);
	// If the count is equal to one, we will send message other wise display an error message.
	if($count==1)
	{
		$rows=mysql_fetch_array($result);
		$pass  =  $rows['password'];//FETCHING PASS
		$user  =  $rows['username'];//FETCHING PASS
		//echo "your pass is ::".($pass)."";
		$to = $rows['email'];
		//echo "your email is ::".$email;
		//Details for sending E-mail
		//$from = "Coding Cyber";
		$url = "http://roster.so";
		$body  =  "Hi $user!<br />
		Your pin number is $pass.<br />
		Please login at $url.<br/ >
		Best,<br />
		@burkie";
	//	$from = "hello@burkie.com";
		
		
		$subject = "Roster Password Reminder";
		$headers = 'From: hello@foulers.com' . "\r\n"; 
		$headers .= "BCC: hello@burkie.com\r\n";
		$headers .= "MIME-Version: 1.0\r\n";
		$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
		$sentmail = mail ( $to, $subject, $body, $headers );
	} else {
	if ($_POST ['email'] != "") {
	echo "Not found your email in our database";
		}
		}
	//If the message is sent successfully, display sucess message otherwise display an error message.
	if($sentmail==1)
	{ ?>
	<div class="note"><p>Check your email address.</p></div>
	<?php } else {
		if($_POST['email']!="")
		echo "Sorry! No email was entered.";
	}
}
?>

<form action="" method="post">
	<ul class="form">
		<li>
			<input id="username" type="text" name="username" placeholder="username" autocapitalize="off" autocorrect="off" />
		</li>
		<li>
			<input id="button" type="submit" name="button" value="Submit" />
		</li>
	</ul>
</form>

<p><a href="/" class="center">Try again?</a></p>

</div>