<html>

<body text="white" bgcolor="green">
<?php
session_start();
$i=0;
$k=0;
$us=$_SESSION['vol_usr'];
$psw=$_SESSION['vol_pass'];

$comit_event=$_GET['comit'];
$list="L".$comit_event;      //name of the dynamic list as "L"+event_id (eg L+e1=Le1)
$strength=$_GET['people'];   
$number=$_SESSION['v'][$strength];  //getting the number of volunteers needed for the indexed event
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
  $list_size=mysql_query("select * from $list");
  $size_of_table=mysql_num_rows($list_size);
  //echo "ur position= ".$size_of_table;
  //echo "<br><br>".$size_of_table."number=".$number;
  if($number>=$size_of_table)
   echo "u are placed in main list and ur position is".$size_of_table;
  else
   echo "u are placed in wait list and ur position is".$size_of_table;
  echo  '<a href="vol_login_jump.php?vol_usr='.$us.'&& vol_pass='.$psw.' " >go to events page</a>';
}
else
  echo "conn error";
mysql_close($con);
 


?>

</body>
</html>