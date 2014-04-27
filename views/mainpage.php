            <div class="jumbotron">
                <h1>Puutarhasuunnitelmat helposti</h1>
                <p class="lead">Valitse vain haluamasi sijainti ja tyyli.</p>
                <p><a class="btn btn-lg btn-success" href="searchPlan.php" role="button">Hae mieleistäsi suunnitelmaa</a></p>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <h2>Suunnitelmat</h2>
                    <p> Voit myös selailla suunnitelmia vapaasti. </p>
                    <p><a class="btn btn-default" href="planList.php" role="button">Selaile suunnitelmia &raquo;</a></p>
                </div>
                <div class="col-md-6">
                    <h2>Kasvit</h2>
                    <p>Puutarhakasvien määrä laajenee kokojan. Voit etsiä kasveja mielesi mukaan. </p>
                    <p><a class="btn btn-default" href="plantlist.php" role="button">Etsi kasvia &raquo;</a></p>
                </div>

            </div>

            <hr>
            <?php if(visitorOnly()) {?>
            <div class="panel panel-info">
                <div class="panel-heading">
                    <h3 class="panel-title">Rekisteröidy käyttäjäksi</h3>
                </div>
                <div class="panel-body">
                    <div class="col-md-6">
                        <a class="btn btn-default" href="register.php" role="button">Rekisteröidy käyttäjäksi &raquo;</a>
                    </div>
                    <div class="col-md-6">
                        
                    </div>
                </div>
            </div>
            <?php }?>