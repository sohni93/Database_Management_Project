<?php  
session_start();
$con=mysqli_connect('localhost', 'root', '', 'ssrv');
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 
$id = $_POST['trainID'];

echo $id;


$sql="select * from train_route where trainID='$id'";
$a=$con->query($sql);
$rec=mysqli_fetch_array($a);


?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title> Railways </title>
<link href="ssrv.css" rel="stylesheet">
<script src="ssrv.js"> </script>
</head>

<body>
<div id="head">
<p class="topnav">
<a href='main.php?con=home'>Home </a> &nbsp;&nbsp;&nbsp;<a href='login.php?con=explore'>Login </a>&nbsp;&nbsp;&nbsp;<a href='sign.php?con=packages'>Signup</a>&nbsp;&nbsp;&nbsp;
</p>
</div>
<br>
<div id="sidebar">
<br>
<ul> <a href="checktrain.php">Check Trains</a> </ul>
<ul> <a href="reserve.php">Make Reservations</a>  </ul>
<ul> Update Account </ul>

</div>



<div>

<table id="ckt" border-style ="groove" bordercolor="#11DEF7" cellpadding="5" cellspacing="1" class="table">
<caption> <strong>Train Arrival Time </strong> </caption>
<tr>
<th scope="col">Train ID</th>
<th scope="col">Train Name</th>
<th scope="col">Station ID</th>
<th scope="col">Station Name</th>
<th scope="col">Stop Number</th>
<th scope="col">Arrival Time</th>
<th scope="col">Departure Name</th>
</tr>

<?php do { ?>

<tr>
<th scope="col"><?php echo $rec['trainID']; ?></th>
<th scope="col"><?php echo $rec['trainName']; ?></th>
<th scope="col"><?php echo $rec['stationID'];?></th>
<th scope="col"><?php echo $rec['stationName'];?> </th>
<th scope="col"><?php echo $rec['stopNumber'];?></th>
<th scope="col"><?php echo $rec['arrivalTime'];?></th>
<th scope="col"><?php echo $rec['departureTime'];?></th>
</tr>
<?php } 


while ($rec=mysqli_fetch_array($a))?>
</table>
</div>

<div id="sno">
<form name="route" method="post" action="modifyr.php? txtid=<?php echo $id;?>" >
Enter stop number to update: <input type="text" id="stopno" name="stopno"> 
<input type="submit" name="Submit" id="Submit" value="Update">
</form>
</div>
</div>

</body>
</html>	