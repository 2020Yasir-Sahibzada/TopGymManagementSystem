<?php

    include_once 'connectionFile.php';

    $id = $_GET['updateid'];

    if (isset($_POST['submit'])) {
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $father = $_POST['father'];
        $email = $_POST['email'];

        if (empty($fname) || empty($lname) || empty($father) || empty($email)) {
            header("Location: ../php_Operation/display_update.php?updateid=".$id."?update=empty");
            exit();
        }else {
            if (!preg_match("/^[a-zA-Z]*$/", $fname) || !preg_match("/^[a-zA-Z]*$/", $lname) || !preg_match("/^[a-zA-Z]*$/", $father)) {
                header("Location: ../php_Operation/display_update.php?updateid=".$id."?update=char");
                exit();
            }else {
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    header("Location: ../php_Operation/display_update.php?updateid=".$id."?update=email");
                    exit();
                }else {
                    $sql = "UPDATE `student` SET stdNum=$id, FirstName='$fname', LastName='$lname', FatherName='$father', Email='$email' WHERE stdNum=$id;";
                    $result = mysqli_query($con, $sql);
                    header("Location: ../crud.php?update=success");
                }
            }
        }
    }else {
        echo "There is not submmit";
    }

?>