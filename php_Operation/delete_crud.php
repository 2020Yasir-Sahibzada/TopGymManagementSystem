<?php

    include_once 'connectionFile.php';

    
    if (isset($_GET['deleteid'])) {
        $id = $_GET['deleteid'];

        $sql = "DELETE FROM `student` WHERE stdNum=$id;";
        $result = mysqli_query($con, $sql);

        header("Location: ../crud.php?userid=deleted");
        
    }

?>