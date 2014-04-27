<?php
require_once 'libs/common.php';
require_once 'libs/tietokantayhteys.php';
require_once 'libs/models/tunnelma.php';
require_once 'libs/models/suunnitelma.php';
require_once 'libs/models/kasvi.php';

/* Haetaan sivulla näytettävät tunnelmat */
$tunnelmat = Tunnelma::haeTunnelmat();

/* Näytetään perussivu, jos hakua ei olla suoritettu */
if (!isset($_GET["haku"])) {
    naytaNakyma('searchPlan', array('tunnelmat'=>$tunnelmat));
}

$tila = $_GET["tila"];
$tkoko = $_GET["tkoko"];
$valoisuus = $_GET["valoisuus"];
$vyohyke = $_GET["vyohyke"];
$tunnelma = $_GET["tunnelma"];

/* Vaaditaan kaikki tiedot */
if (empty($_GET["tila"]) || empty($_GET["tkoko"]) || empty($_GET["valoisuus"]) || empty($_GET["vyohyke"]) || empty($_GET["tunnelma"])) {
    naytaNakyma('searchPlan', array('virhe' => "Täytä kaikki tiedot",
        'tila' => $tila,
        'tkoko' => $tkoko,
        'valoisuus' => $valoisuus,
        'vyohyke' => $vyohyke,
        'tunnelma' => $tunnelma,
        'tunnelmat'=>$tunnelmat));
}

/* Haetaan hakua vastaavat suunnitelmat */
$vastaavuudet = Suunnitelma::haeVastaavatSuunnitelmat($tila, $tkoko, $valoisuus, $vyohyke, $tunnelma);

/* Valitellaan, jos vastaavaa suunnitelmaa ei vielä ole olemassa */
if (empty($vastaavuudet)) {
    naytaNakyma('searchPlan', array('virhe' => "Valitettavati vastaavaa suunnitelmaa ei vielä ole..",
        'tila' => $tila,
        'tkoko' => $tkoko,
        'valoisuus' => $valoisuus,
        'vyohyke' => $vyohyke,
        'tunnelma' => $tunnelma,
        'tunnelmat'=>$tunnelmat));
}

/* Haetaan ja näytetään ensimmäinen vastaava suunnitelma (jatkokehityksenä voi siirtyä seuraavaan) */
$suun = Suunnitelma::haeSuunnitelmaByID($vastaavuudet[0]);
$kasvit = Kasvi::haeSuunnitelmanKasvit($vastaavuudet[0]);

naytaNakyma('searchPlan', array('suunnitelma' => $suun, 
    'kasvit' => $kasvit,
    'tila' => $tila,
    'tkoko' => $tkoko,
    'valoisuus' => $valoisuus,
    'vyohyke' => $vyohyke,
    'tunnelma' => $tunnelma,
    'tunnelmat'=>$tunnelmat));





