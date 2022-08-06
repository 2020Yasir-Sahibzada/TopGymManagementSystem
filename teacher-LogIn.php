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
    <title>Log In Teacher - Yasir Top Gym</title>
    <link rel="stylesheet" href="css_style/LogIn.css">
</head>
<body>

    <?php
    
        if (isset($_POST['submit'])) {
            $fname = $_POST['fname'];
            $lname = $_POST['lname'];
            $passwordUser = $_POST['password'];

            $firstSearch = "SELECT * FROM teacher WHERE FirstName='$fname';";
            $query = mysqli_query($con, $firstSearch);

            $firstCount = mysqli_num_rows($query);
            if ($firstCount) {
                $detail = mysqli_fetch_assoc($query);

                $_SESSION['userLogin'] = $detail['FirstName'];
                $pass = $detail['Password'];
                $original = password_verify($passwordUser, $pass);
                $Last = $detail['LastName'];

                if ($original) {
                    header("Location: ../BodyBuilding/Teacher.php");
                    exit();
                    
                }else if ($Last != $lname) {
                    header("Location: ../BodyBuilding/teacher-LogIn.php?loginError=lastname");
                    exit();
                }
                else {
                    header("Location: ../BodyBuilding/teacher-LogIn.php?loginError=password");
                    exit();
                }
            }else {
                header("Location: ../BodyBuilding/teacher-LogIn.php?loginError=firstname");
                exit();
            }
        }
    
    ?>


    <div id="split-Page">
        <div style="background: linear-gradient(rgba(0, 0, 0, 0), rgba(0, 0, 0, 0.5)), url('img/pic4.jpg');background-size: cover;" id="left-part">
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
                    <h2>LOG IN - Teacher</h2>
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
                <button class="signin-btn" type="submit" name="submit">LOG IN</button>
                <p>Logup for <a href="teacher-Signup.php">Teacher</a></p>
                <p>Login for <a href="student-LogIn.php">Student</a></p>
                <?php
                    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                    if (strpos($fullUrl, "loginError=firstname") == true) {
                        echo '<p style="margin:0 0 15px 0;color:red;position:absolute;bottom:-50px;">Invalid First Name!</p>';
                        exit();
                    }
                    if (strpos($fullUrl, "loginError=lastname") == true) {
                        echo '<p style="margin:0 0 15px 0;color:red;position:absolute;bottom:-50px;">Invalid Last Name!</p>';
                        exit();
                    }
                    else if (strpos($fullUrl, "loginError=password" ) == true) {
                        echo '<p style="margin:0 0 15px 0;color:red;position:absolute;bottom:-50px;">Invalid Password</p>';
                        exit();
                    }
                ?>
            </form>

        </div>
    </div>
</body>
</html>