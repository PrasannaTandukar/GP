<?php include "../includes/db.php" ?>
<?php include "../includes/Student.php" ?>
<?php session_start(); ?>

<?php
    include "../includes/check_session_admin.php";
    $id = $_GET['id'];
    Student::updateStudent();

    $singleStudent = Student::getSingleStudent($id);
    $finalValue = mysqli_fetch_assoc($singleStudent);

    $firstName = $finalValue['firstname'];
    $lastName = $finalValue['lastname'];
    $gender = $finalValue['gender'];
    $contact = $finalValue['contact'];
    $email = $finalValue['email'];
    $country = $finalValue['country'];
    $city = $finalValue['city'];
    $dateOfBith = $finalValue['date_of_birth'];
?>

<?php include "../includes/header.php" ?>

<main class="main-record">
    <?php include "../includes/sidebar.php" ?>
    <div class="main-content">
        <div class="table-container">
            <h1>Edit Student</h1>
            <form class="record-form" action="edit_student.php" method="post">
                <div class="form-group">
                    <label for="firstname">First name: </label>
                    <br>
                    <input type="text" name="firstname" value="<?php echo $firstName; ?>" required>
                </div>
                <div class="form-group">
                    <label for="lastname">Last name: </label>
                    <br>
                    <input type="text" name="lastname" value="<?php echo $lastName; ?>" required>
                </div>
                <div class="form-group">
                    <label for="gender">Gender:</label>
                    <br>
                    <select name="gender" value="<?php echo $gender; ?>">
                        <option value="M" <?php echo ($gender == "M") ? "selected" : "" ?>>M</option>
                        <option value="F" <?php echo ($gender == "F") ? "selected" : "" ?>>F</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="contact">Contact: </label>
                    <br>
                    <input type="number" name="contact" value="<?php echo $contact; ?>" required>
                </div>
                <div class="form-group">
                    <label for="email">Email: </label>
                    <br>
                    <input type="email" name="email" value="<?php echo $email; ?>" required>
                </div>
                <div class="form-group">
                    <label for="country">Country: </label>
                    <br>
                    <input type="text" name="country" value="<?php echo $country; ?>" required>
                </div>
                <div class="form-group">
                    <label for="city">City: </label>
                    <br>
                    <input type="text" name="city" value="<?php echo $city; ?>" required>
                </div>
                <div class="form-group">
                    <label for="date-of-birth">Date of birth: </label>
                    <br>
                    <input type="date" name="date-of-birth" value="<?php echo $dateOfBith; ?>" required>
                </div>
                    <!-- Send user id anonymously -->
                    <input type="text" name="id" value="<?php echo $id ?>" hidden>
                <input class="form-button" type="submit" name="submit" value="Update">
            </form>
        </div>
    </div>
</main>

<?php include "../includes/footer.php" ?>