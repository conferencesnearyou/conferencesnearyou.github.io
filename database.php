<?php

$server = 'localhost';
$username = 'root';
$password = 'L1JAAL08';
$database = 'php_login_database';

try {
  $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
  die('Connection Failed: ' . $e->getMessage());
}

?>