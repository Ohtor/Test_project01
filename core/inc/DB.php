<?php
	const DB_HOST = 'localhost';	
	const DB_USERNAME = 'root';
	const DB_PASSWORD = '';
	const DB_NAME = 'project01';
	
	function connect (
		$dbHost, 
		$dbUserName, 
		$dbPassword, 
		$dbName )
		{
			$db = new mysqli(
				$dbHost,
				$dbUserName,
				$dbPassword,
				$dbName);
			if($db->connect_error)
			{
				die("Cannot connect to database: \n"
				. $db->connect_error . "\n"
				. $db->connect_errno);
			}
			return $db;
		}
		