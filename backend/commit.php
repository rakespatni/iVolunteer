<html>
<body text="white" bgcolor="green">
<?php
$i=0;
$k=0;
$user=$_GET['vusr'];
$pass=$_GET['vpass'];
$json=$_GET['json'];

$comit_event=$_GET['eid'];
$list="l".$comit_event;      //name of the dynamic list as "L"+event_id (eg L+e1=Le1)

require_once('dbconnect.php');

$temp = mysql_fetch_array(mysql_query("SELECT vol_strength_needed FROM event where event_id='$comit_event'"));
$limit=$temp['vol_strength_needed'];   

$result = mysql_query("SELECT * FROM vol where username='$user'");

if($row=mysql_fetch_array($result))
{ 
  
		$vol_name=$row['name'];
	  $vol_phone=$row['phno'];
   	$com_events=$row['evnts'];

  	if($com_events=='')
   		$new_comm_event=$comit_event;
  	else
   		$new_comm_event=$com_events.",".$comit_event;
  	
		/* Update commited events of the volunteer */
  	mysql_query("update vol set evnts='$new_comm_event' where username='$user'");
  	
  	/* Updating the the event list */
  	mysql_query("insert into $list (name,phone) values('$vol_name','$vol_phone')"); 
  	
		$list_size=mysql_query("select * from $list");
  	$size_of_table=mysql_num_rows($list_size);
  	
		/*Check if the new entry is within or beyond the required limit */
		if($json!=1)
		{
			if($size_of_table<=$limit)
		 		echo "\nMAIN LIST : ".$size_of_table;
			else
		 		echo "WAITING LIST :  ".($size_of_table-$limit);
			echo  '<a href="vol_login_jump.php?vusr='.$user.'&&vpass='.$pass.'" >go to events page</a>';
		}
		else
		{
			if($size_of_table<=$limit)
		 		echo '{"pos":{"'.$size_of_table.'"}';
			else
		 		echo '{"pos":{"W/L'.($size_of_table-$limit).'"}';
			echo  '<a href="vol_login_jump.php?vusr='.$user.'&&vpass='.$pass.'" >go to events page</a>';
		}
}
else
  echo "conn error";
mysql_close($con);
?>

</body>
</html>
