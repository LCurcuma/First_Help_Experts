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

    <title>guides</title>

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


    <!-- Favicon: https://favicon.io/favicon-converter/ -->
    <link rel="apple-touch-icon" sizes="180x180" href="img/logo/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="img/logo/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="img/logo/favicon/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">


</head>

<body>

<div class="d-flex justify-content-center">
    <div class="phone-container">

        <div class="row mb-3">
            <div class="col-12">
                <a href="index.php" class="back-arrow">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M15 19L8 12L15 5" stroke="#000000" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                </a>
            </div>
        </div>

<div class="row g-0 mb-4">
    <div class="col-4 px-1">
        <div class="data-card bg-data-salmon" data-bs-toggle="modal" data-bs-target="#infoModal" data-title="DE 4 H'ER"  data-bs-text="....">
            <div class="card-image-wrapper">
                <img src="img/icons/3d-icons/hlr.png" alt="De 4 H'er">
            </div>
            <div class="card-text-wrapper">
                <span>DE 4 H'ER</span>
            </div>
        </div>
    </div>

    <div class="col-4 px-1">
        <div class="data-card bg-data-violet" data-bs-toggle="modal" data-bs-target="#infoModal" data-title="ABC" data-text="Her kan du skrive info om ABC metoden...">
            <div class="card-image-wrapper">
                <img src="img/icons/3d-icons/oxygen mask.png" alt="ABC">
            </div>
            <div class="card-text-wrapper">
                <span>ABC</span>
            </div>
        </div>
    </div>

    <div class="col-4 px-1">
        <div class="data-card bg-data-blue" data-bs-toggle="modal" data-bs-target="#infoModal" data-title="ALARM" data-text="Her kan du skrive info om Alarm 112...">
            <div class="card-image-wrapper">
                <img src="img/icons/3d-icons/112.png" alt="Alarm">
            </div>
            <div class="card-text-wrapper">
                <span>ALARM</span>
            </div>
        </div>
    </div>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
