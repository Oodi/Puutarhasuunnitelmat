
<table class="table table-condensed">
    <thead>
        <tr>
            <th>Nimimerkki</th>
            <th>Sähköposti</th>
            <th>Ylläpitäjä</th>
            <th></th>           
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $kayttaja) { ?>
            <tr>
                <td><?php echo $kayttaja->getNimimerkki(); ?></td>
                <td><?php echo $kayttaja->getSposti(); ?> </td>
                <td><?php if ($kayttaja->getAdmin() > 0) { ?>
                        <span class="glyphicon glyphicon-ok-circle" ></span>
                        <button onClick="location.href=<?php echo "'" . "class/promuser.php?name=" . $kayttaja->getNimimerkki() . "&ac=0" . "'"; ?>"  type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="top" title="Alenna"> 
                            <span class="glyphicon glyphicon-arrow-down" ></span>
                        </button>
                    <?php } else {?>
                        <span class="glyphicon glyphicon-remove-circle" ></span>
                    <button onClick="location.href=<?php echo "'" . "class/promuser.php?name=" . $kayttaja->getNimimerkki() . "&ac=1" . "'"; ?>"  type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="top" title="Ylennä"> 
                        <span class="glyphicon glyphicon-arrow-up" ></span>
                    </button>
                        <?php } ?>
                </td>
                <td>
                    <button onClick="location.href=<?php echo "'" . "#?name=" . $kayttaja->getNimimerkki() . "'"; ?>" type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="top" title="Muokkaa"> 
                        <span class="glyphicon glyphicon-pencil" ></span>
                    </button>
                    <button onClick="location.href=<?php echo "'" . "class/deluser.php?name=" . $kayttaja->getNimimerkki() . "'"; ?>"  type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="top" title="Poista"> 
                        <span class="glyphicon glyphicon-remove-circle" ></span>
                    </button>
                </td>
            </tr>
        <?php } ?>


    </tbody>
</table>

