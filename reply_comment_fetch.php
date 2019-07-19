<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
$parent_id=$_REQUEST['q'];
//$parent_id=87;
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
 
 
mysql_select_db("linked_open_data");

$validate = mysql_query("SELECT count(*) FROM node_data where parent_comment_id='$parent_id'"); 
while($row_valid = mysql_fetch_array($validate))
{
	 $reply_count=$row_valid['count(*)'];
}

if($reply_count>0)
{
$sql = "SELECT id,data,TimeOfComment FROM node_data where parent_comment_id='$parent_id'";

$retval = mysql_query( $sql, $conn );

$i=0;

if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}

$reply_comment_id1="";
$reply_comment_data1="";
$reply_comment_TimeOfComment1="";

while($row = mysql_fetch_array($retval))
{
	 $reply_comment_id[$i]=$row['id'];
	 $reply_comment_id1.=$reply_comment_id[$i].",";
	 $reply_comment_data[$i]=$row['data'];
	 $reply_comment_data1.=$reply_comment_data[$i]."@,";
     $reply_comment_TimeOfComment[$i]=$row['TimeOfComment'];
     $reply_comment_TimeOfComment1.=$reply_comment_TimeOfComment[$i].",";
  	 $i++;
}

//$final_result=implode("",$reply_comment_id)."~".implode("",$reply_comment_data)."~".implode("",$reply_comment_TimeOfComment);
$final_result=$reply_comment_id1."~".$reply_comment_data1."~".$reply_comment_TimeOfComment1;
}

else
$final_result="";

echo $final_result;


mysql_close($conn);
?>
