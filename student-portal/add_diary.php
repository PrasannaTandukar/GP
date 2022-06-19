<?php include "../includes/db.php" ?>
<?php include "../includes/Diary.php" ?>
<?php session_start(); ?>

<?php
    include "../includes/check_session_student.php";
    Diary::create();
?>

<?php include "../includes/header.php"; ?>

<main class="main-record">
    <?php include "../includes/sidebar.php" ?>
    <div class="main-content">
        <div class="table-container">
            <h1>Add Diary</h1>
            <form class="record-form" action="add_diary.php" method="post">
                <div class="form-group">
                    <label for="title">Title: </label>
                    <br>
                    <input type="text" name="title" required>
                    <br>
                    <label for="content">Content: </label>
                    <br>
                    <textarea type="text" name="content" cols="40" rows="8" style="padding: 8px;" required></textarea>
                </div>
                <input class="form-button" type="submit" name="submit" value="Create">
            </form>
        </div>
    </div>
</main>

<?php include "../includes/footer.php" ?>