<?php
include "./db.php";

class Diary {
    public static function create() {
        if (isset($_POST['submit'])) {
            global $connection;
            
            $content = $_POST['content'];
            $student_id = $_SESSION["username"];

            // Prevent SQL injection
            mysqli_real_escape_string($connection, $content);

            $date = date("Y-m-d");

            $query = "INSERT INTO diaries (content, date_posted, student_id) ";
            $query .= "VALUES ('$content', '$date', $student_id)";

            $result = mysqli_query($connection, $query);

            if (!$result) {
                die("Query failed");
            } else {
                header("Location: ../student-portal/student_diary.php");
                // echo "<div class='record-created' style='padding: 10px; position: absolute; right: 0; background-color: green; color: var(--text-white); text-align: center;'>Record Created</div>";
            }
        }
    }
}