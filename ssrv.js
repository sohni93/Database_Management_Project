// JavaScript Document

function validateForm()
{
var x=document.forms["myform"]["fname"].value;

if (x==null || x=="")
  {
  alert("First name must be filled out")
  return false;
  }

var y=document.forms["myform"]["lname"].value;
if (y==null || y=="")
  {
  alert("Last name must be filled out");
  return false;
  } 

var no=document.forms["myform"]["phoneno"].value;
if(no==""||no.length<10)
 {
 alert("enter correct Phone number");
 }
var z=thisform.usermail.value;
if (z=="")
  {
  alert("You must fill d E-mail");
  return false;
  }
var atpos=z.indexOf("@");
var dotpos=z.lastIndexOf(".");
if (atpos<1 || dotpos<atpos+2 || dotpos+2>=z.length)
  {
  alert("Not a valid e-mail address");
  return false;
  }
 
var p=thisform.password.value;
if(p==""|| p==null)
  {
  alert("you must fill d password");
  }  
 if(p.length<8) 
			{
        alert("Password less than 8 characters. Fill password again");
			}

/*
for(i=0;i<no.length;i++)
{
if(no[i]<  || no[i]>   )
{
alert("incorrect no. Fill again");
}
}


var rp=thisform.repassword.value;
if(rp=="")
  {
  alert("you must fill d password again");
  return false;
  }  
if(p!=rp)
 {
 alert("Passwords do not match. Type again!");
 }
 for(i=0;i<p.length;i++)
 {
  if(p[i]>97||p[i]<122)
  {
   alert("password contains uppercase letters");
  }
 }  


 */
}



