<?php

if (isset($_POST["poistaKasviSuunnitelmasta"])) {
    if (userOnly()) {
        if (!isset($_SESSION["aktiivinenSuunnitelma"])) {
            $_SESSION['ilmoitus'] = "Sinulla ei ole aktiivista suunnitelmaa!";
            
        } else {
            $aktiivinen = Suunnitelma::haeAktiivinenSuunnitelma($_SESSION["kirjautunut"]);
            $poistettava = Kasvi::haeKasviByID($_POST["poistaKasviSuunnitelmasta"]);
            if ($aktiivinen->onkoKasviSuunnitelmassa($poistettava->getID())) {
                $aktiivinen->poistaKasviSuunnitelmasta($poistettava->getID());
                $_SESSION['ilmoitus'] = "Kasvi on poistettu suunnitelmasta!";
            } else {
                $_SESSION['ilmoitus'] = "Kasvi ei ole suunnitelmassa!";
            }
        }
    }
}
