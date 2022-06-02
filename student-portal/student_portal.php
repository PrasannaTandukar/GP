<?php session_start(); ?>

<?php
    include "../includes/check_session_student.php";
    include "../includes/db.php";
    include "../includes/Student.php";
?>

<?php
    $result = Student::getSingleStudent($_SESSION['username']);
    $studentName = Student::getStudentName($_SESSION['username']);
?>

<?php include "./partials/header.php"; ?>

<main class="main-record">
    <?php include "./partials/sidebar.php" ?>
    <div class="main-content">
        <div class="table-container">
            <div class="top-table">
                <h1>
                    Welcome,
                    <?php
                        $tempData = " ";
                        while($row = mysqli_fetch_assoc($studentName)) {
                            foreach($row as $value) {
                                $tempData .= $value . " ";
                            }
                        }
                        echo $tempData;
                    ?>
                </h1>
            </div>
            <table>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
                    <th>Contact</th>
                    <th>Email</th>
                    <th>Country</th>
                    <th>city</th>
                    <th>DOB</th>
                    <th>Date Registered</th>
                    <th>Course_id</th>
                </tr>
                <!-- Code to insert each row fetched from students table -->
                <?php
                    while($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                        <?php
                        foreach ($row as $value) {
                            echo "<th style='font-weight: normal;'>{$value}</th>";
                        }
                        ?>
                        </tr>
                        <?php
                    }
                ?>
            </table>
        </div>
    </div>
</main>


<?php include "../includes/footer.php" ?>