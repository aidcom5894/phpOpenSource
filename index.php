<?php 

include('./configuration/base_url.php');
include('./configuration/db_config.php');

?> 


<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="icon" type="image/png" href="assets/img/icon.png">

    <title>PHP Tutorials</title>
  </head>
  <body>
      
      <div style="height: 60px;"></div>

    <div class="container">
      
      <form method="POST" action="index.php" enctype="multipart/form-data">

        <div class="mb-3">
          <label for="username" class="form-label"><strong>Username:</strong></label>
          <input type="text" class="form-control" id="username" name="username" aria-describedby="username">
        </div>

        <div class="mb-3">
          <label for="email" class="form-label"><strong>Email:</strong></label>
          <input type="email" class="form-control" id="email" name="email" aria-describedby="email">
        </div>


        <div class="mb-3">
          <label for="password" class="form-label">Password:</label>
          <input type="password" class="form-control" id="password" name="password" aria-describedby="Password">
        </div>

        <div class="mb-3">
          <label for="image" class="form-label"><strong>User Avatar:</strong></label>
          <input type="file" class="form-control" id="image" name="image" aria-describedby="UserAvatar">
        </div>

        
        <button type="submit" class="btn btn-primary form-control" name="submit">Submit</button>
      </form>

    </div>


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>


<?php 

if(isset($_POST['submit']))
{
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];

  $imagename = $_FILES['image']['name'];
  $imagetemp = $_FILES['image']['tmp_name'];
  $uploadFolder = 'uploaded_avatar/';

  $imageDbAddress = $base_url.$uploadFolder.$imagename;

  $sql = mysqli_query($config,"INSERT INTO user_details (username,email,password,user_avatar) VALUES('$username','$email','$password','$imageDbAddress')");

  
  if($sql)
  {
    session_start();
    
    $_SESSION['userAvatar'] = $imageDbAddress;

    echo "Data Saved Successfully";
    move_uploaded_file($imagetemp,$uploadFolder.$imagename);

    header("location:login.php"); 
  }
  else
  {
    echo "Data Failed to Save";
  }
}

?>