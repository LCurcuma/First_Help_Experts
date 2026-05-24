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

<!-- Velkommen tekst -->
<div class="fp-container mt-5" data-aos="zoom-in">

    <h1 class="fw-bold display-5 mb-2">Hej <?php echo $userData[0]->name ?>!</h1>

    <p class="fs-4" id="motivationalText">Klar til at redde liv i dag?</p>

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
            <a href="quiz.php?id=1" class="fp-action-card fp-card-purple text-white text-decoration-none position-relative d-block">

                <h2 class="fw-semibold fs-5">Start quiz</h2>

                <p class="fp-card-subtitle">Test din viden</p>

                <img src="img/icons/3d-icons/clipboard.png" alt="Quiz ikon" class="fp-card-icon">

            </a>
        </div>

        <!-- Card: Læs guide -->
        <div class="col-6">
            <a href="guides.php?id=1" class="fp-action-card fp-card-blue text-white text-decoration-none position-relative d-block">

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
            <a href="shop.php?id=1" class="fp-action-card fp-card-orange text-white text-decoration-none position-relative d-block">

                <h2 class="fw-semibold fs-5">Se dine point</h2>

                <p class="fp-card-subtitle">Vælg lækre <br> præmier</p>

                <img src="img/icons/3d-icons/money.png" alt="Point ikon" class="fp-card-icon">

            </a>
        </div>

    </div>

</div>

<script>
    //Vælg et tilfældigt motiverende tekst ved load af forside.php

    //Liste med de forskellige tekster
    const motivationTexts = [
        "Klar til at redde liv i dag?",
        "Førstehjælp starter med dig",
        "Små handlinger kan redde store liv",
        "Hjælp kan starte med dine hænder.",
        "Bliv den person, andre håber er tæt på.",
        "Tryghed starter med viden."
    ];

    //Finder elementet med id "motivationalText"
    const textElement = document.getElementById("motivationalText");

    // Generer et tilfældigt tal baseret på hvor mange tekster der er i listen
    const randomIndex = Math.floor(Math.random() * motivationTexts.length);

    //Skifter teksten med det samme til den tilfældige udvalgte tekst fra listen
    textElement.textContent = motivationTexts[randomIndex];
</script>

<!------------ Bootstrap library ------------>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!------------ AOS LIBRARY ------------>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>

</body>
</html>
