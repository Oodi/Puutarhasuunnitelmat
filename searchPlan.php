<?php

require_once 'libs/common.php';
require_once 'libs/tietokantayhteys.php';
require_once 'libs/models/suunnitelma.php';


if (!isset($_POST["haku"])) {
    naytaNakyma('searchPlan');
}

$tila = $_POST["tila"];
$tkoko = $_POST["tkoko"];
$valoisuus = $_POST["valoisuus"];
$vyohyke = $_POST["vyohyke"];
$tunnelma = $_POST["tunnelma"];

if (empty($_POST["tila"]) || empty($_POST["tkoko"]) || empty($_POST["valoisuus"]) || empty($_POST["vyohyke"]) || empty($_POST["tunnelma"])) {
    naytaNakyma('searchPlan', array('virhe' => "Täytä kaikki tiedot",
        'tila' => $tila,
        'tkoko' => $tkoko,
        'valoisuus' => $valoisuus,
        'vyohyke' => $vyohyke,
        'tunnelma' => $tunnelma));
}

$vastaavuudet = Suunnitelma::haeVastaavatSuunnitelmat($tila, $tkoko, $valoisuus, $vyohyke, $tunnelma);

if (empty($vastaavuudet)) {
    naytaNakyma('searchPlan', array('virhe' => "Valitettavati vastaavaa suunnitelmaa ei vielä ole..",
        'tila' => $tila,
        'tkoko' => $tkoko,
        'valoisuus' => $valoisuus,
        'vyohyke' => $vyohyke,
        'tunnelma' => $tunnelma));
}

$suun = Suunnitelma::haeSuunnitelmaByID($vastaavuudet[0]);

naytaNakyma('searchPlan', array('suunnitelma' => $suun,
    'tila' => $tila,
    'tkoko' => $tkoko,
    'valoisuus' => $valoisuus,
    'vyohyke' => $vyohyke,
    'tunnelma' => $tunnelma));





