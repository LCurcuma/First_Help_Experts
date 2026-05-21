<div class="score_container">
    <div class="score">
    <div class="score_text">
        <p>Score</p>
        <p><?php echo (int)($userData[0]->finished_missions / 30 * 100); ?>%</p>
    </div>
        <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">
            <div class="progress-bar" style="width: <?php echo (int)($userData[0]->finished_missions / 30 * 100); ?>%"></div>
        </div>
    </div>
    <div class="score">
        <div class="score_text">
            <p>Gennemført</p>
            <p><?php echo $userData[0]->finished_missions ?>/30</p>
        </div>
        <div class="progress" role="progressbar" aria-label="Basic example" aria-valuenow="10" aria-valuemin="0" aria-valuemax="30">
            <div class="progress-bar" style="width: <?php echo $userData[0]->finished_missions/30*100 ?>%;"></div>
        </div>
    </div>
</div>
