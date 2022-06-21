<?php include "../includes/db.php" ?>
<?php include "../includes/Assignment.php" ?>
<?php session_start(); ?>

<?php
    include "../includes/check_session_admin.php";
    $id = $_GET['id'];
    Assignment::update();

    $values = Assignment::getDataFromID($id);
    $result = mysqli_fetch_assoc($values);
?>

<?php include "../includes/header.php" ?>

<main class="main-record">
    <?php include "../includes/sidebar.php" ?>
    <div class="main-content">
        <div class="table-container">
            <h1>Edit Assignment</h1>
            <form class="record-form" action="edit_assignment_record.php" method="post">
                <div class="form-group">
                    <label for="name">Name: </label>
                    <br>
                    <input type="text" name="name" value="<?php echo $result['name']; ?>" required>
                    <br>
                    <label for="start-date">Start Date: </label>
                    <br>
                    <input type="date" name="start-date" value="<?php echo $result['start_date']; ?>" required>
                    <br>
                    <label for="end-date">End Date: </label>
                    <br>
                    <input type="date" name="end-date"  value="<?php echo $result['end_date']; ?>" required>
                </div>
                    <!-- Send user id anonymously -->
                    <input type="text" name="id" value="<?php echo $id ?>" hidden>
                <input class="form-button" type="submit" name="submit" value="Update">
            </form>
        </div>
    </div>
</main>

<?php include "../includes/footer.php" ?>