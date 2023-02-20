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
		          <label class="form-label"><strong>Name:</strong></label>
		          <input type="text" class="form-control" id="name" name="username" aria-describedby="emailHelp" required="">
		        </div>

		        <div class="mb-3">
		          <label class="form-label"><strong>Email:</strong></label>
		          <input type="email" class="form-control" id="email" name="email" required="">
		        </div>


		        <div class="mb-3">
		          <label class="form-label"><strong>Password:</strong></label>
		          <input type="password" class="form-control" id="password" name="password" required="">
		        </div>

		        <button type="submit" class="btn btn-primary form-control" name="submit">Submit</button>

		      <div style="height:40px;"></div>
		      <a href="login.php" class="btn btn-warning" style="float:right;">Redirect to Login</a>

		      </form>

		      <?php 

		      	if(isset($_POST['submit']))
		      	{

		      	$username = $_POST['username'];
		      	$email = $_POST['email'];
		      	$password = $_POST['password'];

		      	$imageSelection = array("avatar1.png","avatar2.png","avatar3.png","avatar4.png","avatar5.png","avatar6.png","avatar7.png","avatar8.png","avatar9.png","avatar10.png","avatar11.png","avatar12.png","avatar13.png","avatar14.png","avatar15.png","avatar16.png","avatar17.png","avatar18.png","avatar19.png","avatar20.png");

		      	$imageFolder = "image/";

		      	$avatar = $base_url.$imageFolder.$imageSelection[array_rand($imageSelection,1)];

		      	$query = mysqli_query($config,"INSERT INTO user_profile (username,email,password,user_profile_pic) VALUES('$username','$email','$password','$avatar')");

		      	if($query)
				      	{
				      		echo "<svg xmlns='http://www.w3.org/2000/svg' style='display: none;'>";
					        echo " <symbol id='check-circle-fill' fill='currentColor' viewBox='0 0 16 16'>";
					        echo " <path d='M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z'/>";
					        echo "</symbol>";
					        echo "</svg>";
					        echo "<div class='alert alert-success d-flex align-items-center' role='alert'>";
					        echo "<svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Success:'><use xlink:href='#check-circle-fill'/></svg>";
					        echo "<div>";
					        echo "Data Inserted Successfully";
					        echo "</div>";
					        echo "</div>";
					        header("location:login.php");
				      	}
				      	else
				      	{
				      		echo "<svg xmlns='http://www.w3.org/2000/svg' style='display: none;'>";
					        echo " <symbol id='exclamation-triangle-fill' fill='currentColor' viewBox='0 0 16 16'>";
					        echo " <path d='M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z'/>";
					        echo "</symbol>";
					        echo "</svg>";
					        echo "<div class='alert alert-danger d-flex align-items-center' role='alert'>";
					        echo "<svg class='bi flex-shrink-0 me-2' width='24' height='24' role='img' aria-label='Danger:'><use xlink:href='#exclamation-triangle-fill'/></svg>";
					        echo "<div>";
					        echo "Data Insertion Failed";
					        echo "</div>";
					        echo "</div>";
					        header("location:index.php");

				      	}
		      	}

		      ?>
		      
		    </div>

	   

   
   

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    
  </body>
</html>