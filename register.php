<?php

include ('core/init.inc.php');

$errors = array();

if (isset($_POST['username'], $_POST['password'], $_POST['repeat_password']))
{
	if (empty($_POST['username']))
	{
		$errors[] = 'The email cannot be empty.';
	}
	
	if (empty($_POST['password']) || (empty($_POST['repeat_password']))) 
	{
		$errors[] = 'The password cannot be empty';
	}
	
	if ($_POST['password'] != $_POST['repeat_password'])
	{
		$errors[] = 'Passwords not same';
	}
	
	if (user_exists($_POST['username']))
	{
		$errors[] = 'This email already used';
	}
	
	if (empty($errors))
	{
		add_user($_POST['username'], $_POST['password']);
		
		$_SESSION['username'] = htmlentities($_POST['username']);
		
		header('Location: protected.php');
		die();
	}
}

?>

<!DOCTYPE html>
<html>
	<head>
		<title> Project test registration </title>
	</head>
	<body>
		<p>	
			<?php
			
			
			
			?>
		</p>
		<form action="" method="post">
			<p>
				<label for="username">email:</label>
				<input type="text" name="username" id="username" />
			</p>
			<p>
				<label for="password">Password:</label>
				<input type="password" name="password" id="password" />
			</p>
			<p>
				<label for="repeat_password">Repeat Password:</label>
				<input type="password" name="repeat_password" id="repeat_password" />
			</p>
			<p>
				<input type="submit" value="Register" />
			</p>
		</form>
	</body>
</html>