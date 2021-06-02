<!DOCTYPE html>
<html>
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
   <meta charset="utf-8">
</head>

</head>
<body>
    <?php
        // Enter your Host, username, password, database below.
        // I left password empty because i do not set password on localhost.
    $con = mysqli_connect("localhost","root","","users");
    if (mysqli_connect_errno()){ // Check connection
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }


  if (isset($_REQUEST['username'])){
    $query = "INSERT INTO user(username, password, email) VALUES ('$_REQUEST[username]', '$_REQUEST[password]', '$_REQUEST[email]')";
    $result = mysqli_query($con, $query);
    if($result){
        echo "<div class='form'>
        <h3>You are registered successfully.</h3>
        <br/>Click here to <a href='login.php'>Login</a></div>";
    }
}else{
    ?>
    <div class="form">
        <h1>Registration</h1>
        <form name="registration" action="" method="post">
            <label>Username:   </ label><input type="text" name="username" placeholder="Username" required /><br>
            <label>Email :     </label><input type="email" name="email" placeholder="Email" required /><br>
            <label>Password  :  </label><input type="password" name="password" placeholder="Password" required /><br>
            <input type="submit" name="submit" value="Register" />
            <br/>Click here to <a href='login1.php'>Login</a></div>";


        </form>
    </div>
<?php } ?>
</body>
</html>