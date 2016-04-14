<?php  
session_start();
$con=mysqli_connect('localhost', 'root', '', 'ssrv');
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 
$id = $_POST['trainID'];

echo $id;


$sql="delete from train where trainID='$id'";

if ($con->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $con->error;
}
//$a=$con->query($sql);
//$rec=mysqli_fetch_array($a);
header('location:checktrainA.php')

?>

