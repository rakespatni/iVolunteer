<?php

$i=0;
$k=0;
$user=$_GET['vusr'];
$pass=$_GET['vpass'];
$json=$_GET['json'];
$eid=$_GET['eid'];

require_once('dbconnect.php');

$result = mysql_query("SELECT * FROM event where event_id = '$eid'");
if($json!=1)
{ 
	echo "<table border='1'>
	<tr>
	<th>place</th>
	<th>date</th>
	<th>time</th>
	<th>duration</th>
	<th>deadline</th>
	<th>ph_no</th>
	<th>evnt_des</th>
	<th>type_vol</th>
	<th>limit</th>
	</tr>";

	while($row = mysql_fetch_array($result))
		{
		echo "<tr>";
		echo "<td>" . $row['place'] . "</td>";
		echo "<td>" . $row['date'] . "</td>";
		echo "<td>" . $row['time'] . "</td>";
		echo "<td>" . $row['duration'] . "</td>";
		echo "<td>" . $row['deadline'] . "</td>";
		echo "<td>" . $row['ph_no'] . "</td>";
		echo "<td>" . $row['evnt_des'] . "</td>";
		echo "<td>" . $row['type_vol'] . "</td>";
		echo "<td>" . $row['vol_strength_needed'] . "</td>";
		echo  "<td>" .('<a href="commit.php?eid='.$eid.'&&vusr='.$user.'&&vpass='.$pass.'">accept</a>')." </td>";
		echo  "<td>" .('<a href="vol_login_jump.php?vusr='.$user.'&&vpass='.$pass.'">skip</a>')."</td>";
		echo "</tr>";
	 }
	echo "</table>";
}
else
{
	$count=1;
	echo '{"Events":[';
	while($row = mysql_fetch_array($result))
		{
			
			echo '"place":"' . $row['place'] .'",';
			echo '"date":"' . $row['date'] . '",';
			echo '"time":"' . $row['time'] . '",';
			echo '"duration":"' . $row['duration'] . '",';
			echo '"deadline":"' . $row['deadline'] . '",';
			echo '"ph_no":"' . $row['ph_no'] . '",';
			echo '"event_des":"' . $row['evnt_des'] . '",';
			echo '"type_vol":"' . $row['type_vol'] . '"';
			echo '"limit":"' . $row['vol_strength_needed'] . '"';			
			echo '}';
			$count++;
	 }
	echo '],';
	echo '"Ecount":'.($count-1).'}';


}
mysql_close($con);
?>
