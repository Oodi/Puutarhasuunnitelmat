<?php

if (isset($_POST["kopioiSuunnitelma"])) {

    $s = Suunnitelma::haeSuunnitelmaByID($_POST["kopioiSuunnitelma"]);

    if (isset($s)) {
        $s->setNimi($s->getNimi() . " (Kopio)");
        $s->setSuunnitelmaTyyppi(1);
        $s->setTekija($_SESSION["kirjautunut"]);
        $s->lisaaKantaan();
        $s->lisaaMuistioon();
        vaihdaAktiivistaSuunnitelmaa($s->getID());
        ohjaaSivulle('myPlans');
    }
}
