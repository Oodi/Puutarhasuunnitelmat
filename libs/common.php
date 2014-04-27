<?php

session_start();


/* Näyttää halutun näkymän ja välittää sille datan */

function naytaNakyma($sivu, $data = array()) {
    $sivu = $sivu;
    $_SESSION["nakyma"] = $sivu;
    $data = (object) $data;
    require 'views/template.php';
    exit();
}

/* Ohjaa halutulle sivulle */

function ohjaaSivulle($sivu) {
    $_SESSION["nakyma"] = $sivu;
    Header('Location:' . $sivu . '.php');
}

/* Tarkastaa että käyttäjä on kirjautunut */

function userOnly() {
    if (isset($_SESSION['kirjautunut']) && $_SESSION['ryhma'] >= 0) {
        return true;
    } else {
        return false;
    }
}

/* Tarkastaa että käyttäjä ei ole kirjautunut*/

function visitorOnly() {
    if (empty($_SESSION['kirjautunut'])) {
        return true;
    } else {
        return false;
    }
}

/* Palauttaa käyttäjän oikeusarvon */

function tarkastaOikeudet() {
    if (isset($_SESSION['kirjautunut'])) {
        $oikeudet = $_SESSION['ryhma'];
        return $oikeudet;
    } else {
        return -1;
    }
}

/* Palauttaa aktiivisen suunnitelman */
function getAktiivinenSuunnitelma() {
    if (isset($_SESSION['aktiivinenSuunnitelma'])) {
        return aktiivinenSuunnitelma;
    } else {
        return null;
    }
}

/* Siistii halutun tekstin */

function siistiString($s) {
    return htmlspecialchars(trim($s));
}

/* Vaihtaa aktiivisen suunnitelman haluttuun */

function vaihdaAktiivistaSuunnitelmaa($suunnitelmaID) {
    $deaktivoitava = Suunnitelma::haeAktiivinenSuunnitelma($_SESSION['kirjautunut']);
    if (isset($deaktivoitava)) {
        $deaktivoitava->aktivoiTaiDeaktivoiSuunnitelma(0);
    }
    if (isset($suunnitelmaID)) {
        $aktivoitava = Suunnitelma::haeSuunnitelmaByID($suunnitelmaID);
        $aktivoitava->aktivoiTaiDeaktivoiSuunnitelma(1);
        $aktiivinenSuunnitelma = Suunnitelma::haeAktiivinenSuunnitelma($_SESSION['kirjautunut']);
        if (isset($aktiivinenSuunnitelma)) {
            $_SESSION['aktiivinenSuunnitelma'] = $aktiivinenSuunnitelma;
        }
    }
}

/* Tarkastaa onko kasvi aktiivisessa suunnitelmassa */

function onkoKasviAktiivisessaSuunnitelmassa($kasviID) {
    if (!isset($_SESSION["aktiivinenSuunnitelma"])) {
        return true;
    }

    $s = Suunnitelma::haeAktiivinenSuunnitelma($_SESSION['kirjautunut']);
    if (isset($s)) {
        return $s->onkoKasviSuunnitelmassa($kasviID);
    } else {
        return true;
    }
}

/* Tarkastaa onko aktiivinen suunnitelma asetettu */

function onkoAktiivistaSuunnitelmaa() {
    return isset($_SESSION["aktiivinenSuunnitelma"]);
}

