<?php
/**
 * @var db $db
 */

require "settings/init.php";
$id = $_GET["id"];

$userData = $db->sql("SELECT * FROM users WHERE id = '$id'");

//hvis der er ikke nogle finished mission
if(EMPTY($userData[0]->finished_missions_names)){
    $finishedMissionsAmount = 0;
    //hvis der er nogle finished missions
} else {
    //convertere til array og tage arrays størrelse
    $finishedMissionsAmount = sizeof(explode(" ",$userData[0]->finished_missions_names));
}

$allMissionsAmount = 8;

?>
<!DOCTYPE html>
<html lang="da">
<head>
    <meta charset="utf-8">

    <title>Quizside - Førstehjælpeksperten</title>

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
<!------------ MOBIL VERSION ------------>
    <!------------ TILBAGEKNAP ------------>
<a href="forside.php?id=<?php echo $id?>" class="arrow_back">
    <i class="fa-solid fa-chevron-left pb-4 p-4" style="color: #121212"></i>
</a>


<!------------ UGENS MISSION CARD ------------>

<div class="d-flex justify-content-center align-items-center fp-container mt-2 mb-5 d-lg-none" data-aos="zoom-in">
    <?php include 'components/weekly-missions-card2.php';?>
</div>

<!------------ UGENS MISSION CARD ------------>



<!------------ KATEGORI CARDS ------------>
<div class="px-4 d-flex flex-column d-lg-none" data-aos="zoom-in">
    <div class="row g-4">
        <div id="menu-screen" class="col-6">
            <a href="quizhlr.php?id=<?php echo $id?>&quiz_id=HLR" class="text-decoration-none text-reset">
                <div class="category-card text-center p-2" id="HLR">
                    <img src="img/icons/3d-icons/hlr.png" alt="Person der laver HLR" class="category-card-img">
                    <p>HLR</p>
                </div>
            </a>
        </div>

        <div class="col-6">
            <a href="quizhlrhs.php?id=<?php echo $id?>&quiz_id=hjertestarter" class="text-decoration-none text-reset">
            <div class="category-card text-center p-2" id="hjertestarter">
                <img src="img/icons/3d-icons/defibrillator.png" alt="Person der laver HLR" class="category-card-img">
                <p>HLR med hjertestarter</p>
            </div>
            </a>
        </div>

        <div class="col-6">
            <div class="category-card completed text-center p-2" id="drukning">
                <img src="img/icons/3d-icons/drowning.png" alt="Person der laver HLR" class="category-card-img">
                <p>Drukning</p>
            </div>
        </div>

        <div class="col-6">
            <div class="category-card completed text-center p-2" id="forbinding">
                <img src="img/icons/3d-icons/bleeding.png" alt="Person der laver HLR" class="category-card-img">
                <p>Forbinding</p>
            </div>
        </div>

        <div class="col-6">
            <div class="category-card completed text-center p-2" id="brandsar">
                <img src="img/icons/3d-icons/burn-hand.png" alt="Person der laver HLR" class="category-card-img">
                <p>Brandsår</p>
            </div>
        </div>

        <div class="col-6">
            <div class="category-card completed text-center p-2" id="bilulykke">
                <img src="img/icons/3d-icons/ulykke.png" alt="Person der laver HLR" class="category-card-img">
                <p>Bilulykke</p>
            </div>
        </div>

        <div class="col-6">
            <div class="category-card completed text-center p-2" id="kvalning">
                <img src="img/icons/3d-icons/choking.png" alt="Person der laver HLR" class="category-card-img">
                <p>Kvælning</p>
            </div>
        </div>

        <div class="col-6 mb-5">
            <div class="category-card completed text-center p-2" id="stroke">
                <img src="img/icons/3d-icons/strokeperson.png" alt="Person der laver HLR" class="category-card-img">
                <p>Stroke</p>
            </div>
        </div>
    </div>
</div>
    <!------------ KATEGORI CARDS ------------>
<!------------ MOBIL VERSION ------------>




<!------------ DESKTOP VERSION ------------>
<div class="d-none flex-column d-lg-block">
    <div class="container">
        <div class="row">

            <!------------ UGENS MISSION CARD ------------>
            <div class="col col-6 cate-colone" data-aos="zoom-in">

                <div class="d-flex justify-content-center align-items-center fp-container mt-2 mb-5 ">
                    <?php include 'components/weekly-missions-card2.php';?>
                </div>

                <!------------ UGENS MISSION CARD ------------>

                <!------------ KATEGORI CARDS ------------>
                <div id="menu-screen" class="kategori-cards px-4" data-aos="zoom-in">
                    <div class="row g-4">
                        <div class="col-6" style="cursor: pointer;">
                                <div class="category-card text-center p-2" id="HLR_desk" data-quiz="data/data_hlr.json">
                                    <img src="img/icons/3d-icons/hlr.png" alt="Person der laver HLR" class="category-card-img">
                                    <p>HLR</p>
                                </div>
                        </div>

                        <div class="col-6" style="cursor: pointer;">
                            <div class="category-card text-center p-2" id="hjertestarter_desk" data-quiz="data/data_hlrhs.json"">
                                <img src="img/icons/3d-icons/defibrillator.png" alt="Person der laver HLR" class="category-card-img">
                                <p>HLR med hjertestarter</p>
                            </div>
                        </div>

                        <div class="col-6" style="cursor: pointer;">
                            <div class="category-card completed text-center p-2" id="drukning_desk">
                                <img src="img/icons/3d-icons/drowning.png" alt="Person der laver HLR" class="category-card-img">
                                <p>Drukning</p>
                            </div>
                        </div>

                        <div class="col-6" style="cursor: pointer;">
                            <div class="category-card completed text-center p-2" id="forbinding_desk">
                                <img src="img/icons/3d-icons/bleeding.png" alt="Person der laver HLR" class="category-card-img">
                                <p>Forbinding</p>
                            </div>
                        </div>

                        <div class="col-6" style="cursor: pointer;">
                            <div class="category-card completed text-center p-2" id="brandsar_desk">
                                <img src="img/icons/3d-icons/burn-hand.png" alt="Person der laver HLR" class="category-card-img">
                                <p>Brandsår</p>
                            </div>
                        </div>

                        <div class="col-6" style="cursor: pointer;">
                            <div class="category-card completed text-center p-2" id="bilulykke_desk">
                                <img src="img/icons/3d-icons/ulykke.png" alt="Person der laver HLR" class="category-card-img">
                                <p>Bilulykke</p>
                            </div>
                        </div>

                        <div class="col-6" style="cursor: pointer;">
                            <div class="category-card completed text-center p-2" id="kvalning_desk">
                                <img src="img/icons/3d-icons/choking.png" alt="Person der laver HLR" class="category-card-img">
                                <p>Kvælning</p>
                            </div>
                        </div>

                        <div class="col-6 mb-5" style="cursor: pointer;">
                            <div class="category-card completed text-center p-2" id="stroke_desk">
                                <img src="img/icons/3d-icons/strokeperson.png" alt="Person der laver HLR" class="category-card-img">
                                <p>Stroke</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!------------ KATEGORI CARDS ------------>



            <div class="col col-6 quiz-colone">

                <!------------ PLACEHOLDER ------------>
                <div id="desktop-placeholder" class="d-flex flex-column align-items-center justify-content-center text-center" style="min-height: 50%;" data-aos="zoom-in">
                    <p class="placeholder-overskrift">Vælg en kategori og start quizzen!</p>
                    <p class="placeholder-underrubrik">Test din vide og se hvad du kan.</p>
                </div>
                <!------------ PLACEHOLDER ------------>

        <!------------ QUIZ SCREEN ------------>
                <div id="quiz-screen" class="quiz d-none">
                    <div class="px-4 mb-4">
                        <span id="progress-text" class="quiz-progress-text d-block text-center mb-2">Spørgsmål 1 ud af 10</span>
                        <div class="quiz-progress">
                            <div class="progress quiz-progress-beholder">
                                <div id="progress-bar" class="progress-bar quiz-progress-fyld" role="progressbar" style="width: 0%;"></div>
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

                <!------------ RESULT SCREEN ------------>
                <div id="result-screen" class="px-2 py-3 text-center d-none">
                    <div class="mb-2">
                        <img src="img/icons/3d-icons/checkmark2.png" class="check-img" alt="">
                    </div>
                    <p class="færdig-text">Sådan, du klarede det!</p>
                    <p class="skala-text mb-3">Du fik <span id="correct-score" class="fw-bold">0</span> ud af <span id="total-questions" class="fw-bold">10</span> rigtige.</p>

                    <a href="quiz.php?id=<?php echo $id?>" class="btn slutquiz-knap py-3">Afslut quizzen</a>
                </div>
                <!------------ RESULT SCREEN ------------>
            </div>
        </div>
    <!------------ QUIZ SCREEN ------------>
    </div>
</div>
<!------------ DESKTOP VERSION ------------>




<script src="func/quiz.js"></script>
<script>
    <?php
            //hvis bruger har færdiggørt nogen missioner
    if($userData[0]->finished_missions_names !== NULL){
        //lave array ud fra string (altså vi tage "HLR kvalning" fra database og laver ["HLR", "kvalning"] ud fra det)
        $finishedMissions = explode(" ", $userData[0]->finished_missions_names);
        //for hver finished mission
        //tilføje class "completed" på både mobil og desktop cards
        //tilføje onclick funktion på både mobil og desktop cards
        foreach($finishedMissions as $finishedMission){
            echo "
            document.getElementById('".$finishedMission."').classList.add('completed');
            document.getElementById('".$finishedMission."_desk').classList.add('completed');
            document.getElementById('".$finishedMission."').onclick = function(){alert('Du har klaret dinne quiz!')};
            document.getElementById('".$finishedMission."_desk').onclick = function(){alert('Du har klaret dinne quiz!')};
            ";
        }
    }
 ?>
</script>
<!------------ Bootstrap library ------------>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<!--------------- AOS LIBRARY --------------->
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init();
</script>

</body>
</html>

