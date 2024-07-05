<?php
$servername = "127.0.0.1"; // Coba gunakan 127.0.0.1 sebagai alternatif dari localhost
$username = "root";
$password = "";
$dbname = "project_web";
$port = 3306; // Tambahkan port jika perlu

$conn = new mysqli($servername, $username, $password, $dbname, $port);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
