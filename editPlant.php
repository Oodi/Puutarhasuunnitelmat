<?php

require_once 'libs/common.php';
require_once 'libs/tietokantayhteys.php';
require_once "libs/models/kasvi.php";

if (tarkastaOikeudet() < 1) {
    ohjaaSivulle('index');
}

if (isset($_POST["id"])) {
    $id = $_POST["id"];
    $nimi = $_POST["nimi"];
    $kuvaus = $_POST["kuvaus"];
    $valo = array();
    if (isset($_POST["valoisuus"])) {

        foreach ($_POST["valoisuus"] as $arvo) {
            $valo[] = $arvo;
        }
    }
    $valoisuus = Kasvi::getValoisuusArvo($valo);
    $kasvuvyohyke = filter_input(INPUT_POST, 'vyohyke', FILTER_VALIDATE_INT);
    $kasvukorkeus = 0;
    $kukinta_alkaa = 6;
    $kukinta_paattyy = 7;
    $kasvuaika = 1;

    $paivitaKasvi = new Kasvi($nimi, $kuvaus, $valoisuus,
                    $kasvuvyohyke, $kasvukorkeus, $kukinta_alkaa,
                    $kukinta_paattyy, $kasvuaika);
    $paivitaKasvi->setKasviID($id);
    if (true) {
        $paivitaKasvi->paivitaKantaan();
        $_SESSION['ilmoitus'] = "Kasvi päivitetty onnistuneesti.";
    } else {
        naytaNakyma('newPlant', array('virhe' => "Päivitys ei onnistunut"));
    }

    ohjaaSivulle('plantlist');
}


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
            'id' => $muokattava->getID()
        ));
    }

    
} else {
    naytaNakyma('plantlist');
}



