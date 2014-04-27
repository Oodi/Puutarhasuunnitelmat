<?php

/* Aktivoi halutun suunnitelman */
if (userOnly()) {
    if (isset($_POST["aktivoiSuunnitelma"])) {
        $deaktivoitava = Suunnitelma::haeAktiivinenSuunnitelma($_SESSION['kirjautunut']);
        if (isset($deaktivoitava)) {
            $deaktivoitava->aktivoiTaiDeaktivoiSuunnitelma(0);
        }


        $aktivoitava = Suunnitelma::haeSuunnitelmaByID($_POST["aktivoiSuunnitelma"]);
        $aktivoitava->aktivoiTaiDeaktivoiSuunnitelma(1);

        $aktiivinenSuunnitelma = Suunnitelma::haeAktiivinenSuunnitelma($_SESSION['kirjautunut']);
        if (isset($aktiivinenSuunnitelma)) {
            $_SESSION['aktiivinenSuunnitelma'] = $aktiivinenSuunnitelma;
        }
    }
}


