<html>
<body text="white" bgcolor="green">

<h2> seeker</h2>

<form action="<?php echo $_SERVER['PHP_REQUEST']; ?>" method="post">

<label><b>event_id:   </b></label><input type="varchar" name="event_id">
<br>
<br>
<label><b>place:    </b></label><input type="text" name="place">
<br>
<br>
<label><b>date:  </b></label><input type="date" name="date">
<br>
<br>
<label><b>time:</b></label><input type="time" name="time">
<br>
<br>
<label><b>duration:</b></label><input type="text" name="duration">
<br>
<label><b>deadline:</b></label><input type="text" name="deadline">
<br>
<label><b>phno:</b></label><input type="int" name="phno">
<br>
<br>
<input type="submit" name="submit" value="submit">
</form>
<br>
<br>



