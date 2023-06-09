<?php
session_start();
include('server.php');
$courseId = $_GET['course_id'];
$courseId = mysqli_real_escape_string($conn, $courseId);

?>
<head>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="header" style="height: 30px;">
        <a href="<?php echo $_SERVER['HTTP_REFERER'] ?>" style="position: relative; float: left; margin-top: 2px; text-align: left; color: white; font-size: 130%;">
            <p>Back</p>
        </a>
    </div>
    <div class="input-group" style="margin-top: 0px;">
        <form method="post">
            <p style="font-size: 160%;">
                The course editing page has not yet been implemented.
            </p>
        </form>
    </div>
</body>
