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

$place=$_GET['place'];

$date=$_GET['date'];

$time=$_GET['time'];

$event_des=$_GET['event_des'];

$deadline=$_GET['dead'];

$type_vol=$_GET['type_vol'];

$duration=$_GET['duration'];

$men=$_GET['people'];
$l="L".$event_id;

require_once('dbconnect.php');
$z=mysql_query("select * from seeker where user='$user' and pass='$pass'");
while($seek=mysql_fetch_array($z))
 {$ph_no=$seek['phone']; 
  $org_name=$seek['Org_name'];
$r=mysql_query("INSERT INTO event(event_id,place,date,time,duration,deadline,ph_no,evnt_des,type_vol,vol_strength_needed,posted_by) VALUES ('$event_id','$place','$date','$time','$duration','$deadline','$ph_no','$event_des','$type_vol','$men','$user')");
echo "event added succesfully";  

$s=mysql_query("insert into list(list_id,org_name,list_ref) values('$event_id','$org_name','$l')");
echo "listt entry done";

$makelist=mysql_query("create table $l(name varchar(20),phone INT)");
echo "list created successfully";
 }
echo '<a href="seeker_options.php?user='.$user.'&&pass='.$pass.'">click to go to options</a>';
mysql_close($con);
?>

</body>
</html>
