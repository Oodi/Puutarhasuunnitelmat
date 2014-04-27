<?php

if (isset($_POST["poistaSuunnitelma"])) {

    $poistettava = Suunnitelma::haeSuunnitelmaByID($_POST["poistaSuunnitelma"]);

    if ($poistettava->getTekija() == $_SESSION["kirjautunut"] && $poistettava->getSuunnitelmaTyyppi() != 4 || tarkastaOikeudet() >= 1) {
        
        $s = Suunnitelma::haeAktiivinenSuunnitelma($_SESSION["kirjautunut"]);
        if (isset($s)) {
            if ($poistettava->getID() == $s->getID()) {
                unset($_SESSION["aktiivinenSuunnitelma"]);
            }
        }
        $poistettava->poistaKannasta();
        $_SESSION["ilmoitus"] = "Suunnitelma on poistettu";
        ohjaaSivulle('myPlans');
    }
}
