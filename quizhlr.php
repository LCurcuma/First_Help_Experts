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
<a href="quiz.php" class="arrow_back">
    <i class="fa-solid fa-chevron-left pb-4 p-4" style="color: #121212"></i>
</a>

<div id="quiz-screen" class="quiz">
    <div class="px-4 mb-4 quiz-proces">
        <span id="progress-text" class="quiz-progress-text d-block text-center mb-2">Spørgsmål 1 ud af 10</span>
        <div class="quiz-progress">
            <div class="progress">
                <div id="progress-bar" class="progress-bar" role="progressbar" style="width: 0%;"></div>
            </div>
        </div>
    </div>

    <div class="px-4 mb-2">
        <p id="question-text" class="spg-text fw-bolder">Spørgsmål indlæses...</p>
    </div>

    <div class="px-4">
        <div class="quiz-img-con">
            <img id="quiz-image" src="" alt="Situation" class="quiz-image">
        </div>
    </div>

    <div class="px-4" id="options-container"></div>
</div>

<div id="result-screen" class="px-2 py-3 text-center d-none">
    <div class="mb-2">
        <img src="img/icons/3d-icons/checkmark2.png" class="check-img" alt="">
    </div>
    <p class="færdig-text">Sådan, du klarede det!</p>
    <p class="skala-text mb-3">Du fik <span id="correct-score" class="fw-bold">0</span> ud af <span id="total-questions" class="fw-bold">10</span> rigtige.</p>

    <a href="forside.php" class="btn slutquiz-knap py-3">Gå til forsiden</a>
</div>


<script src="quiz.js"></script>
<!------------ Bootstrap library ------------>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
