<?php
session_start();
$con=mysql_connect("localhost","root","");
mysql_select_db("linked_open_data",$con);

$user=$_GET['modal_user'];
$pass=$_GET['modal_pass'];

$var=mysql_query("select count(*) from signup where user_id='$user' and password='$pass'");
while ($row = mysql_fetch_array($var)) {
   
   $result=$row['count(*)'];
   
}


$result2=mysql_query("select name,id from signup where user_id='$user'");
while ($row1 = mysql_fetch_array($result2))
	  {
   
      $result3=$row1['name'];
	  $result5=$row1['id'];
      }

if($result==1)
{
	$_SESSION["user_id"]=$user;
	$_SESSION["owner"] = $result3;
	$_SESSION["id"]=$result5;

	
}
else
{
$status_sign_in= "Invalid Credentials!!";
}

echo $status_sign_in;
	
?>
