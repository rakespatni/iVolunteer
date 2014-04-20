<html>

<body text="white" bgcolor="green">
<?php
session_start();
$count=0;
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

$cancel_event=$_GET['cancel'];
$list="L".$cancel_event;
$dead=$_GET['exis'];
echo $dead;
$deadline=$_SESSION['z'][$dead];
$stlen=$_SESSION['w'][$dead];
echo "STLEN=".$stlen;
echo "deadline=".$deadline;
echo "<br>tarik=".$_SESSION['tarik'];
echo "got cancel evnt=".$cancel_event;
$i=$_GET['siz'];
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
	 //echo "check=".strlen($str);
     //echo "<br>this is recvd=".$_SESSION['y'][$f];
	 $r=$_SESSION['y'][$f];
	 
	 echo "<br>";
	 echo "loop  element r=".$r;
	 echo "cancel ev=".$cancel_event;
	 //while($cancel_event[$h]!=null)
	  //$h++;
	 echo $h;
	 //$len1=strlen($cancel_event);
	 echo "<br>";
	 
	
	 echo $len1;
	 echo "<br>";
	 $len2=strlen($r);
	 echo "length2=".$len2;
	 if($stlen==$len2)
	 { echo "inside equal len  loop";
	  for($s=0;$s<$len2;$s++)
	    {
		  if($cancel_event[$s]==$r[$s])
		   echo "inside if   with s=".$s;
		  else
		   {
		    echo "inside else with s=".$s;
		    $c=1;
			break;
		   }
		}
	 }
	 else
	  $c=1;
     //$c=(strcmp($cancel_event,$r));
	 echo "c=".$c;
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
 echo "<br>".'<a href="vol_login_jump.php?vol_usr='.$us.'&& vol_pass='.$psw.' " >Go to profile page</a>'; 
}  
else
  echo "conn error";
mysql_close($con);
 


?>

</body>
</html>