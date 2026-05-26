<?php
/**
 * @var db $db
 */

// Tjekker om vi har modtaget en anmodning om at tilføje point (fra vores skjulte form)
if (!empty($_POST['add_daily_points']) && !empty($_POST['user_id'])) {

    // Tager data om points og bruger id
    $pointsToAdd = (int) $_POST['add_daily_points'];
    $userId = (int) $_POST['user_id'];

    // Henter brugerens nuværende points fra databasen
    $user = $db->sql("SELECT points FROM users WHERE id = '$userId'");
    $currentPoints = (int) $user[0]->points;

    // Regner de nye points ud
    $newPoints = $currentPoints + $pointsToAdd;

    // Opdaterer brugerens points i databasen
    $db->sql("UPDATE users SET points = '$newPoints' WHERE id = '$userId'");

    // Går tilbage til forsiden og tilføjer success=1 i linket
    header("Location: " . $_SERVER['PHP_SELF'] . "?id=" . $userId . "&success=1");
    exit();
}
?>