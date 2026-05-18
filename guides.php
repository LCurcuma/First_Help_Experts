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
                   <i class="bi bi-chevron-left"></i>
                </a>
            </div>
        </div>

<div class="row g-0 mb-4">
    <div class="col-4 px-1">
        <div class="data-card bg-data-salmon" data-bs-toggle="modal" data-bs-target="#infoModal" data-title="DE 4 H'ER" data-text="🚨 Skab sikkerhed&#10;Sørg for, at ulykken ikke bliver værre – og pas på dig selv først.&#10;&#10;👀 Vurder personen&#10;Tjek om personen er ved bevidsthed og reagerer.&#10;&#10;📞 Tilkald hjælp&#10;Ring 1-1-2 hvis ingen andre allerede har gjort det.&#10;&#10;🩹 Giv førstehjælp&#10;Hjælp personen efter situationen, indtil hjælpen kommer.">
            <div class="card-image-wrapper">
                <img src="img/icons/3d-icons/hlr.png" alt="De 4 H'er">
            </div>
            <div class="card-text-wrapper">
                <span>DE 4 H'ER</span>
            </div>
        </div>
    </div>

    <div class="col-4 px-1">
        <div class="data-card bg-data-violet" data-bs-toggle="modal" data-bs-target="#infoModal" data-title="ABC" data-text="👄 A – Airway&#10;Sørg for frie luftveje.&#10;&#10;💨 B – Breathing&#10;Tjek om personen trækker vejret normalt.&#10;&#10;❤️ C – Circulation&#10;Undersøg blodcirkulation og stop kraftige blødninger.">
            <div class="card-image-wrapper">
                <img src="img/icons/3d-icons/oxygen mask.png" alt="ABC">
            </div>
            <div class="card-text-wrapper">
                <span>ABC</span>
            </div>
        </div>
    </div>

    <div class="col-4 px-1">
        <div class="data-card bg-data-blue" data-bs-toggle="modal" data-bs-target="#infoModal" data-title="ALARM" data-text="📞 Når du ringer 1-1-2&#10;&#10;🔴 Hvad&#10;Fortæl kort hvad der er sket.&#10;&#10;👤 Hvem&#10;Fortæl hvem og hvor mange der er kommet til skade.&#10;&#10;📍 Hvor&#10;Oplys den præcise adresse eller placering.&#10;&#10;🩺 Hvordan&#10; Beskriv personens tilstand og skader.&#10;&#10;☎️ Bliv i røret og følg alarmcentralens vejledning."">
            <div class="card-image-wrapper">
                <img src="img/icons/3d-icons/112.png" alt="Alarm">
            </div>
            <div class="card-text-wrapper">
                <span>ALARM</span>
            </div>
        </div>
    </div>

</div>

        <div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
            <div class="modal-dialog px-3 custom-modal-position">
                <div class="modal-content custom-modal">
                    <div class="modal-header border-0 pb-0">
                        <h5 class="modal-title" id="infoModalLabel">Kort Titel</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Luk"></button>
                    </div>
                    <div class="modal-body pt-3">
                        <p id="modalBodyText" style="white-space: pre-line;"></p>
                    </div>
                </div>
            </div>
        </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

        <script>
            const infoModal = document.getElementById('infoModal');
            if (infoModal) {
                infoModal.addEventListener('show.bs.modal', function (event) {
                    // Det specifikke kort der lige er blevet klikket på
                    const card = event.relatedTarget;

                    // Hent data-title="..." og data-text="..." fra kortet
                    const title = card.getAttribute('data-title');
                    const text = card.getAttribute('data-text');

                    // Find elementerne inde i selve popup-boksen
                    const modalTitle = infoModal.querySelector('.modal-title');
                    const modalBodyText = document.getElementById('modalBodyText');

                    // Indsæt den korrekte tekst og overskrift
                    modalTitle.textContent = title;
                    modalBodyText.textContent = text;
                });
            }
        </script>

</body>
</html>
