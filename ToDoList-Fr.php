<?php
    session_start();

    if (!isset($_SESSION['userLogin'])) {
        header("Location: ../index.php");
    }
    
    include 'php_Operation/connectionFile.php';
    include_once 'php_Operation/foreign.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ToDO List - Yasir Top Gym</title>
    <link rel="stylesheet" href="css_style/ToDoList_style.css">
    <script type="module" src="js/header.js"></script>
</head>
<body>
    <?php
        if (isset($_POST['submit'])) {
            $title = $_POST['title'];
            $des = $_POST['desc'];

            if (empty($title) || empty($des)) {
                header("Location: ToDoList-Fr.php?form=empty");
                exit();
            }else {
                $related_student = $_SESSION["userLogin"];
                $sql = "SELECT frStd FROM foreignstd WHERE FirstName='$related_student'";
                $result = mysqli_query($con, $sql);
                $row = mysqli_fetch_assoc($result);
                $relatedStd = $row['frStd'];
                $sql = "INSERT INTO `todofr` (`title`, `des`, `relatedStudent`) VALUES ('$title', '$des', '$relatedStd');";
                $result = mysqli_query($con, $sql);
                header("Location: ToDoList-Fr.php?form=success");
            }

        }
    ?>

    <my-header></my-header>
    <div id="main">
        <div class="group">
            <h2>Add a Note - Foreign</h2>
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                <div class="form-group">
                    <label for="Title">Note Title</label>
                    <input type="text" id="Title" name="title" placeholder="Enter Task Title...">
                </div>
                <div class="form-group">
                    <label for="Title">Note Description</label>
                    <input type="text" id="Title" name="desc" placeholder="Enter Task Description...">
                </div>
                <button type="submit" name="submit" class="btn">Submit</button>
            </form>
        </div>
        <div id="table-box">
            <table>
                <tr>
                    <th>S.No</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Action</th>
                </tr>
                <?php
                    $related_student = $_SESSION["userLogin"];
                    $sql = "SELECT frStd FROM foreignstd WHERE FirstName='$related_student'";
                    $result = mysqli_query($con, $sql);
                    $row = mysqli_fetch_assoc($result);
                    $relatedStd = $row['frStd'];

                    $sql = "SELECT * FROM `todofr` WHERE relatedStudent='$relatedStd'";
                    $result = mysqli_query($con, $sql);
                    $count = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $num = $row['tdNum'];
                        echo '<tr>
                            <td>' . $count . '</td>
                            <td>' . $row['title'] . '</td>
                            <td>' . $row['des'] . '</td>
                            <td>
                                <button class="btn"><a href="model-fr.php?updateTask=' . $num . '">Update</a></button>
                                <button class="btn"><a href="php_Operation/delete_task.php?deleteTaskFr=' . $num . '">Delete</a></button>
                            </td>
                            </tr>';
                            $count++;
                    };
                ?>
            </table>
        </div>
    </div>
    <my-footer></my-footer>


    <script type="module" src="js/footer.js"></script>
</body>
</html>