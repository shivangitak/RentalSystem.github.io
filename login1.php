<!DOCTYPE html>
<html>
<meta charset="utf-8">
<title>Login</title>
</head>
<body>
	<?php
	// Enter your Host, username, password, database below.
	// I left password empty because i do not set password on localhost.
	$con = mysqli_connect("localhost","root","","users");
	if (mysqli_connect_errno()){ // Check connection
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}

	//Start Session;
	session_start();

	// If form submitted, insert values into the database.
	if (isset($_POST['username'])){
		// removes backslashes
		$username = stripslashes($_REQUEST['username']);
		//escapes special characters in a string
		$username = mysqli_real_escape_string($con, $username);
		$password = stripslashes($_REQUEST['password']);
		$password = mysqli_real_escape_string($con, $password);
		//Checking is user existing in the database or not
		$query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
		$result = mysqli_query($con, $query) or die(mysql_error());
		$rows = mysqli_num_rows($result);
		if($rows == 1){
			
			$row = mysqli_fetch_assoc($result);
			   foreach($row as $column => $value) {
			   		$_SESSION[$column] = $value;
			   }

			header("Location: success.php");
		}else{
			echo "<div class='form'>
			<h3>Username/password is incorrect.</h3>
			<br/>Click here to <a href='login.php'>Login</a></div>";
		}
	}else{
		?>
		<!<div class="form">
			<h1>Log In</h1>
			<form action="" method="post" name="login">
				<label>Username</label><input type="text" name="username" placeholder="Username" required /><br>
				<label>Password</label><input type="password" name="password" placeholder="Password" required /><br>
				<input name="submit" type="submit" value="Login"/><br>
			</form>
			<p>Not registered yet? <a href='registration.php'>Register Here</a></p>
		</div>
	<?php } ?>
</body>
</html>