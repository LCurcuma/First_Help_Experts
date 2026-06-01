<?php

//inklusions-funktion, der indlæser systemets opstartsfil (f.eks. databaseforbindelse og globale indstillinger). Hvis filen mangler, stopper scriptet helt (require), hvilket sikrer mod systemfejl.
require "settings/init.php";

//En variabel (streng), der definerer en unik ID-nøgle for denne guide. Den bruges af mit JavaScript til at finde de helt rigtige trin inde i min JSON-datafil.
$guideId = "bevidstloshed";

//variabel (streng), der gemmer den officielle overskrift. Den sendes med over i skabelonen, så der står "Bevidstløshed" i toppen af skærmen på mobilen.
$guideTitel = "Bevidstløshed";

//PHP-array, der indeholder teksterne til proces-knapperne i toppen. Det definerer rækkefølgen og navnene på de faser, brugeren skal igennem i netop denne guide.
$badgeNavne = ["Tjek", "Ring", "Luftvej", "Sideleje", "HLR"];

//En strukturel funktion, der henter og indlejrer en fælles HTML/PHP-skabelonfil.
include "guide-skabelon.php";
