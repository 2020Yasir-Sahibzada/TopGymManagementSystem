<?php
    session_start();

    if (!isset($_SESSION['userLogin'])) {
        header("Location: ../sign_in.php");
    }
    include_once 'php_Operation/foreign.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher - Yasir Top Gym</title>
    <link rel="stylesheet" href="css_style/mainPage-withLogin.css">
    <script type="module" src="js/header.js"></script>
</head>
<body>
    <div id="split-Page">
        <div id="left-Part">
            <my-header></my-header>
            <div id="service">
                <h2>> <?php echo $_SESSION['userLogin'];?> is here</h2>
                <h1>Use it</h1>
                <ul id="a">
                    <li><a href="yourStd.php">Student List</a></li>
                    <li><a href="crud.php">CRUD</a></li>
                    <li><a href="Registration.php">Registration</a></li>
                    <li><a href="teacher-upload.php">Upload Video</a></li>
                </ul>
            </div>
        </div>
        <div id="right-Part">
            <div class="imgBox"></div>
            <div class="imgBox"></div>
            <div class="imgBox"></div>
        </div>
    </div>
    <my-footer></my-footer>


    <script type="module" src="js/footer.js"></script>
</body>
</html>