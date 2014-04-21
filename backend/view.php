<html>

<body text="white" bgcolor="green">
<?php
session_start();
$count=0;
$i=0;
$k=0;
$user=$_GET['user'];
$pass=$_GET['pass'];
$event_id=$_GET['event_id'];
require_once('dbconnect.php');

$post=mysql_query("select * from event where event_id='$event_id'");
while($event=mysql_fetch_array($post))
{ 
 echo "ID=".$event['event_id'];
 echo "<br>";
 echo "PLACE=".$event['place'];
 echo "<br>";
 echo "DATE=".$event['date'];
 echo "<br>";
 echo "DEADLINE=".$event['deadline'];
 echo "<br>";
 echo "DESCRIPTION=".$event['evnt_des'];
 echo "<br>";
 echo "VOLUNTEER NEEDED=".$event['vol_strength_needed'];
 echo "<br>";
 echo '<a href="delete_event.php?user='.$user.'&&pass='.$pass.'&&event_id='.$event_id.'">'.'Delete event'.'</a>';
 echo "<br>";
 echo '<a href="update_event.php?user='.$user.'&&pass='.$pass.'&&event_id='.$event_id.'">'.'Update event'.'</a>';
 
 
 }
 //echo '<a href="seeker_events.php?user='.$user.'&&pass='.$pass.'">'.'View posted events'.'</a>';

 
//$l="L".$event_id;


mysql_close($con);
?>

</body>
</html>
