<div class="panel panel-default">
    <div class="panel-heading">Liity mukaan, saat enemmän!</div>
    <div class="panel-body">
        <form  method="post" class="form-horizontal">

            <div class="form-group 
            <?php
            if (isset($data->nimvirhe)) {
                echo "has-error";
            }
            ?>">
                <label class="col-sm-2 control-label">Kayttäjänimi:</label>
                <div class="col-sm-3">
                    <input name="username" class="form-control" value="<?php
                 if (isset($data->email)) {
                     echo $data->nimi;
                 }
            ?>" type="text" required>
                           <?php
                           if (isset($data->nimvirhe)) {
                               echo '<span class="help-block">' . $data->nimvirhe . '</span>';
                           }
                           ?>

                </div>
            </div>
            <div class="form-group 
            <?php
            if (isset($data->emvirhe)) {
                echo "has-error";
            }
            ?>">
                <label class="col-sm-2 control-label">Sähköposti:</label>
                <div class="col-sm-4">
                    <input name="email" class="form-control" value="<?php
                 if (isset($data->email)) {
                     echo $data->email;
                 }
            ?>" type="email" required>
                </div>
            </div>
            <div class="form-group 
            <?php
            if (isset($data->salvirhe)) {
                echo "has-error";
            }
            ?>">
                <label class="col-sm-2 control-label">Salasana:</label>
                <div class="col-sm-3">
                    <input  name="password" class="form-control" value="" type="password" required>
                    <?php
                    if (isset($data->salvirhe)) {
                        echo '<span class="help-block">' . $data->salvirhe . '</span>';
                    }
                    ?>
                </div>
            </div>
            <div class="form-group  
            <?php
            if (isset($data->sal2virhe)) {
                echo "has-error";
            }
            ?>">
                <label class="col-sm-2 control-label">Salasana uudestaan:</label>
                <div class="col-sm-3">
                    <input  name="passwordAG" class="form-control" value="" type="password" required>
                    <?php
                    if (isset($data->sal2virhe)) {
                        echo '<span class="help-block">' . $data->sal2virhe . '</span>';
                    }
                    ?>
                </div>
            </div>

            <div class="form-group">              
                <div class="col-sm-offset-2 col-sm-3">
                    <button type="submit" class="btn btn-default">Rekisteröidy</button>
                </div>
            </div>


        </form>
    </div>
</div>
