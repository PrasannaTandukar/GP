<?php session_start(); ?>

<?php
    include "../includes/check_session_student.php";
    include "../includes/db.php";
    include "../includes/Diary.php";
?>

<?php
    $result = Diary::expandDiary();
    $row = mysqli_fetch_assoc($result)
?>

<?php include "./partials/header.php"; ?>

<main class="main-record">
    <?php include "./partials/sidebar.php" ?>
    <div class="main-content">
        <div class="table-container">
            <div class="top-table">
                <?php
                    echo "<h1>{$row['title']}</h1>";
                ?>
                
                <?php
                ?>
            </div>  
            <?php
                echo "<p>{$row['content']}</p>";
            ?>
        </div>
    </div>
</main>


<?php include "../includes/footer.php" ?>