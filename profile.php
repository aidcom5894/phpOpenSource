<?php 

include('./configuration/base_url.php');
include('./configuration/db_config.php');

session_start();

if(!isset($_SESSION['username']))
{
	header("location:login.php");
	exit();
}

?>


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>User Profile</title>
  </head>
  <body>
    
    <div class="container" style="height: 36px;">

    	<h3>Welcome, <?php echo $_SESSION['username']; ?></h3>

    		<div class="card mb-3" style="max-width: 540px;">
			  <div class="row g-0">
			    <div class="col-md-4">
			      <img src="<?php echo $_SESSION['profile_pic']; ?>" class="img-fluid rounded-start" alt="...">
			    </div>
			    <div class="col-md-8">
			      <div class="card-body">
			        <h5 class="card-title">Your Profile Card</h5>
			        <p class="card-text">Hi, <?php echo $_SESSION['username'];?> Welcome</p>
			        <p class="card-text"><small class="text-muted">You have successfully Logged in your Profile</small></p>
			      </div>
			    </div>
			  </div>
			</div>

    </div>

    	<a href="logout.php" class="btn btn-danger">Logout</a>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>