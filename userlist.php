<?php

require_once 'libs/common.php';
require_once 'libs/tietokantayhteys.php';
require_once "libs/models/kayttaja.php";

if (tarkastaOikeudet() < 1) {
    ohjaaSivulle('index');
}


$users = Kayttaja::etsiKaikkiKayttajat();


naytaNakyma('userList', $users);


