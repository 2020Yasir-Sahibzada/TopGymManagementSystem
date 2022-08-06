<?php
    session_start();
    include_once 'php_Operation/connectionFile.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up Student - Yasir Top Gym</title>
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

            $firstSearch = "SELECT * FROM teacher WHERE FirstName='$fname';";
            $query = mysqli_query($con, $firstSearch);

            $firstCount = mysqli_num_rows($query);

            if ($firstCount > 0) {
                header("Location: ../BodyBuilding/teacher-Signup.php?SignUpError=first");
                exit();
            }else {
                if (empty($fname) || empty($lname)) {
                    header("Location: ../BodyBuilding/teacher-Signup.php?SignUpError=empty");
                    exit();
                }
                else if ($passwordUserEnter === $copasswordUserEnter) {
                    $sql = "INSERT INTO `teacher` (`FirstName`,`LastName`,`Password`,`CoPassword`) VALUES ('$fname','$lname','$pass','$copass');";
                    mysqli_query($con, $sql);
                    header("Location: ../BodyBuilding/teacher-Signup.php?SignUp=success");
                    exit();
                }else {
                    header("Location: ../BodyBuilding/teacher-Signup.php?SignUpError=password");
                    exit();
                }
            }
        }
    
    ?>


    <div id="split-Page">
        <div style="background: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.5)), url('img/T7.jpg');background-size: cover;" id="left-part">
            <section class="copy">
                <h1>Explore Your Sport</h1>
                <p>Over Full Bodybuilding Material and Fun we appraciate your Regestration...</p>
            </section>
        </div>
        <div id="right-part">

            <form action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">
                <section class="copy">
                    <div class="main-logo">
                        <img src="img/muscle.png" height="40px" alt="">
                        <h3><span>Yasir</span> Top Gym</h3>
                    </div>
                    <h2>Making - Teacher</h2>
                </section>
                <div class="input-container">
                    <label for="fname">First Name</label>
                    <input placeholder="Enter First name..." type="text" id="fname" name="fname">
                    <small>Atlest 7 lenght</small>
                </div>
                <div class="input-container">
                    <label for="fname">Last Name</label>
                    <input placeholder="Enter Last name..." type="text" id="lname" name="lname">
                    <small>Atlest 7 lenght</small>
                </div>
                <div class="input-container">
                    <label for="password">Password</label>
                    <input placeholder="Enter Password..." type="password" id="password" name="password">
                    <small>Atlest 9 lenght</small>
                </div>
                <div class="input-container">
                    <label for="password2">Co-Password</label>
                    <input placeholder="Enter Co-Password..." type="password" id="password2" name="copassword">
                </div>
                
                <button class="signin-btn" type="submit" name="submit">SIGN UP</button>
                <p>Login for <a href="teacher-LogIn.php">Teacher</a></p>
                <p>Login for <a href="student-LogIn.php">Student</a></p>
                <?php
                    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                    if (strpos($fullUrl, "SignUpError=password" ) == true) {
                        echo '<p style="margin:0 0 50px 0;color:red;position:relative;bottom:-20px;">Password are not same</p>';
                        exit();
                    }else if (strpos($fullUrl, "SignUpError=first" ) == true) {
                        echo '<p style="margin:0 0 50px 0;color:red;position:relative;bottom:-20px;">FirstName Already Exist</p>';
                        exit();
                    }
                    else if (strpos($fullUrl, "SignUp=success" ) == true) {
                        echo '<p style="margin:0 0 50px 0;color:blue;position:relative;bottom:-20px;">Registred Successfully</p>';
                        exit();
                    }
                    else if (strpos($fullUrl, "SignUpError=empty" ) == true) {
                        echo '<p style="margin:0 0 50px 0;color:red;position:relative;bottom:-20px;">Empty Form</p>';
                        exit();
                    }
                ?>
            </form>

        </div>
    </div>
</body>
</html>