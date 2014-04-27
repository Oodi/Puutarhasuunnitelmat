<?php

require_once 'libs/common.php';
require_once 'libs/tietokantayhteys.php';
require_once 'libs/models/suunnitelma.php';
require_once 'libs/models/kasvi.php';

/* Tarkistetaan, että käyttäjä on kirjautunut */
if (!userOnly()) {
    naytaNakyma('login', array('virhe' => "Sinun tulee olla kirjautuneena sisään."));
}

/* Sisällytetään aktiivisen suunnitelman vaihto ja kasvin poistaminen suunnitelmasta. */
include_once  'class/activePlan.php';
include_once 'class/delPlantFromPlan.php'; 

/* Haetaan aktiivinen suunnitelma ja siällytettään se näkymään jos se löytyy. */
$aktiivinenSuun = Suunnitelma::haeAktiivinenSuunnitelma($_SESSION['kirjautunut']);
$kasvit =null;
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

