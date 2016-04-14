<?php  
/*$user = 'root';
$password = 'root';
$db = 'SSRV';
$host = 'localhost';
$port = 8889;

$link = mysql_connect(
   "$host:$port", 
   $user, 
   $password
);
$db_selected = mysql_select_db(
   $db, 
   $link
);*/

$con=mysqli_connect('localhost', 'root', 'root', 'mysql');
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 

//$con=mysql_connect("localhost","root","");
//mysql_select_db(“mysql”,$con);  
//$con=mysqli_connect('localhost', 'root', '', ‘mysql’);
//if ($con->connect_error) {
 //   die("Connection failed: " . $con->connect_error);
//} 

if(isset($_POST['Submit']))
{
$fname=$_POST['fname']; 
$lname=$_POST['lname']; 
$gender=$_POST['gender'];
$phoneno=$_POST['phoneno'];
$usermail=$_POST['usermail'];
$pass=$_POST['password'];
$dob=$_POST['dob'];
$securityQ=$_POST['securityQ'];
$securityA=$_POST['securityA'];


$sql="INSERT INTO online_user(emailID, upassword,firstName,lastName,gender,DOB,mobileNumber,securityQ,securityA)VALUES('$usermail','$pass','$fname','$lname','$gender','$dob','$phoneno','$securityQ','$securityA')";

if ($con->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}

}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>

<br />

<script src="ssrv.js"></script>
<link href="ssrv.css" rel="stylesheet">
</head>

<body>

<div id=“company_name” align=“left”>
<h1 style="text-align:center; color:white;" > SSRV RAILWAYS </h1>
</div>

<div id="frm1" align=“center”><br>
<br>
<h2 style="text-align:center; color:white;">Sign Up</h2>
<form name="myform"  onsubmit="return validateForm(this)" method="post">
 <table width="350" border="0" cellpadding="5" cellspacing="1" class="table">
  <p class="feilds" style="margin-left:20px">
  <tr>
  <td width="131" align="right">Firstname:</td>
    <td width="196"><input type="text" name="fname" id="fname"/></td>
   </tr>
   <tr>
    <td align="right">Lastname:</td>
    <td><input type="text" name="lname" id="lname"/></td> 
    </tr>
	<tr>
    <td align="right">Gender:</td> 
    <td><input type="radio" name="gender" id="radio" value="m"/>
    Male
    <input type="radio" name="gender" id="radio2" value="f"/> 
    Female  </td>
    </tr>
	<tr>
    <td align="right">Date of Birth</td>
    <td><input type="date" name="dob" id="dob"/></td>
	</tr> 
	<tr>
    <td align="right">Phone number:</td>
    <td><input type="text" name="phoneno" id="phoneno"/></td>
    </tr>
	<tr>
    <td align="right">E-mail:</td>
    <td><input type="email" name="usermail" id="usermail" /></td>
    </tr>
	<tr>
    <td align="right">Password</td>
    <td><input type="password" name="password" id="password"/></td>
    </tr>
	<tr>
    <td align="right">Security Question</td>
    <td> <select name="securityQ" id="securityQ">
  <option value=“Q1”>What is your mother’s maiden name?</option>
  <option value=“Q2”>What is your birth place?</option>
  <option value=“Q3”>What is the name of your first school?</option>
  <option value=“Q4”>What is your first pet’s name?</option>
</select></td>
	</tr> 
    <tr>
    <td align="right">Security Answer</td>
    <td><input type="text" name="securityA" id="securityA"/></td>
	</tr> 
	<tr>
    
	<tr>
          <td>&nbsp;</td>
		  <td>&nbsp;</td>
		  </tr>
   <tr>
          <td>&nbsp;</td>
          <td><label>
            <input type="submit" name="Submit" id="Submit" value="Create Account">
          </label></td>
        </tr>
</p>
</table>
</form>
<input name="agree" type="checkbox" value="yes"><font color="white" size="2" face="Arial, Helvetica, sans-serif">  Do you agree with the <a href="../../Users/Lenovo/Downloads/______">Terms and conditions</a>?
</font> 
</div>
</body>
</html>
