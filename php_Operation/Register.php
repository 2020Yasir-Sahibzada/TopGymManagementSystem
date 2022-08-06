<?php
    session_start();
    include_once 'foreign.php';

    if (isset($_POST['submit'])) {
        include_once 'connectionFile.php';

        $userid = $_POST['userid'];
        $pass = password_hash($userid, PASSWORD_BCRYPT);
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $father = $_POST['father'];
        $email = $_POST['email'];

        if (empty($userid) || empty($fname) || empty($lname) || empty($father) || empty($email)) {
            header("Location: ../Registration.php?registration=empty");
            exit();
        }else {
            if (!preg_match("/^[a-zA-Z]*$/", $fname) || !preg_match("/^[a-zA-Z]*$/", $lname) || !preg_match("/^[a-zA-Z]*$/", $father)) {
                header("Location: ../Registration.php?registration=char");
                exit();
            }else {
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    header("Location: ../Registration.php?registration=email");
                    exit();
                }else {
                    $related_teacher = $_SESSION["userLogin"];
                    $sql2 = "SELECT num FROM teacher WHERE FirstName='$related_teacher'";
                    $result2 = mysqli_query($con, $sql2);
                    $row2 = mysqli_fetch_assoc($result2);
                    $related = $row2['num'];

                    $sql = "INSERT INTO `student` (`FirstName`, `LastName`, `FatherName`, `userID`, `relatedTeacher`, `Email`) VALUES ('$fname', '$lname', '$father','$pass', '$related', '$email');";
                    $result = mysqli_query($con, $sql);
                    header("Location: ../Registration.php?registration=success");
                }
            }
        }
    }
    else {
        header("Location: ../BodyBuilding/Registration.php?registration=error");
        exit();
    }

?>