<?php

require_once 'libs/common.php';
require_once 'libs/tietokantayhteys.php';
require_once 'libs/models/kayttaja.php';

if (!visitorOnly()) {
    ohjaaSivulle('index');
}

if (empty($_POST["username"]) or empty($_POST["password"]) or empty($_POST["passwordAG"]) or empty($_POST["email"])) {
    naytaNakyma("register");
}

$nimimerkki = siistiString($_POST["username"]);
$sposti = siistiString($_POST["email"]);
$sala1 = $_POST["password"];
$sala2 = $_POST["passwordAG"];


if (strlen($nimimerkki) > 20) {
    naytaNakyma('register', array('nimvirhe' => 'Nimimerkki on liian pitkä', 'nimi' => $nimimerkki, 'email' => $sposti));
}

if (!preg_match('/^[a-zäöüÄÖÜ \.\\-\\d]{2,21}$/i', $nimimerkki)) {
    naytaNakyma('register', array('nimvirhe' => 'Epäkelpo nimimerkki', 'nimi' => $nimimerkki, 'email' => $sposti));
}

if (Kayttaja::tarkistaOnkoNimimerkkiKaytossa($nimimerkki)) {
    naytaNakyma('register', array('nimvirhe' => 'Nimimerkki on jo käytössä', 'nimi' => $nimimerkki, 'email' => $sposti));
}

if (strlen($sala1) < 6) {
    naytaNakyma('register', array('salvirhe' => 'Salasana on liian lyhyt!', 'nimi' => $nimimerkki, 'email' => $sposti));
}

if ($sala1 != $sala2) {
    naytaNakyma('register', array('sal2virhe' => 'Salasanat eivät täsmää!', 'nimi' => $nimimerkki, 'email' => $sposti));
}

if(!empty($nimimerkki) && !empty($sposti) && !empty($sala1)) {
       
    $ok = Kayttaja::luoUusiKayttaja($nimimerkki, $sposti, $sala1);
    
    if ($ok) {
        ohjaaSivulle('login');
    } else {
        naytaNakyma('register', array("virhe" => "Hups, jotain meni vikaan yritä uudestaan!"));
    }
}