$con=mysql_connect("localhost","root","");
mysql_select_db("ssrv", $con);  


if(isset($_POST['Submit']))
{
	if(!$_POST['fname'] || !$_POST['lname'] || !$_POST['gender'] || !$_POST['phoneno'] || !$_POST['usermail'])
	{
	?>
	<script type="text/javascript">
	alert("Fill All Deatils");
	</script>
<?php
	}
	else
	{?>
	<script type="text/javascript">alert("row inserted");</script>
	<?php
	
$fname=$_POST['fname']; 
$lname=$_POST['lname']; 
$gender=$_POST['gender'];
$phoneno=$_POST['phoneno'];
$usermail=$_POST['usermail'];
$pass=$_POST['password'];
$dob=$_POST['dob'];
$securityQ=$_POST['securityQ'];
$securityA=$_POST['securityA'];

$querry=mysql_query("insert into online_user
			       (emailID, upassword,firstName,lastName,gender,DOB,mobileNumber,securityQ,securityA)
			        values('$usermail','$pass','$fname','$lname','$gender','$dob','$phoneno','$securityQ','$securityA' )");
					

}


 
?>