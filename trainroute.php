<?php  
session_start();
$con=mysqli_connect('localhost', 'root', '', 'ssrv');
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 


$sql="select * from train";	
$a=$con->query($sql);
$rec=mysqli_fetch_array($a);


if ($con->query($sql) === TRUE) {
	echo "aa";
	echo $rec['trainName'];
}
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
<div  id="main">
<div>
<table border-style ="groove" bordercolor="#11DEF7" cellpadding="5" cellspacing="1" class="table">
<caption> <strong>Trains </strong> </caption>
<tr>
<th scope="col">Train ID</th>
<th scope="col">Train Name</th>
<th scope="col">Running Days</th>
<th scope="col">Start Station </th>
<th scope="col">End Station</th>

</tr>

<?php do { ?>

<tr>
<th scope="col"><?php echo $rec['trainID']; ?></th>
<th scope="col"><?php echo $rec['trainName']; ?></th>
<th scope="col"><?php echo $rec['runningDays'];?></th>
<th scope="col"><?php echo $rec['startStationID'];?></th>
<th scope="col"><?php echo $rec['endStationID'];?> </th>
</tr>
<?php } while ($rec=mysqli_fetch_array($a))?>
</table>
</div>


<form name="train" method="post" action="modifyt.php" id="train">
<p> Enter train number to update: <input type="text" id="trainID" name="trainID" value= ""> 
<label>
<input type="submit" name="Submit" id="Submit" value="Get route">
</label>
</p>
			
			</div>
</body>
</html>