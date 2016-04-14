<?php

$con=mysqli_connect('localhost', 'root', 'root', 'mysql');
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
} 



?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Reservation</title>

<br />

<script src="ssrv.js"></script>
<link href="ssrv.css" rel="stylesheet">
</head>

<body>

<div id="frm_reserve" align=“center”><br>
<br>

<form name="myform" action="reserve2.php" method="post">
 <table width="350" border="0" cellpadding="5" cellspacing="1" class="table">
  <p class="feilds" style="margin-left:20px">
 
<tr>
    <td align="right">From Station</td>
    <td> <select name="frms" id="frms">
  <option value="1208">New York </option>
  <option value="1350">Philadelphia</option>
  <option value="4367">Boston</option>

</select></td>
  </tr> 
<tr>
    <td align="right">To Station</td>
    <td> <select name="tos" id="tos">
  <option value="1299">New Haven</option>
  <option value="4386">Baltimore</option>
  <option value="1327">Washington DC</option>
 </select></td>
  </tr> 

  
  <tr>
    <td align="right">Date</td>
    <td><input type="date" name="date" id="date"/></td>
  </tr> 
  
  <tr>
          <td>&nbsp;</td>
      <td>&nbsp;</td>
      </tr>
   <tr>
          <td>&nbsp;</td>
          <td><label>
            <input type="submit" 
                   name="Submit" 
                   id="Submit_Station" 
                   value="Submit" >
          </label></td>   
        </tr>
</p>
</table>
</form>

</font> 
</div>
</body>
</html>

