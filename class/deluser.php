<?php 

require_once '../libs/common.php';
require_once '../libs/tietokantayhteys.php';
require_once "../libs/models/kayttaja.php";


if (tarkastaOikeudet() < 1) {
    ohjaaSivulle('index');
}


if (isset($_GET["name"])) {

    $muokattava = Kayttaja::etsiKayttajaNimimerkilla($_GET["name"]);
    if ($muokattava == null) {
        naytaNakyma('userList', array('virhe' => "Käyttäjää ei ole olemassa"));
    } else {
        $muokattava->poistaKannasta();
        $_SESSION['ilmoitus'] = "Käyttäjä poistettu onnistuneesti.";
        ohjaaSivulle('../userlist');
    }

    
} else {
    naytaNakyma('userList');
}
