<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<div class="well">
<table class="table table-bordered">
<thead>
<th>Componente</th>
<th width="60%">Actividad</th>
<th width="10%">Presupuesto</th>
<th width="10%">Año</th>
<th width="10%">Editar</th>
</thead>
<tbody>
<?php


foreach ($filtro as $key) {
?>
<tr>
<td><?php echo $key->nombreComp; ?></td>
<td><?php echo $key->nombreAct; ?></td>
<td><?php $num=$key->montoPA; echo "$ ".number_format($num); ?></td>
<td><?php echo $key->anoPA; ?></td>
<td>
<div class="form-group text-right col-xs-12 col-sm-12 col-md-12 col-lg-12">
<a href="<?php echo site_url() ?>perfil/detalleActividadPre/<?php echo $key->idPA ?>" class="btn btn-primary btn-xs" class="fa fa-search">Editar</a>
<input type="hidden" name="" value="<?=$key->idPA; ?>">
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
