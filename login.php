<?php  
session_start();
//$con=mysql_connect("localhost","root","");
//mysql_select_db("ssrv",$con);  
$con=mysqli_connect('localhost', 'root', 'root', 'mysql');
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 


if(isset($_POST['login']))
{
$uname=$_POST['username']; 
$pass=$_POST['password'];
if($uname == "" || $pass == "")
{
?>
<script type="text/javascript">
alert("id or password cannot be empty");
</script>
<?php
}
else
$sql="select firstName, emailID, upassword from online_user where emailID = '$uname'";
$a=$con->query($sql);
$rec=mysqli_fetch_array($a);

//echo $rec['emailID'];
//echo $rec['upassword'];

if($rec['emailID'] == "")
{
$error = "";
?>
<script>
alert("ID does not exist");
</script>
<?php
}
else
{
if($rec['emailID'] == "varsha@gmail.com")
{
	if($rec['upassword'] != "$pass")
	{
	?>
	<script>
	alert("id and password don't match");
	</script>
	<?php
	}
	else
	{
		
		echo $rec['upassword'];
	$_SESSION['sid']=$uname;
	header("location:homeA.php");
	}
}
else
{
if($rec['upassword'] != "$pass")
{
?>
<script>
alert("id and password don't match");
</script>
<?php
}
else
{
	
	echo $rec['upassword'];
$_SESSION['sid']=$uname;
header("location:home.php");
}
}
}
}

?>


<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title> Railways </title>
<link href="ssrv.css" rel="stylesheet">
<script src="ssrv.js">  </script>

</head>

<body>
<div id="head">
<p class="topnav">
<a href='main.php?con=home'>Home </a> &nbsp;&nbsp;&nbsp;<a href='login.php?con=explore'>Login </a>&nbsp;&nbsp;&nbsp;<a href='home.php?con=packages'>Signup</a>&nbsp;&nbsp;&nbsp;
</p>
</div>
<br>

<div  id="main">
<div id="frm2">
    <form name="f1" method="post" id="f1">
        <table width="350" border="0" cellpadding="5" cellspacing="1" class="table" border-color="black">
        <p class="feilds" style="margin-left:20px">
            <tr>
                <td>User Name :</td><td><input type="text" name="username" value="user" />
                </td>
            </tr>
            <tr>
                <td>Password  :</td><td><input  type="password" name="password" value="password"  />
                </td>
            </tr>
            <tr>
                <td>
                    <input type="submit" name="login" id="login" value="LogIn" />
                </td>
            </tr>
            </p>
        </table>
    </form> 
</div>



</div>
</div>
</body>
</html>