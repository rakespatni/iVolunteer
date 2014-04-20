<html>

<body text="white" bgcolor="green">
<?php
session_start();
$count=0;
$i=0;
$k=0;
$us=$_SESSION['vusr'];
$psw=$_SESSION['vpass'];


$cancel_event=$_GET['cancel'];
$list="L".$cancel_event;
$dead=$_GET['exis'];
echo $dead;
$deadline=$_SESSION['z'][$dead];
$stlen=$_SESSION['w'][$dead];   //this is the length of the received event

$i=$_GET['siz'];


require_once('dbconnect.php');

$result = mysql_query("SELECT * FROM vol where username='$us' and password='$psw'");
if($row=mysql_fetch_array($result))
{ 
  $vol_name=$row['name'];
  $vol_phone=$row['phno'];
  $com_events=$row['evnts'];
  $len=strlen($com_events);
  $updated_event='';
  echo "Listing your committed events";
  echo "<br>updated event b4 loop=".$updated_event."<br>";
  echo "cancel event=".$cancel_event;
  if($deadline>=$_SESSION['tarik'])
   {
    for($f=0;$f<=$i;$f++)
    { 
     $h=0;	
	 $c=0;
	 $len1=0;
	 $len2=0;
	 $str="e5";
	 $r=$_SESSION['y'][$f];
	 
	 echo "<br>";
	 echo "<br>";
	 echo $len1;
	 $len2=strlen($r);
	
	 if($stlen==$len2)
	 { echo "inside equal len  loop";
	  for($s=0;$s<$len2;$s++)
	    {
		  if($cancel_event[$s]==$r[$s])
             echo "inside if loop";     //just to check the flow of control		   
		   else
		   {
		    
		    $c=1;
			break;
		   }
		}
	 }
	 else
	  $c=1;
     
	 if ($c==0)
	 { 
	  
	   echo "in if";
        
     // continue;
	 }
	 else
	 {
	  
	  
	   if($updated_event=='')
	    $updated_event=$r;
	   else
	    $updated_event=$updated_event.','.$r;
	  //echo " in else";
	  //echo "in else";
	   
	 }
  echo "<br>";
 
   }
 }
 else
   echo "Deadline has passed";
  if($i==0)
   $updated_event='';
  echo "updated event list:".$updated_event; 
 //updating volunteer's committed events after cancelling
 mysql_query("update vol set evnts='$updated_event' where username='$us' and password='$psw' ");
 //removing vol details from relevant list
mysql_query("delete from $list where name='$vol_name' and phone='$vol_phone' ");
 echo "<br>".'<a href="vol_login_jump.php?vusr='.$us.'&& vpass='.$psw.' " >Go to profile page</a>'; 
}  
else
  echo "conn error";
mysql_close($con);
 


?>

</body>
</html>
