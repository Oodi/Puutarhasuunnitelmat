<?php 


require_once 'libs/common.php';
require_once 'libs/tietokantayhteys.php';
require_once "libs/models/kasvi.php";

if (tarkastaOikeudet() < 1) {
    ohjaaSivulle('index');
}


if (isset($_GET["id"])) {

    $muokattava = Kasvi::haeKasviByID($_GET["id"]);
    if ($muokattava == null) {
        naytaNakyma('plantlist', array('virhe' => "Kasvia ei ole olemassa"));
    } else {
        $muokattava->poistaKannasta();
        $_SESSION['ilmoitus'] = "Kasvi poistettu onnistuneesti.";
        ohjaaSivulle('plantlist');
    }

    
} else {
    naytaNakyma('plantlist');
}
