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
    <title>Training Videos - Yasir Top Gym</title>
    <link rel="stylesheet" href="css_style/display_videos.css">
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

                        include_once 'php_Operation/connectionFile.php';

                        $title = $_GET['train'];

                        $sql = "SELECT * FROM `vid` WHERE title='$title';";
                        $result = mysqli_query($con, $sql);
                        if ($result) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $title = $row['title'];
                                $Vid = $row['uploadedVid'];

                                echo '
                                    <div class="eachVid">
                                        <div style="padding-left: 5px"><video src="data:video/mp4;base64,'.base64_encode($row['uploadedVid']).'" height="200px" width="200" controls></div>
                                        <h3 style="text-transform: uppercase;color: #F44336;margin-left: 5px;">'.$title.'</h3>
                                    </div>
                                ';
                            }
                        }else {
                            echo "There is no video added!";
                        }

                    ?>
                </div>
            </div>
        </div>
    </section>
    <my-footer></my-footer>


    <script type="module" src="js/footer.js"></script>
</body>
</html>