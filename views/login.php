<div class="container">

    <form class="form-signin" method="POST">
        <h2 class="form-signin-heading">Kirjaudu sisään</h2>
        <input type="text" class="form-control" name="username" required placeholder="Käyttäjätunnus" 
        <?php
        if (isset($data->kayttaja)) {
            echo "value= \"" . $data->kayttaja . "\"";
        } else {
            echo " autofocus";
        }
        ?>>
        <input type="password" class="form-control" name="password" placeholder="Salasana"
        <?php
        if (isset($data->kayttaja)) {
            echo " autofocus ";
        }
        ?>
               required>                   
        <button class="btn btn-lg btn-primary btn-block" type="submit">Kirjaudu</button>
        <a class="btn btn-sm btn-success" href="register.php" role="button">Uusi käyttäjä?</a>
    </form>
    
</div>