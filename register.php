<? 
include ("header.php"); 
include ("config.php"); 
?>


		<? if(!$_POST['submit']){ ?>
		
		<form action="/register" method="post">
		
		<ul class="form register">
			<input type="hidden" name="submit" value="1" />
	
		<li class="uname">
			<input type="text" name="username" size="25" placeholder="username" autocapitalize="off" autocorrect="off" />
		</li>

		<li>
			<input type="text" name="name" size="25" placeholder="full name" autocapitalize="off" autocorrect="off" />
		</li>
		
		<li>
			<input type="text" name="email" size="30" placeholder="email address" autocapitalize="off" autocorrect="off" />
		</li>
		
		<li class="pin">
			<input type="tel" name="password" size="12" maxlength="4"  placeholder="pin number (4)" autocapitalize="off" autocorrect="off" />
		</li>
	
		<li>
			<input name="submit2" type="submit" value="Register" />
		</li>
		
		</ul>
		
		</form>
		
		<p><a href="/" class="center">Login?</a></p>
		
		<? } else{
		
		$uname		=	$_POST['username'];
		$password	=	$_POST['password'];
		$email		=	$_POST['email'];
		$name		=	$_POST['name'];

		$query = mysql_query("SELECT * FROM staff WHERE username = '$username'");
		$result = mysql_num_rows($query);
		if($result){ ?>
		
		<p>This user already registered. <a href="javascript:history.go(-1)">Try again</a>
		
		<? }
			else{
			if($uname AND $email){
			//if($password!=$password2){echo "Passwords didn't match";}
			//$start = date("Y-m-d");
			mysql_query("INSERT INTO staff (username,name,password,email) VALUES ('$uname','$name','$password','$email')") or die(mysql_error())
			 ?>
			
		<p>You have registered! Please <a href="/">log in</a>.</p>
		
		<?php } else { ?>
		
		<div class="note">
		<p>Please fill in all details.</p>
		</div>
		
		<form action="/register" method="post">
				
				<ul class="form register">
					<input type="hidden" name="submit" value="1" />
			
				<li class="uname">
					<input type="text" name="username" size="25" placeholder="username" autocapitalize="off" autocorrect="off" />
				</li>
		
				<li>
					<input type="text" name="name" size="25" placeholder="full name" autocapitalize="off" autocorrect="off" />
				</li>
				
				<li>
					<input type="text" name="email" size="30" placeholder="email address" autocapitalize="off" autocorrect="off" />
				</li>
				
				<li class="pin">
					<input type="tel" name="password" size="12" maxlength="4"  placeholder="pin number (4)" autocapitalize="off" autocorrect="off" />
				</li>
			
				<li>
					<input name="submit2" type="submit" value="Register" />
				</li>
				
				</ul>
				
				</form>
				
				<p><a href="/" class="center">Login?</a></p>
		
		<?php } } } ?>
    </div>
	


</div>
</div>
</body>
</html>