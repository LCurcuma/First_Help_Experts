<?php
/**
 * @var db $db
 */

require "settings/init.php";
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

<body class="bodyquiz">

<!------------ TILBAGEKNAP ------------>
<a href="forside.php" class="arrow_back">
    <i class="fa-solid fa-chevron-left pb-4 p-4" style="color: #121212"></i>
</a>

<!------------ KATEGORI CARDS ------------>
<div class="px-4">
    <div class="row g-4">
        <div class="col-6">
            <div class="emne-card">
                <img src="img/icons/3d-icons/hlr.png" alt="Person der laver HLR" class="emne-card-img">
                <p>HLR</p>
            </div>
        </div>

        <div class="col-6">
            <div class="emne-card">
                <img src="img/icons/3d-icons/defibrillator.png" alt="Person der laver HLR" class="emne-card-img">
                <p>HLR med hjertestarter</p>
            </div>
        </div>

        <div class="col-6">
            <div class="emne-card">
                <img src="img/icons/3d-icons/drowning.png" alt="Person der laver HLR" class="emne-card-img">
                <p>Drukning</p>
            </div>
        </div>

        <div class="col-6">
            <div class="emne-card">
                <img src="img/icons/3d-icons/armsling.png" alt="Person der laver HLR" class="emne-card-img">
                <p>Forbinding</p>
            </div>
        </div>

        <div class="col-6">
            <div class="emne-card">
                <img src="img/icons/3d-icons/burn-hand.png" alt="Person der laver HLR" class="emne-card-img">
                <p>Brandsår</p>
            </div>
        </div>

        <div class="col-6">
            <div class="emne-card">
                <img src="img/icons/3d-icons/ulykke.png" alt="Person der laver HLR" class="emne-card-img">
                <p>Bilulykke</p>
            </div>
        </div>

        <div class="col-6">
            <div class="emne-card">
                <img src="img/icons/3d-icons/hlr.png" alt="Person der laver HLR" class="emne-card-img">
                <p>Kvælning</p>
            </div>
        </div>

        <div class="col-6">
            <div class="emne-card">
                <img src="img/icons/3d-icons/hlr.png" alt="Person der laver HLR" class="emne-card-img">
                <p>Stroke</p>
            </div>
        </div>
    </div>
</div>
<!------------ KATEGORI CARDS ------------>



<!------------ Bootstrap library ------------>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

