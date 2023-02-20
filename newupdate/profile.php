<?php 

include('./db_configuration/base_address.php');
include('./db_configuration/config.php');
session_start();

if(!isset($_SESSION['username']))
{
  header("location:login.php");
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

  </head>
  <body>

    <?php 

      $getDetails = mysqli_query($config,"SELECT * FROM user_profile WHERE username='{$_SESSION['username']}'");

      while($row = mysqli_fetch_assoc($getDetails))
      {
        $uname = $row['username'];
        $email = $row['email'];
        $profileImage = $row['user_profile_pic'];
      }



    ?>

  <div class="container">
    <a type="button" class="btn btn-outline-danger" href="logout.php">Logout</a>
    <br>
    <div class="container" style="height:40px;"></div>
      <div class="card mb-3" style="max-width: 540px;">
        <div class="row g-0">
          <div class="col-md-4">
            <img src="<?php echo $profileImage; ?>" class="img-fluid rounded-start" alt="...">
          </div>
          <div class="col-md-8">
            <div class="card-body">
              <h5 class="card-title">Welcome, <?php echo $uname;?></h5>
              <p class="card-text">Your Default Registered Email ID is: <strong><?php echo $email; ?></strong></p>
              <p class="card-text"><small class="text-muted"><?php echo date('l jS \of F Y h:i:s A'); ?></small></p>
            </div>
          </div>
        </div>
      </div>
        
        
        <a href="update_profile.php" style="text-decoration: none;">Update Details Here</a>
       
  </div>
      
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  </body>
</html>