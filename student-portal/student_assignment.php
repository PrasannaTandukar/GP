<?php session_start(); ?>

<?php
    include "../includes/check_session_student.php";
    include "../includes/db.php";
    include "../includes/Student.php";
    include "../includes/Course.php";
    include "../includes/Module.php";
    include "../includes/Assignment.php";
?>

<?php

    $moduleID = $_GET['id'];

    $assignmentResult = Assignment::getAllAssignmentFromModule($moduleID);
?>

<?php include "./partials/header.php"; ?>

<main class="main-record">
    <?php include "./partials/sidebar.php" ?>
    <div class="main-content">
        <div class="modules">
            <h1>
                <?php
                    $rawModule = Module::getNameFromID($moduleID);
                    $parsedModule = mysqli_fetch_assoc($rawModule);
                    echo $parsedModule['name'];
                ?>
            </h1>
            <table>
                <tr>
                    <th>Name</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Upload</th>
                </tr>
                <!-- Code to insert each row fetched from students table -->
                <?php
                    while($row = mysqli_fetch_assoc($assignmentResult)) {
                        ?>
                        <tr>
                        <?php
                        foreach ($row as $value) {
                            echo "<th style='font-weight: normal;'>{$value}</th>";
                        }
                        ?>
                        <th><a href="./assignment_upload.php?id=<?php echo $row['id'] ?>" style="color: black;">upload</a></th>
                        </tr>
                        <?php
                    }
                ?>
            </table>
        </div>
    </div>
</main>


<?php include "../includes/footer.php" ?>