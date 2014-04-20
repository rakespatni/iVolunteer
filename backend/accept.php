<html>

<body text="white" bgcolor="green">
<?php
session_start();
$i=0;
$k=0;
$us=$_SESSION['vol_usr'];
$psw=$_SESSION['vol_pass'];
/*for($f=0;$f<=3;$f++)
{

$nam[$i]=$_SESSION['x'][$f];
echo $nam[$i];
$i++;
}*/
$z=$_GET['search'];
$accept_event=$_SESSION['x'][$z];
echo "received=".$z;
$name=$_SESSION['x'][$z];

$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("iv", $con);

$result = mysql_query("SELECT * FROM event where event_id = '$name'");
 
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
  echo  "<td>" .('<a href="commit.php?comit='.$accept_event.'" >accept</a>')." </td>";
  
  echo  "<td>" .('<a href="vol_login_jump.php?vol_usr='.$us.'&& vol_pass='.$psw.' " >skip</a>')." </td>";
  echo "</tr>";
 }
echo "</table>";

mysql_close($con);
 


?>

</body>
</html>