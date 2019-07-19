<?php
    require_once ('database.php');

   // echo $_REQUEST;
  session_start();
   $q=$_REQUEST['q']; 

   //echo $q;
  // $q='na';
    $sql="SELECT title FROM node_info WHERE title LIKE '%$q%'";
    $result = mysql_query($sql);

    $json=array();

    while($row = mysql_fetch_array($result)) {
      array_push($json, $row['title']);
    }

    echo json_encode($json);
?>