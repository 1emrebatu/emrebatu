<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "klaros";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Bağlantı başarısız: " . $conn->connect_error);
} 
$conn->set_charset("utf8")
?>