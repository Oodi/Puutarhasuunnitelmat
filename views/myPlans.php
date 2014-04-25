<div class="col-sm-3">
    <h3>Suunnitelmasi</h3> 
</div>

<div class="col-sm-offset-6 col-sm-3">
    <a class="btn btn-success btn-lg" href="newPlan.php">Aloita uusi suunnitelma</a>  
</div>
<table class="table table-condensed">
    <thead>
        <tr>
            <th>Aktiivinen suunnitelma</th>

        </tr>
    </thead>

    <?php if (!isset($data->suunnitelma)) { ?>
        <tbody>
            <tr>
                <td>Et ole asettanu aktiivista suunnitelmaa tai sinulla ei ole suunnitelmia.</td>
            </tr>
        </tbody>
    </table>
<?php } else { ?>
    </table>
    <div class="panel-group" id="accordion">
        <div class="panel panel-default">
            <div data-toggle="collapse" data-parent="#accordion" href="#collapseOne"  class="panel-heading">
                <h4 onclick="location.href=plan.php?id=<?php echo $data->suunnitelma->getID(); ?>" class="panel-title">
                    <a href="plan.php?id=<?php echo $data->suunnitelma->getID(); ?>">
                        <?php echo $data->suunnitelma->getNimi(); ?>
                    </a>
                </h4>
            </div>
            <div id="collapseOne" class="panel-collapse collapse">
                <div class="panel-body">
                    <?php
                    if (isset($data->suunnitelma)) {
                        $data = (object) $data;
                        include 'views/plan.php';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
<?php } ?>




<table class="table table-bordered">
    <thead>
        <tr>
            <th colspan="2">Yksityiset suunnitelmat</th>            
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data->omatSuun as $suunnitelma): ?> 
            <tr>
                <td><a href="plan.php?id=<?php echo $suunnitelma->getID(); ?>"><?php echo $suunnitelma->getNimi(); ?></a></td>
                <td class="col-md-2">
                    <form method="post">
                        <button class="btn btn-default btn-sm" type="submit" name="aktivoiSuunnitelma" value="<?php echo $suunnitelma->getID(); ?>">Aktivoi</button>
                        <button onClick="location.href=<?php echo "'" . "editPlan.php?id=" . $suunnitelma->getID() . "'"; ?>" type="button" class="btn btn-default btn-sm" data-toggle="tooltip" title="Muokkaa"> 
                            <span class="glyphicon glyphicon-pencil" ></span>
                        </button> 
                    </form>

                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Julkaistut suunnitelmat</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data->julkaistutSuun as $suunnitelma): ?> 
            <tr>
                <td><a href="plan.php?id=<?php echo $suunnitelma->getID(); ?>"><?php echo $suunnitelma->getNimi(); ?></a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Julkaisua odottavat suunnitelmat</th>

        </tr>
    </thead>
    <tbody>
        <?php foreach ($data->odottavaSuun as $suunnitelma): ?> 
            <tr>
                <td><a href="plan.php?id=<?php echo $suunnitelma->getID(); ?>"><?php echo $suunnitelma->getNimi(); ?></a></td>

            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Hylätyt suunnitelmat</th>

        </tr>
    </thead>
    <tbody>
        <?php foreach ($data->hylatSuun as $suunnitelma): ?> 
            <tr>
                <td><a href="plan.php?id=<?php echo $suunnitelma->getID(); ?>"><?php echo $suunnitelma->getNimi(); ?></a></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>


