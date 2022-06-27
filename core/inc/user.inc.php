<?php

function user_exists($user)
{
	//$user = mysqli_escape_string(string, $user);
	
	$total = mysqli_query("SELECT COUNT('user_id') FROM 'users' WHERE 'email' = '{$user}'");
	
	return (mysql_result($total, 0) == '1') ? true : false;
}
	
function valid_credentials($user, $pass)
{
	//$user = mysqli_escape_string(string, $user);
	$pass = sha1($pass);
	
	$total = mysqli_query("SELECT COUNT('user_id') FROM 'users' WHERE 'email' = '{$user}' AND 'password' = '{$pass}'");
	
	return (mysql_result($total, 0) == '1') ? true : false;
}

function add_user($user, $pass)
{
	//$user = mysqli_escape_string(htmlentities(string, $user));
	$pass = sha1($pass);
	
	mysqli_query("INSERT INTO 'users' ('email', 'password') VALUES ('{$user}', '{$pass}')");
}