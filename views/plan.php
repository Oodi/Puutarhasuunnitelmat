<?php $suun = $data->suunnitelma ?>
<?php include './class/suggestPlan.php'; ?>
<?php include './class/saveCopyOfPlan.php'; ?>

<div class="panel panel-default">
    <div class="panel-body">

        <h2 name="plan"><?php echo $suun->getNimi() ?></h2>
        <p><?php echo $suun->getKuvaus() ?></p>
        <p><?php echo "<b>Tekijä: </b>" . $suun->getTekija() ?></p>
        <?php if (tarkastaOikeudet() >= 0) { ?>
            <form method="post">
                <?php
                if ($suun->getTekija() == $_SESSION["kirjautunut"] && $suun->getSuunnitelmaTyyppi() < 2
                        || tarkastaOikeudet() >= 1) {
                    ?>
                    <a href="editPlan.php?id=<?php echo $suun->getID(); ?>" class="btn btn-primary btn-sm">Muokkaa suunnitelmaa</a>  
                <?php } ?>
                <?php if ($suun->getTekija() == $_SESSION["kirjautunut"] && $suun->getSuunnitelmaTyyppi() == 1) { ?>
                    <button class="btn btn-success btn-sm" name="ehdotaJulkaisua" value="<?php echo $suun->getID() ?>" type="submit">Ehdota julkaistavaksi</button> 
                <?php } ?>
                <?php if ($suun->getSuunnitelmaTyyppi() == 4) { ?>
                    <button class="btn btn-info btn-sm" name="kopioiSuunnitelma" value="<?php echo $suun->getID() ?>" type="submit">Tallenna kopio</button> 
                <?php } ?>
                <?php if ($suun->getSuunnitelmaTyyppi() == 2 && tarkastaOikeudet() >= 1) { ?>
                    <button class="btn btn-success btn-sm" name="hyvaksySuunnitelma" value="<?php echo $suun->getID() ?>" type="submit">Hyväksy suunnitelma</button> 
                    <button class="btn btn-warning btn-sm" name="hylkaaSuunnitelma" value="<?php echo $suun->getID() ?>" type="submit">Hylkää suunnitelma</button> 
                <?php } ?>
                </form>
<?php } ?>
    </div>
</div>

<?php
if (isset($data->kasvit)) {
    foreach ($data->kasvit as $kasvi) {
        include 'plantRow.php';
    }
}
?>