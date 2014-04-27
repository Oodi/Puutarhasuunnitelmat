<?php 

require_once 'libs/common.php';

    /* Tuhotaan istunnon tiedot */
    if (isset($_SESSION['kirjautunut']) && isset($_SESSION['ryhma'])) {
        unset($_SESSION['kirjautunut']);
        unset($_SESSION['ryhma']);
        unset($_SESSION['aktiivinenSuunnitelma']);
        ohjaaSivulle('login');
    }



