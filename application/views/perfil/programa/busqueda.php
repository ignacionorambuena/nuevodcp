<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<div class="well">
<table class="table table-bordered">
<thead>
<th width="60%">Programa</th>
<th width="10%">Presupuesto</th>
<th width="10%">Año</th>
<th width="10%">Editar</th>
</thead>
<tbody>
<?php


foreach ($filtro as $key) {
?>
<tr>
<td width="60%"><?php echo $key->nombreProg; ?></td>
<td width="10%"><?php $num=$key->montoPP; echo "$ ".number_format($num); ?></td>
<td width="10%"><?php echo $key->anoPP; ?></td>
<td>
<div class="form-group text-right col-xs-12 col-sm-12 col-md-12 col-lg-12">
<a href="<?php echo site_url() ?>perfil/detalleProgramaPre/<?php echo $key->idPP ?>" class="btn btn-primary btn-xs" class="fa fa-search">Editar</a>
<input type="hidden" name="" value="<?=$key->idPP; ?>">
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
