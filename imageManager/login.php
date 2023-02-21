<?php 

include('./db_configuration/base_address.php');
include('./db_configuration/config.php');

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">   
  </head>
  <body>
    

  	 <div class="container" style="height: 36px;"></div>

		    <div class="container">

		      <form method="POST" action="#">

		        <div class="mb-3">
		          <label class="form-label"><strong>Username:</strong></label>
		          <input type="text" class="form-control" id="name" name="username" aria-describedby="emailHelp" required="">
		        </div>

		        <div class="mb-3">
		          <label class="form-label"><strong>Password:</strong></label>
		          <input type="password" class="form-control" id="password" name="password" required="">
		        </div>

		        <button type="submit" class="btn btn-primary form-control" name="login">Login</button>
		      </form>  

		      <div style="height:40px;"></div>
		      <a href="index.php" class="btn btn-primary">Redirect to Home</a>

		    </div>

		    <?php 

		    	$username = $_POST['username'];
		    	
		    	$password = $_POST['password'];

		    	$checkEntry = mysqli_query($config,"SELECT * FROM user_profile WHERE username='$username' AND password='$password'");

		    	if(mysqli_num_rows($checkEntry)>0)
		    	{
		    		session_start();
		    		$_SESSION['username'] = $username;
		    		
		    		echo "<script>alert('Welcome')</script>";
		    		header("location:profile.php");
		    	}
		    	else
		    	{
		    		"<script>alert('No authorised user found')</script>";
		    	}
		    	

		    ?>
	     
	     
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
  </body>
</html>