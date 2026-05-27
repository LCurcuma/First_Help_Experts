<?php
/**
 * @var db $db
 */

require "settings/init.php";

// Inkluderer PHP filen der styrer point for dagens mission
require "func/fp_add_points.php";
//tage id fra link ("forside.php? ->id=1<- id, som bruges")
$id = $_GET["id"];
//tage data om bruger med den id
$userData = $db->sql("SELECT * FROM users WHERE id = '$id'");
//tage navn som string og lave array, som eksemplevis ["Laura", "Larsen"]
$nameArray = explode(" ", $userData[0]->name);
?>
<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title>Forside - Førstehjælpseksperten</title>

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

<body class="bg-white">

<!--------------- MOBIL LAYOUT -------------->
<div class="d-lg-none">

    <!-- Velkommen tekst -->
    <div class="fp-container mt-5" data-aos="zoom-in">

        <h1 class="fw-bold display-5 mb-2">Hej <?php echo $nameArray[0] ?>!</h1>

        <p class="fs-4 motivational-text-js">Klar til at redde liv i dag?</p>

    </div>

    <!-- Weekly missions card -->
    <div class="d-flex justify-content-center align-content-center fp-container mt-4" data-aos="zoom-in">

        <?php include 'components/weekly-missions-card.php';?>

    </div>

    <!-- Grid med de 4 cards -->
    <div class="d-flex justify-content-center align-content-center fp-container mt-4" data-aos="zoom-in">

        <div class="row g-3 fp-action-cards-grid">

            <!-- Card: Start quiz -->
            <div class="col-6">
                <a href="quiz.php?id=<?php echo $userData[0]->id ?>" class="fp-action-card fp-card-purple text-white text-decoration-none position-relative d-block">

                    <h2 class="fw-semibold fs-5">Start quiz</h2>

                    <p class="fp-card-subtitle">Test din viden</p>

                    <img src="img/icons/3d-icons/clipboard.png" alt="Quiz ikon" class="fp-card-icon">

                </a>
            </div>

            <!-- Card: Læs guide -->
            <div class="col-6">
                <a href="guides.php?id=<?php echo $userData[0]->id ?>" class="fp-action-card fp-card-blue text-white text-decoration-none position-relative d-block">

                    <h2 class="fw-semibold fs-5 mb-1">Læs guide</h2>

                    <p class="fp-card-subtitle">Udvid din viden</p>

                    <img src="img/icons/3d-icons/heart.png" alt="Guide ikon" class="fp-card-icon">

                </a>
            </div>

            <!-- Card: Dagens mission -->
            <div class="col-6">
                <a href="#" class="fp-action-card fp-card-pink text-white text-decoration-none position-relative d-block">

                    <h2 class="fw-semibold fs-5 mb-1">Dagens mission</h2>

                    <p class="fp-card-subtitle">Svar på dagens <br> spørgsmål</p>

                    <div class="d-flex align-items-center">

                        <span class="fw-medium fs-6">+10</span>

                        <img src="img/icons/3d-icons/money.png" alt="Mønt ikon" class="ms-1 fp-small-coin">

                    </div>

                    <img src="img/icons/3d-icons/questionmarks.png" alt="Mission ikon" class="fp-card-icon">

                </a>
            </div>

            <!-- Card: Se dine point -->
            <div class="col-6">
                <a href="shop.php?id=<?php echo $userData[0]->id ?>" class="fp-action-card fp-card-orange text-white text-decoration-none position-relative d-block">

                    <h2 class="fw-semibold fs-5">Se dine point</h2>

                    <p class="fp-card-subtitle">Vælg lækre <br> præmier</p>

                    <img src="img/icons/3d-icons/money.png" alt="Point ikon" class="fp-card-icon">

                </a>
            </div>

        </div>
    </div>

    <!-- Nyheder section -->
    <div class="mt-4 mb-5" data-aos="zoom-in">

        <!-- Overskrift til nyheder -->
        <h2 class="text-center fw-bold mb-2 fp-news-heading">NYHEDER</h2>

        <!-- Container med slider/kort -->
        <div class="fp-slider-container" id="newsSlider">
        <!-- Her indsætter JavaScript alle nyhedskort -->
        </div>

        <!-- Indicators/dots under slider -->
        <div class="d-flex justify-content-center mt-3" id="sliderIndicators">
            <!-- Her laver JavaScript automatisk indicator dots -->
        </div>

    </div>
</div>
<!--------------- MOBIL LAYOUT -------------->


<!-------------- DESKTOP LAYOUT ------------->
<div class="d-none d-lg-block container mt-5" >

    <!-- Desktop grid layout -->
    <div class="row g-5">

        <!-- Venstre side med cards og nyheder -->
        <div class="col-8 ">

            <!-- Velkomst tekst -->
            <div class="mb-4" data-aos="zoom-in">

                <h1 class="fw-bold display-4 mb-2">Hej <?php echo $nameArray[0] ?>!</h1>

                <p class="fs-4 motivational-text-js">Klar til at redde liv i dag?</p>

            </div>

            <!-- Grid med action cards -->
            <div class="row g-3" data-aos="zoom-in">

                <!-- Card: Start quiz -->
                <div class="col-6">

                    <a href="quiz.php?id=<?php echo $userData[0]->id ?>" class="fp-action-card fp-card-purple text-white text-decoration-none position-relative d-block">

                        <h2 class="fw-semibold fs-4">Start quiz</h2>

                        <p class="fp-card-subtitle">Test din viden</p>

                        <img src="img/icons/3d-icons/clipboard.png" alt="Hjerne ikon" class="fp-card-icon">

                    </a>
                </div>

                <!-- Card: Læs guide -->
                <div class="col-6">

                    <a href="guides.php?id=<?php echo $userData[0]->id ?>" class="fp-action-card fp-card-blue text-white text-decoration-none position-relative d-block">

                        <h2 class="fw-semibold fs-4 mb-1">Læs guide</h2>

                        <p class="fp-card-subtitle">Udvid din viden</p>

                        <img src="img/icons/3d-icons/heart.png" alt="Guide ikon" class="fp-card-icon">

                    </a>
                </div>

                <!-- Card: Ugens mission -->
                <div class="col-6">
                    <?php include 'components/weekly-missions-card2-desktop.php'; ?>
                </div>

                <!-- Card: Dagens mission -->
                <div class="col-6">

                    <a href="#" class="fp-action-card fp-card-pink text-white text-decoration-none position-relative d-block">

                        <h2 class="fw-semibold fs-4 mb-1">Dagens mission</h2>

                        <p class="fp-card-subtitle">Svar på dagens <br> spørgsmål</p>

                        <!-- Point reward -->
                        <div class="d-flex align-items-center">

                            <span class="fw-medium fs-5">+10</span>

                            <img src="img/icons/3d-icons/money.png" alt="Mønt ikon" class="ms-1 fp-small-coin">

                        </div>

                        <img src="img/icons/3d-icons/questionmarks.png" alt="Mission ikon" class="fp-card-icon">

                    </a>

                </div>

            </div>

            <!-- Nyheder section -->
            <div class="mt-5 mb-5" data-aos="zoom-in">

                <!-- Nyheder overskrift -->
                <h2 class="text-start fw-bold mb-4 fp-news-heading">NYHEDER</h2>

                <!-- News slider -->
                <div class="fp-slider-container" id="newsSliderDesktop"></div>

                <!-- Slider indicators -->
                <div class="d-flex justify-content-center mt-3" id="sliderIndicatorsDesktop"></div>

            </div>

        </div>

        <!-- USER SECTION.PHP COMPONENTS -->
        <div class="col col-4 user_section" data-aos="zoom-in">
            <?php include "components/user_section.php"; ?>
        </div>

    </div>
</div>
<!-------------- DESKTOP LAYOUT ------------->


<!-------------- DAGENS MISSION ------------->
<!-- Gemmer den aktuelle brugers ID -->
<input type="hidden" id="currentUserId" value="<?php echo $userData[0]->id; ?>">

<!-- Modal til dagens mission -->
<div class="modal fade" id="dailyMissionModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 rounded-4 bg-white shadow p-4">

            <!-- Luk knap -->
            <div class="d-flex justify-content-end mb-2">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Luk"></button>
            </div>

            <!-- Modal indhold -->
            <div class="modal-body text-center p-0">

                <!-- Titel -->
                <div class="fw-bold text-dark fs-4 mb-2">
                    Dagens Mission
                </div>

                <!-- Spørgsmål tekst -->
                <div id="missionQuestionText" class="text-muted fs-6 mb-4">
                    Henter spørgsmål...
                </div>

                <!-- Svarmuligheder -->
                <div id="missionOptionsContainer" class="d-flex flex-column gap-3 mt-3">
                </div>

            </div>
        </div>
    </div>
</div>

<!-- Formular til at tilføje point -->
<form id="pointsForm" method="POST" action="">

    <!-- Antal point der tilføjes -->
    <input type="hidden" name="add_daily_points" value="10">

    <!-- Brugerens ID -->
    <input type="hidden" name="user_id" value="<?php echo $userData[0]->id; ?>">

</form>
<!-------------- DAGENS MISSION ------------->


<!------------ Bootstrap library ------------>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!--------- Motivation text script ---------->
<script src="func/fp-motivationtext.js"></script>

<!---------- Daily mission script ----------->
<script src="func/fp-daily-mission.js"></script>

<!------------ Carousel script -------------->
<script src="func/fp-carousel.js"></script>

<!--------------- AOS LIBRARY --------------->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>

</body>
</html>
