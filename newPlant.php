<?php

require_once 'libs/common.php';
require_once 'libs/tietokantayhteys.php';
require_once 'libs/models/kasvi.php';
require_once 'libs/models/tunnelma.php';

/* Tarkistetaan, että käyttäjä on ylläpitäjä */
if (tarkastaOikeudet() < 1) {
    ohjaaSivulle('index');
}

/* Haetaan tunnelmat */
$tunnelmat = Tunnelma::haeTunnelmat();

/* Näytetään tyhjät valinnat jos ei ole tietoja lähetetty */
if (empty($_POST["nimi"])) {
    naytaNakyma('newPlant', array('tunnelmat' => $tunnelmat));
}



$nimi = siistiString($_POST["nimi"]);
$kuvaus = siistiString($_POST["kuvaus"]);
$valo = array();
if (isset($_POST["valoisuus"])) {
    foreach ($_POST["valoisuus"] as $arvo) {
        $valo[] = $arvo;
    }
}
$valoisuus = Kasvi::getValoisuusArvo($valo);
$kasvuvyohyke = filter_input(INPUT_POST, 'vyohyke', FILTER_VALIDATE_INT);

 /* Toteuttamattomia ominaisuuksia: */
$kasvukorkeus = 0;
$kukinta_alkaa = 6;
$kukinta_paattyy = 7;
$kasvuaika = 1;

$uusiKasvi = new Kasvi($nimi, $kuvaus, $valoisuus,
                $kasvuvyohyke, $kasvukorkeus, $kukinta_alkaa,
                $kukinta_paattyy, $kasvuaika);
if ($uusiKasvi->onkoKasviNimelta($nimi)) {
    $uusiKasvi->lisaaKantaan();

    if (!isset($_POST["tunnelma"])) {
        $apu = array();
    } else {
        $apu = $_POST["tunnelma"];
    }
    foreach ($tunnelmat as $arvo) {
        if (in_array($arvo->getTunnelmaID(), $apu)) {
            $uusiKasvi->lisaaTaiPoistaTunnelma($arvo->getTunnelmaID(), true);
        } else {
            $uusiKasvi->lisaaTaiPoistaTunnelma($arvo->getTunnelmaID(), false);
        }
    }

    $_SESSION['ilmoitus'] = "Kasvi lisätty onnistuneesti.";
} else {
    naytaNakyma('newPlant', array('tunnelmat' => $tunnelmat, 'virhe' => "Tämän niminen kasvi on jo tietokannassa"));
}

ohjaaSivulle('plantlist');

