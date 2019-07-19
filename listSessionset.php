<?php
session_start();
$title=$_GET['id'];
$_SESSION['title']=$title;
?>