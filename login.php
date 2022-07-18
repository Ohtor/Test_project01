<?php
//include('core/init.inc.php');
session_start();
$errors = array();
$DataBase = mysqli_connect("localhost", "root", "", "project01");
if(isset($_POST['login_user']))
{
	$username = mysqli_real_escape_string($DataBase, $_POST['username']);
	$password = mysqli_real_escape_string($DataBase, $_POST['password']);
	if(empty($username))
	{
		array_push($errors, "Username is required");
	}
	if(empty($password))
	{
		array_push($errors, "Password is required");
	}
	if(count($errors) == 0) 
	{
		$password = sha1($password);
		$query = "SELECT * FROM users WHERE email='$username' AND password='$password' ";
		$results = mysqli_query($DataBase, $query);
		if(mysqli_num_rows($results)) 
		{
			$_SESSION['username'] = $username;
			$_SESSION['success'] = "Logged in successfully";
			header('location: protected.php');
		}
		else
		{
			array_push($errors, "Wrong username/password combination.");
		}
	}
}



?>

<!DOCTYPE html>
<html>
	<head>
	<title> Project_test </title>
	</head>
	<body>
	<div class="container">
		<div class="header">
			<h2>Log In</h2>
		</div>
		
		<form action="login.php" method="post">
		
			<div>
				<label for="username">Email: </label>
				<input type="text" name="username" required>
			</div>
			
			<div>
				<label for="password">Password: </label>
				<input type="password" name="password" required>
			</div>
			
			<button type="submit" name="login_user"> Log In </button>
			
			<p>Not a user?<a href="register.php"><b>  Register Here</b></a></p>
		</form>
	</div>
	</body>