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
                <div class="alert alert-success">
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
            require 'views/' . $sivu . '.php' . $ots;
            ?>

        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/holder.js"></script>
        <script type="text/javascript">
            $(function() {
                $('button').tooltip({placement: 'top'});
            });
        </script>
<!-- Dialog show event handler -->
<script type="text/javascript">
  $('#confirmDelete').on('show.bs.modal', function (e) {
      $message = $(e.relatedTarget).attr('data-message');
      $(this).find('.modal-body p').text($message);
      $title = $(e.relatedTarget).attr('data-title');
      $(this).find('.modal-title').text($title);

      // Pass form reference to modal for submission on yes/ok
      var form = $(e.relatedTarget).closest('form');
      $(this).find('.modal-footer #confirm').data('form', form);
  });

  <!-- Form confirm (yes/ok) handler, submits form -->
  $('#confirmDelete').find('.modal-footer #confirm').on('click', function(){
      $(this).data('form').submit();
  });
</script>



    </body>
</html>