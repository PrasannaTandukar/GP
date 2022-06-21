<?php include "../includes/db.php" ?>
<?php include "../includes/Course.php" ?>
<?php session_start(); ?>

<?php
    include "../includes/check_session_admin.php";
    $id = $_GET['id'];
    Course::update();

    $name = Course::getNameFromID($id);
    $result = mysqli_fetch_assoc($name);
?>

<?php include "../includes/header.php" ?>

<main class="main-record">
    <?php include "../includes/sidebar.php" ?>
    <div class="main-content">
        <div class="table-container">
            <h1>Edit Course</h1>
            <form class="record-form" action="edit_course_record.php" method="post">
                <div class="form-group">
                    <label for="name">Name: </label>
                    <br>
                    <input type="text" name="name" value="<?php echo $result['name']; ?>" required>
                </div>
                    <!-- Send user id anonymously -->
                    <input type="text" name="id" value="<?php echo $id ?>" hidden>
                <input class="form-button" type="submit" name="submit" value="Update">
            </form>
        </div>
    </div>
</main>

<?php include "../includes/footer.php" ?>