<?php
$count=0;
$i=0;
$k=0;
$tarik=date("Y-m-d");

$user=$_GET['vusr'];
$pass=$_GET['vpass'];
$eid=$_GET['eid'];
$json=$_GET['json'];

$list="l".$eid;

require_once('dbconnect.php');

$temp=mysql_fetch_array(mysql_query("SELECT deadline FROM event where event_id='$eid'"));
$deadline=$temp['deadline'];

$result = mysql_query("SELECT * FROM vol where username='$user' and password='$pass'");
if($row=mysql_fetch_array($result))
{ 
  $vol_name=$row['name'];
  $vol_phone=$row['phno'];
  $com_events=$row['evnts'];
	$len=strlen($com_events);
  $updated_com_events='';
  $temp_event='';
  if($tarik<$deadline)
  {
		for($f=0;$f<$len;$f++)
		{
			/*IF the complete event id has been encountered add it updated_com_events of it is not eid*/
				/* eid is the event to be removed */			
			if($com_events[$f]==',')
			{
				/*Add all events to updated_com_events except events with event id eid*/
				if($temp_event != $eid)
				{
						/* IF it is the first event in the list of commited events, initialize updated_com_events with temp_event*/
						if($updated_com_events == '')
						{
							$updated_com_events=$updated_com_events.$temp_event;
							$temp_event='';
						}
						/* IF it is not the first event, append temp_event to updated_com_events with a prefix ','*/ 
						else
						{
							$updated_com_events=$updated_com_events.",".$temp_event;
							$temp_event='';
						}
				}
				else	/*Empty the temp_event*/
						$temp_event='';
			}
			else		/*Build the temp_event string till the complete eid is recorded*/
				$temp_event=$temp_event.$com_events[$f];
			

			if(($f+1)==$len)
			{
				if($temp_event != $eid)
				{
						$updated_com_events=$updated_com_events.",".$temp_event;
					$temp_event='';
				}
			}
		}	
		
		if($json!=1)
				echo "Cancelled event number: ".$eid;
		else
				echo '{"status":"wd"}';
		
	}
 	else
  {
		if(json!=1)
			echo "<br>Deadline has passed. Cancel Failed<br>";
		else
			echo '{"status":"dp"}';
	}
 
	/*updating volunteer's committed events after cancelling*/
 	mysql_query("update vol set evnts='$updated_com_events' where username='$user' and password='$pass' ");

	/*removing volunteer's entry from list*/
	mysql_query("delete from $list where name='$vol_name' and phone='$vol_phone' ");

 	echo "<br>".'<a href="vol_login_jump.php?vusr='.$user.'&&vpass='.$pass.' " >Go to profile page</a>'; 
}  

else
	echo "Error";
mysql_close($con);
?>
