<html>

<body text="white" bgcolor="green">
<?php
$count=0;
$i=0;
$l=0;
$chk=0;
$len=0;
session_start();
$tarik=date("Y-m-d");
$_SESSION['tarik']=$tarik;
echo $tarik;
$user=$_GET['vol_usr'];
$pass=$_GET['vol_pass'];
$_SESSION['vol_usr']=$user;
$user=$_SESSION['vol_usr'];

$_SESSION['vol_pass']=$pass;

echo "welcome ".$user;
$con = mysql_connect("localhost","root","");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }
else
 //echo "connection established";
mysql_select_db("iv", $con);


$result = mysql_query("SELECT * FROM vol where username='$user' and password='$pass'");
if($row=mysql_fetch_array($result))
{ 
  $occupation=$row['occ'];  //occupation of the volunteer
  $com_events=$row['evnts'];//committed events
  
  $len=strlen($com_events);
  echo "con events length=".$len;
  for($f=0;$f<$len;$f++)
    {
     if($com_events[$f]==',')
      $count++;
    }
  for($f=0;$f<=$count;$f++)
   {
   $arr[$f]='';
   }
  $i=0;
  for($j=0;$j<$len;$j++)
   { 
         
    if($com_events[$j]==',')
	   {
	    $i++; 
	    continue;
	   }
	else
	  {
        $arr[$i]=$arr[$i].$com_events[$j];
      }
  }
   
  echo "Listing all committed events"; 
  for($k=0;$k<=$i;$k++)
  {
   $event=$arr[$k];
   $len_event[$k]=strlen($event);  //finding length of committed event
   //echo $arr[$k];
   $date=mysql_query("select * from event where event_id='$event' ");
  
//finding dates of already committed events
    if($date_fetch=mysql_fetch_array($date))
    {
	$com_event_deadline[$k]=$date_fetch['deadline'];
	echo "aBOVE com_ev-dead=".$com_event_deadline[$k];
	$event_dated[$k]=$date_fetch['date'];
	echo "ABOVE event date=".$event_dated[$k];
    }
   else 
    echo "no date";
  }
  if ($len==0)  //if committed list is empty
    {$event_dated[0]='';
	$com_event_deadline[0]='';
	}
  $all_possible_events=mysql_query("select * from event where type_vol='$occupation' ");
  while($rows=mysql_fetch_array($all_possible_events))
  {
    $posted_event_id=$rows['event_id'];
	echo "hhhh".$posted_event_id;
   $posted_event_deadline=$rows['deadline'];
   $posted_event_date=$rows['date'];
  
   //echo $posted_event_date;
   $chk=0;
  
//Checking if new posted events clash with any of the already committed events
  for($b=0;$b<=$i;$b++)
     { 
	    echo "posted event date=".$posted_event_date;
   
	   echo "comm event date=".$event_dated[$b];
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
	if($chk==0)
       {
	   $ok_event_id[$l]=$rows['event_id'];  //ok_event_id's represent those events for which volunteer is eligible to commit 
       $l++;
       }	   
   }
   
   
 
 echo "<table border='1'>
 <tr><th>event id</th></tr>";

 for($m=0;$m<$l;$m++)
 {
 
  $_SESSION['x'][$m]=$ok_event_id[$m];
  
  echo  "<tr><td>" ;
  echo  '<a href="accept.php?search='.$m.' "> ' . $ok_event_id[$m]  .'</a>'." </td></tr>";
 } 

 
 echo " </table>";
// committed events links 
 echo "<table border='1'>
 <tr><th>Committed events</th></tr>";

 for($n=0;$n<=$i;$n++)
 {
 
  $_SESSION['y'][$n]=$arr[$n];
  echo "show=".$_SESSION['y'][$n];
  $_SESSION['z'][$n]=$com_event_deadline[$n];
  echo "deadline=".$_SESSION['z'][$n];
  $_SESSION['w'][$n]=$len_event[$n];
  echo  "<tr><td>" ;
  echo  '<a href="existing.php?exist='.$n.'&&size='.$i.'"> ' . $arr[$n]  .'</a>'." </td></tr>";
 } 
 
echo "</table>";
 
 }
 else
   echo "wrong username or password";
mysql_close($con);
?>
</body>
</html>