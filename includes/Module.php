<?php

include "./db.php";

class Module {
    public static function create() {
        if (isset($_POST['submit'])) {
            global $connection;
            
            $name = $_POST['name'];

            // Prevent SQL injection
            mysqli_real_escape_string($connection, $name);

            $query = "INSERT INTO modules (name) ";
            $query .= "VALUES ('$name')";

            $result = mysqli_query($connection, $query);

            if (!$result) {
                die("Query failed");
            } else {
                header("Location: ./module_record.php");
                // echo "<div class='record-created' style='padding: 10px; position: absolute; right: 0; background-color: green; color: var(--text-white); text-align: center;'>Record Created</div>";
            }
        }
    }

     public static function read() {
        global $connection;

        $query = "SELECT * FROM modules";
            
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
        
            $query = "DELETE FROM modules ";
            $query .= "WHERE id = $id ";
            echo $query;
            
            $result = mysqli_query($connection, $query);
        
            if (!$result) {
                die("Query Failed");
            } else {
                // echo "Record Deleted";
                header("Location: ./module_record.php");
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

            $query = "UPDATE modules ";
            $query .= "SET name = '$name' ";
            $query .= "WHERE id = $id";

            $result = mysqli_query($connection, $query);

            if (!$result) {
                die("Query failed");
            } else {
                header("Location: ./module_record.php");
                // echo "<div class='record-created' style='padding: 10px; position: absolute; right: 0; background-color: green; color: var(--text-white); text-align: center;'>Record Created</div>";
            }
        }
    }

    public static function getAllId() {
        global $connection;

        $query = "SELECT id FROM modules";
            
        $result = mysqli_query($connection, $query);
        if (!$result) {
            die("Query failed");
        }

        return $result;
    }

    public static function getNameFromID($id) {
        global $connection;

        $query = "SELECT name FROM modules WHERE id= $id";

        $result = mysqli_query($connection, $query);
        if (!$result) {
            die("Query failed");
        }

        return $result;
    }

        public static function getAddedModule($id) {
        global $connection;

        $query = "SELECT module_id FROM course_modules ";
        $query .= "WHERE course_id = $id";
            
        $result = mysqli_query($connection, $query);
        if (!$result) {
            die("Query failed");
        }

        return $result;
    }

    public static function getAssignmentFromID($id) {
        global $connection;

        $query = "SELECT id, name FROM assignments WHERE module_id= $id";

        $result = mysqli_query($connection, $query);
        if (!$result) {
            die("Query failed");
        }

        return $result;
    }
}