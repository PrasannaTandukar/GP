<?php include "../includes/db.php" ?>
<?php include "../includes/Diary.php" ?>
<?php session_start(); ?>

<?php
    include "../includes/check_session_student.php";
    $id = $_GET['id'];
    Diary::update();

    $value = Diary::getDiaryData($id);
    $result = mysqli_fetch_assoc($value);
?>

<?php include "./partials/header.php"; ?>

<main class="main-record">
    <?php include "./partials/sidebar.php" ?>
    <div class="main-content">
        <div class="table-container">
            <h1>Edit Diary</h1>
            <form class="record-form" action="edit_diary.php" method="post">
                <div class="form-group">
                    <label for="title">Title: </label>
                    <br>
                    <input type="text" name="title" value="<?php echo $result['title']; ?>" required>
                    <br>
                    <label for="content">Content: </label>
                    <br>
                    <textarea type="text" name="content" cols="50" rows="25" style="padding: 8px;" required><?php echo $result['content']; ?></textarea>
                </div>
                    <!-- Send user id anonymously -->
                    <input type="text" name="id" value="<?php echo $id ?>" hidden>
                <input class="form-button" type="submit" name="submit" value="Update">
            </form>
        </div>
    </div>
</main>

<?php include "../includes/footer.php" ?>