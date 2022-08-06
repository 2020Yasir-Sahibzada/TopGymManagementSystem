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
    <title>Log In Student - Yasir Top Gym</title>
    <link rel="stylesheet" href="css_style/LogIn.css">
</head>
<body>

    <?php
    
        if (isset($_POST['submit'])) {
            $fname = $_POST['fname'];
            $userid = $_POST['userid'];
            $enter = $_POST['std'];

            if ($enter == 'foreigner') {
                $firstSearch = "SELECT * FROM foreignstd WHERE FirstName='$fname';";
                $query = mysqli_query($con, $firstSearch);

                $firstCount = mysqli_num_rows($query);
                if ($firstCount==1) {
                    while ($row = mysqli_fetch_assoc($query)) {
                        if (password_verify($userid, $row['Password'])) {
                            $_SESSION['userLogin'] = $row['FirstName'];
                            header("Location: Foreign.php");
                            exit();

                        }else {
                            header("Location: ../BodyBuilding/student-LogIn.php?loginError=password");
                            exit();
                        }
                    }
                }else {
                    header("Location: ../BodyBuilding/student-LogIn.php?loginError=firstname");
                }

            }else {
                $firstSearch = "SELECT * FROM student WHERE FirstName='$fname';";
                $query = mysqli_query($con, $firstSearch);

                $firstCount = mysqli_num_rows($query);
                if ($firstCount==1) {
                    while ($row = mysqli_fetch_assoc($query)) {
                        if (password_verify($userid, $row['userID'])) {
                            $_SESSION['userLogin'] = $row['FirstName'];
                            header("Location: Student.php");
                            exit();

                        }else {
                            header("Location: ../BodyBuilding/student-LogIn.php?loginError=password");
                            exit();
                        }
                    }
                }else {
                    header("Location: ../BodyBuilding/student-LogIn.php?loginError=firstname");
                }
            }

            
        }
    
    ?>

    <div id="split-Page">
        <div id="left-part">
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
                    <h2>LOG IN - Student</h2>
                </section>
                <div class="input-container">
                    <label for="fname">First Name</label>
                    <input placeholder="Enter First name..." type="text" id="fname" name="fname">
                </div>
                
                <div class="input-container">
                    <label for="userid">User ID</label>
                    <input placeholder="Enter User id..." type="password" id="userid" name="userid">
                </div>
                <div class="input-container">
                    <label for="user">Type of Entring</label>
                    <select name="std" id="user">
                        <option value="foreigner">Foreigner</option>
                        <option value="student">Student</option>
                    </select>
                </div>
                
                <button class="signin-btn" type="submit" name="submit">SIGN IN</button>
                <p>LogIn for <a href="teacher-LogIn.php">Teacher</a></p>
                <p>Register as Foreigner <a href="foreign-LogIn.php">Student</a></p>
                <?php
                    $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                    if (strpos($fullUrl, "loginError=firstname") == true) {
                        echo '<p style="padding:10px 0 10px 0;color:red;position:absolute;bottom:0px;">Invalid First Name!</p>';
                        exit();
                    }
                    else if (strpos($fullUrl, "Re=userid" ) == true) {
                        echo '<p style="padding:10px 0 10px 0;color:red;position:absolute;bottom:0px;">Invalid User ID</p>';
                        exit();
                    }
                ?>
            </form>
        </div>
    </div>
</body>
</html>