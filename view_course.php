<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>

    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>

<body>
    <div class="homeheader">
        <h2>Home Page</h2>
    </div>

    <div class="topnav">
        <!-- Menu Tab -->
        <a href="index.php">Home</a>
        <a class="active" href="course.php">Course</a>
        <a href="article.php">Article</a>
        <a href="instructor.php">Instructor</a>
        <p><a href="index.php?logout='1'" style="color: red;">Logout</a></p>
    </div>

    <div class="homecontent">
        <div class="course-container">
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
      
        if (!isset($_GET['course_id'])) {
            header('location: course.php');
            exit();
        }

        $courseId = $_GET['course_id'];
        $courseId = mysqli_real_escape_string($conn, $courseId);

        function displayCourseContent($courseId)
        {
            global $conn;

            // Retrieve course information
            $courseQuery = "SELECT * FROM course_info WHERE course_id = $courseId";
            $courseResult = $conn->query($courseQuery);

            // if the instructor is logged in then show my course menu
            if (isset($_SESSION['instructor_id'])) {
                echo "<div class='course-link'>";
                echo "<a href='add_quiz.php?course_id=$courseId' class='course-link'>Add Quiz</a>";
                echo "</div>";
                echo "<div class='course-link'>";
                echo "<a href='edit_course.php?course_id=$courseId' class='course-link'>Edit Course</a>";
                echo "</div><br></br>";
                echo "</div>";
            } else {
                echo "<br></br>";
            }

            if ($courseResult->num_rows > 0) {
                $courseRow = $courseResult->fetch_assoc();

                echo "<div class=\"top_green_card\">";
                echo "<h3>Course Name: " . $courseRow["course_name"] . "</h3>";
                echo "<p><b>Instructor:</b> " . $courseRow["instructor"] . "</p>";
                echo "<p><b>Description:</b> " . $courseRow["description"] . "</p>";
                echo "<p><b>Length:</b> " . $courseRow["length"] . " ชั่วโมง</p><br></br>";

                if (!empty($courseRow["pdf_upload"])) {
                    echo "<div class=\"material\">";
                    echo "<p><a href='" . $courseRow["pdf_upload"] . "'><img src='images/pdf_icon2.jpg' width='200' height='200'></a></p>";
                    echo "<p><a href='" . $courseRow["pdf_upload"] . "'>Study Materials (PDF)</a></p>";
                    echo "</div>";
                }                
                echo "</div>";

                // Retrieve lesson information
                $lessonQuery = "SELECT * FROM lesson WHERE course_id = $courseId";
                $lessonResult = $conn->query($lessonQuery);

                if ($lessonResult->num_rows > 0) {
                    echo "<h3>Lessons</h3>";
                    $courseUrl = "view_course.php?course_id=" . $courseRow["course_id"];
                    while ($lessonRow = $lessonResult->fetch_assoc()) {
                        echo "<div class=\"course-box\">";
                        echo "<p>" . $lessonRow["lesson_name"] . "</p>";
                        echo "</div><br></br>";

                        if (!empty($lessonRow["video_link"])) {
                            $videoLink = $lessonRow["video_link"];
                            $thumbnail = getOpenGraphThumbnail($videoLink);

                            if (!empty($thumbnail)) {
                                echo "<div class=\"green_card\">";
                                echo "<a href='$videoLink'><img src='$thumbnail' alt='Video Thumbnail' width='400' height='300'></a>";
                            }
                            echo "<p>Video Link: <a href='$videoLink'>Watch Video</a></p>";
                            echo "</div>";
                        }
                        echo "<div class=\"green_card\">";
                        echo "<p><a href='" . $courseRow["pdf_upload"] . "'><img src='images/pdf_icon2.jpg' width='400' height='300'></a></p>";
                        echo "<p><a href='" . $courseRow["pdf_upload"] . "'>Study Materials (PDF)</a></p>";
                        echo "</div>";

                        echo "<br>";
                    }
                } else {
                    echo "<p>No lessons found for this course.</p>";
                }

                // Quiz button
                echo "<form action='take_quiz.php' method='GET' style='background: none; border: 0px;'>";
                echo "<input type='hidden' name='course_id' value='" . $courseRow["course_id"] . "'>";
                echo "<input class='btn' style='font-size: 30px; width=50px; margin-bottom: 30px; cursor: pointer;' type='submit' value='Take Quiz'>";
                echo "</form>";

            } else {
                echo "<p>Course not found.</p>";
            }
        }

        function getOpenGraphThumbnail($url)
        {
            $html = file_get_contents($url);
            if ($html) {
                preg_match('/<meta[^>]*property=["\']og:image["\'][^>]*content=["\'](.*?)["\'][^>]*>/i', $html, $matches);
                if (isset($matches[1])) {
                    return $matches[1];
                }
            }
            return null;
        }

        displayCourseContent($courseId);

        $conn->close();
        ?>
        </div>
    </div>
</body>
</html>

<style>
.course-container {
  position: relative;
  flex-wrap: wrap;
  margin-top: 0;    
}
.course-container h2 {
  font-size: 50px;
}
.course-box {
  border: 1px solid #ccc;
  font-size: 200%;
  padding: 10px;
  margin: 10px;
  width: 1300px;
  background-color: #f9f9f9;
  margin-left: 130px;
  margin-top: 50px;
}

.course-link {
    position: relative;
    font-size: 120%;
    margin-right: 20px;
    margin-bottom: 20px;
    display: inline;
}

.top_green_card {
  --bg: #f7f7f8;
  width: 600px;
  height: 380px;
  text-align: left;
  background: var(--bg);
  padding: 1.5em;
  padding-block: 1.8em;
  border: 2px solid #777;
  border-radius: 5px;
  margin-right: 40px;
  margin-bottom: 40px;
  left: 0px;
  position: relative;
  overflow: hidden;
  transition: .3s cubic-bezier(.6,.4,0,1),transform .15s ease;
  display: inline-block;
  flex-direction: column;
  align-items: center;
  gap: 1em;
  box-shadow: rgba(0, 0, 0, 0.4) 0px 2px 4px 0px,
    rgba(0, 0, 0, 0.5) 0px 2px 6px 0px;
}

.top_green_card .material{
    text-align: center;
}

.green_card {
  --bg: #f7f7f8;
  --hover-bg: #04AA6D;
  --hover-text: #E50087;
  width: 400px;
  height: 350px;
  text-align: center;
  background: var(--bg);
  padding: 1.5em;
  padding-block: 1.8em;
  border: 2px solid #777;
  border-radius: 5px;
  margin-right: 40px;
  margin-bottom: 40px;
  left: 0px;
  position: relative;
  overflow: hidden;
  transition: .3s cubic-bezier(.6,.4,0,1),transform .15s ease;
  display: inline-block;
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