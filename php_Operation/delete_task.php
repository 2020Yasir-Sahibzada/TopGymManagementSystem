<?php

    include_once 'connectionFile.php';

    if (isset($_GET['deleteTask'])) {
        $id = $_GET['deleteTask'];

        $sql = "DELETE FROM `todo` WHERE tdNum=$id;";
        $result = mysqli_query($con, $sql);

        header("Location: ../ToDoList.php?Task=deleted");
        
    }else if (isset($_GET['deleteTaskFr'])) {
        $id = $_GET['deleteTaskFr'];

        $sql = "DELETE FROM `todofr` WHERE tdNum=$id;";
        $result = mysqli_query($con, $sql);

        header("Location: ../ToDoList-Fr.php?Task=deleted");
    }

?>