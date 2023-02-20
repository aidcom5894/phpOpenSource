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

    <title>Hello, world!</title>
  </head>
  <body>
    

      <?php 

        $displayData = "SELECT * FROM user_profile WHERE username='{$_SESSION['username']}'";

        $fetchData = mysqli_query($config, $displayData);

        while ($row = mysqli_fetch_assoc($fetchData)) 
        {
             $uname = $row['username'];
             $email = $row['email'];
             $password = $row['password'];
             $image = $row['user_profile_pic'];
        }

      ?>

      <div class="container">
        
<form>
  <h1>Hello, <?php echo $_SESSION['username'];?></h1>
  <a type="button" class="btn btn-outline-danger" href="logout.php">Logout</a>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Username</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $uname; ?>">    
  </div>


<div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email</label>
    <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?php echo $email; ?>">    
  </div>

  

  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="text" class="form-control" id="exampleInputPassword1"  value="<?php echo $password; ?>">
  </div>

<div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Avatar</label>
    <input type="text" class="form-control" id="exampleInputPassword1"  value="<?php echo $image; ?>">
  </div>



  <button type="submit" class="btn btn-primary form-control">Submit</button>
  <div class="container" style="height:36px;"></div>
    <a href="profile.php" class="btn btn-warning" style="text-decoration: none;">Back to Profile</a>
</form>
    
      </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  
  </body>
</html>
