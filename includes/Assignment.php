<?php

use LDAP\Result;

include "./db.php";

class Assignment {
    public static function create() {
        if (isset($_POST['submit'])) {
            global $connection;
            
            $name = $_POST['name'];
            $startDate = $_POST['start-date'];
            $endDate = $_POST['end-date'];
            $moduleID = $_POST['module-id'];

            // Prevent SQL injection
            mysqli_real_escape_string($connection, $name);
            mysqli_real_escape_string($connection, $startDate);
            mysqli_real_escape_string($connection, $endDate);
            mysqli_real_escape_string($connection, $moduleID);

            $query = "INSERT INTO assignments (name, start_date, end_date, module_id) ";
            $query .= "VALUES ('$name', '$startDate', '$endDate', $moduleID)";

            $result = mysqli_query($connection, $query);

            if (!$result) {
                die("Query failed");
            } else {
                header("Location: ./assignment_record.php");
                // echo "<div class='record-created' style='padding: 10px; position: absolute; right: 0; background-color: green; color: var(--text-white); text-align: center;'>Record Created</div>";
            }
        }
    }

     public static function read() {
        global $connection;

        $query = "SELECT * FROM assignments";
            
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
        
            $query = "DELETE FROM assignments ";
            $query .= "WHERE id = $id ";
            echo $query;
            
            $result = mysqli_query($connection, $query);
        
            if (!$result) {
                die("Query Failed");
            } else {
                // echo "Record Deleted";
                header("Location: ./assignment_record.php");
            }

        }
    }

     public static function update() {
        if (isset($_POST['submit'])) {
            global $connection;
            
            $id = $_POST['id'];
            $name = $_POST['name'];
            $startDate = $_POST['start-date'];
            $endDate = $_POST['end-date'];

            // Prevent SQL injection
            mysqli_real_escape_string($connection, $name);

            $query = "UPDATE assignments ";
            $query .= "SET name = '$name', start_date = '$startDate', end_date = '$endDate' ";
            $query .= "WHERE id = $id";

            $result = mysqli_query($connection, $query);

            if (!$result) {
                die("Query failed");
            } else {
                header("Location: ./assignment_record.php");
                // echo "<div class='record-created' style='padding: 10px; position: absolute; right: 0; background-color: green; color: var(--text-white); text-align: center;'>Record Created</div>";
            }
        }
    }

    public static function getAllId() {
        global $connection;

        $query = "SELECT id FROM assignments";
            
        $result = mysqli_query($connection, $query);
        if (!$result) {
            die("Query failed");
        }

        return $result;
    }

    public static function getNameFromID($id) {
        global $connection;

        $query = "SELECT name FROM assignments WHERE id= $id";

        $result = mysqli_query($connection, $query);
        if (!$result) {
            die("Query failed");
        }

        return $result;
    }

    public static function getDataFromID($id) {
        global $connection;

        $query = "SELECT * FROM assignments WHERE id= $id";

        $result = mysqli_query($connection, $query);
        if (!$result) {
            die("Query failed");
        }

        return $result;
    }

    public static function getAllAssignmentFromModule($id) {
        global $connection;

        $query = "SELECT name, start_date, end_date FROM assignments WHERE module_id= $id";

        $result = mysqli_query($connection, $query);

        if (!$result) {
            die("Query failed");
        }

        return $result;
    }
}