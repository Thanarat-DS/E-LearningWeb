<?php
    session_start();
    include('server.php');

    $errors = array();

    // Check if the form has been submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Get the form data
        $first_name = mysqli_real_escape_string($conn, $_POST['first_name']);
        $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password_1 = mysqli_real_escape_string($conn, $_POST['password_1']);
        $password_2 = mysqli_real_escape_string($conn, $_POST['password_2']);
        $phone = mysqli_real_escape_string($conn, $_POST['phone']);
        $role = mysqli_real_escape_string($conn, $_POST['role']);

        // Validate the form data
        if (empty($first_name)) {
            array_push($errors, "First name is required");
        }

        if (empty($last_name)) {
            array_push($errors, "Last name is required");
        }

        if (empty($email)) {
            array_push($errors, "Email is required");
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            array_push($errors, "Email is invalid");
        } else {
            // Check if email already exists in the database
            $query = "SELECT email FROM student_info WHERE email='$email' UNION SELECT email FROM instructor_info WHERE email='$email'";
            $result = mysqli_query($conn, $query);
            if (mysqli_num_rows($result) > 0) {
                array_push($errors, "Email already exists");
            }
        }

        if (empty($password_1)) {
            array_push($errors, "Password is required");
        }

        if ($password_1 != $password_2) {
            array_push($errors, "The two passwords do not match");
        }

        if (empty($phone)) {
            array_push($errors, "Phone number is required");
        }

        if (count($errors) == 0) {
            $password = password_hash($password_1, PASSWORD_BCRYPT);
            if ($role == 'student') {
                $query = "INSERT INTO student_info (first_name, last_name, email, password, phone) 
                          VALUES ('$first_name', '$last_name', '$email', '$password', '$phone')";
        
                $result = mysqli_query($conn, $query);
                if (!$result) {
                    array_push($errors, "Database error: " . mysqli_error($conn));
                } else {
                    $student_id = mysqli_insert_id($conn);
                    $_SESSION['student_id'] = $student_id;
                }

            } elseif ($role == 'instructor') {
                $query = "INSERT INTO instructor_info (first_name, last_name, email, password, phone) 
                          VALUES ('$first_name', '$last_name', '$email', '$password', '$phone')";
                          
                $result = mysqli_query($conn, $query);
                if (!$result) {
                    array_push($errors, "Database error: " . mysqli_error($conn));
                } else {
                    $instructor_id = mysqli_insert_id($conn);
                    $_SESSION['instructor_id'] = $instructor_id;
                }
            }
            
            // Check if the query successfully
            if (count($errors) == 0) {
                // Set success session
                $_SESSION['success'] = "You are now logged in";
                header('location: index.php');
                exit();
            }
        } else {
            // Set errors session
            $_SESSION['errors'] = $errors;
            $_SESSION['form_data'] = $_POST;
            header('location: register.php');
            exit();
        }
    }
    mysqli_close($conn);
?>
