<?php  
session_start();
$con=mysqli_connect('localhost', 'root', 'root', 'mysql');
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 
$frms = $_POST['frms'];
$tos = $_POST['tos'];
$date = $_POST['date'];


$sql="select t.trainID,t.trainName,t.runningDays,sa.classType,sa.bookedSeats,sa.waitingSeats,sa.availableSeats from train as t inner join seat_availability as sa on t.trainID = sa.trainID where startStationID ='$frms' and endStationID = '$tos' and availableDate = '$date'";
$a=$con->query($sql);
$rec=mysqli_fetch_array($a);


?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title> Railways </title>
<link href="ssrv.css" rel="stylesheet">
<script src="ssrv.js"> 
</script>
</head>

<body>
<div id="head">
<p class="topnav">
<a href='main.php?con=home'>Home </a> &nbsp;&nbsp;&nbsp;<a href='login.php?con=explore'>Login </a>&nbsp;&nbsp;&nbsp;<a href='signup.php'>Signup</a>&nbsp;&nbsp;&nbsp;
</p>
</div>
<br>


<table border-style ="groove" bordercolor="#11DEF7" cellpadding="5" cellspacing="1" class="table">
<caption> <strong>Train Details </strong> </caption>
<tr>
<th scope="col">Train ID</th>
<th scope="col">Train Name</th>
<th scope="col">Running Days</th>
<th scope="col">Class Type</th>
<th scope="col">Booked Seats</th>
<th scope="col">Available Seats</th>
<th scope="col">Waiting Seats</th>
<th scope="col">Reserve</th>
</tr>

<?php do { ?>

<tr>
   
<th scope="col"><?php echo $rec['trainID']; ?></th>
<th scope="col"><?php echo $rec['trainName']; ?></th>
<th scope="col"><?php echo $rec['runningDays'];?></th>
<th scope="col"><?php echo $rec['classType'];?> </th>
<th scope="col"><?php echo $rec['bookedSeats'];?></th>
<th scope="col"><?php echo $rec['waitingSeats'];?></th>
<th scope="col"><?php echo $rec['availableSeats'];?></th>
       
<th>
<button>
<input type="button" id= "book_ticket" >Book ticket</button></th>
</tr>
<?php } while ($rec=mysqli_fetch_array($a))?>

</table>
</div>

</div>
</body>
</html>
