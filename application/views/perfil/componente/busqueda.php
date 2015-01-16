<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<div class="well">
<table class="table table-bordered">
<thead>
<th width="50%">Programa</th>
<th width="20%">Componente</th>
<th width="10%">Presupuesto</th>
<th width="10%">Año</th>
<th width="10%">Editar</th>
</thead>
<tbody>
<?php


foreach ($filtro as $key) {
?>
<tr>
<td><?php echo $key->nombreProg; ?></td>
<td><?php echo $key->nombreComp; ?></td>
<td><?php $num=$key->montoPC; echo "$ ".number_format($num); ?></td>
<td><?php echo $key->anoPC; ?></td>
<td>
<div class="form-group text-right col-xs-12 col-sm-12 col-md-12 col-lg-12">
<a href="<?php echo site_url() ?>perfil/detalleComponentePre/<?php echo $key->idPC ?>" class="btn btn-primary btn-xs" class="fa fa-search">Editar</a>
<input type="hidden" name="" value="<?=$key->idPC; ?>">
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
