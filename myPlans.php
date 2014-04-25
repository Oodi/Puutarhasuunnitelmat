<?php

require_once 'libs/common.php';
require_once 'libs/tietokantayhteys.php';
require_once 'libs/models/suunnitelma.php';
require_once 'libs/models/kasvi.php';

if (!userOnly()) {
    naytaNakyma('login', array('virhe' => "Sinun tulee olla kirjautuneena sisään."));
}

include_once  'class/activePlan.php';



$aktiivinenSuun = Suunnitelma::haeAktiivinenSuunnitelma($_SESSION['kirjautunut']);
if (isset($aktiivinenSuun)) {
    $kasvit = Kasvi::haeSuunnitelmanKasvit($aktiivinenSuun->getID());
}
$omatSuun = Suunnitelma::haeKayttajanSuunnitelmat($_SESSION['kirjautunut'], 1);
$julkaistutSuun = Suunnitelma::haeKayttajanSuunnitelmat($_SESSION['kirjautunut'], 4);
$odottavaSuun = Suunnitelma::haeKayttajanSuunnitelmat($_SESSION['kirjautunut'], 2);
$hylatSuun = Suunnitelma::haeKayttajanSuunnitelmat($_SESSION['kirjautunut'], 3);

naytaNakyma('myPlans', array('omatSuun' => $omatSuun,
    'julkaistutSuun' => $julkaistutSuun,
    'odottavaSuun' => $odottavaSuun,
    'hylatSuun' => $hylatSuun,
    'suunnitelma' => $aktiivinenSuun,
    'kasvit' => $kasvit));

