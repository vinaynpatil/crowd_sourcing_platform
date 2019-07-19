<?php
$parent=$_REQUEST['parent_id'];
$topic=$_REQUEST['topic'];
$con=mysql_connect("localhost","root","");
mysql_select_db("linked_open_data",$con);
$sql=mysql_query("select nodeTwo,title from link as l,node_info as n where l.nodeOne='$parent' and n.id=l.nodeTwo");
$count=0;
while($row=mysql_fetch_array($sql))
{
	if(strtolower($topic)==strtolower($row['title']))
	{
		$count++;
	}

}

if($count!=0)
{
	echo "1";
}

else if(strtolower($topic)=="technology")
{
	echo "2";
}

else
{
		$message="";
		$node="";
		$result="";
		$sql1=mysql_query("select id,title from node_info");
		$count_in=0;
		$count_out=0;
		while($row1=mysql_fetch_array($sql1))
		{
			if(strtolower($topic)==strtolower($row1['title']))
			{
				$count_out++;
				$node=$row1['id'];
				while(true)
				{
				$count_in++;
				$sql2=mysql_query("select count(*),nodeOne from link where nodeTwo='$node'");
				while($row2=mysql_fetch_array($sql2))
				{	
					$result=$row2['nodeOne'];
					$result1=$row2['count(*)'];
				}
				if($result1!=0)
				{
				$sql3=mysql_query("select title from node_info where id='$result'");
				while($row3=mysql_fetch_array($sql3))
				{
					if($count_in==1)
						$message=$row3['title'];
					else
						$message=$row3['title']."->".$message;
				}
				
				$node=$result;
				}	
				else
					break;
					
				}
				if($count_out>1)
				echo " and ";
				echo "$message";
				$message="";
				$count_in=0;
				
				
				
			}

		}
		
		if($count_out==0)
			echo "2";
		
}
		





?>

