<?php  
session_start();
$con=mysqli_connect('localhost', 'root', '', 'ssrv');
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 
$sno = $_POST['stopno'];
$id = $_GET['txtid'];
echo $sno;
echo $id;


$sql="select * from route where trainID= '$id' and stopNumber='$sno'";	
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

<form name="route" method="post" action="updateroute.php" id="route">
<input type="hidden" name="sno" id="fname" value="<?php echo $sno;?>"/>
<input type="hidden" name="id" id="fname" value="<?php echo $id;?>"/>
<table id="ckt" border-style ="groove" bordercolor="#11DEF7" cellpadding="5" cellspacing="1" class="table">
<caption> <strong>Train Arrival Time </strong> </caption>

<tr>
<th scope="col">Train ID</th>
<th scope="col">stop Number</th>
<th scope="col">Distance</th>
<th scope="col">Arrival Time</th>
<th scope="col">Departure Time</th>
</tr>

<?php do { ?>

<tr>
<th scope="col"><?php echo $rec['trainID']; ?></th>
<th scope="col"><?php echo $rec['stopNumber']; ?></th>
<th scope="col"><input type="text" name="dist" id="fname" value="<?php echo $rec['distance'];?>"/></th>
<th scope="col"><input type="text" name="atime" id="fname" value="<?php echo $rec['arrivalTime'];?>"/> </th>
<th scope="col"><input type="text" name="dtime" id="fname" value="<?php echo $rec['departureTime'];?>"/></th>

</tr>
</tr>
<?php } 


while ($rec=mysqli_fetch_array($a))?>
</table>

<br><br><br><br><br><br><br><br><br><br><br><br>
<p>
<label>
<input type="submit" name="Submit" id="Submit" value="Update">
</label>
</p>

</form>
</div>


?>
