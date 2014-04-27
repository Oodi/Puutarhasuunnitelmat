<?php 

if (isset($_POST["ehdotaJulkaisua"])) {
    $muutettava = Suunnitelma::haeSuunnitelmaByID($_POST["ehdotaJulkaisua"]);
    $muutettava->muutaSuunnitelmaTyyppia(2);
    
    $verrattava = Suunnitelma::haeAktiivinenSuunnitelma($_SESSION["kirjautunut"]);
    
    if ($verrattava->getID() == $muutettava->getID()) {
        $muutettava->aktivoiTaiDeaktivoiSuunnitelma(0);
        unset($_SESSION["aktiivinenSuunnitelma"]);
    }
    
    $_SESSION["ilmoitus"] = "Suunnitelma lähetetty tarkastettavaksi.";
    ohjaaSivulle('myPlans');
    
}
