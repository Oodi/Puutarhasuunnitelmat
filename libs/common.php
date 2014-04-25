<?php
session_start();


function startSession() {
    
}


function naytaNakyma($sivu, $data = array()) {   
    $sivu = $sivu;
    $ots = '';
    $data = (object) $data;
    require 'views/template.php';
    exit();
}

function naytaNakymaAlaotsikko($sivu, $ots, $data = array()) {
    $sivu = $sivu;
    $ots = $ots;
    $data = (object) $data;
    require 'views/template.php';
}

function ohjaaSivulle($sivu) {
    Header('Location:' . $sivu . '.php');
}

function userOnly() {
    if (isset($_SESSION['kirjautunut']) && $_SESSION['ryhma'] >= 0) {
            return true;  
    } else {
        return false;
    }
}

function visitorOnly() {
    if (empty($_SESSION['kirjautunut'])) {
        return true;
    } else {
        return false;
    }
}

function tarkastaOikeudet() {
    if (isset($_SESSION['kirjautunut'])) {
        $oikeudet = $_SESSION['ryhma'];
        return $oikeudet;
        
    } else {
        return -1;
    }
}

function getAktiivinenSuunnitelma() {
    if (isset($_SESSION['aktiivinenSuunnitelma'])) {
        return aktiivinenSuunnitelma;
    } else {
        return null;
    }
}


function siistiString($s) {
    return htmlspecialchars(trim($s));
}


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


