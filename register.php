<?php
    session_start();
    include('server.php');
    $errors = array();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page</title>

    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="header">
        <h2>Register</h2>
    </div>

    <form action = "[table]_student_instrutor_info.php" method = "post">
        <?php include('errors.php'); ?>
        <?php if(isset($_SESSION['errors']) && count($_SESSION['errors']) > 0): ?>
            <div class="error">
                <h3>
                    <?php foreach ($_SESSION['errors'] as $error): ?>
                        <p><?php echo $error; ?></p>
                    <?php endforeach; ?>
                    <?php unset($_SESSION['errors']); ?>
                </h3>
            </div>
        <?php endif; ?>

        <div class = "input-group">
            <label for = "email">Email</label>
            <input type = "email" name = "email" required>
        </div>
        <div class = "input-group">
            <label for = "password_1">Password</label>
            <input type = "password" name = "password_1" required>
        </div>
        <div class = "input-group">
            <label for = "password_2">Comfirm Password</label>
            <input type = "password" name = "password_2" required>
        </div>
        <div class = "input-group">
            <label for = "first_name">First Name</label>
            <input type = "text" name = "first_name" required>
        </div>
        <div class = "input-group">
            <label for = "last_name">Last Name</label>
            <input type = "text" name = "last_name" required>
        </div>
        <div class = "input-group">
            <label for = "phone">Phone</label>
            <input type = "tel" name = "phone" required>
        </div>
        <div class = "input-group">
            <label for="role">Role</label>
            <select name="role" required>
                <option value="student">Student</option>
                <option value="instructor">Instructor</option>
            </select>
        </div>
        <div class = "input-group">
            <button type = "submit" name = "reg_user" class = "btn">Register</button>
        </div>
        <p>Already a member? <a href="login.php">Sign in</a> </p>
    </form>

    <!-- <?php
    // Display validation errors, if any
    if (count($errors) > 0) {
        echo "<div class='error'>";
        foreach ($errors as $error) {
            echo "<p>$error</p>";
        }
        echo "</div>";
    }
    ?> -->

</body>
</html>