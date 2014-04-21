<html>

<body text="white" bgcolor="green">
<?php
session_start();
$count=0;
$l=0;
$k=0;
$user=$_GET['user'];
$pass=$_GET['pass'];
$event_id=$_GET['event_id'];
$list="L".$event_id;
echo $list;
require_once('dbconnect.php');


$k=mysql_query("delete from event where event_id='$event_id' ");
$m=mysql_query("delete from list where list_id= '$event_id' ");
$l=mysql_query("DROP TABLE $list ");
if($k==1)
 echo "event deleted";
 
echo '<a href="seeker_options.php?user='.$user.'&&pass='.$pass.'">'.'Go to options'.'</a>';

 
//$l="L".$event_id;


mysql_close($con);
?>

</body>
</html>
