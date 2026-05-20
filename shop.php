<?php
/**
 * @var db $db
 */

require "settings/init.php";

//tage data fra json-fil
$json = file_get_contents("data/data_shop.json");

$data = json_decode($json, true);
?>
    <!DOCTYPE html>
    <html lang="da">
    <head>
        <meta charset="utf-8">

        <title>Forside - Førstehjælpeksperten</title>

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


    </head>

    <body>
    <!--MOBILE VERSION-->
    <div class="d-flex flex-column d-lg-none">
        <a href="user.php" class="arrow_back_to_user">
            <i class="fa-solid fa-chevron-left" style="color: rgb(0, 0, 0);"></i>
        </a>
        <?php include "components/money_container_shop.php"; ?>
        <div class="cards_container">
        <?php
        //loop for at lave cards, som har data fra json fil
        foreach($data as $card) {
            //lave variables, som har forskellige data fra json-fil
            $id = $card["id"];
            $name = $card["name"];
            $desc = $card["description"];
            $points = $card["points"];
            $img_src = $card["img_src"];
            $alt = $card["alt"];
            $color = $card['color'];
            //includere card med DEN data
            include "components/shop_card.php";
        } ?>
        </div>
    </div>

    <!--DESKTOP VERSION-->
    <div class="d-none flex-column d-lg-block">
        <div class="container">
            <div class="row">
                <div class="col col-8 shop_column">
                    <a href="forside.php" class="arrow_back_to_user">
                        <i class="fa-solid fa-chevron-left" style="color: rgb(0, 0, 0);"></i>
                    </a>
                    <div class="cards_container">
                        <?php
                        //loop for at lave cards, som har data fra json fil
                        foreach($data as $card) {
                            //lave variables, som har forskellige data fra json-fil
                            $id = $card["id"];
                            $name = $card["name"];
                            $desc = $card["description"];
                            $points = $card["points"];
                            $img_src = $card["img_src"];
                            $alt = $card["alt"];
                            $color = $card['color'];
                            //includere card med DEN data
                            include "components/shop_card.php";
                        } ?>
                    </div>
                </div>

                <!--USER SECTION DESKTOP, SOM KAN GENNEMBRUGES-->
                <div class="col col-4 user_section">
                    <div class="top_container">
                        <!--the container with points-->
                        <?php include "components/money_container.php" ?>
                    </div>
                    <!--the avatar container-->
                    <?php include "components/avatar.php" ?>
                    <!--the score container-->
                    <?php include "components/score_container_user.php" ?>
                    <!--container med links-->
                    <section class="links_section">
                        <a href="" class="link_tile" style="background: #CDB4D1;" onclick="alert('Funktion kommer snart')">
                            <h2 class="h2_bold">Check ind</h2>
                            <div class="plus_money">
                                <h2>+5</h2>
                                <img src="img/icons/3d-icons/money.png" class="money_plus_image" alt="Points">
                            </div>
                        </a>
                        <a href="shop.php" class="link_tile" style="background: #88DB95;">
                            <div>
                                <h2 class="h2_bold">Point shop</h2>
                                <p>350 tilgængelige rewards</p>
                            </div>
                            <img src="img/icons/3d-icons/money.png" class="money_image_big" alt="Points">
                        </a>
                        <a href="" class="link_tile" style="background: #F5A623;" onclick="alert('Funktion kommer snart')">
                            <div>
                                <h2 class="h2_bold">Din førstehjælpsbevis</h2>
                                <p>Gyldig til <span>12.04.2026</span></p>
                            </div>
                            <img src="img/icons/3d-icons/checkmark2.png" class="money_image_big" alt="Check">
                        </a>
                    </section>

                    <a href="index.php" class="logout">Log ud</a>
                </div>
                <!--USER SECTION DESKTOP, SOM KAN GENNEMBRUGES-->
            </div>
        </div>
    </div>

    <?php
    //loop for at lave cards, som har data fra json fil
    foreach($data as $card) {
        //lave variables, som har forskellige data fra json-fil
        $id = $card["id"];
        $name = $card["name"];
        $desc = $card["description"];
        $points = $card["points"];
        $img_src = $card["img_src"];
        $alt = $card["alt"];
        $color = $card['color'];
        //includere card med DEN data
        include "components/shop_modal.php";
    } ?>

    <script src="func/withdraw.js"></script>
    <!------------ Bootstrap library ------------>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <!------------ AOS LIBRARY ------------>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>


    </body>
    </html>