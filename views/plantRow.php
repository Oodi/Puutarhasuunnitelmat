<div class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <div class="col-md-3">
                <a href="#" class="thumbnail">
                    <img data-src="holder.js/245x180" alt="">
                </a>
            </div>
            <div class="col-md-9">
                <div class="row"><div class="col-sm-10">
                        <h3 align="center"><?php echo $kasvi->getNimi(); ?></h3>
                    </div>
                    <div align="right" class="col-sm-2">
                        <form method="post">
                            <?php if (userOnly() && onkoAktiivistaSuunnitelmaa() && !onkoKasviAktiivisessaSuunnitelmassa($kasvi->getID())): ?> 
                                <button class="btn btn-default btn-sm" type="submit" name="lisaaKasviSuunnitelmaan" value="<?php echo $kasvi->getID(); ?>" data-toggle="tooltip" title="Lisää aktiiviseen suunnitelmaan" ><span class=" glyphicon glyphicon-plus-sign" ></span></button>
                            <?php endif; ?>
                            <?php if (userOnly() && onkoAktiivistaSuunnitelmaa() &&  onkoKasviAktiivisessaSuunnitelmassa($kasvi->getID())): ?> 
                                <button class="btn btn-default btn-sm" type="submit" name="poistaKasviSuunnitelmasta" value="<?php echo $kasvi->getID(); ?>" data-toggle="tooltip" title="Poista aktiivisesta suunnitelmasta" ><span class=" glyphicon glyphicon-minus-sign" ></span></button>
                            <?php endif; ?>
                            <?php if (tarkastaOikeudet() >= 1): ?>
                                <button onClick="location.href=<?php echo "'" . "editPlant.php?id=" . $kasvi->getID() . "'"; ?>" id="top" data-original-title="Tooltip on left" type="button" class="btn btn-default btn-sm" data-toggle="tooltip" data-placement="left" title="Muokkaa"> 
                                    <span class="glyphicon glyphicon-pencil" ></span>
                                </button>
                            <?php endif; ?>
                        </form>
                    </div>
                </div>
                <div class="row"><div class="col-sm-12">
                        <p><?php echo $kasvi->getKuvaus(); ?></p>
                    </div>
                </div>
                <div class="row">
                    <table class="table table-bordered">                     
                        <tr>
                            <td> <b>Perenna</b> </td>
                            <td><b>Monivuotinen</b></td>  
                            <td><b>Kesäkuu</b></td>  
                            <td><b>Puolivarjo / varjo</b></td> 
                            <td>  <b><?php echo $kasvi->getKasvukorkeus() . ' cm'; ?></b></td>  
                            <td>  <b><?php echo $kasvi->getKasvuvyohyke(); ?></b></td>                             
                        </tr>
                    </table>                   
                </div>
            </div>
        </div>
    </div>
</div>