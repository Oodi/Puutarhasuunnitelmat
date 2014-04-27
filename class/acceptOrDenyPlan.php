<?php

/* Vaihtaa suunnitelman tyypin halutun mukaiseksi. Siis hyväksyy tai hylkää. */
if (tarkastaOikeudet() >= 1) {
    if (isset($_POST["hyvaksySuunnitelma"])) {
        $s = Suunnitelma::haeSuunnitelmaByID($_POST["hyvaksySuunnitelma"]);

        if (isset($s)) {
            $s->muutaSuunnitelmaTyyppia(4);
            ohjaaSivulle('suggestedPlans');
        }
    } elseif (isset($_POST["hylkaaSuunnitelma"])) {
        $s = Suunnitelma::haeSuunnitelmaByID($_POST["hylkaaSuunnitelma"]);

        if (isset($s)) {
            $s->muutaSuunnitelmaTyyppia(3);
            ohjaaSivulle('suggestedPlans');
        }
    }
}


