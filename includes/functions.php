<?php

use LDAP\Result;

include "./db.php";

function createStudent() {
    if (isset($_POST['submit'])) {
        global $connection;
        
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $gender = $_POST['gender'];
        $contact = $_POST['contact'];
        $email = $_POST['email'];
        $country = $_POST['country'];
        $city = $_POST['city'];
        $date_of_birth = $_POST['date-of-birth'];
        $course_id = $_POST['course-id'];

        // Prevent SQL injection
        mysqli_real_escape_string($connection, $firstname);
        mysqli_real_escape_string($connection, $lastname);
        mysqli_real_escape_string($connection, $gender);
        mysqli_real_escape_string($connection, $contact);
        mysqli_real_escape_string($connection, $email);
        mysqli_real_escape_string($connection, $country);
        mysqli_real_escape_string($connection, $city);
        mysqli_real_escape_string($connection, $date_of_birth);
        mysqli_real_escape_string($connection, $course_id);

        $query = "INSERT INTO students (firstname, lastname, gender, contact, email, country, city, date_of_birth, course_id) ";
        $query .= "VALUES ('$firstname', '$lastname', '$gender', '$contact', '$email', '$country', '$city', '$date_of_birth', $course_id)";

        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Query failed");
        } else {
            echo "<div class='record-created' style='padding: 10px; position: absolute; right: 0; background-color: green; color: var(--text-white); text-align: center;'>Record Created</div>";
        }
    }
}