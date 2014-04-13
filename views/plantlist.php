
<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nimi</th>
            <th>Kasvyvyöhyke</th>
            <th>Kasvukorkeys</th>
            <?php if (tarkastaOikeudet() >= 1): ?> 
            <th></th>
            <?php endif; ?>
            
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data as $kasvi): ?> 
            <tr>
                <td><?php echo $kasvi->getNimi(); ?></td>
                <td><?php echo $kasvi->getKasvuvyohyke(); ?></td>
                <td><?php echo $kasvi->getKasvukorkeus() . ' cm'; ?></td>   
                 <?php if (tarkastaOikeudet() >= 1): ?>   
                <td>
                    <button onClick="location.href=<?php echo "'" . "editPlant.php?id=" . $kasvi->getID() . "'"; ?>" id="top" data-original-title="Tooltip on left" type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="left" title="Muokkaa"> 
                        <span class="glyphicon glyphicon-pencil" ></span>
                    </button>
                    <button onClick="location.href=<?php echo "'" . "deletePlant.php?id=" . $kasvi->getID() . "'"; ?>" id="top" data-original-title="Tooltip on left" type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="left" title="Poista"> 
                        <span class="glyphicon glyphicon-remove-circle" ></span>
                    </button>
                </td>
                 <?php endif; ?>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

