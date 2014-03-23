<?php

require "libs/models/kayttaja.php";

//Lista asioista array-tietotyyppiin laitettuna:
$lista = Kayttaja::etsiKaikkiKayttajat();
?><!DOCTYPE HTML>

<html>
    <head>
        <title>Listaustesti</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="./css/bootstrap.css" rel="stylesheet">
        <link href="./css/bootstrap-theme.css" rel="stylesheet">

    </head>
    <body>


        <table class="table table-condensed">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nimimerkki</th>
                    <th>Sähköposti</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($lista as $asia) { ?>

                    <tr>
                        <td></td>
                        <td><?php echo $asia->getNimimerkki(); ?></td>
                        <td> </td>
                    </tr>
                <?php } ?>


            </tbody>
        </table>

    </body>
</html>
