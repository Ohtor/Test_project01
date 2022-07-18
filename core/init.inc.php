<?php

session_start();
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = new mysqli("localhost", "root", "", "project01");
$path = dirname(__FILE__);
//require_once 'DB.php';
include("{$path}/inc/DB.php");
$db = connect (
	DB_HOST,
	DB_USERNAME,
	DB_PASSWORD,
	DB_NAME);
//$exception = array('register', 'login');
//$page = substr(end(explode('/', $_SERVER['SCRIPT_NAME'])), 0, -4);

//if (in_array($page, $exception) === false) 
//	{
//		if (isset($_SESSION['username']) === false)
//		{
//			header('Location: login.php');
//			
//		}
//	}

//mysqli_connect('localhost', 'example_user', 'example_pass', 'project01');




include("{$path}/inc/user.inc.php");

?>