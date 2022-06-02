<?php include "../includes/db.php" ?>
<?php include "../includes/Course_Module.php" ?>
<?php include "../includes/Module.php" ?>
<?php session_start(); ?>

<?php
    include "../includes/check_session_admin.php";

    $modules = Module::getAllId();

    $id = $_GET['id'];
    CourseModule::update($id);
?>

<?php include "../includes/header.php"; ?>

<main class="main-record">
    <?php include "../includes/sidebar.php" ?>
    <div class="main-content">
        <div class="table-container">
            <h1>Add Modules for Course</h1>
            <form class="record-form" action="add_c_m.php" method="post">
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
                <!-- Send user id anonymously -->
                <input type="text" name="id" value="<?php echo $id ?>" hidden>
                <input class="form-button" type="submit" name="submit" value="Update">
            </form>
        </div>
    </div>
</main>

<?php include "../includes/footer.php" ?>