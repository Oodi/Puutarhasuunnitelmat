<?php

if (isset($_POST["lisaaKasviSuunnitelmaan"])) {
    if (userOnly()) {
        if (!isset($_SESSION["aktiivinenSuunnitelma"])) {
            $_SESSION['ilmoitus'] = "Sinulla ei ole aktiivista suunnitelmaa!";
            
        } else {
            $aktiivinen = Suunnitelma::haeAktiivinenSuunnitelma($_SESSION["kirjautunut"]);
            $lisattava = Kasvi::haeKasviByID($_POST["lisaaKasviSuunnitelmaan"]);
            if (!$aktiivinen->onkoKasviSuunnitelmassa($lisattava->getID())) {
                $aktiivinen->lisaaKasviSuunnitelmaan($lisattava->getID());
                $_SESSION['ilmoitus'] = "Kasvi on lisätty suunnitelmaan!";
            } else {
                $_SESSION['ilmoitus'] = "Kasvi on jo suunnitelmassa!";
            }
        }
    }
}
