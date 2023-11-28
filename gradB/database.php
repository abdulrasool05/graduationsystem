<?php

$mysql_hostname = "localhost";
$mysql_username = "wcss_grad_gradB";
$mysql_password = "8cyJFV@C6r(7l1ba";
$mysql_database = "wcss_grad_gradB";
$dsn = "mysql:host=".$mysql_hostname.";dbname=".$mysql_database;

$debug = false;
try
{
	$pdo= new PDO($dsn, $mysql_username,$mysql_password, array(PDO::ATTR_EMULATE_PREPARES => false, PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch (PDOException $e)
{
	echo 'PDO error: could not connect to DB, error: '.$e;
}
