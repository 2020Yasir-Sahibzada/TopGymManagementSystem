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
    <title>Registration - Yasir Top Gym</title>
    <link rel="stylesheet" href="css_style/LogIn.css">
</head>
<body>
    <div id="split-Page">
        <div id="left-part">
            <img src="pic3.jpg" alt="">
            <section class="copy">
                <h1>Explore Your Sport</h1>
                <p>Over Full Bodybuilding Material and Fun we appraciate your Regestration...</p>
            </section>
        </div>
        <div id="right-part">
            <form action="php_Operation/Register.php" method="POST">
                <section class="copy">
                    <div class="main-logo">
                        <img src="img/muscle.png" height="40px" alt="">
                        <h3><span>Yasir</span> Top Gym</h3>
                    </div>
                </section>
                <div class="input-container userid">
                    <label for="userid">User ID</label>
                    <input placeholder="Enter User id..." type="password" id="userid" name="userid">
                    <small>Atleast 9 lenght</small>
                </div>
                <div class="input-container fname">
                    <label for="fname">First Name</label>
                    <input placeholder="Enter First name..." type="text" id="fname" name="fname">
                    <small>Atleast 7 lenght</small>
                </div>
                <div class="input-container lname">
                    <label for="lname">Last Name</label>
                    <input placeholder="Enter Last name..." type="text" id="lname" name="lname">
                </div>
                <div class="input-container father">
                    <label for="father">Father Name</label>
                    <input placeholder="Enter Father name..." type="text" id="father" name="father">
                    <small>Atleast 7 lenght</small>
                </div>
                <div class="input-container email">
                    <label for="email">Email</label>
                    <input placeholder="Enter Email..." type="email" id="email" name="email">
                </div>
                <button class="signin-btn" type="submit" name="submit">Register</button>
                <?php
                    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                    if (strpos($fullUrl, "registration=empty") == true) {
                        echo "<p style='position: absolute;bottom: 10px; color: red;'>You did not fill in all fields!</p>";
                        exit();
                    }
                    else if (strpos($fullUrl, "registration=char") == true) {
                        echo "<p style='position: absolute;bottom: 10px; color: red;'>You use invalid character!</p>";
                        exit();
                    }
                    else if (strpos($fullUrl, "registration=email" ) == true) {
                        echo "<p style='position: absolute;bottom: 10px; color: red;'>You used an invalid email-address</p>";
                        exit();
                    }
                    else if (strpos($fullUrl, "registration=success") == true) {
                        echo "<p style='position: absolute;bottom: 10px; color: blue;'>Information regestrid successfully!</p>";
                        exit();
                    }
                ?>
            </form>
        </div>
    </div>
</body>
</html>