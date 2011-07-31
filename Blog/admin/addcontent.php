<?php

require '../core.php';
require '../connect.php';
include '../class/my_class.php';


if(loggedin())
{ $fullname=getfield('fullname');
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
	margin: 0 13em 0 10px; 
	background-color: #993;
} 
.main #mainContent ul {
	margin:0;
padding:0;
line-height:30px;
}
.main #mainContent li {
margin:0;
padding:0;
list-style:none;
float:left;
position:relative;
background-color:#960;
color:#FFF;

} 
.main #mainContent li a{
display:block;
text-align:center;
color:#FFF;
text-decoration:none;
border:1px solid #000;
width:150px;
height:30px;

} 
.main #footer { 
	
	background:#DDDDDD;
} 
.main #footer p {
	margin: 0; 
	background-color: #993;	 
	color: #FFF;
}


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
    <h1>MYBLOG</h1>
  
  </div>
  <div id="sidebar1">
    <h3>

<?php
echo 'You are Loggedin as , '.$fullname.'  <br><a href="../logout.php">LogOut</a>'; 
?>

	
	</h3>
  <!-- end #sidebar1 --></div>
  <div id="mainContent">
    
    <ul>
  <li><a href="../index.php">POSTS</a></li>
  <li><a href="addcontent.php">ADD POSTS</a></li>
  <li><a href="editcontent.php">EDIT POSTS</a></li>
   

  </ul>
  <br/>
<br/>  
  <form method="post" action="index.php"  enctype="multipart/form-data">
  <input type="hidden" name="add" value="true" />
  <table>
  <tr><td>TITLE:<td/>
  <td><input type="text" name="title" /><td/><tr/>
  </br>
<tr><td>BODY : <td/><td><textarea rows="8" cols="40" name="body" ></textarea><td/><tr/>
<br/>
<tr><td>CATEGORY:<td/><td><input type="text" name="category"/><br/><td/><tr/>
</table>
<tr><td>IMAGE   :  <td/><td><input type="file" name="image"/><br/><td/><tr/>
</table>
<input type="submit" value="SUBMIT" /><br/>

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
	
   <div id="footer">
    <p>&copy;Siddharth .C 2011</p>
  <!-- end #footer --></div>
<!-- end #container --></div>
</body>
</html>
<?php
}
else
{
include '../loginform.php';
}

 
?>