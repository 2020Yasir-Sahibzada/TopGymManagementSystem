<?php
    session_start();

    if (!isset($_SESSION['userLogin'])) {
        header("Location: ../sign_in.php");
    }

    include_once('php_Operation/connectionFile.php');
    include_once 'php_Operation/foreign.php';

    ini_set("mysql.connect_timeout", 300);
    ini_set("default_socket_timeout", 300);

    if(isset($_GET['submit'])) {
        $result = mysqli_query($con, "SELECT * FROM `vid` WHERE relatedTeacher='$related';");

        while ($row = mysqli_fetch_assoc($result)) {
            echo $row['FileName'];
            echo '<video src="data:video/mp4;base64,'.base64_encode($row['video']).'" height="300px" width="300" controls>';

        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Teacher - Yasir Top Gym</title>
    <link rel="stylesheet" href="css_style/teacher-upload.css">
    <script type="module" src="js/header.js"></script>
</head>
<body>
    <my-header></my-header>
    <section id="videos">
        <div id="wrapper">
            <h2>Gallary</h2>
            <div class="contain">
                <div class="video-container">

                    <?php
                        $related_teacher = $_SESSION["userLogin"];
                        $sql2 = "SELECT num FROM teacher WHERE FirstName='$related_teacher'";
                        $result2 = mysqli_query($con, $sql2);
                        $row2 = mysqli_fetch_assoc($result2);
                        $related = $row2['num'];

                        $sql = "SELECT * FROM `vid` WHERE relatedTeacher='$related'";
                        $result = mysqli_query($con, $sql);
                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $title = $row['title'];
                                $Vid = $row['uploadedVid'];

                                echo '
                                    <div class="eachVid">
                                        <div style="padding-left: 5px" ><video src="data:video/mp4;base64,'.base64_encode($row['uploadedVid']).'" height="200px" width="200" controls></div>
                                        <h3 style="text-transform: uppercase;color: #F44336;margin-left: 5px;">'.$title.'</h3>
                                    </div>
                                ';
                            }
                        }else {
                            echo "There is no video uploaded!";
                        }

                    ?>
                </div>
            </div>

            <div class="video-upload">
                <form action="php_Operation/upload_video.php" method="POST" enctype="multipart/form-data">
                    <label for="file">Title</label>
                    <input id="file" type="text" name="title" placeholder="Enter File Name">
                    <label for="vid">Link Video</label>
                    <input id="vid" type="file" name="file" accept="video/*">
                    <button class="upBtn" type="submit" name="submit">UPLOAD</button>

                    <?php
                        $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

                        if (strpos($fullUrl, "title=empty") == true || strpos($fullUrl, "path=empty") == true) {
                            echo "<p style='position:absolute;bottom:-45%;padding: 20px 0 10px 0; color: red;'>Eempty Form!</p>";
                            exit();
                        }
                        else if (strpos($fullUrl, "title=NotBodyPart") == true) {
                            echo "<p style='position:absolute;bottom:-45%;padding: 20px 0 10px 0; color: red;'>Enter Existing BodyPart!</p>";
                            exit();
                        }
                        else if (strpos($fullUrl, "title=invalid" ) == true) {
                            echo "<p style='position:absolute;bottom:-45%;padding: 20px 0 10px 0; color: red;'>Invalid Title!</p>";
                            exit();
                        }
                        else if (strpos($fullUrl, "upload=success") == true) {
                            echo "<p style='position:absolute;bottom:-45%;padding: 20px 0 10px 0; color: blue;'>Video Uploaded!</p>";
                            exit();
                        }
                ?>

                </form> 
            </div>

        </div>
    </section>
    <my-footer></my-footer>


    <script type="module" src="js/footer.js"></script>
</body>
</html>