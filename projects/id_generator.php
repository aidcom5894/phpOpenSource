<?php 

include('../master_content/navbar.php');

?>

<div class="container" style="margin-top:36px;">


<div class="container">

	<form method="POST" action="#" enctype="multipart/form-data">
		
  <div class="row">
    <div class="col-sm">
    <label class="form-label"><strong>Name:</strong></label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="fullname" aria-describedby="emailHelp">
	</div>

	<div class="col-sm">
    <label for="exampleInputEmail1" class="form-label"><strong>Father's Name:</strong></label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="fathername" aria-describedby="emailHelp">
	</div>

	<div class="col-sm">
    <label for="exampleInputEmail1" class="form-label"><strong>Date of Birth:</strong></label>
    <input type="date" class="form-control" id="exampleInputEmail1" name="dateofBirth" aria-describedby="emailHelp">
	</div>

	
	<div class="col-sm">
    <label for="exampleInputEmail1" class="form-label"><strong>Designation:</strong></label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="designation" aria-describedby="emailHelp">
	</div>

	
	<div class="col-sm">
    <label for="exampleInputEmail1" class="form-label"><strong>Employee ID:</strong></label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="employeeID" aria-describedby="emailHelp">
	</div>

	<div class="col-sm">
    <label for="exampleInputEmail1" class="form-label"><strong>Blood Group:</strong></label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="bloodgroup" aria-describedby="emailHelp">
	</div>
  </div>

  <div class="row" style="height: 60px;"></div>

  <div class="row">
    <div class="col-sm">
    <label class="form-label"><strong>Contact No:</strong></label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="contact" aria-describedby="emailHelp">
	</div>

	<div class="col-sm">
    <label for="exampleInputEmail1" class="form-label"><strong>Email:</strong></label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="email" aria-describedby="emailHelp">
	</div>

	<div class="col-sm">
    <label for="exampleInputEmail1" class="form-label"><strong>Emergency Contact:</strong></label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="emergencyContact" aria-describedby="emailHelp">
	</div>

	<div class="col-sm">
    <label for="exampleInputEmail1" class="form-label"><strong>User Image:</strong></label>
    <input type="file" class="form-control" id="exampleInputEmail1" name="userimage" aria-describedby="emailHelp">
	</div>

<!-- 	<div class="col-sm">
    <label for="exampleInputEmail1" class="form-label"><strong>Logo:</strong></label>
    <input type="file" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
	</div> -->

	<div class="col-sm">
    <label for="exampleInputEmail1" class="form-label"><strong>Confirm By Clicking:</strong></label>
    <button type="submit" class="btn btn-primary form-control" name="generatedID">Submit</button>
	</div>
	
  </div>
	</form> 

</div>

</div>

<?php 

if(isset($_POST['generatedID']))
{
	$fullname = $_POST['fullname'];
	$fathername = $_POST['fathername'];
	$dob = $_POST['dateofBirth'];
	$designation = $_POST['designation'];
	$employeeID = $_POST['employeeID'];
	$bloodgroup = $_POST['bloodgroup'];
	$contact = $_POST['contact'];
	$emailID = $_POST['email'];
	$emergencyContact = $_POST['emergencyContact'];

	// file handling and image upload section starts here 
	$imageTargetFolder = "uploaded_images/";

	$imageOrgName = $_FILES['userimage']['name'];
	$imageTmpName = $_FILES['userimage']['tmp_name'];

	$imageUploadLocation = $base_url.'projects/'.$imageTargetFolder.$imageOrgName;

	

	$saveData = mysqli_query($config,"INSERT INTO userdetails (fullname,fathername,dateofBirth,designation,employeeID,bloodGroup,contactNo,email,emergencyContact,userProfilePic) VALUES ('$fullname','$fathername','$dob','$designation','$employeeID','$bloodgroup','$contact','$emailID','$emergencyContact','$imageUploadLocation')");


	if($saveData)
	{
		echo "<script>alert('User Details Saved Successfully')</script>";
			move_uploaded_file($imageTmpName,$imageTargetFolder.$imageOrgName);
	}
	else
	{
		echo "<script>alert('ID Generation Failed')</script>";
	}

}


?>








<?php 

include('../master_content/footer.php');

?>