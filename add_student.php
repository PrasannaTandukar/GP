<?php session_start(); ?>

<?php
    if (isset($_SESSION['role'])) {

    }

    if ($_SESSION['role'] !== 'admin') {
        header("Location: ./index.php");
    }
?>

<?php include "./includes/header.php"; ?>

<main class="main-record">
    <?php include "./includes/sidebar.php" ?>
    <div class="main-content">
        <div class="table-container">
            <h1>Add Student</h1>
            <form class="record-form" action="" method="post">
                <div class="form-group">
                    <label for="firstname">First name: </label>
                    <br>
                    <input type="text" name="firstname" required>
                </div>
                <div class="form-group">
                    <label for="lastname">Last name: </label>
                    <br>
                    <input type="text" name="lastname" required>
                </div>
                <div class="form-group">
                    <label for="gender">Gender:</label>
                    <br>
                    <select name="gender">
                        <option value="M">M</option>
                        <option value="F">F</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="contact">Contact: </label>
                    <br>
                    <input type="text" name="contact" required>
                </div>
                <div class="form-group">
                    <label for="email">Email: </label>
                    <br>
                    <input type="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="country">Country: </label>
                    <br>
                    <input type="text" name="country" required>
                </div>
                <div class="form-group">
                    <label for="city">City: </label>
                    <br>
                    <input type="text" name="city" required>
                </div>
                <div class="form-group">
                    <label for="date-of-birth">Date of birth: </label>
                    <br>
                    <input type="date" name="date-of-birth" required>
                </div>
                <input class="form-button" type="submit" name="submit" value="Create">
            </form>
        </div>
    </div>
</main>

<?php include "./includes/footer.php" ?>