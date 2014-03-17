<?php 
	session_start();
 ?>
<html>
<head>
	<title>Welcome to nevernote!</title>
</head>
<body>
	<?php 
		if(isset($_SESSION['errors']))
		{
			foreach ($_SESSION['errors'] as $error) 
			{
				echo "<p>". $error ."</p>"; 
			}
			unset($_SESSION['errors']);
		}
		if(isset($_SESSION['message']))
		{
			echo "<p>". $_SESSION['message'] . "</p>";
			unset($_SESSION['message']);
		}
	 ?>
	<h2>Login!</h2>
	<form action='process.php' method='post'>
		Email: <input type='text' name='email'>
		Password: <input type='password' name='password'>
		<input type='hidden' name='action' value='login'>
		<input type='submit' value='login'>
	</form>
	<h2>New to Nevernote?  Register!</h2>
	<form action='process.php' method='post'>
		First name: <input type='text' name='first_name'>
		Email: <input type='text' name='email'>
		Password: <input type='password' name='password'>
		Confirm password: <input type='password' name='confirm_password'>
		<input type='hidden' name='action' value='register'>
		<input type='submit' value='register'>
	</form>
</body>
</html>