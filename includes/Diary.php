<?php
include "./db.php";

class Diary {
    public static function create() {
        if (isset($_POST['submit'])) {
            global $connection;
            
            $title = $_POST['title'];
            $content = $_POST['content'];
            $student_id = $_SESSION["username"];

            // Prevent SQL injection
            mysqli_real_escape_string($connection, $title);
            mysqli_real_escape_string($connection, $content);

            $date = date("Y-m-d");

            $query = "INSERT INTO diaries (title, content, date_posted, student_id) ";
            $query .= "VALUES ('$title', '$content', '$date', $student_id)";

            $result = mysqli_query($connection, $query);

            if (!$result) {
                die("Query failed");
            } else {
                header("Location: ../student-portal/student_diary.php");
                // echo "<div class='record-created' style='padding: 10px; position: absolute; right: 0; background-color: green; color: var(--text-white); text-align: center;'>Record Created</div>";
            }
        }
    }

    public static function read($id) {
        global $connection;

        $query = "SELECT id, title, date_posted FROM diaries WHERE student_id = $id";
        
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
        
            $query = "DELETE FROM diaries ";
            $query .= "WHERE id = $id ";
            
            $result = mysqli_query($connection, $query);
        
            if (!$result) {
                die("Query Failed");
            } else {
                // echo "Record Deleted";
                header("Location: ./student_diary.php");
            }

        }
    }


     public static function update() {
        if (isset($_POST['submit'])) {
            global $connection;
            
            $id = $_POST['id'];
            $title = $_POST['title'];
            $content = $_POST['content'];

            // Prevent SQL injection
            mysqli_real_escape_string($connection, $title);
            mysqli_real_escape_string($connection, $content);

            $query = "UPDATE diaries ";
            $query .= "SET title = '$title', content = '$content' ";
            $query .= "WHERE id = $id";

            $result = mysqli_query($connection, $query);

            if (!$result) {
                die("Query failed");
            } else {
                header("Location: ./student_diary.php");
                // echo "<div class='record-created' style='padding: 10px; position: absolute; right: 0; background-color: green; color: var(--text-white); text-align: center;'>Record Created</div>";
            }
        }
    }

    public static function expandDiary() {
        if (isset($_GET['id'])) {
            global $connection;
            $id = $_GET['id'];

            $query = "SELECT title, content FROM diaries WHERE id = $id";
            
            $result = mysqli_query($connection, $query);
            if (!$result) {
                die("Query failed");
            }

            return $result;
        }
    }

    public static function getDiaryData($id) {
        global $connection;

        $query = "SELECT title, content FROM diaries WHERE id = $id";
        
        $result = mysqli_query($connection, $query);
        if (!$result) {
            die("Query failed");
        }

        return $result;
    }
}