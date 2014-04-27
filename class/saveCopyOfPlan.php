<?php

if (isset($_POST["kopioiSuunnitelma"])) {

    $s = Suunnitelma::haeSuunnitelmaByID($_POST["kopioiSuunnitelma"]);

    if (isset($s)) {
        $k = Kasvi::haeSuunnitelmanKasvit($s->getID());
        $s->setNimi($s->getNimi() . " (Kopio)");
        $s->setSuunnitelmaTyyppi(1);
        $s->setTekija($_SESSION["kirjautunut"]);
        $s->lisaaKantaan();
        foreach ($k as $ka) {
            $s->lisaaKasviSuunnitelmaan($ka->getID());
        }
        $s->lisaaMuistioon();
        vaihdaAktiivistaSuunnitelmaa($s->getID());




        ohjaaSivulle('myPlans');
    }
}
