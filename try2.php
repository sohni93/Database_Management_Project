<?php  
session_start();
//$con=mysql_connect("localhost","root","");
//mysql_select_db("ssrv",$con);  
$con=mysqli_connect('localhost', 'root', '', 'ssrv');
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 


echo"ddffhfh";

$sql="select * from train_route";

$a=$con->query($sql);

$rec=mysqli_fetch_array($a);


$sql1="select * from train_route";
$a1=$con->query($sql1);
$rec1=mysqli_fetch_array($a1);

echo "gyjgj";

$nm=$_GET["z"];
list($spnm, $stid) = split("_",$nm);
echo $spnm;
echo$stid;

/*foreach($_POST as $name => $value) { // Most people refer to $key => $value
   echo "The HTML name: $name <br>";
   echo "The content of it: $value <br>";
}*/


echo "dfghh";
$d = '_stopNumber_';
$f = $spnm.$d.$stid;
echo $f;
$stop= $_POST['[i]'.$f.'[/i]'];
echo "yooo"; 
echo $stop;
$arrival=$_POST[$spnm.'_arrivalTime_'.$stid];
$depart=$_POST[$spnm.'_departureTime_'.$stid];
echo "hi";
echo $spnm.'_stopNumber_'.$stid;
echo $stop;
$sql2="UPDATE route SET stopNumber = '$stop', arrivalTime ='$arrival', departureTime ='$depart' where trainID='77546' and stopNumber='$spnm'"; 
echo $sql2;
echo"hgfcvgbhjkjh";

?>
<html>
<head>
<script src="upd.js">  </script>
<body>

<div id="view2">
<p id="try"></p>
<form method="post">
<table id="b" cellpadding="5" cellspacing="1" class="table">
<caption> <strong>Train Arrival Time </strong> </caption>
<tr>
<th scope="col">&nbsp;</th>
<th scope="col">&nbsp;</th>
<th scope="col">Train ID</th>
<th scope="col">Train Name</th>
<th scope="col">Station ID</th>
<th scope="col">Station Name</th>
<th scope="col">Stop Number</th>
<th scope="col">Arrival Time</th>
<th scope="col">Departure Name</th>
</tr>

<?php do { $y='update'.$rec1['stationID'] ?>

<tr><th scope="col"><input type="button" property="abc"  name="login" id="login" value="Delete"  onClick="login.php"/></th>
<th scope="col"><input type="button" name="Update" id="Update" value="Update" onClick="upd('<?php echo ($rec1['stopNumber'].'_'.$rec1['stationID']);?>')"/></th>
<th scope="col"><?php echo $rec1['trainID']; ?></th>
<th scope="col"><?php echo $rec1['trainName']; ?></th>
<th scope="col"><?php echo $rec1['stationID'];?></th>
<th scope="col"><?php echo $rec1['stationName'];?> </th>
<th scope="col"><input type="text" name="<?php echo $rec1['stopNumber'] ?>_stopNumber_<?php echo $rec1['stationID'];?>" value="<?php echo $rec1['stopNumber'];?>"/></th>
<th scope="col"><input type="text" name="<?php echo $rec1['stopNumber'] ?>_arrivalTime_<?php echo $rec1['stationID'];?>" value="<?php echo $rec1['arrivalTime'];?>"/></th>
<th scope="col"><input type="text" name="<?php echo $rec1['stopNumber'] ?>_departureTime_<?php echo $rec1['stationID'];?>" value="<?php echo $rec1['departureTime'];?>"/></th>
</tr>
<?php }  while ($rec1=mysqli_fetch_array($a1)); ?>
</table>
</form>







</div>


</body></head></html>