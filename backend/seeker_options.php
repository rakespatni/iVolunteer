<?php
$user=$_GET['user'];
$pass=$_GET['pass'];

echo "Welcome".$user;
echo "click on the links below to proceed";
echo '<a href="seeker_form.php?user='.$user.'&&pass='.$pass.'">'.'Post event'.'</a>';
echo "<br>";
echo '<a href="seeker_events.php?user='.$user.'&&pass='.$pass.'">'.'View posted events'.'</a>';


echo "<br>";
echo '<a href="seeker_login.html">'.'Log out'.'</a>';


?>
