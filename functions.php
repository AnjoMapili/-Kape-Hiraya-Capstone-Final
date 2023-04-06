<?php

function autoCreateUser() {
    try {
        $conn = new PDO("mysql:host=localhost;dbname=kapehiraya", "root", "");
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    $username = "anjo";
    $password = "12345";
    $password_hash = password_hash($password,PASSWORD_DEFAULT);

    $sql = $conn->prepare("SELECT * FROM users WHERE username = :username");
    $sql->bindParam(':username', $username, PDO::PARAM_STR);
    $sql->execute();
    $result = $sql->fetch(PDO::FETCH_ASSOC);

    if ($sql->rowCount() < 1) {
        $sql = $conn->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
        $sql->bindParam(':username', $username, PDO::PARAM_STR);
        $sql->bindParam(':password', $password_hash, PDO::PARAM_STR);
        $sql->execute();
    }

    $conn = null;
}
function loginUser($username, $password) {
    try {
        $conn = new PDO("mysql:host=localhost;dbname=kapehiraya", "root", "");
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = $conn->prepare("SELECT * FROM users WHERE username = :username");
    $sql->bindParam(':username', $username, PDO::PARAM_STR);
    $sql->execute();
    $row = $sql->fetch(PDO::FETCH_ASSOC);

    global $invalid_username;
    global $invalid_password;

    if ($sql->rowCount() > 0) {

        $pwdCheck = password_verify($password, $row['password']);
        if ($pwdCheck == false) {
            $invalid_password = '<li style="color: #ff3838;"><span style="color: #ff3838; font-weight: lighter; font-size: 14px; margin-bottom: 5px;">Invalid password.</span></li>';
            return false;
        } else {
            session_start();
            $_SESSION['id'] = $row['id'];
            header("Location: dashboard.php");
        }

    } else {
        $invalid_username = '<li style="color: #ff3838;"><span style="color: #ff3838; font-weight: lighter; font-size: 14px; margin-bottom: 5px;">Username does not exist.</span></li>';
    }

    $conn = null;
}