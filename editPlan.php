<?php

require_once 'libs/common.php';
require_once 'libs/tietokantayhteys.php';
require_once "libs/models/suunnitelma.php";
require_once "libs/models/tunnelma.php";

if (!userOnly()) {
    ohjaaSivulle('index');
}

$tunnelmat = Tunnelma::haeTunnelmat();

if (isset($_POST["id"])) {
    $id = $_POST["id"];
    $nimi = siistiString($_POST["nimi"]);
    $kuvaus = siistiString($_POST["kuvaus"]);
    $tila = filter_input(INPUT_POST, 'tila', FILTER_VALIDATE_INT);
    $tKoko = filter_input(INPUT_POST, 'tKoko', FILTER_VALIDATE_INT);
    $valoisuus = filter_input(INPUT_POST, 'valoisuus', FILTER_VALIDATE_INT);
    $kasvuvyohyke = filter_input(INPUT_POST, 'vyohyke', FILTER_VALIDATE_INT);
    $tunnelma = filter_input(INPUT_POST, 'tunnelma', FILTER_VALIDATE_INT);
    
    $paivitaSuunnitelma = new Suunnitelma($nimi, $kuvaus, $tila, $tKoko, $valoisuus,
                    $kasvuvyohyke, $tunnelma, 1, $_SESSION["kirjautunut"]);
    $paivitaSuunnitelma->setSuunnitelmaID($id);
    $paivitaSuunnitelma->paivitaKantaan();
    $_SESSION['ilmoitus'] = "Suunnitelma päivitetty onnistuneesti.";


    
}

include_once 'class/delPlan.php';


if (isset($_GET["id"])) {

    $muokattava = Suunnitelma::haeSuunnitelmaByID($_GET["id"]);

    if ($muokattava == null) {
        naytaNakyma('planList', array('virhe' => "Suunnitelmaa ei ole olemassa"));
    } elseif ($muokattava->getTekija() != $_SESSION["kirjautunut"] || $muokattava->getSuunnitelmaTyyppi() != 1 && tarkastaOikeudet() < 1) {
        naytaNakyma('planList', array('virhe' => "Et voi muokata kyseistä suunnitelmaa"));
    }


    naytaNakyma('editPlan', array(
        'nimi' => $muokattava->getNimi(),
        'tila' => $muokattava->getTila(),
        'tKoko' => $muokattava->getTilanKoko(),
        'kuvaus' => $muokattava->getKuvaus(),
        'valoisuus' => $muokattava->getValoisuus(),
        'vyohyke' => $muokattava->getKasvuvyohyke(),
        'tunnelma' => $muokattava->getTunnelma(),
        'tunnelmat' => $tunnelmat,
        'id' => $muokattava->getID(),
        'tyyppi' => $muokattava->getSuunnitelmaTyyppi(),
        'tekija' => $muokattava->getTekija()
    ));
} else {
    ohjaaSivulle('myPlans');
}



