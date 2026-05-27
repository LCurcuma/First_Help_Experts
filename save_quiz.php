<?php
require "settings/init.php";
//tage id fra link
$id = $_GET["id"];

//tage data om card og convertere til format, som PHP forstår
$data = json_decode(file_get_contents("php://input"), true);

//hvis data er ikke tomt
if(!EMPTY($data)){
    $index = $data["index"];
    //tage færdiggørt missioner fra database
    $userData = $db->sql("SELECT * FROM users WHERE id = '$id'");
    $oldMissions = $userData[0]->finished_missions_names;
    //hvis oldMissions er ikke tom
    if(!($oldMissions)){
        //tjekker, at ny mission er ikke allerede i oldMissions
        if(strpos($oldMissions, $index)===false){
            // Tilføje nye missioner
            $newMissions = trim($oldMissions . " " . $index);

// Gem
            $stmt = $db->sql("
    UPDATE users
    SET finished_missions_names = '$newMissions'
    WHERE users.id = '$id'
");
        }
        //ellers hvis oldMission er tom
    } else {
        //tilføje mission
        $newMissions = $index;

// Gem
        $stmt = $db->sql("
    UPDATE users
    SET finished_missions_names = '$newMissions'
    WHERE users.id = '$id'
");
    }

}
?>