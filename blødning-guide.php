<?php

require "settings/init.php";

// Det id PHP skal lede efter i JSON (Skal matche præcis det, der står før kolon i JSON)
$guideId = "blødning";

// Den store overskrift øverst på app-skærmen
$guideTitel = "Blødning";

// Navnene på de runde badges øverst. Da du har 5 trin i din JSON, skal der være 5 badges:
$badgeNavne = ["Ro", "Stop", "Løft", "Forbind", "Alarm"];

include "guide-skabelon.php";
?>