<?php
session_start();
$title=$_GET['id'];
$child_id=$_GET['child_id'];
$parent_id=$_GET['parent_id'];
$_SESSION['title']=$title;

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
mysql_select_db("linked_open_data");
if($parent_id==$child_id)
{
$var=mysql_query("update vote_info set notified='yes' where comment_id='$child_id'");
}
else
{
$var=mysql_query("update node_data set notified='yes' where id='$child_id'");
}

?>