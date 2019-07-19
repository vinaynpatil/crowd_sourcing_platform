<!DOCTYPE html>
<html>
<head>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>
</head>
<body>

<?php
$q = intval($_GET['q']);

$dbhost = 'localhost';
$dbuser = 'root';
$dbpass = '';
$conn = mysql_connect($dbhost, $dbuser, $dbpass);

if(! $conn )
{
  die('Could not connect: ' . mysql_error());
}

mysql_select_db("linked_open_data");
//$sql="SELECT * FROM user WHERE id = '".$q."'";
//$sql = "SELECT id, timestamp FROM node_info where title='semaphore'";
//$result = mysql_query($conn,$sql);
$sql = "SELECT id, timestamp FROM node_info where title='semaphore'";

mysql_select_db("linked_open_data");
$retval = mysql_query( $sql, $conn );
if(! $retval )
{
  die('Could not get data: ' . mysql_error());
}
$search_id="";
$search_time="";
while($row = mysql_fetch_assoc($retval))
{
    $search_id=$row['id'];
     $search_time=$row['timestamp'];
}

echo "<table>
<tr>
<th>ID</th>
<th>timestamp</th>
</tr>";

    echo "<tr>";
    echo "<td>" . $search_id . "</td>";
    echo "<td>" . $search_time . "</td>";
    echo "</tr>";

echo "</table>";
mysql_close($conn);
?>
</body>
</html>