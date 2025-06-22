<?php
$host = 'localhost';
$username = 'qwerta0a_11';
$password = 'Oatktest11';
$database = 'qwerta0a_11';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
