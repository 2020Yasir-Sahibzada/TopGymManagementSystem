<?php
    session_start();

    if (!isset($_SESSION['userLogin'])) {
        header("Location: ../index.php");
    }

    include_once 'php_Operation/connectionFile.php';
    include_once 'php_Operation/foreign.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students - CRUD</title>
    <link rel="stylesheet" href="css_style/crud_style.css">
    <script type="module" src="js/header.js"></script>
</head>

<body>
    <my-header></my-header>

    <div class="contain">
        <div id="table-box">
            <table>
                <tr>
                    <th>S.No</th>
                    <th>Name</th>
                    <th>Lastname</th>
                    <th>Father</th>
                    <th>Action</th>
                </tr>
                <?php
                $related_teacher = $_SESSION["userLogin"];
                $sql2 = "SELECT num FROM teacher WHERE FirstName='$related_teacher'";
                $result2 = mysqli_query($con, $sql2);
                $row2 = mysqli_fetch_assoc($result2);
                $related = $row2['num'];

                $sql = "SELECT * FROM `student` WHERE relatedTeacher='$related';";
                
                $result = mysqli_query($con, $sql);
                if ($result) {
                    $count = 1;
                    while ($row = mysqli_fetch_assoc($result)) {
                        $num = $row['stdNum'];

                        echo '<tr>
                            <td scope="row">' . $count . '</td>
                            <td>' . $row['FirstName'] . '</td>
                            <td>' . $row['LastName'] . '</td>
                            <td>' . $row['FatherName'] . '</td>
                            <td>
                                <button class="btn"><a href="php_Operation/display_update.php?updateid=' . $num . '">Update</a></button>
                                <button class="btn"><a href="php_Operation/delete_crud.php?deleteid=' . $num . '">Delete</a></button>
                            </td>
                            </tr>';
                            $count++;
                    }
                }
                ?>
            </table>
        </div>
    </div>

    <my-footer></my-footer>


    <script type="module" src="js/footer.js"></script>
</body>

</html>