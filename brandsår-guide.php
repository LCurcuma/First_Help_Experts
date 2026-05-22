<?php

require "settings/init.php";

// Fortæl din fælles skabelon, at den skal trække HLR-dataen ud af din JSON
$guideId = "brandsår";
$guideTitel = "Brandsår";
$badgeNavne = ["Ro", "Køl", "Fjern", "Dæk", "Varm", "Alarm"];

// Hent skabelon-filen, som bygger hele siden automatisk
include "guide-skabelon.php";
?>