<?php include "./includes/db.php" ?>
<?php include "./includes/Module.php" ?>
<?php session_start(); ?>

<?php
    include "./includes/check_session_admin.php";
    $id = $_GET['id'];
    Module::update();
?>

<?php include "./includes/header.php" ?>

<main class="main-record">
    <?php include "./includes/sidebar.php" ?>
    <div class="main-content">
        <div class="table-container">
            <h1>Edit Module</h1>
            <form class="record-form" action="edit_module_record.php" method="post">
                <div class="form-group">
                    <label for="name">Name: </label>
                    <br>
                    <input type="text" name="name" required>
                </div>
                    <!-- Send user id anonymously -->
                    <input type="text" name="id" value="<?php echo $id ?>" hidden>
                <input class="form-button" type="submit" name="submit" value="Update">
            </form>
        </div>
    </div>
</main>

<?php include "./includes/footer.php" ?>