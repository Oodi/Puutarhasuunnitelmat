<?php

require_once 'libs/common.php';
require_once 'libs/tietokantayhteys.php';
require_once 'libs/models/suunnitelma.php';
require_once 'libs/models/kasvi.php';

if (tarkastaOikeudet() < 1) {
    naytaNakyma('myPlans', array('virhe' => "Sinulla ei ole oikeuksia tähän."));
}

$odottavaSuun = Suunnitelma::haeTyypinMukaanSuunnitelmat(2);


naytaNakyma('suggestedPlans', array('odottavaSuun' => $odottavaSuun));

