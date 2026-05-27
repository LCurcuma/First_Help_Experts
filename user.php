<?php
/**
 * @var db $db
 */

require "settings/init.php";
//tage id fra link ("forside.php? ->id=1<- id, som bruges")
$id = $_GET["id"];
//tage data om bruger med den id
$userData = $db->sql("SELECT * FROM users WHERE id = '$id'");
?>
    <!DOCTYPE html>
    <html lang="da">
    <head>
        <meta charset="utf-8">

        <title><?php echo $userData[0]->name ?></title>

        <meta name="robots" content="All">
        <meta name="author" content="Udgiver">
        <meta name="copyright" content="Information om copyright">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Stylesheet -->
        <link href="css/styles.css" rel="stylesheet" type="text/css">

        <!-- Font Awesome ikoner -->
        <script src="https://kit.fontawesome.com/737b386bab.js" crossorigin="anonymous"></script>

        <!-- Bootstraps ikoner -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

        <!-- AOS - Animate On Scroll Library -->
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

        <!-- Favicon: https://favicon.io/favicon-converter/ -->
        <link rel="apple-touch-icon" sizes="180x180" href="img/logo/favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="img/logo/favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="img/logo/favicon/favicon-16x16.png">
        <link rel="manifest" href="/site.webmanifest">

        <!--FontAwesome-->
        <script src="https://kit.fontawesome.com/737b386bab.js" crossorigin="anonymous"></script>
    </head>

    <body>

    <!--DEN KAN TILFØJES TIL FORSIDE DESKTOP VERSION!!!!! BARE FJERN PILE-->
    <div class="top_container">
    <a href="forside.php?id=<?php echo $userData[0]->id?>" class="arrow_back">
        <i class="fa-solid fa-chevron-left" style="color: rgb(0, 0, 0);"></i>
    </a>
        <!--the container with points-->
        <?php include "components/money_container.php" ?>
    </div>
    <!--the avatar container-->
    <?php include "components/avatar.php" ?>
    <!--the score container-->
    <?php include "components/score_container_user.php" ?>
    <!--container med links-->
    <section class="links_section">
        <a href="#" class="link_tile" style="background: #CDB4D1;">
            <h2 class="h2_bold">Check ind</h2>
            <div class="plus_money">
                <h2 class="plus_number">+5</h2>
                <img src="img/icons/3d-icons/money.png" class="money_plus_image" alt="Points">
            </div>
        </a>
        <a href="shop.php?id=<?php echo $userData[0]->id?>" class="link_tile" style="background: linear-gradient(180deg, #fcc260 0%, #daa953 100%);">
            <div>
                <h2 class="h2_bold">Point shop</h2>
                <p>350 tilgængelige rewards</p>
            </div>
                <img src="img/icons/3d-icons/money.png" class="money_image_big" alt="Points">
        </a>
        <a href="#" class="link_tile" style="background: #77e37d;">
            <div>
                <h2 class="h2_bold_mobile_small">Din første<br/>hjælps<br/>bevis</h2>
                <h2 class="h2_bold_mobile_big">Din førstehjælpsbevis</h2>
                <p>Gyldig til <span>12.04.2026</span></p>
            </div>
            <img src="img/icons/3d-icons/checkmark2.png" class="money_image_big" alt="Check">
        </a>
    </section>

    <a href="index.php" class="logout">Log ud</a>

    <!--DEN KAN TILFØJES TIL FORSIDE DESKTOP VERSION!!!!! BARE FJERN PILE-->
    <!------------ Bootstrap library ------------>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!------------ AOS LIBRARY ------------>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
    </body>
    </html>
