<?php

    ini_set("mysql.connect_timeout", 300);
    ini_set("default_socket_timeout", 300);

    session_start();

    include_once('connectionFile.php');
    include_once('foreign.php');

    if(isset($_POST['submit'])) {
        $title = strtolower($_POST['title']);
        $videoName = mysqli_real_escape_string($con, $_FILES["file"]["name"]);
        $videoType = mysqli_real_escape_string($con, $_FILES["file"]["type"]);

        $array = array("chest", "back", "shoulder", "triceps", "biceps", "abs");
        $arrayContain = in_array($title, $array);

        if (empty($title)) {
            header("Location: ../teacher-upload.php?title=empty");
            exit();
        }else if (!$arrayContain) {
            header("Location: ../teacher-upload.php?title=NotBodyPart");
            exit();
        }
        else if (!preg_match("/^[a-zA-Z]*$/", $title)) {
            header("Location: ../teacher-upload.php?title=invalid");
            exit();
        }else if (empty($videoName)) {
            header("Location: ../teacher-upload.php?path=empty");
            exit();
        }else {
            $related_teacher = $_SESSION["userLogin"];
            $sql2 = "SELECT num FROM teacher WHERE FirstName='$related_teacher'";
            $result2 = mysqli_query($con, $sql2);
            $row2 = mysqli_fetch_assoc($result2);
            $related = $row2['num'];
            $videoData = mysqli_real_escape_string($con, file_get_contents($_FILES["file"]["tmp_name"]));
            $re = mysqli_query($con, "INSERT INTO `vid` (`title`, `FileName`, `uploadedVid`, `relatedTeacher`) VALUES ('$title', '$videoName', '$videoData', '$related');");
            
            if ($re) {
                header("Location: ../teacher-upload.php?upload=success");
                exit();
            }
            
        }

    }

?>