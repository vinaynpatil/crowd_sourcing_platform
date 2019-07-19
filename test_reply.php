<?php
session_start();
$con=mysql_connect("localhost","root","");

if (!$con)
  {
	  echo "error!";
    die('Could not connect: ' . mysql_error());
  }
  
mysql_select_db("linked_open_data",$con);
$property="";

$parent=$_REQUEST['q'];
$title=$_REQUEST['r'];
 $data=$_REQUEST['s'];
 $sql = "SELECT id FROM node_info where title='$title'";
echo $parent;
echo $title;
echo $data;
mysql_select_db("linked_open_data");
$retval = mysql_query( $sql, $con );
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}
while($row = mysql_fetch_assoc($retval))
{
    $nodeid=$row['id'];     
}
//echo $property;
 //$nodeid=12346;//$_SESSION["nodeid"]
 $owner1=$_SESSION["id"];//$_SESSION["owner"];
 $query2="insert into node_data(node_id,owner,data,parent_comment_id) values('$nodeid','$owner1','$data',$parent)";
 
 if(mysql_query($query2))
 	 echo "data inserted";
 else
 echo mysql_error();
mysql_close($con);
header("location:RFC.php");
exit();
?>
