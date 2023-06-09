<?php
    session_start();
    
    // Check if the instructor is logged in
    if (!isset($_SESSION['instructor_id'])) {
        header('location: index.php');
        exit();
    }
    
    // Get the instructor ID from the logged-in session
    $instructor_id = $_SESSION['instructor_id'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Course Management</title>
</head>
<body>
    <button onclick="location.href = 'add_course.php';">Add Course</button>
    <button onclick="location.href = 'add_quiz.php';">Add Question</button>
    <button onclick="location.href = '[table]_payment.php';">Add Question</button>
    <h1>Instructor ID: <?php echo $instructor_id; ?></h1>
</body>
</html>
