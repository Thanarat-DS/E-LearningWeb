<?php 
    session_start();
    include('server.php');

    $errors = array();

    if (isset($_POST['login_user'])) {
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        if (empty($email)) {
            array_push($errors, "Email is required");
        }

        if (empty($password)) {
            array_push($errors, "password is required");
        }

        if (count($errors) == 0) {
            $query = "SELECT * FROM student_info WHERE email = '$email'";
            $result = mysqli_query($conn, $query);

            if (mysqli_num_rows($result) == 1) {
                $row = mysqli_fetch_assoc($result); // Fetch the row from the result
                if (password_verify($password, $row['password'])) {
                    $_SESSION['student_id'] = $row['student_id'];
                    $_SESSION['success'] = "You are now logged in";
                    header('location: index.php');
                } else {
                    array_push($errors, "Wrong username/password combination");
                }
            } else {
                $query = "SELECT * FROM instructor_info WHERE email = '$email'";
                $result = mysqli_query($conn, $query);

                if (mysqli_num_rows($result) == 1) {
                    $row = mysqli_fetch_assoc($result); // Fetch the row from the result
                    if (password_verify($password, $row['password'])) {
                        $_SESSION['instructor_id'] = $row['instructor_id'];
                        $_SESSION['success'] = "You are now logged in";
                        header('location: index.php');
                    } else {
                        array_push($errors, "Wrong username/password combination");
                    }
                } else {
                    array_push($errors, "Wrong username/password combination");
                }
            }
        }

        if (!empty($errors)) {
            $_SESSION['error'] = "Wrong username or password. Please try again!";
            header('location: login.php');
        }
    } 
?>
