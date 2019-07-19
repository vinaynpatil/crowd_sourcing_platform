<?php
  
 session_start();
?>


<!DOCTYPE html>
<html>
<head>


 <?php



$result1=null;
  $con=mysql_connect("localhost","root","");
mysql_select_db("linked_open_data",$con);

if(isset($_POST['submit']))
{

$user=$_POST['user'];
$pass1=$_POST['pass1'];
$pass2=$_POST['pass2'];
$phone=$_POST['phone'];
$email=$_POST['email'];

mysql_query("insert into signup(name,phone,email,password) values('$user','$phone','$email','$pass1')");

$result=mysql_query("select user_id from signup where name='$user' and password='$pass1'");
while ($row = mysql_fetch_array($result))
	  {
   
      $result1=$row['user_id'];
      }


}
?>
</head>
<body>
<script type="text/javascript">
var vi='<?php echo json_encode($result1); ?>';
alert(" Registered Successfully!! With User-ID "+vi);
document.location.href="Sign In.php";


</script>
</body>
</html>