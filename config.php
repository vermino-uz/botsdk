<?php

$api_key = 'TELEGRAM BOT TOKEN';

define("DB_HOST", "localhost");
define("DB_USER", "username");
define("DB_PASS", "password");
define("DB_NAME", "name");

$connect = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);
mysqli_set_charset($connect, "utf8mb4");

if ($connect->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

echo "Connected successfully";
