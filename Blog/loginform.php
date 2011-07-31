<?php

if ((isset($_POST['username']))&&(isset($_POST['password'])))
  { if(!empty($_POST['password'])&& !empty($_POST['username']))
    { $password= $_POST['password'];
	   $username=$_POST['username'];
	   $passwordhash=md5($password);
       $query="SELECT `id` FROM `blog` WHERE `username`='".mysql_real_escape_string($username)."' AND `password`='".mysql_real_escape_string($passwordhash)."'";
	   if($queryrun=mysql_query($query))
	   {
	     $numrows=mysql_num_rows($queryrun); 
	      if($numrows==0)
		   {echo 'INVALID USERNAME AND PASSWORD COMBINATION';}
          else if($numrows==1)
	       {$userid=mysql_result($queryrun,0,'id');
		   $_SESSION['userid']=$userid;
		   header('Location: index.php');
		   }
	   }
	}
	
	  
  }



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
    <h1>MYBLOG</h1>
  <!-- end #header --></div>
  <div id="sidebar1">
    <h3><form action="<?php echo $currentfile; ?>" method="POST">
Username:<input type="text" name="username" />
Password:<input type="password" name="password" />
<br/>
<input type="submit" value="Log in" />
</h3>
<h4><a href="/Blog/register.php"> Register now??</a></h4>

  <!-- end #sidebar1 --></div>
  <div id="mainContent">
    <h1>ABOUT THIS SITE</h1>
    <p>A blog (a blend of the term web log) is a type of website or part of a website. Blogs are usually maintained by an individual with regular entries of commentary, descriptions of events, or other material such as graphics or video. Entries are commonly displayed in reverse-chronological order. Blog can also be used as a verb, meaning to maintain or add content to a blog.
Most blogs are interactive, allowing visitors to leave comments and even message each other via widgets on the blogs and it is this interactivity that distinguishes them from other static websites.
Many blogs provide commentary or news on a particular subject; others function as more personal online diaries. A typical blog combines text, images, and links to other blogs, Web pages, and other media related to its topic. The ability of readers to leave comments in an interactive format is an important part of many blogs. </p>
    <br/>
    <br/>
  <h3><a href="/Blog/view.php">Click here</a> to view the blog posts of Co-bloggers<h3/>
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
