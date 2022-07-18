<?php
//$path = dirname(__FILE__);
//require_once 'DB.php';
//include("{$path}/DB.php");
$DataBase = mysqli_connect("localhost", "root", "", "project01");
function user_exists($user)
{
	$DataBase = mysqli_connect("localhost", "root", "", "project01");
	$user = mysqli_real_escape_string($DataBase, $user);
	
	$total = "SELECT * FROM users WHERE email = '{$user}'LIMIT 1";
	$results = mysqli_query($DataBase, $total);
	return mysqli_fetch_assoc($results);
}
	
function valid_credentials($user, $pass)
{
	$DataBase = mysqli_connect("localhost", "root", "", "project01");
	$user = mysqli_real_escape_string($DataBase, $user);
	$pass = sha1($pass);
	$total = "SELECT * FROM users WHERE email = '{$user}' AND password = '{$pass}' ";
	$results = mysqli_query($DataBase, $total);
	return mysqli_num_results($results);
}

function add_user($user, $pass)
{
	$DataBase = mysqli_connect("localhost", "root", "", "project01");
	$user = mysqli_real_escape_string($DataBase, htmlentities($user));
	$pass = sha1($pass);
	
	$DataBase->query("INSERT INTO users (email, password) VALUES ('{$user}', '{$pass}')");
}