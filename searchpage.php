<?php
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
$search_id="";
if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}
  $title=$_SESSION['title'];
  

$sql = "SELECT id, timestamp FROM node_info where title='$title'";

mysql_select_db("linked_open_data");
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}
while($row = mysql_fetch_assoc($retval))
{
    $search_id=$row['id'];
     $search_time=$row['timestamp'];
}

$null=null;

$sql = "SELECT id,owner,vote,property,data,TimeOfComment FROM node_data where node_id='$search_id' AND parent_comment_id=-1 ORDER BY vote DESC";

$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}
$i=0;
$user="";
if(!empty($_SESSION['user_id'])){
$user=$_SESSION["user_id"];}
while($row = mysql_fetch_array($retval))
{
 $search_id1[$i]=$row['id'];
 $sql_in =mysql_query("SELECT count(*) FROM node_data where parent_comment_id='$search_id1[$i]'");
 while ($row_in= mysql_fetch_array($sql_in)) 
 {
   
    $replies_count[$i]=$row_in['count(*)'];
   
  }
    $search_owner[$i]=$row['owner'];
     $search_down_up[$i]=$row['vote'];
     $search_data[$i]=$row['data']."@";
     $search_property[$i]=$row['property'];
	 $search_TimeOfComment[$i]=$row['TimeOfComment'];
   if(!empty($_SESSION['user_id'])){
   $var = mysql_query("SELECT count(*) FROM vote_info where user_id='$user' and comment_id='$search_id1[$i]'");
   while ($row1= mysql_fetch_array($var)) {
   
    $result=$row1['count(*)'];
   
  }
  
  if($result==0)
  {
    $flag[$i]=1;
	$vote_result[$i]='0';
  }	
  else
  {
    $flag[$i]=0;
	$var_new = mysql_query("SELECT down_up FROM vote_info where user_id='$user' and comment_id='$search_id1[$i]'");
   while ($row_new= mysql_fetch_array($var_new)) {
   
    $vote_result[$i]=$row_new['down_up'];
   
  }
  
	
  }	
	
	}
     
  else{
    $flag[$i]=0;
	$vote_result[$i]=0;
  }
  
  
  $i++;
}
mysql_close($conn);
?>
