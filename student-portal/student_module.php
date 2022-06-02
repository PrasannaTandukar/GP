<?php session_start(); ?>

<?php
    include "../includes/check_session_student.php";
    include "../includes/db.php";
    include "../includes/Student.php";
    include "../includes/Course.php";
    include "../includes/Module.php";
?>

<?php
    $linkedCourseID = Student::getLinkedCourseId($_SESSION['username']);
    $finalLinkedCourseID = mysqli_fetch_assoc($linkedCourseID);

    $moduleResult = Course::getAllModulesLinked($finalLinkedCourseID['course_id']);
?>

<?php include "./partials/header.php"; ?>

<main class="main-record">
    <?php include "./partials/sidebar.php" ?>
    <div class="main-content">
        <div class="modules">
            <h1>
                <?php
                    $linkedCourseName = Course::getNameFromID($finalLinkedCourseID['course_id']);
                    $finalLinkedCourseName = mysqli_fetch_assoc($linkedCourseName);
                    echo $finalLinkedCourseName['name'];
                ?>
            </h1>
            <div class="module-container">
                <div class="module">
                    <img src="../images/1.jpg" alt="#">
                    <h3>Module 1</h3>
                </div>
                <?php
                    while ($row = mysqli_fetch_assoc($moduleResult)) {
                        ?>
                        <div class="module">
                            <img src="../images/1.jpg" alt="#">
                            <h3><?php 
                                    $rawModule = Module::getNameFromID($row['module_id']);
                                    $parsedModule = mysqli_fetch_assoc($rawModule);
                                    echo $parsedModule['name']; 
                                ?></h3>
                        </div>
                        <?php
                    }  
                ?>
            </div>
        </div>
    </div>
</main>


<?php include "../includes/footer.php" ?>