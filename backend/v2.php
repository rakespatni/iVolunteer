<?php
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

     $sql=mysql_select_db("iv", $con);

$sql="INSERT INTO vol(name, age, gender, occ, phno, evnts)
VALUES
('$_POST[name]','$_POST[age]','$_POST[gender]', '$_POST[occ]', '$_POST[phno]', '$_POST[evnts]')";

if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }
echo "1 record added";

mysql_close($con)
?>