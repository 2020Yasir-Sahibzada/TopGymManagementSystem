<?php
    session_start();

    if (!isset($_SESSION['userLogin'])) {
        header("Location: ../sign_in.php");
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
    <title>Training pic - Yasir Top Gym</title>
    <link rel="stylesheet" href="css_style/display_pic.css">
    <script type="module" src="js/header.js"></script>
</head>
<body>

    <my-header></my-header>

    <div class="image-gallery">
        <div class="image-box">
            <img src="img/T2.jpg" alt="" class="train">
            <div class="overlay">
                <form action="display_video.php?train=chest" method="POST">
                    <button name="submit" type="submit">CHEST</button>
                </form>
            </div>
        </div>
        <div class="image-box">
            <img src="img/T1.jpg" alt="" class="train">
            <div class="overlay">
                <form action="display_video.php?train=biceps" method="POST">
                    <button name="submit" type="submit">BICEPS</button>
                </form>
            </div>
        </div>
        <div class="image-box">
            <img src="img/T5.jpg" alt="" class="train">
            <div class="overlay">
                <form action="display_video.php?train=triceps" method="POST">
                    <button name="submit" type="submit">TRISEPS</button>
                </form>
            </div>
        </div>
        <div class="image-box">
            <img src="img/T4.jpg" alt="" class="train">
            <div class="overlay">
                <form action="display_video.php?train=back" method="POST">
                    <button name="submit" type="submit">BACK</button>
                </form>
            </div>
        </div>
        <div class="image-box">
            <img src="img/T7.jpg" alt="" class="train">
            <div class="overlay">
                <form action="display_video.php?train=abs" method="POST">
                    <button name="submit" type="submit">ABS</button>
                </form>
            </div>
        </div>
        <div class="image-box">
            <img src="img/T6.jpg" alt="" class="train">
            <div class="overlay">
                <form action="display_video.php?train=shoulder" method="POST">
                    <button name="submit" type="submit">SHOULDER</button>
                </form>
            </div>
        </div>

    </div>
    <my-footer></my-footer>


    <script type="module" src="js/footer.js"></script>
</body>
</html>