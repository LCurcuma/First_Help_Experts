<!-- Container med score, som er på user-side og container -->
<div class="score_container">
    <!-- Container med progress bar og tekst -->
    <div class="score">
        <!-- Tekst af score -->
    <div class="score_text">
        <p>Score</p>
        <!--Her tager vi finishedMissions + 6, da vi har 6 missioner, som markeret som færdige-->
        <p><?php echo (int)(($finishedMissionsAmount + 6) / $allMissionsAmount * 100); ?>%</p>
    </div>
        <!-- Progress bar -->
        <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
            <!-- Den grønne del, som er færdiggøre missioner -->
            <div class="progress-bar" style="width: <?php echo (int)(($finishedMissionsAmount + 6) / $allMissionsAmount * 100); ?>%"></div>
        </div>
    </div>
    <!-- Den er den samme container med tekst og progress bar -->
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
