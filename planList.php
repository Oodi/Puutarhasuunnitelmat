<?php
require_once 'libs/common.php';
require_once 'libs/tietokantayhteys.php';
require_once 'libs/models/suunnitelma.php';
require_once 'libs/models/kasvi.php';
require_once 'libs/models/tunnelma.php';


/* Haetaan julkaistut suunnitelmat */
$suun = Suunnitelma::haeTyypinMukaanSuunnitelmat(4);


naytaNakyma('planList', array('suunnitelmat' => $suun));

