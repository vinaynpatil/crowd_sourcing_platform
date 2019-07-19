<?php
//session_start();
//$s_id=$_SESSION['id'];
$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);
mysql_select_db("linked_open_data");
$var=mysql_query("select name,title,down_up,nd.id from vote_info as v,node_data as nd,node_info as ni,signup as s where nd.owner='$s_id' and nd.id=v.comment_id and v.notified='no' and nd.node_id=ni.id and v.user_id=s.user_id");
$i=0;
//---------------------------------------------------------------------------------------------------------------------------------------------
$vote_notify_count=0;
$voters_name="";
$vote_type="";
$voted_category_main="";
$voted_comment_id="";

//----------------------------------------------------------------------------------------------------------------------------------------------
$replied_notify_count=0;
$replier_name="";
$replied_category_main="";
$replied_comment_id="";
$replied_notify_change_id="";

while($row=mysql_fetch_array($var))
{
$voters_name[$i]=$row['name'];
$vote_type[$i]=$row['down_up'];
$voted_category_main[$i]=$row['title'];
$voted_comment_id[$i]=$row['id'];
$i++;
}
$vote_notify_count=$i;
//----------------------------------------------------------------------------------------------------------------------------------------------

$var1=mysql_query("select name,title,nd.parent_comment_id,nd.id from node_data as nd,node_info as ni,signup as s where nd.notified='no' and nd.node_id=ni.id and nd.parent_comment_id in (select id from node_data where owner='$s_id') and nd.owner=s.id");
$j=0;
while($row1=mysql_fetch_array($var1))
{
$replier_name[$j]=$row1['name'];
$replied_category_main[$j]=$row1['title'];
$replied_comment_id[$j]=$row1['parent_comment_id'];
$replied_notify_change_id[$j]=$row1['id'];
$j++;
}
$replied_notify_count=$j;

//----------------------------------------------------------------------------------------------------------------------------------------------

?>