<div class="panel panel-default">
    <div class="panel-body">
        <form class="form-horizontal" method="POST">

            <div class="form-group">
                <label class="col-sm-2 form-label" for="textinput">Kasvin nimi:</label>
                <div class="col-sm-3">
                    <input id="textinput" name="nimi" placeholder="" class="form-control" type="text" 
                    <?php
                    if (isset($data->nimi)) {
                        echo "value= \"" . $data->nimi . "\"";
                    }
                    ?>>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 form-label" for="textinput">Kuvaus:</label>
                <div class="col-sm-3">
                    <textarea id="kuvaus" name="kuvaus" rows="3"><?php
                           if (isset($data->kuvaus)) {
                               echo $data->kuvaus;
                           }
                    ?></textarea>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 form-label">Valoisuus:</label>
                <div class="btn-group" data-toggle="buttons">

                    <label class="btn btn-primary  
                    <?php
                    if (isset($data->valoisuus) && ($data->valoisuus <= 2)) {
                        echo " active";
                    }
                    ?>">
                        <input type="checkbox" name="valoisuus[]" value="1"
                        <?php
                        if (isset($data->valoisuus) && ($data->valoisuus <= 2)) {
                            echo " checked";
                        }
                        ?>>
                        Aurinko
                    </label>
                    <label class="btn btn-primary
                    <?php
                    if (isset($data->valoisuus) && ($data->valoisuus <= 4 && $data->valoisuus != 1)) {
                        echo " active";
                    }
                    ?>">
                        <input type="checkbox" name="valoisuus[]" value="2"
                        <?php
                        if (isset($data->valoisuus) && ($data->valoisuus <= 4 && $data->valoisuus != 1)) {
                            echo " checked";
                        }
                        ?>
                               > Puolivarjo
                    </label>
                    <label class="btn btn-primary
                    <?php
                    if (isset($data->valoisuus) && ($data->valoisuus >= 4 || $data->valoisuus == 0)) {
                        echo " active";
                    }
                    ?>">
                        <input type="checkbox" name="valoisuus[]" value="3"
                        <?php
                        if (isset($data->valoisuus) && ($data->valoisuus >= 4 || $data->valoisuus == 0)) {
                            echo " checked";
                        }
                        ?>
                               > Varjo
                    </label>
                </div>

            </div>
            <div class="form-group">

                <label class="col-sm-2 form-label">Kasvuvyöhyke:</label>
                <div class="btn-group" data-toggle="buttons">
                    <label class="btn btn-primary
                    <?php
                    if (isset($data->vyohyke) && ($data->vyohyke == 1)) {
                        echo " active";
                    }
                    ?>">
                        <input type="radio" name="vyohyke" value="1"
                        <?php
                        if (isset($data->vyohyke) && ($data->vyohyke == 1)) {
                            echo " checked";
                        }
                        ?>
                               > Ia
                    </label>
                    <label class="btn btn-primary
                    <?php
                    if (isset($data->vyohyke) && ($data->vyohyke == 2)) {
                        echo " active";
                    }
                    ?>">
                        <input type="radio" name="vyohyke" value="2"  id="option7"
                        <?php
                        if (isset($data->vyohyke) && ($data->vyohyke == 2)) {
                            echo " checked";
                        }
                        ?>> Ib
                    </label>
                    <label class="btn btn-primary
                    <?php
                    if (isset($data->vyohyke) && ($data->vyohyke == 3)) {
                        echo " active";
                    }
                    ?>">
                        <input type="radio" name="vyohyke" value="3"  id="option8"
                        <?php
                        if (isset($data->vyohyke) && ($data->vyohyke == 3)) {
                            echo " checked";
                        }
                        ?>> II
                    </label>
                    <label class="btn btn-primary<?php
                               if (isset($data->vyohyke) && ($data->vyohyke == 4)) {
                                   echo " active";
                               }
                        ?>">
                        <input type="radio" name="vyohyke" value="4"  id="option8"
                        <?php
                        if (isset($data->vyohyke) && ($data->vyohyke == 4)) {
                            echo " checked";
                        }
                        ?>> III
                    </label>
                    <label class="btn btn-primary<?php
                               if (isset($data->vyohyke) && ($data->vyohyke == 5)) {
                                   echo " active";
                               }
                        ?>">
                        <input type="radio" name="vyohyke" value="5"  id="option8" 
                        <?php
                        if (isset($data->vyohyke) && ($data->vyohyke == 5)) {
                            echo " checked";
                        }
                        ?>> IV
                    </label>
                    <label class="btn btn-primary<?php
                               if (isset($data->vyohyke) && ($data->vyohyke == 6)) {
                                   echo " active";
                               }
                        ?>">
                        <input type="radio" name="vyohyke" value="6"  id="option8"
                        <?php
                        if (isset($data->vyohyke) && ($data->vyohyke == 6)) {
                            echo " checked";
                        }
                        ?>> V
                    </label>
                    <label class="btn btn-primary<?php
                               if (isset($data->vyohyke) && ($data->vyohyke == 7)) {
                                   echo " active";
                               }
                        ?>">
                        <input type="radio" name="vyohyke" value="7"  id="option8"
                        <?php
                        if (isset($data->vyohyke) && ($data->vyohyke == 7)) {
                            echo " checked";
                        }
                        ?>> VI
                    </label>
                    <label class="btn btn-primary<?php
                               if (isset($data->vyohyke) && ($data->vyohyke == 8)) {
                                   echo " active";
                               }
                        ?>">
                        <input type="radio" name="vyohyke" value="8"  id="option8"
                        <?php
                        if (isset($data->vyohyke) && ($data->vyohyke == 8)) {
                            echo " checked";
                        }
                        ?>> VII
                    </label>
                    <label class="btn btn-primary<?php
                               if (isset($data->vyohyke) && ($data->vyohyke == 9)) {
                                   echo " active";
                               }
                        ?>">
                        <input type="radio" name="vyohyke" value="9"  id="option8"
                        <?php
                        if (isset($data->vyohyke) && ($data->vyohyke == 9)) {
                            echo " checked";
                        }
                        ?>> VIII
                    </label>

                </div>

            </div>
            <div class="form-group">

                <label class="col-sm-2 form-label">Tunnelma:</label>
                <div class="btn-toolbar" id="testi" data-toggle="buttons">
                    
                     <?php foreach ($data->tunnelmat as $tunnelma): ?> 
                        <label class="btn btn-primary
                        <?php
                        if (isset($data->tunnelma) && in_array($tunnelma->getTunnelmaID(),$data->tunnelma)) {
                            echo " active";
                        }
                        ?>">                         
                            <input type="checkbox" name="tunnelma[]" value="<?php echo $tunnelma->getTunnelmaID() ?>"  <?php
                           if (isset($data->tunnelma) && in_array($tunnelma->getTunnelmaID(),$data->tunnelma)) {
                               echo " checked";
                           }
                        ?>> <?php echo $tunnelma->getNimi() ?>
                        </label>
                    <?php endforeach; ?>
            </div>
            <div class="form-group">
                <div class="col-md-offset-1 col-md-3">
                    <button type="submit" name="id" value="<?php echo $data->id; ?>" id="muokkaa" class="btn btn-success btn-lg">Tallenna muutokset</button> </div>
                <div class="col-md-1"> <button class="btn btn-danger" type="submit" name="poistaKasvi" value="<?php echo $data->id; ?>" data-title="Poista" data-message="Haluatko varmasti poistaa?">
                        <span class="glyphicon glyphicon-remove-circle" ></span>
                    </button></div>
            </div>
        </form>
    </div>
</div>