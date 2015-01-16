<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<div class="well">
<table class="table table-bordered">
<thead>
<th width="80%">Item</th>
<th width="20%">Editar</th>

</thead>
<tbody>
<?php


foreach ($filtro as $key) {
?>
<tr>
<td><?php echo $key->nombreItem; ?></td>
<!--<td><?php echo $key->nombreCom; ?></td>-->
<td>
<div class="form-group text-right col-xs-12 col-sm-12 col-md-12 col-lg-12">
<a href="<?php echo site_url() ?>perfil/detalleItem/<?php echo $key->idItem ?>" class="btn btn-primary btn-xs" class="fa fa-search">Editar</a>
<input type="hidden" name="" value="<?=$key->idItem; ?>">
</div>
</td>
</tr>
<?php
}


?>
</tbody>
</table>
</div>
</div>
</div>
