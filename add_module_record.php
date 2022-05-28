<?php include "./includes/db.php" ?>
<?php include "./includes/Module.php" ?>
<?php session_start(); ?>

<?php
    include "./includes/check_session_admin.php";
    Module::create();
?>

<?php include "./includes/header.php"; ?>

<main class="main-record">
    <?php include "./includes/sidebar.php" ?>
    <div class="main-content">
        <div class="table-container">
            <h1>Add Module</h1>
            <form class="record-form" action="add_module_record.php" method="post">
                <div class="form-group">
                    <label for="name">Name: </label>
                    <br>
                    <input type="text" name="name" required>
                </div>
                <input class="form-button" type="submit" name="submit" value="Create">
            </form>
        </div>
    </div>
</main>

<?php include "./includes/footer.php" ?>