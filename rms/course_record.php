<?php session_start(); ?>

<?php
    include "../includes/check_session_admin.php"
?>

<?php
    include "../includes/db.php";
    include "../includes/Course.php";

    // Stores rows of data fetched from student table
    $result = Course::read();

    Course::delete();
?>

<?php include "../includes/header.php"; ?>

<main class="main-record">
    <?php include "../includes/sidebar.php" ?>
    <div class="main-content">
        <div class="table-container">
            <div class="top-table">
                <h1>Course</h1>
                <a href="./add_course_record.php">Add New</a>
            </div>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Delete</th>
                    <th>Edit</th>
                    <th>Add Module</th>
                    <th>View Students</th>
                    <th>View Modules</th>
                </tr>
                <!-- Code to insert each row fetched from course table -->
                <?php
                    while($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                        <?php
                        foreach ($row as $value) {
                            echo "<th style='font-weight: normal;'>{$value}</th>";
                        }
                        ?>
                        <th><a href="./course_record.php?id=<?php echo $row['id']; ?>"><span class="material-symbols-outlined" style="color: black;">delete</span></a></th>
                        <th><a href="./edit_course_record.php?id=<?php echo $row['id'] ?>"><span class="material-symbols-outlined" style="color: black;">edit</span></a></th>
                        <th><a href="./add_c_m.php?id=<?php echo $row['id'] ?>"><span class="material-symbols-outlined" style="color: black;">add</span></a></th>
                        <th><a href="./enrolled_student.php?id=<?php echo $row['id'] ?>" style="color: black;"><span class="material-symbols-outlined">visibility</span></a></th>
                        <th><a href="./added_module.php?id=<?php echo $row['id'] ?>" style="color: black;"><span class="material-symbols-outlined">visibility</span></a></th>
                        </tr>
                        <?php
                    }
                ?>
            </table>
        </div>
    </div>
</main>

<?php include "../includes/footer.php" ?>