<?php
session_start();
$con=mysql_connect("localhost","root","");

if (!$con)
  {
	  echo "error!";
    die('Could not connect: ' . mysql_error());
  }
  
mysql_select_db("linked_open_data",$con);
echo "till here";
 
// $category=$_POST['category'];
 $title=$_POST['topic'];
 $_SESSION['title']=$title;
 $data=$_POST['data'];
 $parentid=$_POST['parentid'];
 $property="";
 echo $parentid."   ";
 echo $data."   ";
 echo $title."   ";
 $query="insert into node_info(title,category) values('$title','Technology')";
 if(mysql_query($query))
	 echo "query1 executed"."   ";
 $owner=$_SESSION["id"];
 echo $owner."   ";

 $query3="select id from node_info where title='$title'";
 $child=mysql_query($query3);
 echo $child."   ";
 while($arra = mysql_fetch_array($child))
	 $childid=$arra['id'];
 //echo $childid[0];
 $node_id=$childid;
 echo $node_id;
  $query2="insert into node_data(node_id,owner,property,data) values('$node_id','$owner','$property','$data')";
 if(mysql_query($query2))
	 echo "data inserted.   ";
 $query4="insert into link values('$parentid','$node_id')";
 
 if(mysql_query($query4))
	 echo "updated link     ";
 
 
mysql_close($con);
//echo '<pre>';
//var_dump($_SESSION);
//echo '</pre>';

header("location:RFC.php");
exit();
 
?>