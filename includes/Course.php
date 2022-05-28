<?php

include "./db.php";

class Course {
    public static function create() {
        if (isset($_POST['submit'])) {
            global $connection;
            
            $name = $_POST['name'];

            // Prevent SQL injection
            mysqli_real_escape_string($connection, $name);

            $query = "INSERT INTO courses (name) ";
            $query .= "VALUES ('$name')";

            $result = mysqli_query($connection, $query);

            if (!$result) {
                die("Query failed");
            } else {
                header("Location: ./course_record.php");
                // echo "<div class='record-created' style='padding: 10px; position: absolute; right: 0; background-color: green; color: var(--text-white); text-align: center;'>Record Created</div>";
            }
        }
    }

     public static function read() {
        global $connection;

        $query = "SELECT * FROM courses";
            
        $result = mysqli_query($connection, $query);
        if (!$result) {
            die("Query failed");
        }

        return $result;
    }

    public static function delete() {
        if (isset($_GET['id'])) {
            global $connection;
            $id = $_GET['id'];
        
            $query = "DELETE FROM courses ";
            $query .= "WHERE id = $id ";
            echo $query;
            
            $result = mysqli_query($connection, $query);
        
            if (!$result) {
                die("Query Failed");
            } else {
                // echo "Record Deleted";
                header("Location: ./course_record.php");
            }

        }
    }

     public static function update() {
        if (isset($_POST['submit'])) {
            global $connection;
            
            $id = $_POST['id'];
            $name = $_POST['name'];

            // Prevent SQL injection
            mysqli_real_escape_string($connection, $name);

            $query = "UPDATE courses ";
            $query .= "SET name = '$name' ";
            $query .= "WHERE id = $id";

            $result = mysqli_query($connection, $query);

            if (!$result) {
                die("Query failed");
            } else {
                header("Location: ./course_record.php");
                // echo "<div class='record-created' style='padding: 10px; position: absolute; right: 0; background-color: green; color: var(--text-white); text-align: center;'>Record Created</div>";
            }
        }
    }
}