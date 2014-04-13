<?php

require_once 'libs/common.php';
require_once 'libs/tietokantayhteys.php';
require_once 'libs/models/kayttaja.php';

if (!visitorOnly()) {
    ohjaaSivulle('index');
}

if (empty($_POST["username"]) or empty($_POST["password"])) {
    naytaNakyma("login");
}

$nimimerkki = $_POST["username"];
$salasana = $_POST["password"];

$kayttaja = Kayttaja::etsiKayttajaTunnuksilla($nimimerkki, $salasana);
if ($kayttaja != null) {
    $nimi = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $kayttaja->getNimimerkki());
    $ryhma = $kayttaja->getAdmin();
    $_SESSION['kirjautunut'] = $nimi;
    $_SESSION['ryhma'] = $ryhma;
    
    ohjaaSivulle('index');
} else {
    naytaNakyma("login", array(
        'kayttaja' => $nimimerkki,
        'virhe' => "Kirjautuminen epäonnistui! Antamasi tunnus tai salasana on väärä.",
    ));
}