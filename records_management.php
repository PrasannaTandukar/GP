<?php session_start(); ?>

<?php
    include "./includes/check_session_admin.php"
?>

<?php
    include "./includes/db.php";
    include "./includes/functions.php";

    // Stores rows of data fetched from student table
    $result = readStudent();

    deleteStudent();
?>

<?php include "./includes/header.php"; ?>

<main class="main-record">
    <?php include "./includes/sidebar.php" ?>
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
                        <th><a href="./records_management.php?id=<?php echo $row['id']; ?>"><span class="material-symbols-outlined" style="color: black;">delete</span></a></th>
                        <th><a href="#"><span class="material-symbols-outlined" style="color: black;">edit</span></a></th>
                        </tr>
                        <?php
                    }
                ?>
            </table>
        </div>
    </div>
</main>

<?php include "./includes/footer.php" ?>