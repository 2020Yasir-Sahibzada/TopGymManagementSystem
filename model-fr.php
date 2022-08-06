<?php
    session_start();

    if (!isset($_SESSION['userLogin'])) {
        header("Location: ../sign_in.php");
    }

    include_once 'php_Operation/connectionFile.php';

    $id = $_GET['updateTask'];

    $sql = "SELECT * FROM `todofr` WHERE tdNum=$id;";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $t = $row['title'];
    $d = $row['des'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UpDate Task - Yasir Top Gym</title>
    <link rel="stylesheet" href="css_style/model.css">
</head>
<body>
    <?php
        $id = $_GET['updateTask'];
        if (isset($_POST['submit'])) {
            $title = $_POST['task'];
            $descr = $_POST['desc'];
    
            if (empty($title) || empty($descr)) {
                header("Location: model.php?updateTask=empty");
                exit();
            }else {
                $sql = "UPDATE `todofr` SET tdNum=$id, title='$title', 
                des='$descr' WHERE tdNum=$id;";
                $result = mysqli_query($con, $sql);
    
                header("Location: ToDoList-Fr.php?UpdateTask=Success");
            }
    
        }
    ?>


    <div class="model-bg">
        <div class="model">
            <h2>Update Your Task</h2>
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']).'?updateTask='.$id; ?>" method="POST">
                <label for="title">Title</label>
                <input type="text" name="task" value="<?php echo $t;?>">
                <label for="descr">Description</label>
                <input type="text" name="desc" value="<?php echo $d;?>">
                <button type="submit" name="submit" id="model-btn">Submit</button>
                <a id='model-close' href="ToDoList-Fr.php">X</a>
            </form>
        </div>
    </div>
</body>
</html>