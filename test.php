<?php
include('core/init.inc.php');
$errors = array();
if(isset($_POST['username'], $_POST['password']))
{
	if (empty($_POST['username']))
	{
		$errors[] = 'The email cannot be empty.';
	}
	if (empty($_POST['password']))
	{
		$errors[] = 'The password cannot be empty.';
	}
	if (valid_credentials($_POST['username'], $_POST['password']) === false)
	{
		echo "aaaaa";
	}
	if (empty($errors))
	{
		$_SESSION['username'] = htmlentities($_POST['username']);
		
		header('Location: protected.php');
		
	}
}

?>



<!DOCTYPE html>
<html>
	<head>
		<title> Project_test </title>
	</head>
	<body>
		<div>	
			<?php
			
			if (empty($errors) === false)
			{?>
			<ul>
				<?php 
				
				foreach ($errors as $error)
				{
					echo "<li>{$error}</li>";
				}
				?>
			</ul>
			<?php
			}
			
			?>
		</div>
		<div>
			Need an account? <a href="register.php">Register here</a>
		</div>
		<form action="" method"post">
			<p>
				<label for="username">username:</label>
				<input type="text" name="username" id="username"  />
			</p>
			<p>
				<label for="password">Password:</label>
				<input type="password" name="password" id="password" />
			</p>
			<p>
				<input type="submit" value="Login" />
			</p>
		</form>
	</body>
</html>