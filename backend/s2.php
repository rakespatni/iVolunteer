<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

     $sq=mysql_select_db("iv", $con);

$sq="INSERT INTO event(event_id, place, date, time, duration, deadline, ph_no, evnt_des, type_vol)
VALUES
('$_POST[event_id]','$_POST[place]','$_POST[date]','$_POST[time]','$_POST[duration]','$_POST[deadline]','$_POST[ph_no]','$_POST[evnt_des]', '$_POST[type_vol]')";

if (!mysql_query($sq,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record added";

mysql_close($con)
?>