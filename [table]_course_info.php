<?php
    session_start();
    include('server.php');
    include('errors.php');

    // Check if the instructor is logged in
    if (!isset($_SESSION['instructor_id'])) {
        header('location: index.php');
        exit();
    }

    $errors = array();

    // Check if the form has been submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $course_name = mysqli_real_escape_string($conn, $_POST['course_name']);
        $description = mysqli_real_escape_string($conn, $_POST['description']);
        $length = mysqli_real_escape_string($conn, $_POST['length']);
        $file_name = $_FILES['pdf_file']['name'];
        $file_tmp = $_FILES['pdf_file']['tmp_name'];
        $file_type = $_FILES['pdf_file']['type'];
        $file_size = $_FILES['pdf_file']['size'];

        $target_dir = "uploads/";
        $target_file = $target_dir . basename($file_name);

        // Get the instructor ID
        $instructor_id = $_SESSION['instructor_id'];

        if (empty($course_name)) {
            array_push($errors, "Course name is required");
        }

        if (empty($description)) {
            array_push($errors, "Description is required");
        }

        if (empty($length)) {
            array_push($errors, "Length is required");
        }

        if ($file_type !== 'application/pdf') {
            array_push($errors, "Only PDF files are allowed");
        }

        // If there are no errors, insert the data into the course_info table
        if (count($errors) == 0) {
            // Concatenate first_name and last_name to get full_name
            $instructor_query = "SELECT CONCAT(first_name, ' ', last_name) AS full_name FROM instructor_info WHERE instructor_id = '$instructor_id'";
            $instructor_result = mysqli_query($conn, $instructor_query);
            $instructor_row = mysqli_fetch_assoc($instructor_result);
            $instructor_name = $instructor_row['full_name'];

            $query = "INSERT INTO course_info (instructor_id, course_name, description, instructor, length) 
                      VALUES ('$instructor_id', '$course_name', '$description', '$instructor_name', '$length')";
            mysqli_query($conn, $query);

            // Get the generated course_id for the inserted course
            $course_id = mysqli_insert_id($conn);

            $url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
            $url = str_replace(basename($_SERVER['SCRIPT_NAME']), '', $url);
            $url .= "view_course.php?id=" . $course_id;

            // Update the course_info table with the generated URL
            $update_query = "UPDATE course_info SET url = '$url' WHERE course_id = $course_id";
            mysqli_query($conn, $update_query);

            // Process the uploaded PDF file
            if (!empty($file_name)) {
                move_uploaded_file($file_tmp, $target_file);
                $pdf_upload = $target_file;

                // Update the course_info table with the PDF upload path
                $pdf_update_query = "UPDATE course_info SET pdf_upload = '$pdf_upload' WHERE course_id = $course_id";
                mysqli_query($conn, $pdf_update_query);
            }

            $lessons = $_POST['lesson'];
            $video_links = $_POST['video_link'];

            // Insert into lesson table
            foreach ($lessons as $index => $lesson) {
                $video_link = mysqli_real_escape_string($conn, $video_links[$index]);

                $lesson_query = "INSERT INTO lesson (course_id, lesson_name, video_link) VALUES ('$course_id', '$lesson', '$video_link')";
                mysqli_query($conn, $lesson_query);
            }

            $_SESSION['success'] = "Course added successfully";
            header('location: course.php');
            exit();
        } else {
            // Display errors
            echo "<div class='error'>";
            foreach ($errors as $error) {
                echo "<p>$error</p>";
            }
            echo "</div>";
        }
    }

    mysqli_close($conn);
?>
