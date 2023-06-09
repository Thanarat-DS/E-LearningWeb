<!-- 
    ================ Table from SQL Database ==================
    CREATE TABLE student_info (
        student_id INT PRIMARY KEY AUTO_INCREMENT,
        first_name VARCHAR(20) NOT NULL,
        last_name VARCHAR(20) NOT NULL,
        email VARCHAR(40) NOT NULL,
        password TEXT NOT NULL,
        phone VARCHAR(20) NOT NULL,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP);
    ALTER TABLE student_info ADD UNIQUE (email);

    CREATE TABLE instructor_info (
        instructor_id INT PRIMARY KEY AUTO_INCREMENT,
        first_name VARCHAR(20) NOT NULL,
        last_name VARCHAR(20) NOT NULL,
        email VARCHAR(40) NOT NULL,
        password TEXT NOT NULL,
        phone VARCHAR(20) NOT NULL,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP);
    ALTER TABLE instructor_info ADD UNIQUE (email);

    CREATE TABLE course_info (
        course_id INT PRIMARY KEY AUTO_INCREMENT,
        instructor_id INT NOT NULL,
        course_name VARCHAR(50) NOT NULL,
        description TEXT NOT NULL,
        instructor VARCHAR(50) NOT NULL,
        length INT NOT NULL,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        url VARCHAR(255) DEFAULT NULL,
        pdf_upload VARCHAR(255) DEFAULT NULL,
        FOREIGN KEY (instructor_id) REFERENCES instructor_info(instructor_id));

    CREATE TABLE lesson (
        lesson_id INT PRIMARY KEY AUTO_INCREMENT,
        course_id INT NOT NULL,
        lesson_name VARCHAR(50) NOT NULL,
        video_link VARCHAR(255),
        FOREIGN KEY (course_id) REFERENCES course_info(course_id));

    CREATE TABLE payment (
        payment_id INT PRIMARY KEY AUTO_INCREMENT,
        student_id INT NOT NULL,
        payment_status ENUM('Paid', 'Unpaid') NOT NULL,
        started_at DATE NOT NULL,
        end_at DATE NOT NULL,
        FOREIGN KEY (student_id) REFERENCES student_info(student_id));

    CREATE TABLE quiz_question (
        question_id INT PRIMARY KEY AUTO_INCREMENT,
        course_id INT NOT NULL,
        question TEXT NOT NULL,
        correct_answer INT NOT NULL,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (course_id) REFERENCES course_info(course_id));

    CREATE TABLE quiz_answer (
        result_id INT PRIMARY KEY AUTO_INCREMENT,
        question_id INT NOT NULL,
        answer TEXT NOT NULL,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        FOREIGN KEY (question_id) REFERENCES quiz_question(question_id));

    CREATE TABLE certificate (
        certificate_id INT AUTO_INCREMENT PRIMARY KEY,
        course_id INT NOT NULL,
        student_id INT NOT NULL,
        certificate_name VARCHAR(30) NOT NULL,
        certificate_description TEXT NOT NULL,
        certificate_date DATE NOT NULL,
        FOREIGN KEY (course_id) REFERENCES course_info(course_id),
        FOREIGN KEY (student_id) REFERENCES student_info(student_id));

-->

<?php
    session_start();

    if (!isset($_SESSION['first_name']) && !isset($_SESSION['success'])) {
        $_SESSION['msg'] = "You must log in first";
        header('location: login.php');
    }

    if (isset($_GET['logout'])) {
        session_destroy();
        unset($_SESSION['first_name']);
        header('location: login.php');
    }
?>  

<?php include('server.php'); ?>
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
        <a class="active" href="#home">Home</a>
        <a href="course.php">Course</a>
        <a href="article.php">Article</a>
        <a href="instructor.php">Instructor</a>
        <p><a href="index.php?logout='1'" style = "color: red;">Logout</a></p>
    </div>

    <div class="homecontent">
        <div class="headerBox">
            <img class="item" src="images/logo.png" width=360 height=200/>
        </div>

        <div class="headerBox2">
            <div class="slideshow-container">

                <!-- รูปหน้า Home เพิ่มตรงนี้ -->
                <div class="mySlides fade">
                    <img src="images/5.jpeg" width=455 height=230>
                </div>

                <div class="mySlides fade">
                    <img src="images/4.jpeg" width=455 height=230>
                </div>

                <div class="mySlides fade">
                    <img src="images/2.jpg" width=455 height=230>
                </div>

                <div class="mySlides fade">
                    <img src="images/1.jpg" width=455 height=230>
                </div>
            </div>

            <br>
            <div style="text-align:center">
                <span class="dot" onclick="currentSlide(1)"></span> 
                <span class="dot" onclick="currentSlide(2)"></span> 
                <span class="dot" onclick="currentSlide(3)"></span> 
                <span class="dot" onclick="currentSlide(4)"></span> 
            </div>

            <script>
                let slideIndex = 0;
                showSlides();

                function showSlides() {
                let i;
                let slides = document.getElementsByClassName("mySlides");
                let dots = document.getElementsByClassName("dot");
                for (i = 0; i < slides.length; i++) {
                    slides[i].style.display = "none";  
                }
                slideIndex++;
                if (slideIndex > slides.length) {slideIndex = 1}    
                for (i = 0; i < dots.length; i++) {
                    dots[i].className = dots[i].className.replace(" active", "");
                }
                slides[slideIndex-1].style.display = "block";  
                dots[slideIndex-1].className += " active";
                setTimeout(showSlides, 3000); // Change image every 3 seconds
                }
            </script>
        </div>

        <div class="courseBox">
            <h3>Course</h3>
            <div class="cardBox">
                <div class="card">
                    <div class="overlay"></div>
                    <div class="h4">Python</div>
                    <div class="content">
                        <div class="h3">Python</div>
                        <p>Python เป็นภาษาการเขียนโปรแกรมที่ใช้อย่างแพร่หลายในเว็บแอปพลิเคชัน การพัฒนาซอฟต์แวร์ เป็นภาษาที่ใช้ง่ายที่สุดในการเรียนรู้</p>
                        <a href="view_course.php?course_id=17">
                            <button class="card-button" style="cursor: pointer;">More info</button>
                        </a>
                    </div>
                </div>
            </div>

            <div class="cardBox">
                <div class="card">
                    <div class="overlay"></div>
                    <div class="h4">Finance</div>
                    <div class="content">
                        <div class="h3">Finance</div>
                        <p>Finance เป็นเรื่องที่เกี่ยวกับการเงินโดยเฉพาะการหาค่าดอกเบี้ยที่ดีที่สุดในการฝากธนาคารหรือลงทุน เป็นวิชาที่สำคัญมากๆในตลาดการศึกษา</p>
                        <a href="view_course.php?course_id=18">
                            <button class="card-button" style="cursor: pointer;">More info</button>
                        </a>
                    </div>
                    
                </div>
                
            </div>

            <div class="cardBox">
                <div class="card">
                    <div class="overlay"></div>
                    <div class="h4">SQL language</div>
                    <div class="content">
                        <div class="h3">SQL language</div>
                        <p>Structured Query Language (SQL) เป็นภาษาโปรแกรมสำหรับจัดเก็บและประมวลผลข้อมูลในฐานข้อมูลต่างๆเพื่อเป็นฐานข้อมูลในการนำหยิบมาใช้</p>
                        <a href="view_course.php?course_id=19">
                            <button class="card-button" style="cursor: pointer;">More info</button>
                        </a>
                    </div>
                </div>
            </div>
        </div>
  
    </div>

</body>

</html>