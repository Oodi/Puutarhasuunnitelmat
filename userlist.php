<?php

require_once 'libs/common.php';
require_once 'libs/tietokantayhteys.php';
require_once "libs/models/kayttaja.php";

/* Tarkistetaan, että käyttäjä on ylläpitäjä*/
if (tarkastaOikeudet() < 1) {
    ohjaaSivulle('index');
}

/* Haetaan kaikki käyttäjät */
$users = Kayttaja::etsiKaikkiKayttajat();

/* Näytetään käyttäjälista */
naytaNakyma('userList', $users);


