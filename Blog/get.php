<?php

require 'core.php';
require 'connect.php';

if(isset($_GET['id']))
{$id=addslashes($_GET['id']);
$sql="SELECT * FROM blogcontent WHERE id=$id";
   $res=mysql_query($sql) or die(mysql_error());
   $image=mysql_fetch_assoc($res);
   $image=$image['image'];
header("Content-type: image/jpeg");


echo $image;
}
else
{ return false;
}

