<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Course</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="header">
        <a href="<?php echo $_SERVER['HTTP_REFERER'] ?>" style="position: relative; float: left; margin-top: 2px; text-align: left; color: white; font-size: 130%;">
            <p>Back</p>
        </a>
        <h2>Add Course</h2>
    </div>

    <form method="post" action="[table]_course_info.php" enctype="multipart/form-data">
        <?php include('errors.php'); ?>

        <div class="input-group">
            <label for="course_name">ชื่อคอร์ส</label>
            <input type="text" name="course_name" value="<?php echo isset($_POST['course_name']) ? $_POST['course_name'] : ''; ?>" required>
        </div>
        <div class="input-group">
            <label for="description">คำอธิบาย</label>
            <textarea name="description" rows="4" required><?php echo isset($_POST['description']) ? $_POST['description'] : ''; ?></textarea>
        </div>
        <div class="input-group">
            <label for="length">ความยาว (Hours)</label>
            <input type="text" name="length" value="<?php echo isset($_POST['length']) ? $_POST['length'] : ''; ?>" required>
        </div>
        <div class="input-group">
            <label for="pdf_file">เอกสารการสอน</label>
            <input type="file" name="pdf_file" accept=".pdf">
        </div>
        <div id="lesson-container">
            <div class="lesson">
                <div class="input-group">
                    <label for="lesson[]">ชื่อบทเรียน</label>
                    <input type="text" name="lesson[]" required>
                </div>
                <div class="input-group">
                    <label for="video_link[]">Link Video (URL)</label>
                    <input type="text" name="video_link[]" required>
                </div>
            </div>
        </div>
        <button type="button" class="btn" id="add-lesson-btn">เพิ่มบทเรียน</button>
        <div class="input-group">
            <button type="submit" class="btn" name="add_course">Submit</button>
        </div>
    </form>

    <script>
        function addLesson() {
            const lessonContainer = document.getElementById("lesson-container");
            const lessonDiv = document.createElement("div");
            lessonDiv.classList.add("lesson");
            lessonDiv.innerHTML = `
                <div class="input-group">
                    <label for="lesson[]">ชื่อบทเรียน</label>
                    <input type="text" name="lesson[]" required>
                </div>
                <div class="input-group">
                    <label for="video_link[]">Link Video (URL)</label>
                    <input type="text" name="video_link[]" required>
                </div>
            `;
            lessonContainer.appendChild(lessonDiv);
        }

        const addLessonBtn = document.getElementById("add-lesson-btn");
        addLessonBtn.addEventListener("click", addLesson);
    </script>
</body>
</html>
