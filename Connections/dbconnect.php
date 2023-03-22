<?php

// Database credentials
define('DB_HOST', '127.0.0.1');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'kapehiraya');

// Other configuration settings
define('APP_NAME', 'Kape Hiraya');

// Connect to the database
$con = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if(!$con){
    die(mysqli_error($con));
}


try {
    $conn = new PDO("mysql:host=localhost;dbname=kapehiraya", DB_USER, DB_PASSWORD);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}