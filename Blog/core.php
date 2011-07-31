<?php
ob_start();
session_start();
$currentfile=$_SERVER['SCRIPT_NAME'];
if(isset($_SERVER['HTTP_REFERER']))
{
$http_referer=$_SERVER['HTTP_REFERER'];}
function loggedin()
{if(isset($_SESSION['userid'])&&!empty($_SESSION['userid']))
{return true;
}
else
{return false;}
}
function getfield($field)
{ $query="SELECT `$field` FROM `blog` WHERE `id`='".$_SESSION['userid']."'";
if($queryrun=mysql_query($query))
{ if($query_result=mysql_result($queryrun,0,$field))
{ return $query_result;
}
}
}

?>
