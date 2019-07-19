<?php
    $con=mysql_connect("localhost","root","");
mysql_select_db("linked_open_data",$con);
	$parent_id=4;
  $sql="UPDATE vote_info SET down_up='$parent_id'";
  mysql_query($sql);
/*$q = $_REQUEST["q"];
echo $q;
	$sql="SELECT id FROM node_info WHERE title='$q'"
    
    $result = mysql_query($sql);
    $i=0;
while($row = mysql_fetch_array($retval))
{
 
    $parent_id=$row['id'];
    $sql="UPDATE vote_info SET down_up='$parent_id'";
    mysql_query($sql);
     $i++;
}

*/    
?>