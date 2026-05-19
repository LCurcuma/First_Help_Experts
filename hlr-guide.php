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

    <title>hlr-guide</title>

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

<div class="guide-container">

    <div class="row mb-3 back-arrow-container">
        <div class="col-12">
            <a href="guides.php" class="back-arrow">
                <i class="bi bi-chevron-left"></i>
            </a>
        </div>
    </div>

    <h2 class="HLR-h2">Hjerte-lunge redning</h2>

    <div class="steps-header">
        <span class="step-badge" id="badge-1" data-trin="0">Tjek</span>
        <span class="step-badge" id="badge-2" data-trin="1">Ring</span>
        <span class="step-badge" id="badge-3" data-trin="2">Tryk</span>
        <span class="step-badge" id="badge-4" data-trin="3">hjertestater</span>
        <span class="step-badge" id="badge-5" data-trin="4">Fortsæt</span>
    </div>

    <div class="guide-content">
        <div class="image-container">
        <img id="guide-image" src="" alt="Guide illustration" style="max-width: 100%; height: auto; display: block; margin: 0 auto 20px ">
        </div>
        <h3 id="step-title"></h3>
        <p id="step-text"></p>

        <div id="husk-box" class="husk-box">
            <strong>💡 HUSK:</strong> <span id="husk-text"></span>
        </div>
    </div>

    <div class="guide-footer">
        <button id="next-btn" class="next-button">NÆSTE TRIN</button>

        <div class="progress-dots">
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </div>
    </div>
</div>




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<script>

    const trinData = [
        {
            titel: "1. Tjek bevidsthed",
            tekst: "Rusk forsigtigt personen i skuldrene og spørg højt: 'Er du okay?'",
            husk: "Hvis personen ikke reagerer, gå videre til næste trin.",
            billede: "img/icons/3d-icons/debris.png"
        },
        {
            titel: "2. Ring 1-1-2",
            tekst: "Hvis personen ikke reagerer, ring straks 1-1-2 eller få en anden til det.",
            husk: "Sæt telefonen på højtaler, så du har hænderne fri.",
            billede: "img/icons/3d-icons/Alarm.png"
        },
        {
            titel: "3. Start HLR",
            tekst: "Giv 30 brystkompressioner og 2 indblæsninger. Tryk hårdt og hurtigt midt på brystet.",
            husk: "skab fri luftvej og tryk 5-6 cm dybt.",
            billede: "img/icons/3d-icons/HLR-start.png"
        },
        {
            titel: "4. Brug hjertestarter",
            tekst: "Bed nogen hente hjertestarteren, eller hent den selv, og følg vejledningen.",
            husk: "Følg de talte instruktioner fra maskinen nøje.",
            billede: "img/icons/3d-icons/CPR-defi.png"
        },
        {
            titel: "5. Fortsæt indtil hjælp kommer",
            tekst: "Bliv ved med HLR og brug hjertestarteren indtil ambulancen overtager.",
            husk: "Skift hjælper hver 2. minut, hvis muligt.",
            billede: "img/icons/3d-icons/ambulance.png"
        }
    ];

    let nuvaerendeTrin = 0;

    // Hent HTML-elementerne
    const guideImage = document.getElementById("guide-image");
    const stepTitle = document.getElementById("step-title");
    const stepText = document.getElementById("step-text");
    const huskText = document.getElementById("husk-text");
    const nextBtn = document.getElementById("next-btn");
    const dots = document.querySelectorAll(".dot");
    const badges = document.querySelectorAll(".step-badge"); // Hent badges i toppen

    function opdaterSkerm() {
        const data = trinData[nuvaerendeTrin];

        // Opdater billede og tekst
        guideImage.src = data.billede;
        stepTitle.innerText = data.titel;
        stepText.innerText = data.tekst;
        huskText.innerText = data.husk;

        // Skift knaptekst og farve på sidste trin
        if (nuvaerendeTrin === trinData.length - 1) {
            nextBtn.innerText = "AFSLUT GUIDE";
            nextBtn.style.backgroundColor = "#2196F3";
        } else {
            nextBtn.innerText = "NÆSTE TRIN";
            nextBtn.style.backgroundColor = "#5CD685";
        }

        // DYNAMISK FIX: Opdater hvilken knap i toppen der er aktiv
        badges.forEach((badge, index) => {
            if (index === nuvaerendeTrin) {
                badge.classList.add("active");
            } else {
                badge.classList.remove("active");
            }
        });

        // Opdater de små prikker i bunden
        dots.forEach((dot, index) => {
            if (index === nuvaerendeTrin) {
                dot.classList.add("active");
            } else {
                dot.classList.remove("active");
            }
        });
    }

    badges.forEach(badge => {
        badge.addEventListener("click", function() {
            nuvaerendeTrin = parseInt(this.getAttribute("data-trin"));
            opdaterSkerm();
        });
    });

    // Klik-hændelse
    nextBtn.addEventListener("click", () => {
        if (nuvaerendeTrin < trinData.length - 1) {
            nuvaerendeTrin++;
            opdaterSkerm();
        } else {
            alert("Du har gennemført guiden!");
            nuvaerendeTrin = 0;
            opdaterSkerm();
        }
    });

    // Indlæs første trin ved start
    opdaterSkerm();

</script>

</body>
</html>
