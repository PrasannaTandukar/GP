<?php include "../includes/db.php" ?>
<?php include "../includes/Assignment.php" ?>
<?php include "../includes/Module.php" ?>
<?php session_start(); ?>

<?php
    include "../includes/check_session_admin.php";
    Assignment::create();

    $modules = Module::getAllId();
?>

<?php include "../includes/header.php"; ?>

<main class="main-record">
    <?php include "../includes/sidebar.php" ?>
    <div class="main-content">
        <div class="table-container">
            <h1>Add Assignment</h1>
            <form class="record-form" action="add_assignment_record.php" method="post">
                <div class="form-group">
                    <label for="name">Name: </label>
                    <br>
                    <input type="text" name="name" required>
                </div>
                <div class="form-group">
                    <label for="start-date">Start Date: </label>
                    <br>
                    <input type="date" name="start-date" required>
                </div>
                <div class="form-group">
                    <label for="end-date">End Date: </label>
                    <br>
                    <input type="date" name="end-date" required>
                </div>
                <div class="form-group">
                    <label for="module-id">Module Name: </label>
                    <br>
                    <select name="module-id">
                        <!-- Code to insert each row fetched from course table -->
                        <?php
                            while($row = mysqli_fetch_assoc($modules)) {
                                ?>
                                <tr>
                                <?php
                                foreach ($row as $value) {
                                    $data = Module::getNameFromID($value);
                                    $finalData = mysqli_fetch_assoc($data);
                                    echo "<option value='{$value}'>{$finalData['name']}</option>";
                                }
                                ?>
                                <?php
                            }
                        ?>
                    </select>
                </div>
                <input class="form-button" type="submit" name="submit" value="Create">
            </form>
        </div>
    </div>
</main>

<?php include "../includes/footer.php" ?>