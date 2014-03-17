<?php 
	session_start();
	include('new_connection.php');

	if(isset($_POST['action']) && $_POST['action'] == 'register')
	{
		register_user($_POST);
	}
	elseif(isset($_POST['action']) && $_POST['action'] == 'login')
	{
		login_user($_POST);	
	}
	elseif(isset($_POST['action']) && $_POST['action'] == 'add_note')
	{
		add_note();
	}

	function register_user()
	{
		$_SESSION['errors'] = array();

		//do a whole bunch of fun validation!

		if(empty($_POST['first_name']))
		{
			$_SESSION['errors'][] = "First name cannot be blank!";
		}

		if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
		{
			$_SESSION['errors'][] = "Email is invalid, sucka!";
		}

		if($_POST['password'] !== $_POST['confirm_password'])
		{
			$_SESSION['errors'][] = "passwords must match! sucka!";
		}

		if(strlen($_POST['password']) < 6)
		{
			$_SESSION['errors'][] = "your password isn't long enough!";
		}

		if(count($_SESSION['errors']) > 0)
		{
			header('location: index.php');
			die();
		}
		else
		{
			$first_name = escape_this_string($_POST['first_name']);
			$password = escape_this_string($_POST['password']);
			$email = escape_this_string($_POST['email']);
			$query = "INSERT INTO users (first_name, email, password, created_at, updated_at)
					  VALUES ('{$first_name}', '{$email}', '{$password}', NOW(), NOW())";
			run_mysql_query($query); 
			unset($_SESSION['errors']);
			$_SESSION['message'] = "successfully registered!";
			header('location: index.php');
			die();
		}
	}

	function login_user()
	{
		//take data and check db for the data!
		$email = $_POST['email'];
		$query = "SELECT * FROM users WHERE users.email = '{$email}'";
		$user = fetch_all($query);
		if(count($user) > 0)
		{
			if($user[0]['password'] == $_POST['password'])
			{
				$_SESSION['user_id'] = $user[0]['id'];
				$_SESSION['first_name'] = $user[0]['first_name'];
				header('location: home.php');
				die();
			}
			else
			{
				$_SESSION['message'] = "Password was incorrect!";
				header('location: index.php');
				die();
			}
		}
		else
		{
			$_SESSION['message'] = "Invalid email address!";
			header('location: index.php');
			die();
		}
	}

	function add_note()
	{
		var_dump($_POST);
		if(isset($_POST['private']))
		{
			$private = 1;
		}
		else
		{
			$private = 0;
		}
		$query = "INSERT INTO notes (title, message, user_id, private, created_at, updated_at) 
				  VALUES ('{$_POST['title']}', '{$_POST['message']}', {$_SESSION['user_id']},{$private}, NOW(), NOW())";
		run_mysql_query($query);
		header('location: home.php');
		die();
	}
 ?>