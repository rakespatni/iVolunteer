<html>

<body text="white" bgcolor="green">
<form action="update_event.php" method="get">
<?php
$user=$_GET['user'];
$pass=$_GET['pass'];
$event_id=$_GET['event_id'];
?>



Place:<input type="text" name="place"><br>

Date:<input type="date" name="date"><br>

time:<input type="time" name="time" ><br>

duration:<input type="text" name="duration"><br>

Deadline:<input type="date" name="dead"><br>


event desc:<input type="text" name="event_des"><br>

Type of vol:<input type="text" name="type_vol"><br>


Number of people needed:<input type="text" name="people">
<input type="submit" name="submit"><br>
</form>




</body>
</html>

<?php
session_start();
$count=0;
$l=0;
$k=0;
//$user=$_GET['user'];
//$pass=$_GET['pass'];
//$event_id=$_GET['event_id'];
require_once('dbconnect.php');

$place=$_GET['place'];
$date=$_GET['date'];

$time=$_GET['time'];

$event_des=$_GET['event_des'];

$deadline=$_GET['dead'];

$type_vol=$_GET['type_vol'];

$duration=$_GET['duration'];

$men=$_GET['people'];

$update=mysql_query("update event set place='$place'");
 echo "event updated";
mysql_close($con);
?>
