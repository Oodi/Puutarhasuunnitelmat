<div class="col-sm-3">
    <h3>Hyväksy suunnitelmia</h3> 
</div>

<table class="table table-condensed">
    <thead>
        <tr>
            <th>Hyväksyntää odottavat suunnitelmat</th>
            <th>Tekijä</th>

        </tr>
    </thead>

    <?php if (!isset($data->odottavaSuun[0])) { ?>
        <tbody>
            <tr>
                <td>Hyväksyntää odottavia suunnitelmia ei ole.</td>
            </tr>
        </tbody>
<?php } else { ?>
    <tbody>
        <?php foreach ($data->odottavaSuun as $suunnitelma): ?> 
            <tr>
                <td><a href="plan.php?id=<?php echo $suunnitelma->getID(); ?>"><?php echo $suunnitelma->getNimi(); ?></a></td>
                <td><?php echo $suunnitelma->getTekija();?> </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
<?php } ?>
</table>