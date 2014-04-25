<form action ="#" method="POST">
<button class='btn btn-danger btn-xs' type="submit" name="remove_levels" value="delete"><span class="fa fa-times"></span> delete</button>
</form>



<div class="modal fade" id="confirm" role="dialog" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Poista lopullisesti</h4>
      </div>
      <div class="modal-body">
        <p>Haluatko varmasti poistaa lopullisesti?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Peruuta</button>
        <button type="button" class="btn btn-danger" id="delete">Poista</button>
      </div>
    </div>
  </div>
</div>


        <script>
            $('button[name="remove_levels"]').on('click', function(e){
                var $form=$(this).closest('form');
                e.preventDefault();
                $('#confirm').modal({ backdrop: 'static', keyboard: false })
                .one('click', '#delete', function (e) {
                    $form.trigger('submit');
                });
            });
        </script>



