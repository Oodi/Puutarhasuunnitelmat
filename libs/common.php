<?php
session_start();


function startSession() {
    
}


function naytaNakyma($sivu, $data = array()) {
    $sivu = $sivu;
    $data = (object) $data;
    require 'views/template.php';
    exit();
}

function naytaNakymaNoExit($sivu, $data = array()) {
    $sivu = $sivu;
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
        ohjaaSivulle('login');
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


function siistiString($s) {
    return htmlspecialchars(trim($s));
}


