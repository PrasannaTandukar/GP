<?php session_start(); ?>

<?php
    include "../includes/check_session_admin.php"
?>

<?php
    include "../includes/db.php";
    include "../includes/Student.php";

    // Stores rows of data fetched from student table
    $result = Student::readStudent();

    Student::deleteStudent();
?>

<?php include "../includes/header.php"; ?>

<main class="main-record">
    <?php include "../includes/sidebar.php" ?>
    <div class="main-content">
        <div class="table-container">
            <div class="top-table">
                <h1>Student</h1>
                <a href="./add_student.php">Add New</a>
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
                    <th>Delete</th>
                    <th>Edit</th>
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
                        <th><a href="./records_management.php?id=<?php echo $row['id']; ?>"><img class="svg" src="../icons/delete_FILL0_wght400_GRAD0_opsz48.svg" alt="#"></a></a></th>
                        <th><a href="./edit_student.php?id=<?php echo $row['id'] ?>"><img class="svg" src="../icons/edit_FILL0_wght400_GRAD0_opsz48.svg" alt="#"></a></a></th>
                        </tr>
                        <?php
                    }
                ?>
            </table>
        </div>
    </div>
</main>

<?php include "../includes/footer.php" ?>