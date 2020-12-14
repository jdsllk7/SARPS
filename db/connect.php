<?php

$error_msg = 'Sorry could not connect to server...';
$servername = 'localhost';
$username = 'root';
$password = '';
$db = 'sarps_db';

// CREATE CONNECTION
$conn = mysqli_connect($servername, $username, $password);

// CHECK CONNECTION
if (!$conn) {
	die($error_msg);
}

// CREATE THE DATABASE
// $sql = "DROP DATABASE IF EXISTS $db";
$sql = "CREATE DATABASE IF NOT EXISTS $db";
if (mysqli_query($conn, $sql)) {
	$conn = mysqli_connect($servername, $username, $password, $db);
} else {
	die($error_msg);
}

$sql = "CREATE TABLE IF NOT EXISTS users (
	userId BIGINT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	userType VARCHAR(200) NOT NULL,
	userNumber VARCHAR(200) NOT NULL,
	fName VARCHAR(200),
	lName VARCHAR(200),
	contact VARCHAR(10),
	password VARCHAR(200) NOT NULL
	)";
// $sql = "DROP TABLE IF EXISTS users";
mysqli_query($conn, $sql);

$data = mysqli_query($conn, "SELECT * FROM users WHERE userType='admin' AND userNumber='1234'");
if (mysqli_num_rows($data) == 0) {
	$sql = "INSERT INTO `users` SET `userType` = 'admin', `userNumber` = '1234', `password` = 'admin';";
	mysqli_query($conn, $sql);
}

$sql = "CREATE TABLE IF NOT EXISTS results (
	resultsId BIGINT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	subject VARCHAR(200) NOT NULL,
	percentage VARCHAR(200) NOT NULL,
	publishType VARCHAR(200) NOT NULL,
	comment VARCHAR(200),
	fName VARCHAR(200),
	lName VARCHAR(200),
	userId BIGINT(20) UNSIGNED
	)";
// $sql = "DROP TABLE IF EXISTS results";
mysqli_query($conn, $sql);


$sql = "CREATE TABLE IF NOT EXISTS chats (
	chatId BIGINT(20) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
	comment VARCHAR(200),
	userType VARCHAR(200) NOT NULL,
	userId BIGINT(20) UNSIGNED,
	resultsId BIGINT(20) UNSIGNED
	)";
// $sql = "DROP TABLE IF EXISTS chats";
mysqli_query($conn, $sql);
