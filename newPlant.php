<?php

require_once 'libs/common.php';
require_once 'libs/tietokantayhteys.php';
require_once 'libs/models/kasvi.php';


if (tarkastaOikeudet() < 1) {
    ohjaaSivulle('index');
}

if (empty($_POST["nimi"])) {
    naytaNakyma('newPlant');
}



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

$uusiKasvi = new Kasvi($nimi, $kuvaus, $valoisuus,
                $kasvuvyohyke, $kasvukorkeus, $kukinta_alkaa,
                $kukinta_paattyy, $kasvuaika);
if ($uusiKasvi->onkoKasviNimelta($nimi)) {
    $uusiKasvi->lisaaKantaan();
    $_SESSION['ilmoitus'] = "Kasvi lisätty onnistuneesti.";
} else {
    naytaNakyma('newPlant', array('virhe'=>"Tämän niminen kasvi on jo tietokannassa"));
}

naytaNakyma('mainpage');

