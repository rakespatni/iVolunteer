<html>

<body text="white" bgcolor="green">
<?php
session_start();
$count=0;
$i=0;
$k=0;
$user=$_GET['user'];
$pass=$_GET['pass'];

require_once('dbconnect.php');

$post=mysql_query("select * from event where posted_by='$user'");
while($event=mysql_fetch_array($post))
{ 
 $event_id=$event['event_id'];
 echo $event_id;
 echo '<a href="view.php?user='.$user.'&&pass='.$pass.'&&event_id='.$event_id.'">'.'click to view event details'.'</a>';
 echo "<br>";
 }
 //echo '<a href="seeker_events.php?user='.$user.'&&pass='.$pass.'">'.'View posted events'.'</a>';

 
//$l="L".$event_id;


mysql_close($con);
?>

</body>
</html>
