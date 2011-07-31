<?php

class myclass {
var $host;
var $username;
var $password;
var $db;
function connect()
{ $con=mysql_connect($this->host,$this->username,$this->password) or die(mysql_error());
$ab=mysql_select_db($this->db)or die(mysql_error());
}
function add_content($f,$p)
{
$title=mysql_real_escape_string($f['title']);
$body=mysql_real_escape_string($f['body']);
$category=mysql_real_escape_string($f['category']);
$file=$p['image']['tmp_name'];
$image=addslashes(file_get_contents($file));
 $field=getfield('fullname');
if(!$title || !$body || !$category ||!$file ||!$image)
  {
  if(!$title)
  { echo '<p>The Title Is Required</p>';}
  if(!$body)
  { echo '<p>The Body Is Required</p>';}
  if(!$category)
  { echo '<p>The Category Is Required</p>';}
    if(!$category)
  { echo '<p>The Image file Is Required</p>';}

  echo '<p><a href="addcontent.php">TRY AGAIN</a></p>';
  }
  else
  {
  $time=time();
  
  $sql="INSERT INTO blogcontent VALUES ('','$title','$body','$time','$field','$category','$image')";
  $res=mysql_query($sql) or die(mysql_error());
  echo 'Added Successfully';
  }
  }
function get_content($id=''){
   $field=getfield('fullname');
   if($id !='')
   {$id=mysql_real_escape_string($id);
   $sql="SELECT * FROM blogcontent WHERE id = '$id' AND username='".$field."' ";
   $return='<p><a href="index.php">Go Back To Content</a></p>';
   $var=0;
   }
   else
   { 
 $sql="SELECT * FROM blogcontent  WHERE username='".$field."' ORDER BY id DESC " ;
 
$var=1;
  }
$res=mysql_query($sql) or die(mysql_error());
if(mysql_num_rows($res)!=0)
{if($var==1)
{
while($row=mysql_fetch_assoc($res))
{  echo '<h1><a href="index.php?id=' . $row['id'] .'">' .$row['title'] . '</a></h1>';
$id=$row['id'];
$date=$row['date'];
echo '<img src=get.php?id='.$id.' width=250px height=250px></img>';
echo '<br/>';
echo '<h2>by ' .$row['username'] . ' on ' .$date. '</h2>';
echo '<br/>';
  echo '<p>'.$row['body'].'</p><hr>';}
   
   }
   else
   {
while($row=mysql_fetch_assoc($res))
{  echo '<h1><a href="index.php?id=' . $row['id'] .'">' .$row['title'] . '</a></h1>';
$id=$row['id'];

echo '<img src=get.php?id='.$id.' width=250px height=250px></img>';
echo '<br/>';
echo '<h2>by ' .$row['username'] . ' on ' .$row[date]. '</h2>';
echo '<br/>';
  echo '<p>'.$row['body'].'</p><hr>';}
  $sq="SELECT * FROM comment WHERE id='$id'";
  $re=mysql_query($sq) or die(mysql_error());
  while($row=mysql_fetch_assoc($re))
   { echo '<h4>' .$row['name']. '</h4> ';
    echo  '<p>'.$row['email'].' </p> ';
	echo  '<p>on '.$row['time'].'</p>';
	echo '<br/><hr>';
	echo  '<p>on '.$row['comment'].'</p>';
	}
   
   }
   }
   else
   { echo '<p>Welcome ! Create a new post to share your ideas </p>'; 
   }
   echo $return;
   }
   function edit_content()
   {
   $field=getfield('fullname');
   $sql="SELECT * FROM blogcontent WHERE username='".$field."'";
   $res=mysql_query($sql) or die(mysql_error());
   while($row=mysql_fetch_assoc($res))
   { echo '<h2>' .$row['title']. '</h2>';
    echo '<span><a href="updatecontent.php?id=' .$row['id'] .'">EDIT</a> | <span><a href="editcontent.php?delete=' .$row['id'] .'">DELETE</a>';
	}
	}
	function delete_content($id)
	{ $field=getfield('fullname'); 
	if($id =='')
	 { return false;}
   else
   {$id=mysql_real_escape_string($id);
   $sql="DELETE FROM blogcontent WHERE id = '$id'";
    $res=mysql_query($sql) or die(mysql_error());
	echo 'Content Deleted Successfully ';
	}
    }
  function update_form($id)
  { $field=getfield('fullname'); 
  $id=mysql_real_escape_string($id);
    $sql="SELECT * FROM blogcontent WHERE id = '$id' AND username='".$field."' ";
	$res=mysql_query($sql) or die(mysql_error());
	$row=mysql_fetch_assoc($res);
	$id=mysql_real_escape_string($row['id']);
	$title=mysql_real_escape_string($row['title']);
$body=mysql_real_escape_string($row['body']);
$category=mysql_real_escape_string($row['category']);
	?>
	<form method="post" action="index.php">
  <table>
 <input type="hidden" name="update" value="true" />
  <input type="hidden" name="id" value="<?php echo $id?>" />
  <tr><td> TITLE:<td/><td><input type="text" name="title" value="<?php echo $title?>"/><td/></tr>
  </br>
<tr><td>BODY : <td/><td></br><textarea rows="8" cols="40" name="body" ><?php echo $body;?></textarea><td/></tr><br/>
<tr><td>CATEGORY:<td/><td><input type="text" name="category" value="<?php echo $category?>"/><td/></tr><br/>
</table>
<input type="submit" value="UPDATE" /><br/>

<?php
   }
   function update_content($p)
   {
$title=mysql_real_escape_string($p['title']);
$body=mysql_real_escape_string($p['body']);
$category=mysql_real_escape_string($p['category']);
$id=mysql_real_escape_string($p['id']);
if(!$title || !$body || !$category)
  {
  if(!$title)
  { echo '<p>The Title Is Required</p>';}
  if(!$body)
  { echo '<p>The Body Is Required</p>';}
  if(!$category)
  { echo '<p>The Category Is Required</p>';}
  echo '<p><a href="editcontent.php">TRY AGAIN</a></p>';
  }
  else
  {$field=getfield('fullname') ;
  $sql="UPDATE blogcontent SET title='$title' , body= '$body' , category='$category' WHERE id='$id'";
  $res=$res=mysql_query($sql) or die(mysql_error());
  echo 'Updated Successfully';
  }
  }
  function view_content($id='')
  {  
 $id=$_GET['id'];
  
 if($id=='')
  {$sql="SELECT * FROM blogcontent ORDER BY id DESC";
  $res=mysql_query($sql) or die(mysql_error());
  $var=1;}
  else
  {$sql="SELECT * FROM blogcontent WHERE id = '$id '";
  $res=mysql_query($sql) or die(mysql_error());
  echo '<a href="view.php">Go back to the main page</a>';
  $var=0;}
  
  if(mysql_num_rows($res)!=0)
{
 
while($row=mysql_fetch_assoc($res))
{  if($var==0)
   {echo '<h1><a href="view.php?id=' . $row['id'] .'">' .$row['title'] . '</a></h1>';
$id=$row['id'];

echo '<img src=get.php?id='.$id.' width=250px height=250px></img>';
echo '<br/>';
echo '<h2>by <a href="user.php?username=' .$row['username'] . '">'.$row['username'] . '</a> ' .$row[date]. '</h2>';
echo '<br/>';
  echo '<p>'.$row['body'].'</p><hr>';
  echo '<h4>Comments</h4>
  <form method="post" action="addcomment.php?id=<?php echo $id ?>" >
  <table>
  <tr><td> Name:<td><input type="text" name="name" /><td/></tr>
  </br>
  <tr><td>Email:<td><input type="text" name="email"/><td/></tr>
  <br/>
<tr><td>Comment:<td></br><textarea rows="8" cols="40" name="comment" ></textarea><td/></tr><br/>

</table>
<input type="submit" value="COMMENT" /><br/>';

$sql="SELECT * FROM comment WHERE id='$id'";
  $res=mysql_query($sql) or die(mysql_error());
  while($row=mysql_fetch_assoc($res))
   { echo '<br><h4>' .$row['name']. '</h4> ';
    echo  '<p>'.$row['email'].' </p>';
	echo  '<p>on '.$row['time'].'</p>';
	echo '<br/><hr>';
	echo  '<p>on '.$row['comment'].'</p>';
	}}
  else
  {echo '<h1><a href="view.php?id=' . $row['id'] .'">' .$row['title'] . '</a></h1>';
$id=$row['id'];

echo '<img src=get.php?id='.$id.' width=250px height=250px></img>';
echo '<br/>';
echo '<h2>by <a href="user.php?username=' .$row['username'] . '">'.$row['username'] . '</a> ' .$row[date]. '</h2>';
echo '<br/>';
  echo '<p>'.$row['body'].'</p><hr>';}
  }
  }
  
  else
  { echo 'No posts yet ! Be the first one to post !! ';
   }
   
   }
   function user_content($username='')
  {  
  
 
  
  $sql="SELECT * FROM blogcontent WHERE username='".$username."'";
  $res=mysql_query($sql) or die(mysql_error());
  echo '<a href="view.php">Go back to the main page</a>';
  if(mysql_num_rows($res)!=0)
{
 
while($row=mysql_fetch_assoc($res))
{
   echo '<h1><a href="view.php?id=' . $row['id'] .'">' .$row['title'] . '</a></h1>';
$id=$row['id'];

echo '<img src=get.php?id='.$id.' width=250px height=250px></img>';
echo '<br/>';
echo '<h2>by ' .$row['username'] . ' on ' .$row[date]. '</h2>';
echo '<br/>';
  echo '<p>'.$row['body'].'</p><hr>';
  }
  
  }
  
  else
  { echo 'No posts yet by this user';
   }
   }
   }
   ?>
   