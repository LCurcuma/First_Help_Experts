<?php
/**
 * @var db $db
 */

require "settings/init.php";

//tage data fra json-fil
$json = file_get_contents("data/data_shop.json");
//converterer til json-format, så den kan bruges i JavaScript, for eksempel
$data = json_decode($json, true);

//tage id fra link ("forside.php? ->id=1<- id, som bruges")
$id = $_GET["id"];
//tage data om bruger med den id
$userData = $db->sql("SELECT * FROM users WHERE id = '$id'");

//når man laver withdraw (eller submitter formular)
if (!empty($_POST['withdraw_points']) && !empty($_POST['user_id'])) {

    //tage data om points og id
    $pointsToBuy = (int) $_POST['withdraw_points'];
    $userId = (int) $_POST['user_id'];

    // get current points
    $user = $db->sql("SELECT points FROM users WHERE id = '$userId'");
    $currentPoints = (int) $user[0]->points;

    //hvis bruger har nok points
    if ($pointsToBuy <= $currentPoints) {

        //new points
        $newPoints = $currentPoints - $pointsToBuy;

        //opdaterer database
        $db->sql("UPDATE users SET points = '$newPoints' WHERE id = '$userId'");

        //opdaterer data på side
        $userData = $db->sql("SELECT * FROM users WHERE id = '$id'");
        //gå til den samme side med success index
        header("Location: " . $_SERVER['PHP_SELF'] . "?id=".$userData[0]->id."&success=1");
        exit();
    } else {
        //ellers gå till den samme side med error index
        header("Location: " . $_SERVER['PHP_SELF'] . "?id=".$userData[0]->id."&error=1");
        exit();
    }
}
?>
<!-- hvis success, alerte Købt, ellers - Ikke nok -->
<?php if (isset($_GET['success'])): ?>
    <script>alert('Købt!');</script>
<?php endif; ?>

<?php if (isset($_GET['error'])): ?>
    <script>alert('Ikke nok!');</script>
<?php endif; ?>

    <!DOCTYPE html>
    <html lang="da">
    <head>
        <meta charset="utf-8">

        <title>Shop - Førstehjælpeksperten</title>

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
        <a href="user.php?id=<?php echo $userData[0]->id?>" class="arrow_back_to_user">
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
            <div class="row w-100">
                <div class="col col-8 shop_column">
                    <a href="forside.php?id=<?php echo $userData[0]->id?>" class="arrow_back_to_user">
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
                    <section class="links_section_desk">
                        <a href="#" class="link_tile_desk" style="background: #CDB4D1;" onclick="alert('Funktion kommer snart')">
                            <h2 class="h2_bold">Check ind</h2>
                            <div class="plus_money_desk">
                                <h2>+5</h2>
                                <img src="img/icons/3d-icons/money.png" class="money_plus_image_desk" alt="Points">
                            </div>
                        </a>
                        <a href="shop.php?id=<?php echo $id?>" class="link_tile_desk" style="background: #88DB95;">
                            <div>
                                <h2 class="h2_bold">Point shop</h2>
                                <p>350 tilgængelige rewards</p>
                            </div>
                            <img src="img/icons/3d-icons/money.png" class="money_image_big" alt="Points">
                        </a>
                        <a href="#" class="link_tile_desk" style="background: #F5A623;" onclick="alert('Funktion kommer snart')">
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

    <!------------ Bootstrap library ------------>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Funktion for Withdraw -->
    <script src="func/startWithdraw.js"></script>
    <!------------ AOS LIBRARY ------------>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>


    </body>
    </html>