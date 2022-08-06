<?php
    include_once('connectionFile.php');

    
    if ($related_student = $_SESSION["userLogin"]) {
        $sql = "SELECT StdNum FROM student WHERE FirstName='$related_student'";
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            $relatedStd = $row['StdNum'];
        }
            
    }else {
        $related_teacher = $_SESSION["userLogin"];
        $sql2 = "SELECT num FROM teacher WHERE FirstName='$related_teacher'";
        $result2 = mysqli_query($con, $sql2);
        $row2 = mysqli_fetch_assoc($result2);
        $related = $row2['num'];
    }

?>