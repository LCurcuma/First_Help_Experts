<div class="weekly-missions-card position-relative overflow-hidden">

    <img src="img/ui/circle1.svg" class="weekly-circle weekly-c1" alt="Baggrunds element">
    <img src="img/ui/circle1.svg" class="weekly-circle weekly-c2" alt="Baggrunds element">
    <img src="img/ui/circle1.svg" class="weekly-circle weekly-c3" alt="Baggrunds element">
    <img src="img/ui/circle1.svg" class="weekly-circle weekly-c4" alt="Baggrunds element">

    <a href="quiz.php?id=1" class="stretched-link"></a>

    <div class="d-flex flex-column justify-content-between h-100 position-relative z-2" style="max-width: 55%;">

        <div>
            <div class="fw-lighter mb-1">Ugens mission</div>
            <div class="fw-semibold fs-3">Tag 3 quizzer<br>denne uge</div>
        </div>

        <div class="w-100 mb-1">

            <div class="d-flex justify-content-end">
                <div class="mb-1">
                    <span class="fw-semibold"><?php echo $userData[0]->finished_weekly_missions ?></span>
                    /
                    <span class="fw-normal">5</span>
                </div>
            </div>

            <div class="weekly-missions-progress-bg position-relative rounded-5">

                <div class="weekly-missions-progress-bar rounded-5" style="width: <?php echo $userData[0]->finished_weekly_missions/5*100?>%;"></div>

                <span class="weekly-missions-progress-text fw-light small opacity-50"><?php echo ($userData[0]->finished_weekly_missions / 5) * 100; ?>%</span>

            </div>

        </div>

    </div>

    <img src="img/icons/3d-icons/arrow.png" alt="Mål ikon" class="weekly-mission2-icon z-1">

</div>