<?php
include "./db.php";

class CourseModule {
    public static function update($id) {
        if (isset($_POST['submit'])) {
            global $connection;
            
            $id = $_POST['id'];
            $moduleID = $_POST['module-id'];

            // Prevent SQL injection
            mysqli_real_escape_string($connection, $id);
            mysqli_real_escape_string($connection, $moduleID);

            $query = "INSERT INTO course_modules (course_id, module_id) ";
            $query .= "VALUES ($id, $moduleID)";

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