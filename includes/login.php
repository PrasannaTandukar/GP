<?php
session_start();
include "./db.php";

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);

    // Check admin and route to admin page
    $query = "SELECT * FROM users WHERE  username = '{$username}' ";
    $select_user_query = mysqli_query($connection, $query);

    if (!$select_user_query) {
        die("QUERY FAILED" . mysqli_error($connection));
    }

    while ($row = mysqli_fetch_assoc($select_user_query)) {
        $db_username = $row['username'];
        $db_password = $row['password'];
        $db_role = $row['role'];

        if ($username === $db_username && $password === $db_password) {
            $_SESSION['username'] = $db_username;
            $_SESSION['role'] = $db_role;
            header("Location: ../rms/records_management.php");
        }
    }

    // CHheck user and route to user page
    $query = "SELECT id FROM students WHERE  id = '{$username}' ";
    $select_user_query = mysqli_query($connection, $query);

    if (!$select_user_query) {
        die("QUERY FAILED" . mysqli_error($connection));
    }

    while ($row = mysqli_fetch_assoc($select_user_query)) {
        $db_username = $row['id'];

        if ($username === $db_username && $password === "root") {
            $_SESSION['username'] = $db_username;
            $_SESSION['role'] = 'user';
            header("Location: ../student-portal/student_portal.php");
        } else {
            header("Location: ../index.php");
        }
    }
    // else if for student portal, change sessions
}