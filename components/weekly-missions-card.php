<div class="weekly-missions-card position-relative overflow-hidden">

    <!-- Background circles -->
    <img src="img/ui/circle1.svg" class="weekly-circle weekly-c1" alt="Baggrunds element">
    <img src="img/ui/circle1.svg" class="weekly-circle weekly-c2" alt="Baggrunds element">
    <img src="img/ui/circle1.svg" class="weekly-circle weekly-c3" alt="Baggrunds element">
    <img src="img/ui/circle1.svg" class="weekly-circle weekly-c4" alt="Baggrunds element">

    <!-- Gør selve kortet klikbar -->
    <a href="#" class="stretched-link"></a>

    <!-- Top row -->
    <div class="d-flex justify-content-between align-items-start position-relative z-2">

        <!-- Info tekst -->
        <div>

            <div class="fw-semibold fs-3 mb-1">Ugens missioner</div>

            <div class="d-flex align-items-center gap-2 ">
                <i class="bi bi-clock"></i>
                <span class="fw-lighter">6d 12t tilbage</span>
            </div>

        </div>

        <!-- Points -->
        <a href="#" class="d-flex align-items-center gap-2 weekly-points-bg text-black rounded-5 px-2 py-1 position-relative z-3 text-decoration-none">
            <span class="fs-5 fw-semibold"><?php echo $userData[0]->points ?></span>
            <img src="img/icons/3d-icons/money.png" alt="Mønter, som viser hvor mange points du har." class="weekly-missions-coin">
        </a>

    </div>

    <!-- Progressbar -->
    <div class="weekly-missions-progress position-absolute z-2">

        <!-- Opgaver fuldført -->
        <div class="d-flex justify-content-end">
            <div class="mb-1">
                <span class="fw-semibold"><?php echo $userData[0]->finished_weekly_missions ?></span>
                /
                <span class="fw-normal">5</span> opgaver fuldført
            </div>
        </div>

        <!-- Progressbaren -->
        <div class="weekly-missions-progress-bg position-relative rounded-5">

            <!-- Selve progress baren -->
            <div class="weekly-missions-progress-bar rounded-5" style="width: <?php echo $userData[0]->finished_weekly_missions/5*100?>%;"></div>

            <!-- Procent tekst -->
            <span class="weekly-missions-progress-text fw-light small opacity-50"></span>

        </div>

    </div>

</div>