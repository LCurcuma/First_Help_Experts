<div class="score_container">
    <div class="score">
    <div class="score_text">
        <p>Score</p>
        <!--Her tager vi finishedMissions + 6, da vi har 6 missioner, som markeret som færdige-->
        <p><?php echo (int)(($finishedMissionsAmount + 6) / $allMissionsAmount * 100); ?>%</p>
    </div>
        <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar" style="width: <?php echo (int)(($finishedMissionsAmount + 6) / $allMissionsAmount * 100); ?>%"></div>
        </div>
    </div>
    <div class="score">
        <div class="score_text">
            <p>Gennemført</p>
            <p><?php echo ($finishedMissionsAmount + 6) ?>/<?php echo $allMissionsAmount?></p>
        </div>
        <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="10" aria-valuemin="0" aria-valuemax="30">
            <div class="progress-bar" style="width: <?php echo (int)(($finishedMissionsAmount + 6) / $allMissionsAmount * 100) ?>%;"></div>
        </div>
    </div>
</div>
