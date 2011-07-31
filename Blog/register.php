<?php
require 'core.php';
require 'connect.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<style type="text/css"> 

body  {
	font: 100% Verdana, Arial, Helvetica, sans-serif;
	background: #666666;
	margin: 0; 
	padding: 0;
	text-align: center; 
	color: #000000;
	background-color: #FFF;
}

.main #container {
	width: 70em;
	
	margin: 0 auto; 
	
	text-align: left; 
	background-color: #960;
} 
.main #header {
	background: #DDDDDD;
	
	 
	color: #FFF;
} 
.main #header h1 {
	margin: 0; 
	background-color: #960;
	height:2em;
}


.main #sidebar1 {
	float: right; 
	width: 12em; 
	background: #993; 
}
.main #sidebar1 h3, .twoColElsRtHdr #sidebar1 p {
	margin-left: 10px; 
	margin-right: 10px;
	background-color: #F90;
}


.main #mainContent {
	margin: 0 19em 0 30px; 
	background-color:#993;
} 
.main #footer { 
	
	background:#DDDDDD;
} 
.main #footer p {
	margin: 0; 
	background-color: #993;	 
	color: #FFF;
}




</style>
<style type="text/css"> 

.main #sidebar1 { padding-top: 30px; }
.main #mainContent { zoom: 1; padding-top: 15px; }
</style>
</head>

<body class="main">

<div id="container">
  <div id="header">
    <h1>MY BLOG</h1>
  <!-- end #header --></div>
  <div id="sidebar1">
    <p>Register Yourself With Us 
	To Blog
	<br/>
	Already registered??
	<a href="index.php" >Click here to log in</a><p/>
  <!-- end #sidebar1 --></div>
  <div id="mainContent">
    <h1>REGISTER </h1>
	<hr/> 
	
	
    
	<?php

if(!loggedin()){
if(isset($_POST['username'])&&
isset($_POST['password'])&&
isset($_POST['repassword'])&&
isset($_POST['email'])&&
isset($_POST['fullname']))
{ $username=$_POST['username'];
$password=$_POST['password'];
$repassword=$_POST['repassword'];
$email=$_POST['email'];
$fullname=$_POST['fullname'];
$passwordhash=md5($password);
if(!empty($username)&&!empty($password)&&!empty($repassword)&&!empty($email)&&!empty($fullname))
{ if($password===$repassword)
 {$query="SELECT `username` FROM `blog` WHERE `username`='$username'";
 $queryrun=mysql_query($query); 
 if(mysql_num_rows($queryrun)==1)
  {echo 'USERNAME '.$username .' already exists ' ;}
  else
  { $query="INSERT INTO `blog` VALUES ('','".mysql_real_escape_string($username)."','".mysql_real_escape_string($passwordhash)."','".mysql_real_escape_string($passwordhash)."','".mysql_real_escape_string($email)."','".mysql_real_escape_string($fullname)."' )";
  if($queryrun=mysql_query($query))
  { header('Location: registersuccess.php');}
  else
  {echo 'Registeration wasnot successful ,Please try again l8r'; }
  
  
  }
  }  
  else
  { echo 'Passwords donot match ' ;}
 }
else
{echo 'ALL FIELDS ARE REQUIRED * '; }
}

?>


<form action="register.php" method="POST" >
     <table>	 
<tr><td>USERNAME  :<td/><td><input type="text" name="username" value="<?php if(isset($username)) { echo $username; }?>"> </td></tr>
      <br /> 
<tr><td>PASSWORD   :<td/><td><input type="password" name="password" > </td></tr>
      <br /> 
<tr><td>REPASSWORD:<td/><td><input type="password" name="repassword" > </td></tr>
      <br /> 
<tr><td>EMAIL ID  :<td/><td><input type="text" name="email" value="<?php if(isset($email)){echo $email;} ?>" > </td></tr>
      <br /> 
<tr><td>FULLNAME  :<td/><td><input type="text" name="fullname" value="<?php if(isset($fullname)){echo $fullname; }?>"> </td></tr>
      <br /> 
	  <br/>
	  <table/>
	  
	 <input type="submit" value="Register">
</form>	



<?php

}
else{
echo 'You \'re already  registered logged in ';
}
?></p>
    <br/>
    <br/><br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/><br/>
    <br/>
    <br/>
    <br/>
    <br/>
    
	<!-- end #mainContent --></div>
	<!-- This clearing element should immediately follow the #mainContent div in order to force the #container div to contain all child floats --><br class="clearfloat" />
   <div id="footer">
    <p>&copy;Siddharth .C 2011</p>
  <!-- end #footer --></div>
<!-- end #container --></div>
</body>
</html>
