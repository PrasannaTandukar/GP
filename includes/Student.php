<?php

use LDAP\Result;
use LDAP\ResultEntry;

include "./db.php";

class Student {
    public static function createStudent() {
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
                header("Location: ./records_management.php");
                // echo "<div class='record-created' style='padding: 10px; position: absolute; right: 0; background-color: green; color: var(--text-white); text-align: center;'>Record Created</div>";
            }
        }
    }

     public static function readStudent() {
        global $connection;

        $query = "SELECT * FROM students";
            
        $result = mysqli_query($connection, $query);
        if (!$result) {
            die("Query failed");
        }

        return $result;
    }

    public static function getEnrolledStudent($id) {
        global $connection;

        $query = "SELECT * FROM students ";
        $query .= "WHERE course_id = $id";
            
        $result = mysqli_query($connection, $query);
        if (!$result) {
            die("Query failed");
        }

        return $result;
    }

    public static function deleteStudent() {
        if (isset($_GET['id'])) {
            global $connection;
            $id = $_GET['id'];
        
            $query = "DELETE FROM students ";
            $query .= "WHERE id = $id ";
            echo $query;
            
            $result = mysqli_query($connection, $query);
        
            if (!$result) {
                die("Query Failed");
            } else {
                // echo "Record Deleted";
                header("Location: ./records_management.php");
            }

        }
    }

    public static function updateStudent() {
        if (isset($_POST['submit'])) {
            global $connection;
            
            $id = $_POST['id'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $gender = $_POST['gender'];
            $contact = $_POST['contact'];
            $email = $_POST['email'];
            $country = $_POST['country'];
            $city = $_POST['city'];
            $date_of_birth = $_POST['date-of-birth'];

            // Prevent SQL injection
            mysqli_real_escape_string($connection, $firstname);
            mysqli_real_escape_string($connection, $lastname);
            mysqli_real_escape_string($connection, $gender);
            mysqli_real_escape_string($connection, $contact);
            mysqli_real_escape_string($connection, $email);
            mysqli_real_escape_string($connection, $country);
            mysqli_real_escape_string($connection, $city);
            mysqli_real_escape_string($connection, $date_of_birth);

            $query = "UPDATE students ";
            $query .= "SET firstname = '$firstname', lastname = '$lastname', gender = '$gender', contact = '$contact', email = '$email', country = '$country', city = '$city', date_of_birth = '$date_of_birth' ";
            $query .= "WHERE id = $id";

            $result = mysqli_query($connection, $query);

            if (!$result) {
                die("Query failed");
            } else {
                header("Location: ./records_management.php");
                // echo "<div class='record-created' style='padding: 10px; position: absolute; right: 0; background-color: green; color: var(--text-white); text-align: center;'>Record Created</div>";
            }
        }
    }

    public static function getSingleStudent($id) {
        global $connection;

        $query = "SELECT * FROM students WHERE id = $id";

        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Query failed");
        }

        return $result;
    }

    public static function getStudentName($id) {
        global $connection;

        $query = "SELECT firstname, lastname FROM students WHERE id = $id";

        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Query failed");
        }

        return $result;
    }


    public static function getLinkedCourseId($id) {
        global $connection;

        $query = "SELECT course_id FROM students WHERE id = $id";

        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Query failed");
        }

        return $result;
    }
}