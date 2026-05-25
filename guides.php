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

<div class="d-flex justify-content-center d-lg-none">
    <div class="phone-container">

        <div class="row mb-3">
            <div class="col-12">
                <a href="forside.php" class="back-arrow">
                   <i class="bi bi-chevron-left"></i>
                </a>
            </div>
        </div>

        <div class="row g-0 mb-4">
            <div class="col-4 px-1">
        <div class="data-card bg-data-salmon cursor-pointer-p" data-bs-toggle="modal" data-bs-target="#infoModal" data-title="DE 4 H'ER" data-text="🚨 Skab sikkerhed&#10;Sørg for, at ulykken ikke bliver værre – og pas på dig selv først.&#10;&#10;👀 Vurder personen&#10;Tjek om personen er ved bevidsthed og reagerer.&#10;&#10;📞 Tilkald hjælp&#10;Ring 1-1-2 hvis ingen andre allerede har gjort det.&#10;&#10;🩹 Giv førstehjælp&#10;Hjælp personen efter situationen, indtil hjælpen kommer.">
            <div class="card-image-wrapper">
                <img src="img/icons/3d-icons/hlr.png" alt="De 4 H'er">
            </div>
            <div class="card-text-wrapper">
                <span>DE 4 H'ER</span>
            </div>
        </div>
    </div>

    <div class="col-4 px-1">
        <div class="data-card bg-data-violet cursor-pointer-p" data-bs-toggle="modal" data-bs-target="#infoModal" data-title="ABC" data-text="👄 A – Airway&#10;Sørg for frie luftveje.&#10;&#10;💨 B – Breathing&#10;Tjek om personen trækker vejret normalt.&#10;&#10;❤️ C – Circulation&#10;Undersøg blodcirkulation og stop kraftige blødninger.">
            <div class="card-image-wrapper">
                <img src="img/icons/3d-icons/oxygen mask.png" alt="ABC">
            </div>
            <div class="card-text-wrapper">
                <span>ABC</span>
            </div>
        </div>
    </div>

    <div class="col-4 px-1">
        <div class="data-card bg-data-blue cursor-pointer-p" data-bs-toggle="modal" data-bs-target="#infoModal" data-title="ALARM" data-text="📞 Når du ringer 1-1-2&#10;&#10;🔴 Hvad&#10;Fortæl kort hvad der er sket.&#10;&#10;👤 Hvem&#10;Fortæl hvem og hvor mange der er kommet til skade.&#10;&#10;📍 Hvor&#10;Oplys den præcise adresse eller placering.&#10;&#10;🩺 Hvordan&#10; Beskriv personens tilstand og skader.&#10;&#10;☎️ Bliv i røret og følg alarmcentralens vejledning.">
            <div class="card-image-wrapper">
                <img src="img/icons/3d-icons/112.png" alt="Alarm">
            </div>
            <div class="card-text-wrapper">
                <span>ALARM</span>
            </div>
        </div>
    </div>

</div>


    <div class="row g-3">

        <div class="col-6">
            <a href="hlr-guide.php" class="text-decoration-none">
                <div class="guide-card guide-card-green">
                    <div class="guide-image-wrapper">
                        <img src="img/icons/3d-icons/hlr.png" alt="HLR">
                    </div>
                    <div class="guide-text-wrapper">
                        <span>HLR</span>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-6">
            <a href="blødning-guide.php" class="text-decoration-none">
                <div class="guide-card guide-card-green">
                    <div class="guide-image-wrapper">
                        <img src="img/icons/3d-icons/bleeding.png" alt="Blødninger">
                    </div>
                    <div class="guide-text-wrapper">
                        <span>Blødning</span>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-6">
            <a href="brandsår-guide.php" class="text-decoration-none">
                <div class="guide-card guide-card-green">
                    <div class="guide-image-wrapper">
                        <img src="img/icons/3d-icons/burn-hand.png" alt="Brandsår">
                    </div>
                    <div class="guide-text-wrapper">
                        <span>Brandsår</span>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-6">
            <a href="bevidstløs-guide.php" class="text-decoration-none">
                <div class="guide-card guide-card-green">
                    <div class="guide-image-wrapper">
                        <img src="img/icons/3d-icons/recovery-position.png" alt="Bevidstløshed">
                    </div>
                    <div class="guide-text-wrapper">
                        <span>Bevidstløshed</span>
                    </div>
                </div>
            </a>
        </div>

        <div class="col-6">
            <div class="guide-card" onclick="alert('Funktionen er på vej!')">
                <div class="guide-image-wrapper">
                    <img src="img/icons/3d-icons/defibrillator.png" alt="HLR med hjertestarter">
                </div>
                <div class="guide-text-wrapper">
                    <span>HLR med hjertestarter</span>
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="guide-card" onclick="alert('Funktionen er på vej!')">
                <div class="guide-image-wrapper">
                    <img src="img/icons/3d-icons/drowning.png" alt="Drukning">
                </div>
                <div class="guide-text-wrapper">
                    <span>Drukning</span>
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="guide-card" onclick="alert('Funktionen er på vej!')">
                <div class="guide-image-wrapper">
                    <img src="img/icons/3d-icons/ulykke.png" alt="Bilulykke">
                </div>
                <div class="guide-text-wrapper">
                    <span>Bilulykke</span>
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="guide-card" onclick="alert('Funktionen er på vej!')">
                <div class="guide-image-wrapper">
                    <img src="img/icons/3d-icons/choking.png" alt="Kvælning">
                </div>
                <div class="guide-text-wrapper">
                    <span>Kvælning</span>
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="guide-card" onclick="alert('Funktionen er på vej!')">
                <div class="guide-image-wrapper">
                    <img src="img/icons/3d-icons/strokeperson.png" alt="Stroke">
                </div>
                <div class="guide-text-wrapper">
                    <span>Stroke</span>
                </div>
            </div>
        </div>

        <div class="col-6">
            <div class="guide-card" onclick="alert('Funktionen er på vej!')">
                <div class="guide-image-wrapper">
                    <img src="img/icons/3d-icons/helping.png" alt="Drukning">
                </div>
                <div class="guide-text-wrapper">
                    <span>Psykisk Førstehjælp</span>
                </div>
            </div>
        </div>

    </div>

</div>
</div>



<div class="d-none d-lg-block py-5">
    <div class="container-custom-wide">
        <div class="row px-4">

            <div class="col-5">

                <div class="row mb-3">
                    <div class="col-12">
                        <a href="forside.php" class="back-arrow">
                            <i class="bi bi-chevron-left"></i>
                        </a>
                    </div>
                </div>

                <div class="row g-2 mb-4">
                    <div class="col-4">
                        <div class="data-card bg-data-salmon" data-bs-toggle="modal" data-bs-target="#infoModal" data-title="DE 4 H'ER" data-text="🚨 Skab sikkerhed&#10;Sørg for, at ulykken ikke bliver værre – og pas på dig selv først.&#10;&#10;👀 Vurder personen&#10;Tjek om personen er ved bevidsthed og reagerer.&#10;&#10;📞 Tilkald hjælp&#10;Ring 1-1-2 hvis ingen andre allerede har gjort det.&#10;&#10;🩹 Giv førstehjælp&#10;Hjælp personen efter situationen, indtil hjælpen kommer.">
                            <div class="card-image-wrapper">
                                <img src="img/icons/3d-icons/hlr.png" alt="De 4 H'er">
                            </div>
                            <div class="card-text-wrapper">
                                <span>DE 4 H'ER</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="data-card bg-data-violet" data-bs-toggle="modal" data-bs-target="#infoModal" data-title="ABC" data-text="👄 A – Airway&#10;Sørg for frie luftveje.&#10;&#10;💨 B – Breathing&#10;Tjek om personen trækker vejret normalt.&#10;&#10;❤️ C – Circulation&#10;Undersøg blodcirkulation og stop kraftige blødninger.">
                            <div class="card-image-wrapper">
                                <img src="img/icons/3d-icons/oxygen mask.png" alt="ABC">
                            </div>
                            <div class="card-text-wrapper">
                                <span>ABC</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-4">
                        <div class="data-card bg-data-blue" data-bs-toggle="modal" data-bs-target="#infoModal" data-title="ALARM" data-text="📞 Når du ringer 1-1-2&#10;&#10;🔴 Hvad&#10;Fortæl kort hvad der er sket.&#10;&#10;👤 Hvem&#10;Fortæl hvem og hvor mange der er kommet til skade.&#10;&#10;📍 Hvor&#10;Oplys den præcise adresse eller placering.&#10;&#10;🩺 Hvordan&#10; Beskriv personens tilstand og skader.&#10;&#10;☎️ Bliv i røret og følg alarmcentralens vejledning.">
                            <div class="card-image-wrapper">
                                <img src="img/icons/3d-icons/112.png" alt="Alarm">
                            </div>
                            <div class="card-text-wrapper">
                                <span>ALARM</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-6">
                        <div class="guide-card guide-card-green cursor-pointer-p" onclick="indlaesGuideP('hlr')">
                            <div class="guide-image-wrapper"><img src="img/icons/3d-icons/hlr.png" alt="HLR"></div>
                            <div class="guide-text-wrapper"><span>HLR</span></div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="guide-card guide-card-green cursor-pointer-p" onclick="indlaesGuideP('blødning')">
                            <div class="guide-image-wrapper"><img src="img/icons/3d-icons/bleeding.png" alt="Blødning"></div>
                            <div class="guide-text-wrapper"><span>Blødning</span></div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="guide-card guide-card-green cursor-pointer-p" onclick="indlaesGuideP('brandsår')">
                            <div class="guide-image-wrapper"><img src="img/icons/3d-icons/burn-hand.png" alt="Brandsår"></div>
                            <div class="guide-text-wrapper"><span>Brandsår</span></div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="guide-card guide-card-green cursor-pointer-p" onclick="indlaesGuideP('bevidstløshed')">
                            <div class="guide-image-wrapper"><img src="img/icons/3d-icons/recovery-position.png" alt="Bevidstløshed"></div>
                            <div class="guide-text-wrapper"><span>Bevidstløshed</span></div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="guide-card" onclick="alert('Funktionen er på vej!')">
                            <div class="guide-image-wrapper"><img src="img/icons/3d-icons/defibrillator.png" alt="HLR med hjertestarter"></div>
                            <div class="guide-text-wrapper"><span>HLR med hjertestarter</span></div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="guide-card" onclick="alert('Funktionen er på vej!')">
                            <div class="guide-image-wrapper"><img src="img/icons/3d-icons/drowning.png" alt="Drukning"></div>
                            <div class="guide-text-wrapper"><span>Drukning</span></div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="guide-card" onclick="alert('Funktionen er på vej!')">
                            <div class="guide-image-wrapper"><img src="img/icons/3d-icons/ulykke.png" alt="Bilulykke"></div>
                            <div class="guide-text-wrapper"><span>Bilulykke</span></div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="guide-card" onclick="alert('Funktionen er på vej!')">
                            <div class="guide-image-wrapper"><img src="img/icons/3d-icons/choking.png" alt="Kvælning"></div>
                            <div class="guide-text-wrapper"><span>Kvælning</span></div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="guide-card" onclick="alert('Funktionen er på vej!')">
                            <div class="guide-image-wrapper"><img src="img/icons/3d-icons/strokeperson.png" alt="Stroke"></div>
                            <div class="guide-text-wrapper"><span>Stroke</span></div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="guide-card" onclick="alert('Funktionen er på vej!')">
                            <div class="guide-image-wrapper"><img src="img/icons/3d-icons/helping.png" alt="Psykisk Førstehjælp"></div>
                            <div class="guide-text-wrapper"><span>Psykisk Førstehjælp</span></div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="col-7">
                <div class="guide-desktop-container-p">

                    <div id="desktop-overlay-p" class="guide-overlay-p">
                        <img src="img/icons/3d-icons/klar-guide.png" alt="Hjælp" style="width: 100px;" class="mb-3">
                        <h3 class="fw-bold">Klar til at hjælpe?</h3>
                        <p class="text-muted text-center px-4">Vælg en førstehjælpsguide til venstre for at starte trin-for-trin instruktionerne.</p>
                    </div>

                    <div id="guide-content-area-p" class="d-none">
                        <h2 id="desktop-guide-titel-p" class="mb-4 fw-bold">Guidetitel</h2>

                        <div id="desktop-badges-p" class="steps-header mb-4 d-flex gap-2"></div>

                        <div class="text-center mt-4">
                            <img id="desktop-billede-p" src="" alt="Illustration" class="mb-4" style="max-height: 200px;">
                            <h4 id="desktop-trin-titel-p" class="fw-bold text-start text-dark"></h4>
                            <p id="desktop-tekst-p" class="text-start text-secondary fs-5"></p>

                            <div id="desktop-husk-container-p" class="custom-husk-box-inner" style="display: none;">
                                <strong>💡 HUSK:</strong>
                                <span id="desktop-husk-p"></span>
                            </div>


                        <div class="mt-5">
                            <button id="desktop-next-btn-p" class="btn w-100 text-white fw-bold py-3" style="border-radius: 12px;"></button>
                        </div>
                    </div>

                </div>
            </div>

        </div>
    </div>
</div>

<div class="modal fade" id="infoModal" tabindex="-1" aria-labelledby="infoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered px-3 custom-modal-position">
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


<div class="modal fade" id="desktopCompletionModal-p" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content text-center p-4" style="border-radius: 20px; border: none;">
            <div class="modal-body">
                <i class="bi bi-check-circle-fill" style="font-size: 3rem; color: #5CD685;"></i>
                <h4 class="fw-bold mt-3">Godt gået!</h4>
                <p class="text-muted">Du har gennemført alle trin i denne guide.</p>
                <button type="button" class="btn w-100 text-white fw-bold py-2 mt-2" style="background-color: #5CD685; border-radius: 12px;" onclick="nulstilDesktopP()">OKAY</button>
            </div>
        </div>
    </div>
</div>

<script src="guides.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
