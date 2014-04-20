<html>

<body text="white" bgcolor="green">
<?php
$f=0;
$i=0;
session_start();

require_once('dbconnect.php');

$result = mysql_query("SELECT * FROM event");

echo "<table border='1'>
<tr>
<th>event_id</th>

</tr>";


while($row = mysql_fetch_array($result))
  {
  
  
  $_SESSION['na']=$row['event_id'];
  
  
  $_SESSION['x'][$f]=$_SESSION['na'];
	
  echo $_SESSION['x'][$f];
  $_SESSION['b']=$f;
  echo "<tr>";
  echo "<td>" . $row['event_id'] . "</td>";
  /*echo "<td>" . $row['place'] . "</td>";
  echo "<td>" . $row['date'] . "</td>";
  echo "<td>" . $row['time'] . "</td>";
  echo "<td>" . $row['duration'] . "</td>";*/
  echo  "<td>" .('<a href="d.php?search='.$f.' ">show</a>')." </td>";
  
  echo "</tr>";
  $f++;
  $i++;
  }
echo "</table>";
mysql_close($con);
?>

</body>
</html>
