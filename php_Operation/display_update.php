<?php

    include_once 'connectionFile.php';

    $id = (int) filter_var($_GET['updateid'], FILTER_SANITIZE_NUMBER_INT);

    $sql = "SELECT * FROM `student` WHERE stdNum=$id;";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_assoc($result);
    $f = $row['FirstName'];
    $l = $row['LastName'];
    $fa = $row['FatherName'];
    $e = $row['Email'];

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up - Yasir Top Gym</title>
    <link rel="stylesheet" href="../css_style/LogIn.css">
</head>
<body>
    <div id="split-Page">
        <div id="left-part">
            <section class="copy">
                <h1>Explore Your Sport</h1>
                <p>Over Full Bodybuilding Material and Fun we appraciate your Regestration...</p>
            </section>
        </div>
        <div id="right-part">
            <form action="update_crud.php?updateid=<?php echo $id;?>" method="POST">
                <section class="copy">
                    <div class="main-logo">
                        <img src="img/muscle.png" height="40px" alt="">
                        <h3><span>Yasir</span> Top Gym</h3>
                    </div>
                </section>
                <div class="input-container fname">
                    <label for="fname">First Name</label>
                    <input placeholder="Enter First name..." type="text" id="fname" name="fname" value="<?php echo $f;?>">
                </div>
                <div class="input-container lname">
                    <label for="lname">Last Name</label>
                    <input placeholder="Enter Last name..." type="text" id="lname" name="lname" value="<?php echo $l;?>">
                </div>
                <div class="input-container father">
                    <label for="father">Father Name</label>
                    <input placeholder="Enter Father name..." type="text" id="father" name="father" value="<?php echo $fa;?>">
                </div>
                <div class="input-container email">
                    <label for="email">Email</label>
                    <input placeholder="Enter Email..." type="email" id="email" name="email" value="<?php echo $e;?>">
                </div>
                <button class="signin-btn" type="submit" name="submit">Update</button>
                <?php
                    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                    if (strpos($fullUrl, "update=empty") == true) {
                        echo "<p style='padding: 10px 0 10px 0; color: red;'>You did not fill in all fields!</p>";
                        exit();
                    }
                    else if (strpos($fullUrl, "update=char") == true) {
                        echo "<p style='padding: 10px 0 10px 0; color: red;'>You use invalid character!</p>";
                        exit();
                    }
                    else if (strpos($fullUrl, "update=email" ) == true) {
                        echo "<p style='padding: 10px 0 10px 0; color: red;'>You used an invalid email-address</p>";
                        exit();
                    }
                ?>
            </form>
        </div>
    </div>
</body>
</html>