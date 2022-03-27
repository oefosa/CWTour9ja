<?php  

$sname = "localhost";
$uname = "root";
$password = "";

$db_name = "tour9ja";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
	echo "Connection Failed!";
	exit();

} else{
	echo "<script>console.log('success')</script>";
}