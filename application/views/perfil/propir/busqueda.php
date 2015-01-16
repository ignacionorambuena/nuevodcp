<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<div class="well">
<table class="table table-bordered">
<thead>
<th width="10%">Componente</th>
<th width="30%">Actividad</th>
<th width="30%">Cuenta Presupuestaria</th>
<th width="10%">Región</th>
<th width="10%">Monto</th>
<th width="10%">Editar</th>

</thead>
<tbody>
<?php


foreach ($filtro as $key) {
?>
<tr>
<td><?php echo $key->nombreComp; ?></td>
<td><?php echo $key->nombreAct; ?></td>
<td><?php echo $key->nombreCuenta; ?></td>
<td><?php echo $key->romanoReg; ?></td>
<td><?php echo $key->montoPropir; ?></td>
<td>
<div class="form-group text-right col-xs-12 col-sm-12 col-md-12 col-lg-12">
<a href="<?php echo site_url() ?>perfil/detallePropir/<?php echo $key->idPropir ?>" class="btn btn-primary btn-xs" class="fa fa-search">Editar</a>
<input type="hidden" name="" value="<?=$key->idPropir; ?>">
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
