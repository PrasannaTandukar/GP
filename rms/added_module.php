<?php session_start(); ?>

<?php
    include "../includes/check_session_admin.php"
?>

<?php
    include "../includes/db.php";
    include "../includes/Module.php";

    // Stores rows of data fetched from student table
    $id = $_GET['id'];
    $result = Module::getAddedModule($id);
?>

<?php include "../includes/header.php"; ?>

<main class="main-record">
    <?php include "../includes/sidebar.php" ?>
    <div class="main-content">
        <div class="table-container">
            <div class="top-table">
                <h1>Added Modules</h1>
            </div>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                </tr>
                <!-- Code to insert each row fetched from students table -->
                <?php
                    while($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                        <?php
                        foreach ($row as $value) {
                            echo "<th style='font-weight: normal;'>{$value}</th>";

                            $linkedCourseName = Module::getNameFromID($value);
                            $finalLinkedCourseName = mysqli_fetch_assoc($linkedCourseName);
                            echo "<th style='font-weight: normal;'>{$finalLinkedCourseName['name']}</th>";
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