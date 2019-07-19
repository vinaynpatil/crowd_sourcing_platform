<?php
session_start();
$con=mysql_connect("localhost","root","");
$target_dir = "uploads/"; ///changed for file upload
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]); //changed for file upload
$FileType = pathinfo($target_file,PATHINFO_EXTENSION);//changed for file upload
$imagetypes =  array('gif','png' ,'jpg', 'pdf');//changed for file upload

if (!$con)
  {
	  echo "error!";
    die('Could not connect: ' . mysql_error());
  }
  
mysql_select_db("linked_open_data",$con);
$property="";
$link="";//changed for file upload
/****************************************************************************/
if ($_FILES["fileToUpload"]["size"] > 0){
	 move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
	if(in_array($FileType,$imagetypes)) {
 		$link="<br><img height=50% width=50% src=\'$target_file\'/>";
}
	 else{      
	 	$downloadable_link=basename($_FILES["fileToUpload"]["name"]);
    $link="<br><a style=\"background-color:#9eba9d\" href=\'$target_file\'> Download Here:\'$downloadable_link\'</a>";} //change the link color for the attachments. 

  //addslashes($link);
}
       
    
/***************************************************************/
echo "link".$link."\n";//changed for file upload
$title=$_POST['title'];
 $data=$_POST['data'];
 $data=$data . $link;//changed for file upload
if($_POST['property'])
 $property=$_POST['property'];
 $sql = "SELECT id FROM node_info where title='$title'";

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
 $query2="insert into node_data(node_id,owner,property,data) values('$nodeid','$owner1','$property','$data')";
 
 if(mysql_query($query2))
 	 echo "data inserted";
 else
 echo mysql_error();
mysql_close($con);
header("location:RFC.php");
exit();
?>
