<?php

require_once "functions.php";


// Credentials value: By default set to empty string


$invalid_username    = "";
$invalid_password           = "";

/*
 *  Checks if the request is POST request
 *  triggered when you login button
 */

autoCreateUser();
if(isset($_POST['login_btn'])) {
    // Set cedentials
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (loginUser($username, $password))
        header("Location: dashboard.php?");

    // Check if  all fields are empty
    /*if (empty($email) ||  empty($Password))
    {

        // apply CSS style if email is empty
        if (empty($email))
            $invalid_email = '<div style="margin-top: -10px;
                                                    margin-bottom: 10px;
                                                    color: #ff3838;
                                                    font-size: 12px;">Email is required
                               </div>';

        if (empty($Password))
            $invalid_Password = '<div style="margin-top: -10px;
                                                    margin-bottom: 10px;
                                                    color: #ff3838;
                                                    font-size: 12px;">Password is required
                                  </div>';



    else {
        // executes if email, contact number and password  is valid

        // Call the update method to register new user
        if (loginUser($email, $Password))
            header("Location: index.php?");

        // Set invalid credentials to true if username already exists.
        else
        {
            $email = $_POST['email'];
            $Password = $_POST['password'];
            $invalid_email = 'is-invalid';
            $invalid_Password = 'is-invalid';
        }
    }*/

}


?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kape Hiraya - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" >
    <link rel="icon" type="image/x-icon" href="/img/favicon.ico">
</head>
<body>
<style>
    @import url(https://fonts.googleapis.com/css?family=Roboto:300);

    .login-page {
        width: 360px;
        padding: 8% 0 0;
        margin: auto;
    }
    .form {
        position: relative;
        z-index: 1;
        background: #FFFFFF;
        max-width: 360px;
        margin: 0 auto 100px;
        padding: 45px;
        text-align: center;
        box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
    }
    .form input {
        font-family: "Roboto", sans-serif;
        outline: 0;
        background: #f2f2f2;
        width: 100%;
        border: 0;
        margin: 0 0 15px;
        padding: 15px;
        box-sizing: border-box;
        font-size: 14px;
    }
    .form button {
        font-family: "Roboto", sans-serif;
        text-transform: uppercase;
        outline: 0;
        background: #273042;
        width: 100%;
        border: 0;
        padding: 15px;
        color: #FFFFFF;
        font-size: 14px;
        -webkit-transition: all 0.3 ease;
        transition: all 0.3 ease;
        cursor: pointer;
    }
    .form button:hover,.form button:active,.form button:focus {
        background: #1E2633;
    }
    .form .message {
        margin: 15px 0 0;
        color: #b3b3b3;
        font-size: 12px;
    }
    .form .message a {
        color: #4CAF50;
        text-decoration: none;
    }
    .form .register-form {
        display: none;
    }
    .container {
        position: relative;
        z-index: 1;
        max-width: 300px;
        margin: 0 auto;
    }
    .container:before, .container:after {
        content: "";
        display: block;
        clear: both;
    }
    .container .info {
        margin: 50px auto;
        text-align: center;
    }
    .container .info h1 {
        margin: 0 0 15px;
        padding: 0;
        font-size: 36px;
        font-weight: 300;
        color: #1a1a1a;
    }
    .container .info span {
        color: #4d4d4d;
        font-size: 12px;
    }
    .container .info span a {
        color: #000000;
        text-decoration: none;
    }
    .container .info span .fa {
        color: #EF3B3A;
    }
    body {
        background: #273042; /* fallback for old browsers */
        background: rgb(39,48,66);
        font-family: "Roboto", sans-serif;
        -webkit-font-smoothing: antialiased;
        -moz-osx-font-smoothing: grayscale;
    }
</style>

<div class="login-page">
    <div class="form">
        <!--<form class="register-form">
            <input type="text" placeholder="name"/>
            <input type="password" placeholder="password"/>
            <input type="text" placeholder="email address"/>
            <button>create</button>
            <p class="message">Already registered? <a href="#">Sign In</a></p>
        </form>-->
        <?=$invalid_username; ?>
        <?=$invalid_password; ?>
        <form id="login-form" class="login-form" method="POST">
            <input type="text" id="username"  placeholder="username" name="username" required/>

            <input type="password" id="password" placeholder="password"  name="password" required/>

            <button type="submit" name="login_btn">login</button>
            <!--<p class="message">Not registered? <a href="#">Create an account</a></p>-->
        </form>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<script>
    $('.message a').click(function(){
        $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
    });


    const form = document.getElementById('login-form');
    const username = document.getElementById('username');
    const password = document.getElementById('password');


    form.addEventListener('submit', (e) => {

        if(username.value === "" || username.value === null ) {
            e.preventDefault();
            console.log('working');
        }

        if(password.value === "" || password.value === null ) {
            e.preventDefault();
            console.log('working');
        }


    })
</script>
</body>
</html>