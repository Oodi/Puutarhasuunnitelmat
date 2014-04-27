<?php

require_once 'libs/common.php';
require_once 'libs/tietokantayhteys.php';
require_once "libs/models/kasvi.php";
require_once "libs/models/tunnelma.php";

/* Tarkistetaan, että käyttäjä on ylläpitäjä */
if (tarkastaOikeudet() < 1) {
    ohjaaSivulle('index');
}

/* Sisällytetään kasvin poiston tarkistus */
include_once 'class/delPlant.php';

/* Haetaan sivulla näytettävät tunnelmat */
$tunnelmat = Tunnelma::haeTunnelmat();

/* Tarkistetaan muutokset ja suoritetaan ne */
if (isset($_POST["id"])) {
    var_dump($_POST["tunnelma"]);
    $id = $_POST["id"];
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

    $paivitaKasvi = new Kasvi($nimi, $kuvaus, $valoisuus,
                    $kasvuvyohyke, $kasvukorkeus, $kukinta_alkaa,
                    $kukinta_paattyy, $kasvuaika);
    $paivitaKasvi->setKasviID($id);
     
    if (!isset($_POST["tunnelma"])) {
        $apu = array();    
    } else {
        $apu = $_POST["tunnelma"];
    }
        foreach ($tunnelmat as $arvo) {
            if (in_array($arvo->getTunnelmaID(), $apu)) {
                $paivitaKasvi->lisaaTaiPoistaTunnelma($arvo->getTunnelmaID(), true);
            } else {
                $paivitaKasvi->lisaaTaiPoistaTunnelma($arvo->getTunnelmaID(), false);
            }
        }
        $paivitaKasvi->paivitaKantaan();
        $_SESSION['ilmoitus'] = "Kasvi päivitetty onnistuneesti.";
  
}

/* Näytetään halutun kasvin tiedot*/
if (isset($_GET["id"])) {

    $muokattava = Kasvi::haeKasviByID($_GET["id"]);

    if ($muokattava == null) {
        naytaNakyma('plantlist', array('virhe' => "Kasvia ei ole olemassa"));
    } else {
        naytaNakyma('editPlant', array(
            'nimi' => $muokattava->getNimi(),
            'kuvaus' => $muokattava->getKuvaus(),
            'valoisuus' => $muokattava->getValoisuus(),
            'vyohyke' => $muokattava->getKasvuvyohykeNum(),
            'tunnelma' => $muokattava->getTunnelmat(),
            'tunnelmat' => $tunnelmat,
            'id' => $muokattava->getID()
        ));
    }
} else {
    ohjaaSivulle('plantlist');
}



