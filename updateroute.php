<?php  
session_start();
$con=mysqli_connect('localhost', 'root', '', 'ssrv');
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 
$serno = $_POST['sno'];
$distance = $_POST['dist'];
$arrival = $_POST['atime'];
$dep = $_POST['dtime'];
$tid = $_POST['id'];



$sql1="update route set distance = '$distance' where trainID= '$tid' and stopNumber='$serno'";	
$a1=$con->query($sql1);

echo "success";

?>

