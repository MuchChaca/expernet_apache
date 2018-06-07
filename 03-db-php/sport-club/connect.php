<?php
// Connection to database
try {
	$host = $_SERVER['DB_HOST'];
	$user = $_SERVER['DB_USER'];
	$pass = $_SERVER['DB_PASS'];

	$db = new PDO("mysql:host=$host;port=3306;dbname=exp_club_sport;charset=utf8",$user,$pass,array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
} catch (Exception $ex) {
	die($ex->getMessage());
}


?>