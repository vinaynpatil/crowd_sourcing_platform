<?php
  
 session_start();
?>


<!DOCTYPE html>
<html>
<head>

<?php

$result=null;
$con=mysql_connect("localhost","root","");
mysql_select_db("linked_open_data",$con);


if(isset($_POST['submit']))
{

$user_id=$_POST['user'];
$password=$_POST['pass1'];

$var=mysql_query("select count(*) from signup where user_id='$user_id' and password='$password'");
while ($row = mysql_fetch_array($var)) {
   
   $result=$row['count(*)'];
   
}


$result2=mysql_query("select name,id from signup where user_id='$user_id'");
while ($row1 = mysql_fetch_array($result2))
	  {
   
      $result3=$row1['name'];
	  $result5=$row1['id'];
      }

if($result==1)
{
	$_SESSION["user_id"]=$user_id;
	$_SESSION["owner"] = $result3;
	$_SESSION["id"]=$result5;
}
}
?>
</head>
<body>
<script type="text/javascript">
var vi='<?php echo $result; ?>';
if(vi==1)
{
alert("Successful Login");
document.location.href="Home.php";
}
else
{
alert("Invalid Credentials!! Try Again.");
document.location.href="Sign In.php";
}
</script>
</body>
</html>