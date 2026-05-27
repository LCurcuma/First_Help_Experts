<?php
/**
 * @var db $db
 */

require "settings/init.php";
//tage id fra link ("forside.php? ->id=1<- id, som bruges")
$id = $_GET["id"];
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
                <!--Hvis man kommer via AKUT ADGANG, så tilbage er index.php-->
                <?php if($id === "0"){
                    echo "<a href='index.php' class='back-arrow'><i class='bi bi-chevron-left'></i></a>";
                } else {
                    //ellers kommer til forsiden som bruger
                    echo "<a href='forside.php?id=".$id."' class='back-arrow'><i class='bi bi-chevron-left'></i></a>";
                }?>
            </div>
        </div>

        <div class="row g-0 mb-4">
            <div class="col-4 px-1">
        <div class="data-card bg-data-salmon cursor-pointer-p" data-bs-toggle="modal" data-bs-target="#infoModalMobil" data-title="DE 4 H'ER" data-text="🚨 Skab sikkerhed&#10;Sørg for, at ulykken ikke bliver værre – og pas på dig selv først.&#10;&#10;👀 Vurder personen&#10;Tjek om personen er ved bevidsthed og reagerer.&#10;&#10;📞 Tilkald hjælp&#10;Ring 1-1-2 hvis ingen andre allerede har gjort det.&#10;&#10;🩹 Giv førstehjælp&#10;Hjælp personen efter situationen, indtil hjælpen kommer.">
            <div class="card-image-wrapper">
                <img src="img/icons/3d-icons/hlr.png" alt="De 4 H'er">
            </div>
            <div class="card-text-wrapper">
                <span>DE 4 H'ER</span>
            </div>
        </div>
    </div>

    <div class="col-4 px-1">
        <div class="data-card bg-data-violet cursor-pointer-p" data-bs-toggle="modal" data-bs-target="#infoModalMobil" data-title="ABC" data-text="👄 A – Airway&#10;Sørg for frie luftveje.&#10;&#10;💨 B – Breathing&#10;Tjek om personen trækker vejret normalt.&#10;&#10;❤️ C – Circulation&#10;Undersøg blodcirkulation og stop kraftige blødninger.">
            <div class="card-image-wrapper">
                <img src="img/icons/3d-icons/oxygen mask.png" alt="ABC">
            </div>
            <div class="card-text-wrapper">
                <span>ABC</span>
            </div>
        </div>
    </div>

    <div class="col-4 px-1">
        <div class="data-card bg-data-blue cursor-pointer-p" data-bs-toggle="modal" data-bs-target="#infoModalMobil" data-title="ALARM" data-text="📞 Når du ringer 1-1-2&#10;&#10;🔴 Hvad&#10;Fortæl kort hvad der er sket.&#10;&#10;👤 Hvem&#10;Fortæl hvem og hvor mange der er kommet til skade.&#10;&#10;📍 Hvor&#10;Oplys den præcise adresse eller placering.&#10;&#10;🩺 Hvordan&#10; Beskriv personens tilstand og skader.&#10;&#10;☎️ Bliv i røret og følg alarmcentralens vejledning.">
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
            <a href="hlr-guide.php?id=<?php echo $id?>" class="text-decoration-none">
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
            <a href="blodning-guide.php?id=<?php echo $id?>" class="text-decoration-none">
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
            <a href="brandsaar-guide.php?id=<?php echo $id?>" class="text-decoration-none">
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
            <a href="bevidstlos-guide.php?id=<?php echo $id?>" class="text-decoration-none">
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

    <!---- DESKTOP VERSION ---->

    <div class="d-none d-lg-block">

        <div class="desktop-container-p">

            <div class="row">


                <!-- VENSTRE SIDE -->

                <div class="row mb-3">
                    <div class="col-12">
                        <!--Hvis man kommer via AKUT ADGANG, så tilbage er index.php-->
                        <?php if($id === "0"){
                            echo "<a href='index.php' class='back-arrow'><i class='bi bi-chevron-left'></i></a>";
                        } else {
                            //ellers kommer til forsiden som bruger
                            echo "<a href='forside.php?id=".$id."' class='back-arrow'><i class='bi bi-chevron-left'></i></a>";
                        }?>
                    </div>
                </div>


                <div class="col-6">

                    <!-- INFO CARDS -->
                    <div class="row g-0 mb-4">

                        <div class="col-4 px-1">

                            <div class="data-card bg-data-salmon desktop-info-trigger"
                                 data-title="DE 4 H'ER"
                                 data-image="img/icons/3d-icons/hlr.png"
                                 data-text="🚨 Skab sikkerhed&#10;Sørg for, at ulykken ikke bliver værre – og pas på dig selv først.&#10;&#10;👀 Vurder personen&#10;Tjek om personen er ved bevidsthed og reagerer.&#10;&#10;📞 Tilkald hjælp&#10;Ring 1-1-2 hvis ingen andre allerede har gjort det.&#10;&#10;🩹 Giv førstehjælp&#10;Hjælp personen efter situationen, indtil hjælpen kommer.">

                                <div class="card-image-wrapper">
                                    <img src="img/icons/3d-icons/hlr.png" alt="">
                                </div>

                                <div class="card-text-wrapper">
                                    <span>DE 4 H'ER</span>
                                </div>

                            </div>

                        </div>

                        <div class="col-4 px-1">

                            <div class="data-card bg-data-violet desktop-info-trigger"
                                 data-title="ABC"
                                 data-image="img/icons/3d-icons/oxygen mask.png"
                                 data-text="👄 A – Airway&#10;Sørg for frie luftveje.&#10;&#10;💨 B – Breathing&#10;Tjek om personen trækker vejret normalt.&#10;&#10;❤️ C – Circulation&#10;Undersøg blodcirkulation og stop kraftige blødninger.">

                                <div class="card-image-wrapper">
                                    <img src="img/icons/3d-icons/oxygen mask.png" alt="">
                                </div>

                                <div class="card-text-wrapper">
                                    <span>ABC</span>
                                </div>

                            </div>

                        </div>

                        <div class="col-4 px-1">

                            <div class="data-card bg-data-blue desktop-info-trigger"
                                 data-title="ALARM"
                                 data-image="img/icons/3d-icons/112.png"
                                 data-text="📞 Når du ringer 1-1-2&#10;&#10;🔴 Hvad&#10;Fortæl kort hvad der er sket.&#10;&#10;👤 Hvem&#10;Fortæl hvem og hvor mange der er kommet til skade.&#10;&#10;📍 Hvor&#10;Oplys den præcise adresse eller placering.&#10;&#10;🩺 Hvordan&#10;Beskriv personens tilstand og skader.&#10;&#10;☎️ Bliv i røret og følg alarmcentralens vejledning.">

                                <div class="card-image-wrapper">
                                    <img src="img/icons/3d-icons/112.png" alt="">
                                </div>

                                <div class="card-text-wrapper">
                                    <span>ALARM</span>
                                </div>

                            </div>

                        </div>

                    </div>



                    <!-- GUIDE CARDS -->

                    <div class="row g-3">

                        <div class="col-6">

                            <div class="guide-card guide-card-green guide-trigger"
                                 data-guide="hlr-guide.php?id=<?php echo $id; ?>" data-guide-key="hlr">

                                <div class="guide-image-wrapper">
                                    <img src="img/icons/3d-icons/hlr.png" alt="">
                                </div>

                                <div class="guide-text-wrapper">
                                    <span>HLR</span>
                                </div>

                            </div>

                        </div>

                        <div class="col-6">

                            <div class="guide-card guide-card-green guide-trigger"
                                 data-guide="blodning-guide.php?id=<?php echo $id; ?>" data-guide-key="blodning">

                                <div class="guide-image-wrapper">
                                    <img src="img/icons/3d-icons/bleeding.png" alt="">
                                </div>

                                <div class="guide-text-wrapper">
                                    <span>Blødning</span>
                                </div>

                            </div>

                        </div>

                        <div class="col-6">

                            <div class="guide-card guide-card-green guide-trigger"
                                 data-guide="brandsaar-guide.php?id=<?php echo $id; ?>" data-guide-key="brandsaar">

                                <div class="guide-image-wrapper">
                                    <img src="img/icons/3d-icons/burn-hand.png" alt="">
                                </div>

                                <div class="guide-text-wrapper">
                                    <span>Brandsår</span>
                                </div>

                            </div>

                        </div>

                        <div class="col-6">

                            <div class="guide-card guide-card-green guide-trigger"
                                 data-guide="bevidstloshed-guide.php?id=<?php echo $id; ?>" data-guide-key="bevidstloshed">

                                <div class="guide-image-wrapper">
                                    <img src="img/icons/3d-icons/recovery-position.png" alt="">
                                </div>

                                <div class="guide-text-wrapper">
                                    <span>Bevidstløshed</span>
                                </div>

                            </div>

                        </div>

                        <div class="col-6">

                            <div class="guide-card" onclick="alert('Funktionen er på vej!')"
                                 data-guide="hjertestarter-guide.php?id=<?php echo $id; ?>">

                                <div class="guide-image-wrapper">
                                    <img src="img/icons/3d-icons/defibrillator.png" alt="">
                                </div>

                                <div class="guide-text-wrapper">
                                    <span>HLR med hjertestarter</span>
                                </div>

                            </div>

                        </div>

                        <div class="col-6">

                            <div class="guide-card" onclick="alert('Funktionen er på vej!')"
                                 data-guide="drukning-guide.php?id=<?php echo $id; ?>">

                                <div class="guide-image-wrapper">
                                    <img src="img/icons/3d-icons/drowning.png" alt="">
                                </div>

                                <div class="guide-text-wrapper">
                                    <span>Drukning</span>
                                </div>

                            </div>

                        </div>

                        <div class="col-6">

                            <div class="guide-card" onclick="alert('Funktionen er på vej!')"
                                 data-guide="bilulykke-guide.php?id=<?php echo $id; ?>">

                                <div class="guide-image-wrapper">
                                    <img src="img/icons/3d-icons/ulykke.png" alt="">
                                </div>

                                <div class="guide-text-wrapper">
                                    <span>Bilulykke</span>
                                </div>

                            </div>

                        </div>


                        <div class="col-6">

                            <div class="guide-card" onclick="alert('Funktionen er på vej!')"
                                 data-guide="kvaelning-guide.php?id=<?php echo $id; ?>">

                                <div class="guide-image-wrapper">
                                    <img src="img/icons/3d-icons/choking.png" alt="">
                                </div>

                                <div class="guide-text-wrapper">
                                    <span>Kvælning</span>
                                </div>

                            </div>

                        </div>


                        <div class="col-6">

                            <div class="guide-card" onclick="alert('Funktionen er på vej!')"
                                 data-guide="stroke-guide.php?id=<?php echo $id; ?>">

                                <div class="guide-image-wrapper">
                                    <img src="img/icons/3d-icons/strokeperson.png" alt="">
                                </div>

                                <div class="guide-text-wrapper">
                                    <span>Stroke</span>
                                </div>

                            </div>

                        </div>

                        <div class="col-6">

                            <div class="guide-card" onclick="alert('Funktionen er på vej!')"
                                 data-guide="psykisk-guide.php?id=<?php echo $id; ?>">

                                <div class="guide-image-wrapper">
                                    <img src="img/icons/3d-icons/helping.png" alt="">
                                </div>

                                <div class="guide-text-wrapper">
                                    <span>Psykisk Førstehjælp</span>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>



                <!-- ========================= -->
                <!-- HØJRE SIDE -->
                <!-- ========================= -->

                <div class="col-6">

                    <!-- OVERLAY -->
                    <div id="desktop-overlay-p"
                         class="guide-desktop-box guide-overlay">
                        <img src="img/icons/3d-icons/klar-guide.png" alt="">

                        <h3>Vælg en guide</h3>

                        <p>
                            Klik på en guide til venstre
                        </p>

                    </div>



                    <!-- INFO PANEL -->
                    <div id="desktopInfo"
                         class="guide-desktop-box d-none">

                        <button id="closeDesktopInfo"
                                class="desktop-close-btn">
                            ✕
                        </button>

                        <div class="desktop-info-content">

                            <div class="desktop-info-image-wrapper">
                                <img id="desktopInfoImage"
                                     src=""
                                     alt="Info illustration">
                            </div>

                            <h3 id="desktopInfoTitle"></h3>

                            <p id="desktopInfoText"></p>

                        </div>

                    </div>


                    <div id="guide-content-area-p"
                         class="guide-desktop-box d-none">

                        <h2 id="desktop-guide-titel-p" class="HLR-h2"></h2>

                        <div id="desktop-badges-p" class="steps-header"></div>

                        <div class="guide-content">

                            <div class="image-container">
                                <img id="desktop-billede-p" class="guide-image" src="" alt="Guide illustration">
                            </div>

                            <h3 id="desktop-trin-titel-p" class="fw-bold"></h3>

                            <p id="desktop-tekst-p" class="fw-bold"></p>

                            <div id="desktop-husk-container-p" class="husk box">
                                <strong>💡 HUSK:</strong>
                                <span id="desktop-husk-p"></span>
                            </div>

                        </div>

                        <button id="desktop-next-btn-p" class="next-button">
                            NÆSTE TRIN
                        </button>

                        <div id="desktop-progress-p" class="progress-dots mt-3"></div>


                    </div>

                </div>

            </div>

        </div>

    </div>


    <div class="modal fade" id="infoModalMobil" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered px-3">
            <div class="modal-content" style="background-color: #ffffff; border-radius: 28px; border: none; padding: 12px; box-shadow: 0 15px 35px rgba(0,0,0,0.15);">
                <div class="modal-header border-0 pb-0">
                    <h5 class="modal-title" id="infoModalMobilLabel" style="font-weight: 800; color: #121212; text-transform: uppercase;">Titel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Luk" style="box-shadow: none !important;"></button>
                </div>
                <div class="modal-body pt-3">
                    <p id="modalBodyTextMobil" style="white-space: pre-line; color: #444444; font-size: 14px; line-height: 1.5;"></p>
                </div>
            </div>
        </div>
    </div>

<div class="modal fade" id="desktopCompletionModal-p" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered" style="max-width: 320px; margin: 0 auto;">
        <div class="modal-content" style="border-radius: 20px; border: none; box-shadow: 0 10px 30px rgba(0,0,0,0.2); background-color: #ffffff;">
            <div class="modal-body text-center p-4">
                <div class="mb-3">
                    <i class="bi bi-check-circle-fill" style="font-size: 2.5rem; color: #5CD685;"></i>
                </div>

                <h4 class="fw-bold mb-2" style="color: #000000; font-size: 20px;">
                    Godt arbejdet!
                </h4>

                <p id="desktopCompletionText-p" class="text-muted mb-4" style="font-size: 14px; line-height: 1.4;">
                    Du har gennemført guiden.
                </p>

                <button type="button"
                        onclick="nulstilDesktopP()"
                        class="btn next-button w-100 text-center text-decoration-none"
                        style="background-color: #5CD685; color: white; padding: 12px; border-radius: 12px; font-weight: 700; font-size: 14px; line-height: 20px;">
                    OKAY
                </button>
            </div>
        </div>
    </div>
</div>




    <script src="guides.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
