<form class="form-horizontal" method="GET">
    <div class="form-group">
    <button class="btn btn-success btn-sm" type="submit">Hae</button>
    <div class="col-sm-3">
    <input class="form-control" type="text" name="nimi" placeholder="Kasvin nimi">
    </div>
    </div>
</form>

<table class="table table-condensed">
    <thead>
        <tr>
            <th>Kasvit</th>
        </tr>
    </thead>
</table>
<ul class="pager">
    <li class="previous"><a href="plantlist.php?sivu=<?php echo $data->nSivu - 1 ?>">Edellinen</a></li>
    <li class="next"><a href="plantlist.php?sivu=<?php echo $data->nSivu + 1 ?>">Seuraava</a></li>
</ul>

<?php
if (isset($data->kasvit)) {
    foreach ($data->kasvit as $kasvi) {
        include 'plantRow.php';
    }
}
?>



<ul class="pager">
    <li class="previous"><a href="plantlist.php?sivu=<?php echo $data->nSivu - 1 ?>">Edellinen</a></li>
    <li class="next"><a href="plantlist.php?sivu=<?php echo $data->nSivu + 1 ?>">Seuraava</a></li>
</ul>
