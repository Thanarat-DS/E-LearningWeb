<?php
session_start();
include('server.php');
$courseId = $_GET['course_id'];
$courseId = mysqli_real_escape_string($conn, $courseId);

if (isset($_POST['submit'])) {
    $question = mysqli_real_escape_string($conn, $_POST['question']);
    $option1 = mysqli_real_escape_string($conn, $_POST['option1']);
    $option2 = mysqli_real_escape_string($conn, $_POST['option2']);
    $option3 = mysqli_real_escape_string($conn, $_POST['option3']);
    $option4 = mysqli_real_escape_string($conn, $_POST['option4']);
    $correct_answer = (int)$_POST['correct_answer'];

    // Insert the question into the quiz_question table
    $insertQuestionQuery = "INSERT INTO quiz_question (question, correct_answer, course_id) VALUES ('$question', $correct_answer, $courseId)";

    if (mysqli_query($conn, $insertQuestionQuery)) {
        $questionId = mysqli_insert_id($conn);

        // Insert the quiz results into the quiz_result table
        $answers = array($option1, $option2, $option3, $option4);
        foreach ($answers as $index => $answer) {
            $isCorrect = ($correct_answer === $index + 1) ? 1 : 0;
            $insertResultQuery = "INSERT INTO quiz_answers (question_id, answer, is_correct) VALUES ($questionId, '$answer', $isCorrect)";
            mysqli_query($conn, $insertResultQuery);
        }

        echo "Question and quiz results added successfully";
    } else {
        echo "Error adding question: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
<head>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="header">
        <a href="course.php" style="text-align: left; color: white; font-size: 120%;">
            <p>Back</p>
        </a>
    </div>
    <div class="input-group" style="margin-top: 0px;">
        <form method="post">
            <label for="question">Question:</label>
            <input type="text" name="question" id="question" required>
            <br>
            <label for="option1">Option 1:</label>
            <input type="text" name="option1" id="option1" required>
            <br>
            <label for="option2">Option 2:</label>
            <input type="text" name="option2" id="option2" required>
            <br>
            <label for="option3">Option 3:</label>
            <input type="text" name="option3" id="option3" required>
            <br>
            <label for="option4">Option 4:</label>
            <input type="text" name="option4" id="option4" required>
            <br>
            <label for="correct_answer">Correct answer:</label>
            <select name="correct_answer" id="correct_answer" required>
                <option value="1">Option 1</option>
                <option value="2">Option 2</option>
                <option value="3">Option 3</option>
                <option value="4">Option 4</option>
            </select>
            <br>
            <input class="input-group" type="submit" name="submit" value="Add question">
        </form>
    </div>
</body>
