<?php 

require_once 'libs/common.php';
require_once 'libs/tietokantayhteys.php';
require_once 'libs/models/suunnitelma.php';
require_once 'libs/models/kasvi.php';

if (!isset($_GET['id'])) {
    ohjaaSivulle('index');
    
}

include_once  'class/activePlan.php';
include_once  'class/acceptOrDenyPlan.php';
include_once 'class/addPlantToPlan.php';
include_once 'class/delPlantFromPlan.php';

$suun = Suunnitelma::haeSuunnitelmaByID($_GET['id']);
if (!isset($suun)) {
    naytaNakyma('searchPlan', array('virhe' => "Suunnitelmaa ei löydy."));
}


$kasvit = Kasvi::haeSuunnitelmanKasvit($_GET['id']);
naytaNakyma('plan', array('suunnitelma' => $suun, 
    'kasvit' => $kasvit));