<?php session_start(); ?>

<?php
    include "../includes/check_session_student.php";
    include "../includes/db.php";
    include "../includes/Student.php";
?>

<?php
    // $result = Student::getSingleStudent($_SESSION['username']);
    // $studentName = Student::getStudentName($_SESSION['username']);
?>

<?php include "./partials/header.php"; ?>

<main class="main-record">
    <?php include "./partials/sidebar.php" ?>
    <div class="main-content">
        <div class="table-container">
            <div class="top-table">
                <h1>Diary</h1>
                <a href="./add_diary.php">Add New</a>
            </div>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Delete</th>
                    <th>Edit</th>
                    <th>View</th>
                </tr>
                <!-- Code to insert each row fetched from students table -->
                <?php
                    // while($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <!-- <tr> -->
                        <?php
                        // foreach ($row as $value) {
                            // echo "<th style='font-weight: normal;'>{$value}</th>";
                        // }
                        ?>
                        <!-- </tr> -->
                        <?php
                    // }
                ?>
            </table>
        </div>
    </div>
</main>


<?php include "../includes/footer.php" ?>