<?php

if (isset($_POST["poistaSuunnitelma"])) {

    $poistettava = Suunnitelma::haeSuunnitelmaByID($_POST["poistaSuunnitelma"]);

    if ($poistettava->getTekija() == $_SESSION["kirjautunut"] && $poistettava->getSuunnitelmaTyyppi() != 4 || tarkastaOikeudet() >= 1) {
        $poistettava->poistaKannasta();
        $s = Suunnitelma::haeAktiivinenSuunnitelma($_POST["kirjautunut"]);
        if (isset($s)) {
            if ($poistettava->getID() == $s->getID()) {
                unset($_SESSION["aktiivinenSuunnitelma"]);
            }
        }
        $_SESSION["ilmoitus"] = "Suunnitelma on poistettu";
        ohjaaSivulle('myPlans');
    }
}
