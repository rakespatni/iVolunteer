<?php
$count=0;
$i=0;
$l=0;
$chk=0;
$len=0;
session_start();
$tarik=date("Y-m-d");

$user=$_GET['vusr'];
$pass=$_GET['vpass'];

$json=$_GET['json'];		/*JSON request variable - equals 1 if the incoming query requests for a JSON string*/

require_once('dbconnect.php');

$result = mysql_query("SELECT * FROM vol where username='$user'");


if($row=mysql_fetch_array($result))
{ 
  $occupation=$row['occ'];  //occupation of the volunteer
  $com_events=$row['evnts']; //committed events
  
  $len=strlen($com_events); //length of the committed events (viz:e1,e2,e3 - length=8)
	
	$i=0;											//stores the number of committed events
	$tempstring='';

	/*$arr - stores all the commited event ids*/

	for($f=0;$f<$len;$f++)
	{
		if($com_events[$f]==',')
		{
			$arr[$i]=$tempstring;
			$i++;

			$tempstring='';
		}
		else
			$tempstring=$tempstring.$com_events[$f];

		if(($f+1)==$len)
		{
			$arr[$i]=$tempstring;
			$i++;			
			$tempstring='';
		}
	}
   
	/* Collecting the deadlines in $com_event_deadline and dates in $event_dated[] */
  for($k=0;$k<$i;$k++)
  {
   $event=$arr[$k];
   $len_event[$k]=strlen($event);  //finding length of committed event to be passed to other pages
   $date=mysql_query("select * from event where event_id='$event'");
    if($date_fetch=mysql_fetch_array($date))
    {
			$com_event_deadline[$k]=$date_fetch['deadline'];
			$event_dated[$k]=$date_fetch['date'];
    }
  }
  if ($len==0)                      //if committed event list is empty
  {
		$event_dated[0]='';
		$com_event_deadline[0]='';
	}

	/*get all posts that match with volunteer's preference (=occupation) here*/
  $all_possible_events=mysql_query("select * from event where type_vol='$occupation' or type_vol='others' ");  
	
	/*Check for clash and store them in $ok_event_id[]*/  
	while($rows=mysql_fetch_array($all_possible_events))
  {
    $posted_event_id=$rows['event_id'];   
    $posted_event_deadline=$rows['deadline'];
    $posted_event_date=$rows['date'];
   
    $chk=0;
  
		/* Checking if new posted events clash with any of the already committed events */
  	for($b=0;$b<$i;$b++)
     { 
	    	/*checks if any of committed events have same date as this posted event OR if the deadline for that event has passed*/
				if(($posted_event_date==$event_dated[$b])||($tarik>$posted_event_deadline)) 
	    	{
					$chk=1;
	    		break;
				}
	   		else
				{
		 			continue;
        }
    }
		/*Store the event in ok_event_id[] only if there is no clash or the event is not past deadline*/
		if($chk==0)
    {
	   	$ok_event_id[$l]=$rows['event_id'];                
	   	$strength_needed[$l]=$rows['vol_strength_needed'];  
      $l++;
    }	   
  }
   
   
	if($json!=1)
	{	
		echo "<table border='1'>
		<tr><th>event id</th></tr>";
		/*loop to display the available(uncommitted) posts as links as well as for sending the index value to next pages*/
		for($m=0;$m<$l;$m++)             
		{
			echo  "<tr><td>" ;
			echo  '<a href="accept.php?eid='.$ok_event_id[$m].'&&vusr='.$user.'&&vpass='.$pass.' "> ' . $ok_event_id[$m]  .'</a>'." </td></tr>";
		} 
		echo " </table>";
		//committed events links 
		echo "<table border='1'>
		<tr><th>Committed events</th></tr>";
		 for($n=0;$n<$i;$n++)         //displays the committed events as links  and sends the index of committed events to next pages
	 	{
			echo  "<tr><td>" ;
			echo  '<a href="existing.php?&&eid='.$arr[$n].'&&vusr='.$user.'&&vpass='.$pass.'">' . $arr[$n]  .'</a>'." </td></tr>";
	 	} 
		echo "</table>";
 	}

	/* Printing the JSON string incase of a JSON request*/
	else
 	{
	  echo "{";
		echo '"Event":[';
		for($m=0;$m<$l;$m++)          
		 {
			echo '{"Eid":'.'"'. $ok_event_id[$m].'"}';
			if(($m+1)<$l)
				echo ",";
		 }
		echo '],"Ecount":'.$m.',';
		echo '"Commited":[';
		for($n=0;$n<$i;$n++)         
		{
			echo '{"Eid":'.'"'. $arr[$n].'"}';
			if(($n+1)<$i)
				echo ",";
		}
		echo '],"Ccount":'.$n;
		echo "}";
 	}
}

else
	echo "failed";
mysql_close($con);
?>
