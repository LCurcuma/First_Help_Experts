<?php

require "settings/init.php";

// Fortæl din fælles skabelon, at den skal trække HLR-dataen ud af din JSON
$guideId = "bevidstløshed";
$guideTitel = "Bevidstløshed";
$badgeNavne = ["Tjek", "Ring", "Luftvej", "Sideleje", "HLR"];

// Hent skabelon-filen, som bygger hele siden automatisk
include "guide-skabelon.php";
?>