<?php

require_once 'libs/common.php';
require_once 'libs/tietokantayhteys.php';
require_once 'libs/models/suunnitelma.php';
require_once 'libs/models/tunnelma.php';


if (!userOnly()) {
    ohjaaSivulle('index');
}

if (empty($_POST["nimi"])) {
    $tunnelmat = Tunnelma::haeTunnelmat();
   
    naytaNakyma('newPlan', array('tunnelmat'=>$tunnelmat));
}

$nimi = siistiString($_POST["nimi"]);
$kuvaus = siistiString($_POST["kuvaus"]);
$tila = filter_input(INPUT_POST, 'tila', FILTER_VALIDATE_INT);
$tKoko = filter_input(INPUT_POST, 'tKoko', FILTER_VALIDATE_INT);
$valoisuus = filter_input(INPUT_POST, 'valoisuus', FILTER_VALIDATE_INT);
$kasvuvyohyke = filter_input(INPUT_POST, 'vyohyke', FILTER_VALIDATE_INT);
$tunnelma = filter_input(INPUT_POST, 'tunnelma', FILTER_VALIDATE_INT);

$suunnitelma = new Suunnitelma($nimi, $kuvaus, $tila, $tKoko, $valoisuus,
                $kasvuvyohyke, $tunnelma, 1, $_SESSION["kirjautunut"]);

$suunnitelma->lisaaKantaan();
$suunnitelma->lisaaMuistioon();
vaihdaAktiivistaSuunnitelmaa($suunnitelma->getID());



$_SESSION['ilmoitus'] = "Suunnitelma luotu onnistuneesti.";

ohjaaSivulle(plantlist);

