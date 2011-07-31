<?php

require 'connect.php';
include '/class/my_class.php';



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
echo 'Posts of other Cobloggers'; 

?>
<br/>
<a href="index.php" >Go back to login page</a>

	
	</h3>
  <!-- end #sidebar1 --></div>
  <div id="mainContent">
    
  <br/>
<br/>  
  <?php
 $obj = new myclass();
  if(isset($_GET['id']))
  {
  $obj->view_content($_GET['id']);}
  else { $obj->view_content();}
  ?>
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



