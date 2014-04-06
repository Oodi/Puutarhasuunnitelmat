<!DOCTYPE html>
<html>
    <head>
        <title>Puutarhasuunnitelmat</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link href="css/bootstrap.css" rel="stylesheet">
        <link href="css/bootstrap-theme.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
    </head>
    <body>
        <div class="container">
            <?php
            require 'views/nav.php';
            ?>
            <?php if (!empty($data->virhe)): ?>
                <div class="alert alert-danger  alert-error">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <strong>Virhe!</strong> <?php echo $data->virhe; ?>
                </div>
            <?php endif; ?>
            <?php if (!empty($_SESSION['ilmoitus'])): ?>
                <div class="alert alert-danger alert-error">
                    <a href="#" class="close" data-dismiss="alert">&times;</a>
                    <?php echo $_SESSION['ilmoitus']; ?>
                </div>
                <?php
                // Samalla kun viesti näytetään, se poistetaan istunnosta,
                // ettei se näkyisi myöhemmin jollain toisella sivulla uudestaan.
                unset($_SESSION['ilmoitus']);
            endif;
            ?>
            <?php
            require 'views/' . $sivu . '.php';
            ?>

        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script>
            $(document).ready(function(){
                $("#top").tooltip({
                    placement : 'top'   
                });
               
            });
        </script>
        

    </body>
</html>