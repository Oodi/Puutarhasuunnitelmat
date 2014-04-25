<div class="panel panel-default">
    <div class="panel-body">
        <form class="form-horizontal" method="POST">

            <div class="form-group">
                <label class="col-sm-2 form-label" for="textinput">Suunnitelman nimi:</label>
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
                <label class="col-sm-2 form-label">Tila:</label>
                <div class="btn-group" data-toggle="buttons">
                    <label class="btn btn-primary
                    <?php
                    if (isset($data->tila) && ($data->tila == 1)) {
                        echo " active";
                    }
                    ?>">
                        <input type="radio" name="tila" value="1"
                        <?php
                        if (isset($data->tila) && ($data->tila == 1)) {
                            echo " checked";
                        }
                        ?>> Parveke
                    </label>
                    <label class="btn btn-primary
                    <?php
                    if (isset($data->tila) && ($data->tila == 2)) {
                        echo " active";
                    }
                    ?>">
                        <input type="radio" name="tila" value="2"
                        <?php
                        if (isset($data->tila) && ($data->tila == 2)) {
                            echo " checked";
                        }
                        ?>> Piha
                    </label>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-2 form-label">Tilan koko:</label>
                <div class="btn-group" data-toggle="buttons">
                    <label class="btn btn-primary
                    <?php
                    if (isset($data->tKoko) && ($data->tKoko == 3)) {
                        echo " active";
                    }
                    ?>">
                        <input type="radio" name="tKoko" value="3"
                        <?php
                        if (isset($data->tKoko) && ($data->tKoko == 3)) {
                            echo " checked";
                        }
                        ?>> Iso
                    </label>
                    <label class="btn btn-primary
                    <?php
                    if (isset($data->tKoko) && ($data->tKoko == 1)) {
                        echo " active";
                    }
                    ?>">
                        <input type="radio" name="tKoko" value="1"
                        <?php
                        if (isset($data->tKoko) && ($data->tKoko == 1)) {
                            echo " checked";
                        }
                        ?>> Pieni
                    </label>
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
                        <input type="radio" name="valoisuus" value="1"
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
                        <input type="radio" name="valoisuus" value="3"
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
                        <input type="radio" name="valoisuus" value="5"
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
                        <input type="radio" name="vyohyke" value="2" 
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
                        <input type="radio" name="vyohyke" value="3" 
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
                        <input type="radio" name="vyohyke" value="4" 
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
                        <input type="radio" name="vyohyke" value="5" 
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
                        <input type="radio" name="vyohyke" value="6" 
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
                        <input type="radio" name="vyohyke" value="7" 
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
                        <input type="radio" name="vyohyke" value="8" 
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
                        <input type="radio" name="vyohyke" value="9"
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
                        if (isset($data->tunnelma) && ($data->tunnelma == $tunnelma->getTunnelmaID())) {
                            echo " active";
                        }
                        ?>">
                            <input type="radio" name="tunnelma" value="<?php echo $tunnelma->getTunnelmaID() ?>"  <?php
                           if (isset($data->tunnelma) && ($data->tunnelma == $tunnelma->getTunnelmaID())) {
                               echo " checked";
                           }
                        ?>> <?php echo $tunnelma->getNimi() ?>
                        </label>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-offset-2">
                    <div class="btn-toolbar">
                        <button type="submit" name="id" value="<?php echo $data->id; ?>" id="muokkaa" class="btn btn-success btn-lg">Tallenna muutokset</button> 
                        <?php if ($data->tekija == $_SESSION["kirjautunut"] && $data->tyyppi == 1) { ?>
                            <button class="btn btn-sm btn-danger" type="submit" name="poistaSuunnitelma" value="<?php echo $data->id; ?>" data-toggle="modal" data-target="#confirmDelete" data-title="Poista" data-message="Haluatko varmasti poistaa?">
                                <span class="glyphicon glyphicon-remove-circle"></span> Poista
                            </button>
                        <?php } ?>

                    </div>
                </div>
            </div>
        </form>
    </div>
</div>