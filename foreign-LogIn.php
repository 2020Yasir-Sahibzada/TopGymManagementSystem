<?php
    include_once 'php_Operation/connectionFile.php';
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foreign Student - Yasir Top Gym</title>
    <link rel="stylesheet" href="css_style/LogIn.css">
</head>
<body>

    <?php
    
        if (isset($_POST['submit'])) {

            $fname = mysqli_real_escape_string($con, $_POST['fname']);
            $lname = mysqli_real_escape_string($con, $_POST['lname']);
            $passwordUserEnter = mysqli_real_escape_string($con, $_POST['password']);
            $copasswordUserEnter = mysqli_real_escape_string($con, $_POST['copassword']);

            $pass = password_hash($passwordUserEnter, PASSWORD_BCRYPT);
            $copass = password_hash($copasswordUserEnter, PASSWORD_BCRYPT);

            $firstSearch = "SELECT * FROM foreignstd WHERE FirstName='$fname';";
            $query = mysqli_query($con, $firstSearch);

            $firstCount = mysqli_num_rows($query);

            if ($firstCount > 0) {
                header("Location: ../BodyBuilding/foreign-LogIn.php?Register=first");
                exit();
            }else {
                if (empty($fname) || empty($lname)) {
                    header("Location: ../BodyBuilding/foreign-LogIn.php?Register=empty");
                    exit();
                }
                else if ($passwordUserEnter === $copasswordUserEnter) {
                    $sql = "INSERT INTO `foreignstd` (`FirstName`,`LastName`,`Password`,`CoPassword`) VALUES ('$fname','$lname','$pass','$copass');";
                    mysqli_query($con, $sql);
                    header("Location: ../BodyBuilding/foreign-LogIn.php?Register=success");
                    exit();
                }else {
                    header("Location: ../BodyBuilding/foreign-LogIn.php?Register=password");
                    exit();
                }
            }
        }
    
    ?>

    <div id="split-Page">
        <div style="background: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.5)), url('img/pic3.jpg');background-size: cover;" id="left-part">
            <section class="copy">
                <h1>Explore Your Sport</h1>
                <p>Over Full Bodybuilding Material and Fun we appraciate your Regestration...</p>
            </section>
        </div>
        <div id="right-part">
            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                <section class="copy">
                    <div class="main-logo">
                        <img src="../img/muscle.png" height="40px" alt="">
                        <h3><span>Yasir</span> Top Gym</h3>
                    </div>
                    <h2>FOREIGN - Student</h2>
                </section>
                <div class="input-container">
                    <label for="fname">First Name</label>
                    <input placeholder="Enter First name..." type="text" id="fname" name="fname">
                </div>
                <div class="input-container">
                    <label for="lname">Last Name</label>
                    <input placeholder="Enter Last name..." type="text" id="lname" name="lname">
                </div>
                <div class="input-container">
                    <label for="userid">Password</label>
                    <input placeholder="Enter Password..." type="password" id="userid" name="password">
                </div>
                <div class="input-container">
                    <label for="userid">Co-Password</label>
                    <input placeholder="Enter User id..." type="password" id="userid" name="copassword">
                </div>
                <button class="signin-btn" type="submit" name="submit">REGISTER</button>
                <p>LogIn for <a href="teacher-LogIn.php">Teacher</a></p>
                <p>LogIn for <a href="student-LogIn.php">Student</a></p>
                <?php
                    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                    if (strpos($fullUrl, "Register=first") == true) {
                        echo '<p style="padding:10px 0 10px 0;color:red;position:absolute;bottom:10px;">First Name already</p>';
                        exit();
                    }else if (strpos($fullUrl, "Register=empty") == true) {
                        echo '<p style="padding:10px 0 10px 0;color:red;position:absolute;bottom:10px;">Empty Form!</p>';
                        exit();
                    }
                    else if (strpos($fullUrl, "Register=password" ) == true) {
                        echo '<p style="padding:10px 0 10px 0;color:red;position:absolute;bottom:10px;">Invalid User ID</p>';
                        exit();
                    }else if (strpos($fullUrl, "Register=success" ) == true) {
                        echo '<p style="padding:10px 0 10px 0;color:blue;position:absolute;bottom:10px;">Register Successfuly</p>';
                        exit();
                    }
                ?>
            </form>
        </div>
    </div>
</body>
</html>