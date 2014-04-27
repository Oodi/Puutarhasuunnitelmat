<?php


require_once 'libs/common.php';
require_once 'libs/tietokantayhteys.php';
require_once "libs/models/kasvi.php";

 $k = Kasvi::haeKasviByID(2);
 
 $a = $k->getTunnelmat();

var_dump($_SESSION);

var_dump(tarkastaOikeudet() >= 1 || (false));


