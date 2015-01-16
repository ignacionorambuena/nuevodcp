<script type="text/javascript">
var j= jQuery.noConflict();
j(document).ready(function() {
j("#componente").change(function() {
j("#componente option:selected").each(function() {
componente = j('#componente').val();
j.post("http://intranet.injuv.gob.cl/nuevodcp/perfil/llena_actividad", {
componente : componente
}, function(data) {
j("#actividad").html(data);
});
});
})
});
</script>
<div class="row">
<h3 class="text-center">Nivel Actividad</h3>
<hr>
<div class="col-lg-offset-3 col-xs-6 col-sm-6 col-md-6 col-lg-6 ">
<div class="well">
<h4>Agregar Presupuesto Actividad</h4>
<form action="" method="post" accept-charset="utf-8">

<div class="form-group">
<label for="">Componente</label>
<?php echo form_error('componente',"<small class='text-danger'>","</small>"); ?>
<select name="componente" id="componente" class="form-control input-sm">
<option value="">Seleccione un elemento</option>
<?php 	foreach ($componente as $key) { ?>
<option value="<?php echo $key->idComp; ?>">[<?php echo $key->nombreProg; ?>] <?php echo $key->nombreComp;?></option>
<?php
}
?>
</select>
</div>



<div class="form-group">
<label>Actividad</label>
<?php echo form_error('actividad',"<small class='text-danger'>","</small>"); ?>
<select name="actividad" id="actividad" class="form-control input-sm"  value="<?php echo set_value('actividad') ?>" >
<option value="">Actividad</option>
</select>
</div>


<div class="form-group">
<label for="">Año</label>
<select name="ano" class="form-control input-sm">
<?php
for($x=15;$x>=13;$x--){
?>
<option><?php echo "20".$x; ?></option>
<?php
}
?>
</select>
</div>

<div class="form-group">
<label for="">Afecto a 7% PNUD</label>
<?php echo form_error('afecto',"<small class='text-danger'>","</small>"); ?>
<div class="row">
<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
<div class="radio">
<label>
<input type="radio" name="afecto" id="afecto" value="1">
SI
</label>
</div>
</div>
<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-offset-lg-6">
<div class="radio">
<label>
<input type="radio" name="afecto" id="input" value="0">
NO
</label>
</div>
</div>


</div>
</div>

<div class="form-group">
<label for="">Monto <small>(Ingrese monto sin el simbolo "$" y puntos)</small></label>
<?php echo form_error('monto',"<small class='text-danger'>","</small>"); ?>

<input type="text" name="monto" id="monto" onkeypress="return soloNumero(event)" class="form-control input-sm" value="">
</div>

<div class="form-group text-right">
<input type="hidden" name="aceptar" id="inputAceptar" class="form-control" value="">
<button type="submit" class="btn btn-danger btn-sm">Agregar</button>
</div>

</form>
</div>
</div>
</div>
