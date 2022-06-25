<?php include "../includes/db.php" ?>
<?php session_start(); ?>
<?php
    $directory = "uploads/";
    $target_file = $directory . basename($_FILES["fileUpload"]["name"]);
    $status = 1;
    $type = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    if (isset($_POST["submit"])) {
        $status = 1;

        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $status = 0;
        }

        // Check file size
        if ($_FILES["fileUpload"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            $status = 0;
        }

        // // Allow certain file formats
        if($type != "doc" && $type != "docx" && $type != "odt") {
            echo "Sorry, only DOC, DOCX, ODT files are allowed.";
            $status = 0;
        }

        // Check if $status is set to 0 by an error
        if ($status == 0) {
            echo "Sorry, your file was not uploaded.";
        // if everything is ok, try to upload file
        } else {
            move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $target_file);
        }
    }

?>

<?php
    include "../includes/check_session_student.php";
?>

<?php include "./partials/header.php"; ?>

<main class="main-record">
    <?php include "./partials/sidebar.php" ?>
    <div class="main-content">
        <div class="table-container">
            <h1>Add Assignment</h1>
            <form class="record-form" action="assignment_upload.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    Select file to upload:
                    <input type="file" name="fileUpload">
                    <br>
                    <input class="form-button" type="submit" name="submit" value="Upload">
            </form>
        </div>
    </div>
</main>

<?php include "../includes/footer.php" ?>