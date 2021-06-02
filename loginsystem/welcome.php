<?php
session_start();
if (strlen($_SESSION['id']==0)) {
  	header('location:logout.php');

} else{

	require_once('dbconnection.php');

	$userInfo = $_SESSION['userinfo'];

	//$con
	if(!empty($_REQUEST['update']) && $_REQUEST['update'] == "Update"){

		$obj = $_REQUEST;

		$query = "UPDATE `users` SET `fname`='$obj[firstName]',`lname`='$obj[lastName]',`password`='$obj[password]',`contactno`='$obj[contactNumber]' WHERE id = '$obj[uid]'";

		$result = mysqli_query($con, $query);
		
		if($result){
			header('location:logout.php');
		}
	}

?><!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Welcome </title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/heroic-features.css" rel="stylesheet">
</head>
<body>
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Welcome !<?php echo $_SESSION['name'];?></a>

            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                     <li >
                        <a data-toggle="modal" data-target="#profileModal" href="javascript.void(0)">Your Profile</a>
                    </li>
                    <li>
                        <a href="logout.php">Logout</a>
                    </li>
                    <li>
                        <a href="uploadimages/">Upload Document</a>
                    </li>
                     <li>
                        <a href="https://drive.google.com/file/d/1kDGMzs_8mOGS7lhjzQa5uzX5Avey--KL/view?usp=sharing">Rent Agreement</a>
                    </li>

                  
                </ul>
            </div>
        </div>
    </nav>
    <div class="container">
        <header class="jumbotron hero-spacer">
            <h1>Terms and Condition</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa, ipsam, eligendi, in quo sunt possimus non incidunt odit vero aliquid similique quaerat nam nobis illo aspernatur vitae fugiat numquam repellat.</p>
            <p><a  href="logout.php" class="btn btn-primary btn-large">Logout </a>
            </p>
        </header>
        <hr>
        </div>
        <hr>
    </div>


    <!-- Modal -->
    <div id="profileModal" class="modal fade" role="dialog">
    	<div class="modal-dialog">
    		<!-- Modal content-->
    		<div class="modal-content">
    			<form method="POST">
    				<div class="modal-header">
    					<button type="button" class="close" data-dismiss="modal">&times;</button>
    					<h4 class="modal-title">Profile</h4>
    				</div>
    				<div class="modal-body">
    					<input type="hidden" name="uid" value="<?php echo $userInfo['id'] ?>" />
    					<div class="row" style="margin-bottom: 1rem;">
    						<div class="col-md-6">
	    						<label for="fname">First Name:</label>
	    						<input type="text"  name="firstName" value="<?php echo $userInfo['fname'] ?>" class="form-control" >
	    					</div>
	    					<div class="col-md-6">
	    						<label for="lname">Last Name:</label>
	    						<input type="text" name="lastName" value="<?php echo $userInfo['lname'] ?>" class="form-control">
	    					</div>
    					</div>
    					<div class="form-group">
    						<label for="mobile">Contact Number:</label>
    						<input type="tel"  name="contactNumber" value="<?php echo $userInfo['contactno'] ?>" class="form-control"/>
    					</div>

    					<div class="form-group">
    						<label for="email">Email address:</label>
    						<input type="email" value="<?php echo $userInfo['email'] ?>" class="form-control" disabled/>
    					</div>
    					<div class="form-group">
    						<label for="pwd">Password:</label>
    						<input type="password" name="password" value="<?php echo $userInfo['password'] ?>" class="form-control"/>
    					</div>

    				</div>
    				<div class="modal-footer">
    					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    					<input type="submit" name="update" value="Update" class="btn btn-success" />
    				</div>
    			</form>
    		</div>
    	</div>
	</div>




    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>

</html>
<?php } ?>