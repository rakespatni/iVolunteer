<html>

<body text="white" bgcolor="green">
<?php
session_start();
$count=0;
$i=0;
$k=0;

$event_id=$_GET['event_id'];
//echo $event_id;
$place=$_GET['place'];
//echo $place;
$date=$_GET['date'];
//echo $date;
$time=$_GET['time'];
//echo $time;
$event_des=$_GET['event_des'];
//echo $event_des;
$deadline=$_GET['dead'];
//echo $deadline;
$type_vol=$_GET['type_vol'];
//echo $type_vol;
$duration=$_GET['duration'];
//echo $duration;
$org_name=$_GET['org'];
//echo $org_name;
$ph_no=$_GET['phone'];
//echo $ph_no;
$men=$_GET['people'];
$l="L".$event_id;

require_once('dbconnect.php');

$r=mysql_query("INSERT INTO event(event_id,place,date,time,duration,deadline,ph_no,evnt_des,type_vol,vol_strength_needed) VALUES ('$event_id','$place','$date','$time','$duration','$deadline','$ph_no','$event_des','$type_vol','$men')");
echo "event added succesfully";  

$s=mysql_query("insert into list(list_id,org_name,list_ref) values('$event_id','$org_name','$l')");
echo "listt entry done";

$makelist=mysql_query("create table $l(name varchar(20),phone INT)");
echo "list created successfully";

mysql_close($con);
?>

</body>
</html>
