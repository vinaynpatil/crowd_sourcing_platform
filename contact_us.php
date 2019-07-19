<?php
session_start();
$con=mysql_connect("localhost","root","");
mysql_select_db("linked_open_data",$con);

$contact_name=$_GET['contact_name'];
$contact_email=$_GET['contact_email'];
$contact_phone=$_GET['contact_phone'];
$contact_message=$_GET['contact_message'];

mysql_query("insert into contact_us(name,email,phone,message) values('$contact_name','$contact_email','$contact_phone','$contact_message')");

	
?>
