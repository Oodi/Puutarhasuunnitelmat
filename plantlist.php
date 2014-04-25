<?php

require_once 'libs/common.php';
require_once 'libs/tietokantayhteys.php';
require_once "libs/models/kasvi.php";
require_once "libs/models/suunnitelma.php";


include_once 'class/addPlantToPlan.php';

$sivu='plantlist';

$sivua = 1;
  if (isset($_GET['sivu'])) {
    $sivua = (int)$_GET['sivu'];

    
    if ($sivua < 1) $sivua = 1;
  }
  
  $nimi = '%';
  if (isset($_GET['nimi'])) {
      $nimi = siistiString($_GET['nimi']);
      $nimi = '%' . $nimi .'%';
  }

$kasvit = Kasvi::haeKasvit($sivua, $nimi);


naytaNakyma('plantlist', array('kasvit'=> $kasvit,'nSivu'=> $sivua));


