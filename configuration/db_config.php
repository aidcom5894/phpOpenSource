<?php 

$hostname = 'localhost';
$username = 'root';
$password = 'Admin1234#@';
$db_name = 'phpOpenSource';

$config = mysqli_connect($hostname,$username,$password,$db_name);

if($config)
{
	echo "";
}
else
{
	echo "Database Failed to Connect with Error: ".mysqli_connect_error();
}

?>