<?php

require_once 'libs/common.php';
require_once 'libs/tietokantayhteys.php';
require_once "libs/models/kasvi.php";

$sivu='plantlist';

$sivua = 1;
//  if (isset($_GET['sivu'])) {
//    $sivua = (int)$_GET['sivu'];
//
//    
//    if ($sivua < 1) $sivua = 1;
//  }

$data = Kasvi::haeKasvit($sivua);


naytaNakyma($sivu, $data);


