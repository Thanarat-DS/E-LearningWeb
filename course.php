<?php
session_start();
include('server.php');

if (!isset($_SESSION['first_name']) && !isset($_SESSION['success'])) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}

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

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['first_name']);
    header('location: login.php');
}

$sql = "SELECT * FROM course_info";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="homeheader">
        <h2>Home Page</h2>
    </div>

    <div class="topnav">
        <!-- Menu Tab -->
        <a href="index.php">Home</a>
        <a class="active" href="#course">Course</a>
        <a href="article.php">Article</a>
        <a href="instructor.php">Instructor</a>
        <p><a href="index.php?logout='1'" style="color: red;">Logout</a></p>
    </div>


    <div class="course-container">
        <?php
        // if the instructor is logged in then show my course menu
        if (isset($_SESSION['instructor_id'])) {
          echo "<div class='course-link'>";
          echo "<a href='my_course.php' class='course-link'>My Courses</a>";
          echo "</div>";
          echo "<div class='course-link3'>";
          echo "<a href='add_course.php' class='course-link3'>Add Course</a>";
          echo "</div>";
          } else {
              echo "<br></br>";
          }
          
        // Check if there are any results
        if ($result->num_rows > 0) {
            echo "<h2>All Courses</h2>";

            echo "<div class='course-container'>";
            while ($row = $result->fetch_assoc()) { // Loop the results and output each course
                $courseId = $row["course_id"];
                $courseUrl = "view_course.php?course_id=" . $row["course_id"];
                $edit_link = "view_course.php?course_id=" . $row["course_id"];

                echo "<div class='green_card'>";
                echo "<a href='$courseUrl' class='course-link2'>";
                echo "<h3>" . $row["course_name"] . "</h3>";
                echo "<br></br>";
                echo "<div class='green_card__body'>";
                echo "<p><strong>Description:</strong> " . $row["description"] . "</p>";
                echo "<p><strong>Instructor:</strong> " . $row["instructor"] . "</p>";
                echo "<p><strong>Length:</strong> " . $row["length"] . " hours</p>";
                echo "<p><strong>Created At:</strong> " . $row["created_at"] . "</p>";
                echo "</div>";
                echo "</div>";
                echo "</a>";
            }
            echo "</div>";
        } else {
            echo "<h2>My Courses</h2>";
            echo "<div class='course-link'>";
            echo "<a href='course.php' class='course-link'>All Courses</a>";
            echo "</div>";
            echo "<div class='course-container'>";
            echo "<br></br><br></br>No courses found.";
        }
        $conn->close();
        ?>
    </div>
</body>

</html>

<style>
.course-container {
  display: flex;
  flex-wrap: wrap;
  left: 10%;
  margin-left: 60px;
  margin-top: 60px;
}
.course-container h2 {
  font-size: 50px;
}
.course-box {
  border: 1px solid #ccc;
  padding: 10px;
  margin: 10px;
  width: 300px;
  background-color: #f9f9f9;
  margin-top: 50px;
}

.course-link {
  font-size: 40px;
  position: absolute;
  right: 10%;
  white-space: nowrap;
}

.course-link2 {
  text-decoration: none;
  color: black;
}

.course-link3 {
  font-size: 40px;
  position: absolute;
  right: 25%;
  white-space: nowrap;
}

.green_card {
  --bg: #f7f7f8;
  --hover-bg: #04AA6D;
  --hover-text: #E50087;
  max-width: 23ch;
  text-align: left;
  background: var(--bg);
  padding: 1.5em;
  padding-block: 1.8em;
  border: 2px solid #777;
  border-radius: 5px;
  margin-right: 40px;
  margin-bottom: 40px;
  left: 40px;
  position: relative;
  overflow: hidden;
  transition: .3s cubic-bezier(.6,.4,0,1),transform .15s ease;
  display: flex;
  flex-direction: column;
  align-items: center;
  gap: 1em;
  box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px 0px,
    rgba(0, 0, 0, 0.5) 0px 2px 6px 0px;
}

.green_card__body {
  line-height: 1.4em;
  font-size: 1em;
  opacity: 0.75;
}

.green_card > :not(span) {
  transition: .3s cubic-bezier(.6,.4,0,1);
}

.green_card > strong {
  display: block;
  font-size: 1.4rem;
  letter-spacing: -.035em;
}

.green_card span {
  position: absolute;
  inset: 0;
  width: 100%;
  height: 100%;
  display: flex;
  justify-content: center;
  align-items: center;
  color: var(--hover-text);
  border-radius: 5px;
  font-weight: bold;
  top: 100%;
  transition: all .3s cubic-bezier(.6,.4,0,1);
}

.green_card:hover span {
  top: 0;
  font-size: 1.2em;
}

.green_card:hover {
  background: var(--hover-bg);
}

.green_card:hover>div,.green_card:hover>strong {
  opacity: 1;
}

</style>