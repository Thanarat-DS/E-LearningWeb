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
        <a href="article.php">Article</a>
        <a class="active" href="#instructor">Instructor</a>
        <p><a href="index.php?logout='1'" style = "color: red;">Logout</a></p>
    </div>

    <div class="homecontent">
        <div class="instructorBox">
            <img class="item" src="images/person1.png" width=200 height=260/>
        </div>

        <!-- 1st Instructor -->
        <div class="headerBox3">
            <p><b>Thanarat Srihapol</b></p>
            <p>ธนรัฐ ศรีหาผล</p>
            <p>อาจารย์ประจำภาควิชา</p>
            <p><b>ห้องพัก:</b>   ตึกจุฬาภรณ์ 1 ห้อง 233</p>
            <p><b>E-mail:</b>   63050034@kmitl.ac.th</p>
            <p><b>การศึกษา:</b> วท.บ.คณิตศาสตร์ (สถาบันเทคโนโลยีพระจอมเกล้าเจ้าคุณทหารลาดกระบัง)</p>
            <p><b>ความเชี่ยวชาญ:</b> PYTHON, MACHINE LEARNING</p>
        </div> <br></br>

        <!-- 2nd Instructor -->

        </div>
    </div>

</body>

</html>