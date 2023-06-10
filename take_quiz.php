<head>
    <link rel="stylesheet" href="style.css">
    <script>
        function validateForm() {
            var radios = document.getElementsByName('answer[]');
            var isValid = true;

            for (var i = 0; i < radios.length; i++) {
                if (!radios[i].checked) {
                    isValid = false;
                    break;
                }
            }

            if (!isValid) {
                alert("Please select an answer for each question.");
            }

            return isValid;
        }
    </script>
</head>

<body>
    <div class='header'>
        <a href='course.php' style='text-align: left; color: white; font-size: 120%;'>
            <p>Back</p>
        </a>
    </div>
</body>

<?php
include('server.php');
session_start();

if (isset($_SESSION['student_id'])) { // If it's a student
    $student_id = $_SESSION['student_id'];
    $student_id = mysqli_real_escape_string($conn, $student_id);

    $query = "SELECT * FROM payment WHERE student_id = '$student_id' AND payment_status = 'Paid'";
    $result = mysqli_query($conn, $query);

    if (mysqli_num_rows($result) == 0) { // If payment hasn't been made yet
        header('location: payment_plan.php');
        exit();
    }
}

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $score = 0;
    $allQuestionsAnswered = true;


    // Loop through each question in the form
    foreach ($_POST['question'] as $questionId => $questionNumber) {
        if (isset($_POST['answer'][$questionNumber])) {
            $selectedAnswer = (int)$_POST['answer'][$questionNumber]; // Convert selected answer to an integer

            // Retrieve the correct answer from the database
            $sql = "SELECT correct_answer FROM quiz_question WHERE question_id = '$questionId'";
            $correctAnswerResult = $conn->query($sql);
            $correctAnswerRow = $correctAnswerResult->fetch_assoc();
            $correctAnswer = $correctAnswerRow['correct_answer'];

            // ================ Used for debugging ==================
                // echo "<p style='text-align: center;'>";
                // echo "<b>Question Id: </b>";
                // var_dump($questionId);
                // echo "<b>Question Number: </b>";
                // var_dump($questionNumber);
                // echo "<b>Selected Answer: </b>";
                // var_dump($selectedAnswer);
                // echo "<b>Correct Answer: </b>";
                // var_dump($correctAnswer);
                // echo "<br></br> </p>";
            // ======================================================

            // Check if the selected answer matches the correct answer
            if ($selectedAnswer == $correctAnswer) {
                $score++;
            }
        } else {
            $allQuestionsAnswered = false;
        }
    }

     // Display the score if all questions were answered
     if ($allQuestionsAnswered) {
        echo "<div class='input-form' style='text-align: center; margin-top: 4%' font-size: 200%;>";
        echo "<h3>Your Score: $score/10</h3>";
        echo "</div>";
    } else {
        echo "<div class='input-form' style='text-align: center; margin-top: 4%' font-size: 200%;>";
        echo "<h3>Please answer all questions before submitting.</h3>";
        echo "</div>";
    }
    $conn->close();

} else {
    if (!isset($_GET['course_id'])) {
        echo "Course ID not found in the URL.";
        exit();
    }

    $courseId = $_GET['course_id'];

    // Retrieve the quiz questions for the specific course from the database
    $sql = "SELECT * FROM quiz_question WHERE course_id = '$courseId'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Display the quiz
        echo "<form method='post' action='".$_SERVER["PHP_SELF"]."?course_id=".$courseId."' onsubmit='return validateForm();'>";
        echo "<input type='hidden' name='course_id' value='$courseId'>"; // Hidden field to include the course ID
        $questionNumber = 1; // Counter variable for question number
        while ($row = $result->fetch_assoc()) {
            $questionId = $row['question_id'];
            $question = $row['question'];
            echo "<p>Question $questionNumber: $question</p>";
            echo "<input type='hidden' name='question[$questionId]' value='$questionNumber'>";

            // Retrieve the answers for the question from the quiz_answers table
            $sql = "SELECT answer FROM quiz_answers WHERE question_id = '$questionId'";
            $answersResult = $conn->query($sql);
            $answers = array();
            while ($answerRow = $answersResult->fetch_assoc()) {
                $answers[] = $answerRow['answer'];
            }

            // Display the answers as radio buttons with numeric values
            $answerNumber = 1; // Counter variable for answer number
            foreach ($answers as $answer) {
                echo "<input type='radio' name='answer[$questionNumber]' value='$answerNumber'> $answer<br>";
                $answerNumber++;
            }

            echo "<br>";
            $questionNumber++;
        }
        echo "<input type='submit' value='Submit'>";
        echo "</form>";
    } else {
        echo "No quiz questions found for the selected course.";
    }
}
?>
