<div class="panel panel-default">
    <div class="panel-body">
        <form class="form-horizontal" method="post">
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
                    if (isset($data->tkoko) && ($data->tkoko == 3)) {
                        echo " active";
                    }
                    ?>">
                        <input type="radio" name="tkoko" value="3"
                        <?php
                        if (isset($data->tkoko) && ($data->tkoko == 3)) {
                            echo " checked";
                        }
                        ?>> Iso
                    </label>
                    <label class="btn btn-primary
                    <?php
                    if (isset($data->tkoko) && ($data->tkoko == 1)) {
                        echo " active";
                    }
                    ?>">
                        <input type="radio" name="tkoko" value="1"
                        <?php
                        if (isset($data->tkoko) && ($data->tkoko == 1)) {
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
                    if (isset($data->valoisuus) && ($data->valoisuus == 1)) {
                        echo " active";
                    }
                    ?>">
                        <input type="radio" name="valoisuus" value="1"
                        <?php
                        if (isset($data->valoisuus) && ($data->valoisuus == 1)) {
                            echo " checked";
                        }
                        ?>> Aurinko
                    </label>
                    <label class="btn btn-primary
                    <?php
                    if (isset($data->valoisuus) && ($data->valoisuus == 2)) {
                        echo " active";
                    }
                    ?>">
                        <input type="radio" name="valoisuus" value="2"
                        <?php
                        if (isset($data->valoisuus) && ($data->valoisuus == 2)) {
                            echo " checked";
                        }
                        ?>> Puolivarjo
                    </label>
                    <label class="btn btn-primary
                    <?php
                    if (isset($data->valoisuus) && ($data->valoisuus == 3)) {
                        echo " active";
                    }
                    ?>">
                        <input type="radio" name="valoisuus" value="3"
                        <?php
                        if (isset($data->valoisuus) && ($data->valoisuus == 3)) {
                            echo " checked";
                        }
                        ?>> Varjo
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
                        ?>> I a
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
                        ?>> I b
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
                    <label class="btn btn-primary
                    <?php
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
                    <label class="btn btn-primary
                    <?php
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
                    <label class="btn btn-primary
                    <?php
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
                    <label class="btn btn-primary
                    <?php
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
                    <label class="btn btn-primary
                    <?php
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
                    <label class="btn btn-primary
                    <?php
                    if (isset($data->tunnelma) && ($data->tunnelma == "romanttinen")) {
                        echo " active";
                    }
                    ?>">
                        <input type="radio" name="tunnelma" value="romanttinen" 
                        <?php
                        if (isset($data->tunnelma) && ($data->tunnelma == "romanttinen")) {
                            echo " checked";
                        }
                        ?>> Romanttinen
                    </label>
                    <label class="btn btn-primary
                    <?php
                    if (isset($data->tunnelma) && ($data->tunnelma == "japanilainen")) {
                        echo " active";
                    }
                    ?>">
                        <input type="radio" name="tunnelma" value="japanilainen"
                        <?php
                        if (isset($data->tunnelma) && ($data->tunnelma == "japanilainen")) {
                            echo " checked";
                        }
                        ?>> Japanilainen
                    </label>
                    <label class="btn btn-primary
                    <?php
                    if (isset($data->tunnelma) && ($data->tunnelma == "luonnollinen")) {
                        echo " active";
                    }
                    ?>">
                        <input type="radio" name="tunnelma" value="luonnollinen"
                        <?php
                        if (isset($data->tunnelma) && ($data->tunnelma == "luonnollinen")) {
                            echo " checked";
                        }
                        ?>> Luonnollinen
                    </label>
                    <label class="btn btn-primary
                    <?php
                    if (isset($data->tunnelma) && ($data->tunnelma == "graafinen")) {
                        echo " active";
                    }
                    ?>">
                        <input type="radio" name="tunnelma" value="graafinen"
                        <?php
                        if (isset($data->tunnelma) && ($data->tunnelma == "graafinen")) {
                            echo " checked";
                        }
                        ?>> Graafinen
                    </label>
                    <label class="btn btn-primary
                    <?php
                    if (isset($data->tunnelma) && ($data->tunnelma == "kivikkoinen")) {
                        echo " active";
                    }
                    ?>">
                        <input type="radio" name="tunnelma" value="kivikkoinen"
                        <?php
                        if (isset($data->tunnelma) && ($data->tunnelma == "kivikkoinen")) {
                            echo " checked";
                        }
                        ?>> Kivikkoinen
                    </label>
                    <label class="btn btn-primary
                    <?php
                    if (isset($data->tunnelma) && ($data->tunnelma == "hyoty")) {
                        echo " active";
                    }
                    ?>">
                        <input type="radio" name="tunnelma" value="hyoty"
                        <?php
                        if (isset($data->tunnelma) && ($data->tunnelma == "hyoty")) {
                            echo " checked";
                        }
                        ?>> Hyötypuutarha
                    </label>
                </div>

            </div>
            <div class="form-group">
                <div class="col-md-3 col-md-offset-1"><button name="haku" value="1" type="submit" id="hae" class="btn btn-success btn-lg">Hae suunnitelma</button> </div>
            </div>
        </form>

    </div>
</div>


<?php
if (isset($data->suunnitelma)) {
    $suunitelmadata = $data->suunnitelma;
    include 'plan.php';
}
?>
