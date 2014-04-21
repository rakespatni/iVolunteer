<?php
$user=$_GET['user'];
$pass=$_GET['pass'];
?>
<html>
<body>
<form action="seeker_post.php" method="get">
Event_id:<input type="text" name="event_id"><br>

Place:<input type="text" name="place"><br>

Date:<input type="date" name="date"><br>

time:<input type="time" name="time" ><br>

duration:<input type="text" name="duration"><br>

Deadline:<input type="date" name="dead"><br>

<input type="hidden" name="user" value="<?php  echo $user;?>">
<input  type="hidden" name="pass" value="<?php echo $pass;?>">

event desc:<input type="text" name="event_des"><br>

Type of vol:<input type="text" name="type_vol"><br>


Number of people needed:<input type="text" name="people">
<input type="submit" name="submit"><br>
</form>
</body>
</html>
