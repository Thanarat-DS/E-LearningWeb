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
        <a href="index.php">index</a>
        <a href="course.php">Course</a>
        <a class="active" href="#article">Article</a>
        <a href="instructor.php">Instructor</a>
        <p><a href="index.php?logout='1'" style = "color: red;">Logout</a></p>
    </div>

    <div class="homecontent">
        <div class="articleImage">
            <img class="item" src="images/Finance.png" width=200 height=200/>
        </div>

        <div class="articleBox">
            <p>ทางเว็บไซต์ได้ทำการเพิ่มคอร์สการเรียนรู้วิชาเนื้อหาสำหรับคอร์ส financial เป็นรายวิชาใหม่ ที่จะทำการสอน เพื่อให้ผู้เรียนได้พัฒนาทักษะ ความเข้าใจ การสื่อความหมายด้านการเงินอย่างมีประสิทธิภาพและสามารถนำไปใช้ในชีวิตประจำวันได้</p>
        </div>

        <br></br>
        <div class="next_articleBox">
            <img class="item" src="images/Extra1.jpg" width=200 height=200/>
            <img class="item" src="images/Extra2.jpg" width=200 height=200/>
            <img class="item" src="images/Extra3.jpg" width=200 height=200/>
        </div>

        <div class="articleButton">
            <a href="view_course.php?course_id=18" style="text-align: center;">เนื้อหาคอร์ส</a>
        </div>
    </div>

</body>

</html>

<style>
.article {
    display: inline-block;
}
.articleImage {
    background: #c3c6ce;
    width: 200px;
    max-height: 60ch;
    position: relative;
    place-items: center;
    overflow: hidden;
    border-radius: 20px;
    border: 2px solid #c3c6ce;
    margin: 0 auto;
    display: inline-block;
    margin-right: 30px; 
    margin-bottom: 40px;
}
.articleBox {
    background: #5f9ea0;
    color: white;
    width: 650px;
    height: 220px;
    position: relative;
    place-items: center;
    overflow: hidden;
    border-radius: 20px;
    border: 2px solid #c3c6ce;
    margin: 0 auto;
    display: inline-block;
    margin-right: 30px;
    margin-bottom: 30px;
    font-size: 28px
}


.articleBox p {
    position: relative;
    margin-left: 20px; 
    margin-top: 10px;
    text-align: left;
}

.next_articleBox {
    background: #f8f8f8;
    width: 200px;
    max-height: 60ch;
    position: relative;
    overflow: hidden;
    border-radius: 20px;
    margin: 0 auto;
    display: inline;
    margin-right: 40px; 
    margin-bottom: 40px;
}

.articleButton {
    background: #5f9ea0;
    width: 200px;
    height: 40px;
    font-size: 140%;
    position: relative;
    border-radius: 20px;
    border: 2px solid #c3c6ce;
    display: inline-block;
    margin-top: 70px;
    margin-right: 30px; 
    margin-bottom: 40px;
}

.articleButton a {
    text-decoration: none;
    color: white;
}


</style>