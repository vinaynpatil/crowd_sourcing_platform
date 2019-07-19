<?php

	session_start();
    $con=mysql_connect("localhost","root","");
	mysql_select_db("linked_open_data",$con);
	$q = $_REQUEST["q"];
	$r = $_REQUEST["r"];
	$s = $_REQUEST["s"];
	$user=$_SESSION["user_id"];
	mysql_query("UPDATE node_data set vote='$r' where id='$q'");
	
    $sql="INSERT into vote_info(user_id,comment_id,down_up) values('$user','$q','$s')";
	mysql_query($sql);
?>

