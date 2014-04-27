<?php





if (isset($_POST["poistaKasvi"]) && tarkastaOikeudet() >=1) {

    $muokattava = Kasvi::haeKasviByID($_POST["poistaKasvi"]);
    if ($muokattava == null) {
        $_SESSION["ilmoitus"] = "Kasvia ei ole olemassa";
    } else {
        $muokattava->poistaKannasta();
        $_SESSION['ilmoitus'] = "Kasvi poistettu onnistuneesti.";
        ohjaaSivulle('plantlist');
    }

    
}
