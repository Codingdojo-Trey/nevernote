<?php
	session_start();
	include('new_connection.php');
	$query = "SELECT notes.*, users.first_name
			  FROM notes 
			  LEFT JOIN users on notes.user_id = users.id
			  WHERE private = 0";
	$notes = fetch_all($query);
 ?>
<html>
<head>
	<title></title>
</head>
<body>
	<a href="process.php">Logout</a>
	<h2>Here is what people are noting!</h2>
	<?php
		foreach ($notes as $note)
		{
			echo "<p>".$note['message']."</p>";
			echo "<h5>". $note['first_name']. "</h5>";
		} 
	 ?>
</body>
</html>