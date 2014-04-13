<?php

require_once '../libs/common.php';
require_once '../libs/tietokantayhteys.php';
require_once "../libs/models/kayttaja.php";


if (tarkastaOikeudet() < 1) {
    ohjaaSivulle('index');
}

if (isset($_GET["name"]) && isset($_GET["ac"])) {

    $muokattava = Kayttaja::etsiKayttajaNimimerkilla($_GET["name"]);
    if ($muokattava == null) {
        ohjaaSivulle('../userlist');
    } else {
        if ($_GET["ac"] == 1) {
            $muokattava->muutaAdminKayttaja(1);
            $_SESSION['ilmoitus'] = "Käyttäjä ylennetty onnistuneesti.";
        } else {
            if ($_SESSION['kirjautunut'] == $_GET["name"]) {
                $_SESSION['ilmoitus'] = "Et voi alentaa itseäsi.";
                ohjaaSivulle('../userlist');
                
            } else {
                $muokattava->muutaAdminKayttaja(0);
                $_SESSION['ilmoitus'] = "Käyttäjä alenenttu onnistuneesti.";
            }
        }
        ohjaaSivulle('../userlist');
    }
} else {
    ohjaaSivulle('../userlist');
}
