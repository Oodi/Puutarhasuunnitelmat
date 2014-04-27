<ul class="nav nav-tabs" >
    <li ><a href="searchPlan.php" >Hae suunnitelma</a></li>
    <li class="active"><a href="#">Selaile suunnitelmia</a></li>
</ul>
<br>
<table class="table table-condensed">
    <thead>
        <tr>
            <th>Suunnitelmat</th>
            <th>Tila</th>
            <th>Tilan koko</th>
            <th>Tunnelma</th>
            <th>Tekijä</th>
        </tr>
    </thead>

    <?php if (!isset($data->suunnitelmat[0])) { ?>
        <tbody>
            <tr>
                <td>Suunnitelmia ei ole.</td>
            </tr>
        </tbody>
<?php } else { ?>
    <tbody>
        <?php foreach ($data->suunnitelmat as $suunnitelma): ?> 
            <tr>
                <td><a href="plan.php?id=<?php echo $suunnitelma->getID(); ?>"><?php echo $suunnitelma->getNimi(); ?></a></td>
                <td><?php echo $suunnitelma->getTilaTekstina();?> </td>
                <td><?php echo $suunnitelma->getTilanKokoTekstina();?> </td>
                <td><?php echo Tunnelma::haeTunnelmaByID($suunnitelma->getTunnelma())->getNimi();?> </td>
                <td><?php echo $suunnitelma->getTekija();?> </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
<?php } ?>
</table>
