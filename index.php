<?php include "./includes/db.php" ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Line CSS file -->
    <link rel="stylesheet" href="https://fonts.sandbox.google.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
    <link rel="stylesheet" href="./css/style.css">
    <title>Course Management System</title>
</head>
<body>

<div class="home">
    <div class="home-container">
        <form action="./includes/login.php" method="post" class="home-login">
            <img src="./images/uni-logo.jpg" alt="university logo">
            <h1>WCU</h1>
            <p>Sign in with your <strong>username</strong> and <strong>password</strong></p>
            <input type="text" name="username" placeholder="Your username">
            <input type="password" name="password" placeholder="Password">
            <input type="submit" name="login" value="Sign in" class="home-btn">
        </form>
    </div>
</div>

<?php include "./includes/footer.php" ?>