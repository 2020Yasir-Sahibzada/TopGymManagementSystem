<?php
    session_start();

    if (!isset($_SESSION['userLogin'])) {
        header("Location: ../sign_in.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Yasir Top Gym - About Us</title>
    <link rel="stylesheet" href="css_style/about.css">
    <script type="module" src="js/header.js"></script>
</head>
<body>
    <my-header></my-header>
    <div id="wrapper">
        <h1>Our Team</h1>
        <div class="our_team">
            <div class="team_member">
                <div class="member_img">
                    <img src="img/Aimal.jpg" alt="">
                </div>
                <h3>Aimal Afghan</h3>
                <span>Gym Owner</span>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates, quidem.</p>
            </div>

            <div class="team_member">
                <div class="member_img">
                    <img src="img/Mohib.jpg" alt="">
                </div>
                <h3>Mohibullah</h3>
                <span>Trainer & Owner</span>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aspernatur, ab!</p>
            </div>

            <div class="team_member">
                <div class="member_img">
                    <img src="img/Wakil.jpg" alt="">
                </div>
                <h3>Abdul Wakil</h3>
                <span>Cashier</span>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laborum, reprehenderit.</p>
            </div>

            <div class="team_member">
                <div class="member_img">
                    <img src="img/Yasir.jpg" alt="">
                </div>
                <h3>Yasir Sahibzada</h3>
                <span>Trainer</span>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nemo, voluptate!</p>
            </div>
        </div>
    </div>
    <my-footer></my-footer>


    <script type="module" src="js/footer.js"></script>
</body>
</html>