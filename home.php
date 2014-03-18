<?php
	session_start(); 
	include('new_connection.php');
	$query = "SELECT * FROM notes WHERE notes.user_id = {$_SESSION['user_id']}";
	$notes = fetch_all($query);
 ?>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
		echo "welcome ". $_SESSION['first_name']; 
	 ?>
	 <h3>Add yourself a note!</h3>
	 <form action='process.php' method='post'>
	 	<input type='hidden' name='action' value='add_note'>
	 	Title: <input type='text' name='title'>
	 	Message: <textarea name='message' placeholder='add your message!'></textarea>
	 	Private? <input type='checkbox' name='private'>
	 	<input type='submit' value='add note!'>
	 </form>
	 <h3>Here are all of your notes</h3>
	<?php 
		foreach ($notes as $note) 
		{
			echo "<h4>" .$note['title']. "</h4>";
			echo "<p>". $note['message']. "</p>";
		}
	 ?>
	 <a href="all.php">View other peoples' notes!</a>
	 <a href="process.php">Logout</a>
</body>
</html>