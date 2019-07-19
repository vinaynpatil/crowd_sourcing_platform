<?php

$sendback="workeddddd";
$con=mysql_connect("localhost","root","");
mysql_select_db("linked_open_data",$con);

$idname=$_GET['id'];
$query="select n.title from link l, node_info n where l.nodeTwo=n.id and l.nodeOne='$idname'";
$query2="select nodeTwo from link where nodeOne='$idname'";
$result=mysql_query($query);
if($result)
{
while ($row1 = mysql_fetch_array($result))
	  {
   
      $result3[]=$row1['title'];
      }
	 foreach ($result3 as $value) {
    echo "$value ";
	echo ",";
}
/////////////////////////
$result1=mysql_query($query2);
if($result1)
{
while ($row2 = mysql_fetch_array($result1))
	  {
   
      $result4[]=$row2['nodeTwo'];
      }
	 foreach ($result4 as $value1) {
    echo "$value1";
	echo ",";
}


/////////////////////////

}}
else
{
	echo "invalid";
}
?>
