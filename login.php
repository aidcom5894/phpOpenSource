<?php 

// include('./configuration/base_url.php');
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
      
      <form method="POST" action="profile.php">

        <div class="mb-3">
          <label for="username" class="form-label"><strong>Username:</strong></label>
          <input type="text" class="form-control" id="username" name="username" aria-describedby="username">
        </div>

        
        <div class="mb-3">
          <label for="password" class="form-label">Password:</label>
          <input type="password" class="form-control" id="password" name="password" aria-describedby="Password">
        </div>

              
        <button type="submit" class="btn btn-primary form-control" name="login">Submit</button>
      </form>

    </div>  


    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>


<?php 

if(isset($_POST['login']))
{
  $username = $_POST['username'];
  $password = $_POST['password'];

  $checkEntry = mysqli_query($config,"SELECT * FROM user_details WHERE username='$username' AND password='$password'");

  $profileimage = mysqli_query($config,"SELECT user_avatar FROM user_details");

      if(mysqli_num_rows($checkEntry))
      {
        session_start();
       $_SESSION['username'] = $username;
       $_SESSION['profile_pic'] = $profileimage;
       
        echo "<script>alert('Your Login Successful')</script>";
        header("location:profile.php");
        exit();
      }
      else
      {
        echo "<script>alert('Your Login Failed. Credentials Mismatched')</script>";
      }
}

?>