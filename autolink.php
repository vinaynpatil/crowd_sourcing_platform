<?php
$con=mysql_connect("localhost","root","");

if (!$con)
  {
	  echo "error!";
    die('Could not connect: ' . mysql_error());
  }
  //echo "here";
  
mysql_select_db("linked_open_data",$con);
$flag=true;
$queryword=$_GET["word"];
$query="select title from node_info ";

 $result=mysql_query($query);
 while($arra = mysql_fetch_array($result))
	{


		$check=$arra['title'];
		if(strcasecmp($queryword,$check)==0)
		{
			echo $queryword."@"."yes";
			$flag=false;
		}

	}

	if($flag!=false)
	echo $queryword."@"."no";

?>