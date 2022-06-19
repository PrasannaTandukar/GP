<?php session_start(); ?>

<?php
    include "../includes/check_session_student.php";
    include "../includes/db.php";
    include "../includes/Diary.php";
?>

<?php
    $result = Diary::read($_SESSION['username']);
    Diary::delete();
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
                    <th>Date Posted</th>
                    <th>Delete</th>
                    <th>Edit</th>
                    <th>View</th>
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
                        <th><a href="./student_diary.php?id=<?php echo $row['id']; ?>"><img class="svg" src="../icons/delete_FILL0_wght400_GRAD0_opsz48.svg" alt="#"></a></th>
                        <th><a href="./edit_diary.php?id=<?php echo $row['id'] ?>"><img class="svg" src="../icons/edit_FILL0_wght400_GRAD0_opsz48.svg" alt="#"></a></th>
                        <th><a href="./view_diary.php?id=<?php echo $row['id'] ?>" style="color: black;"><img class="svg" src="../icons/visibility_FILL0_wght400_GRAD0_opsz48.svg" alt="#"></a></th>
                        </tr>
                        <?php
                    }
                ?>
            </table>
        </div>
    </div>
</main>


<?php include "../includes/footer.php" ?>