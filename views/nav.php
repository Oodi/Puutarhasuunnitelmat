

<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href=".">Puutarhasuunnitelmat</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li <?php if ("searchPlan" == $_SESSION["nakyma"]) echo 'class="active"'; ?>><a href="searchPlan.php">Suunnitelmat</a></li>
                <li <?php if ("plantlist" == $_SESSION["nakyma"]) echo 'class="active"'; ?>><a href="plantlist.php">Kasvit</a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <?php if (visitorOnly()): ?>    
                <li <?php if ("login" == $_SESSION["nakyma"]) echo 'class="active"'; ?>><a href="login.php">Kirjaudu sisään</a></li>
                <?php endif; ?>
                <?php if ((tarkastaOikeudet() >= 0)): ?>    
                <li <?php if ("myPlans" == $_SESSION["nakyma"]) echo 'class="active"'; ?>><a href="myPlans.php">Omat suunnitelmat</a></li>
                <li class="dropdown">                  
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Hallinta <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Omat tiedot</a></li>
                        <li class="divider"></li>
                        <?php if (tarkastaOikeudet() >= 1): ?>   
                        <li><a href="suggestedPlans.php">Hyväksy suunnitelmia</a></li>
                        <li><a href="userlist.php">Käyttäjät</a></li>
                        <li><a href="newPlant.php">Lisää kasvi</a></li>                      
                        <li class="divider"></li>
                        <?php endif; ?>
                        <li><a href="logout.php">Kirjaudu ulos</a></li>
                    </ul>
                </li>
                <?php endif; ?>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>
