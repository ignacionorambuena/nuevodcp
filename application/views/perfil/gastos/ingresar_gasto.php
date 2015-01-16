<script type="text/javascript">
var j= jQuery.noConflict();
j(document).ready(function() {
j("#componente").change(function() {
j("#componente option:selected").each(function() {
componente = j('#componente').val();
j.post("http://intranet.injuv.gob.cl/nuevodcp/perfil/llena_gastos_region", {
componente : componente
}, function(data) {
j("#Actividad").html(data);
});
});
})
});
</script>
<div class="row">
<h3 class="text-center">Ingresar Gasto</h3>
<hr>
<div class="col-lg-offset-3 col-xs-6 col-sm-6 col-md-6 col-lg-6">
<div class="well">
<form action="" method="post">
<div class="form-group">
<label for="">Región</label><?php echo form_error('region',"<small class='text-danger'>","</small>"); ?>
<select name="region" id="inputRegion" class="form-control input-sm">
<option value="">Seleccione un elemento</option>
<?php
foreach ($region as $key) {
?>
<option value="<?php echo $key->idReg;?>" <? echo set_select('region',$key->idReg);?>><?php echo $key->nombreReg; ?></option>
<?php
}
?>
</select>
</div>

<div class="form-group text-right">
<input type="hidden" name="aceptar" id="inputAceptar" class="form-control" value="">
<button type="submit" class="btn btn-primary btn-xs">Siguiente ></button>
</div>
</form>
</div>
</div>
</div>

<?php
if (isset($regiones)) {?>
<div class="row">
<div class=" col-lg-offset-1 col-xs-10 col-sm-10 col-md-10 col-lg-10">
<div class="well row">
<table class="table table-hover">
<thead>
<tr>
<th>Programa</th>
<th>Componente</th>
<th>Actividad</th>
<th>Cta. Presupuestaria</th>
<th>Opción</th>
</tr>
</thead>
<tbody>
<?php foreach ($regiones as $key) {?>
<tr>
<td><?php echo $key->nombreProg; ?></td>
<td><?php echo $key->nombreComp; ?></td>
<td><?php echo $key->nombreAct; ?></td>
<td><?php echo $key->nombreCuenta; ?></td>
<td>
<div class="radio">
<label>
<input type="radio" name="actividad" id="input" value="<?php echo $key->idAct;?>" >
</label>
</div>
</td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
</div>
<?php
}
?>

