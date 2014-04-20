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
//$z=$_GET['search'];
$comit_event=$_GET['comit'];
$list="L".$comit_event;
//echo "received=".$z;
//$name=$_SESSION['x'][$z];

$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }

mysql_select_db("iv", $con);

$result = mysql_query("SELECT * FROM vol where username='$us' and password='$psw'");
if($row=mysql_fetch_array($result))
{ 
  
   $vol_name=$row['name'];
   $vol_phone=$row['phno'];
  $com_events=$row['evnts'];
  $len=strlen($com_events);
  if($com_events=='')
   $new_comm_event=$comit_event;
  else
   $new_comm_event=$com_events.",".$comit_event;
  echo  $new_comm_event;
  //updating committed events attribute in volunteer table by appending the newly committed event
  mysql_query("update vol set evnts='$new_comm_event' where username='$us' and password='$psw' ");
  //Updating the relevant list of volunteers
  mysql_query("insert into $list (name,phone) values('$vol_name','$vol_phone')"); 
  
  echo  '<a href="vol_login_jump.php?vol_usr='.$us.'&& vol_pass='.$psw.' " >go to events page</a>';
}
else
  echo "conn error";
mysql_close($con);
 


?>

</body>
</html>