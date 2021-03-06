<?php session_start(); ?>

<?php
    include "../includes/check_session_admin.php"
?>

<?php
    include "../includes/db.php";
    include "../includes/Assignment.php";

    // Stores rows of data fetched from student table
    $result = Assignment::read();

    Assignment::delete();
?>

<?php include "../includes/header.php"; ?>

<main class="main-record">
    <?php include "../includes/sidebar.php" ?>
    <div class="main-content">
        <div class="table-container">
            <div class="top-table">
                <h1>Assignment</h1>
                <a href="./add_assignment_record.php">Add New</a>
            </div>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Module ID</th>
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
                        <th><a href="./assignment_record.php?id=<?php echo $row['id']; ?>"><img class="svg" src="../icons/delete_FILL0_wght400_GRAD0_opsz48.svg" alt="#"></a></th>
                        <th><a href="./edit_assignment_record.php?id=<?php echo $row['id'] ?>"><img class="svg" src="../icons/edit_FILL0_wght400_GRAD0_opsz48.svg" alt="#"></a></a></th>
                        </tr>
                        <?php
                    }
                ?>
            </table>
        </div>
    </div>
</main>

<?php include "../includes/footer.php" ?>