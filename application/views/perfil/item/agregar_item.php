<div class="row">

<h3 class="text-center">Nivel Ítem</h3>
<hr>
<div class="col-lg-offset-3 col-xs-6 col-sm-6 col-md-6 col-lg-6 ">
<div class="well">
<h4>Agregar Ítem</h4>
<form action="" method="post" accept-charset="utf-8">
<!--<div class="form-group">
<label for="">Seleccione Programa</label>
<?php echo form_error('programa',"<small class='text-danger'>","</small>"); ?>
<select name="programa" id="programa" class="form-control input-sm">
<option value="">Seleccione un elemento</option>
<?php 	foreach ($programa as $key) {
echo '<option value="'.$key->idProg.'">'.$key->nombreProg.'</option>';
}
?>
</select>
</div>-->
<!--
<div class="form-group">
<label>Seleccione Programa</label>
<select name="" class="form-control input-sm" id="">
<option value="">Promoción de la Asociatividad y la Ciudadanía Juvenil</option>
</select>
</div>
<div class="form-group">
<label for="">Seleccione Actividad</label>
<?php echo form_error('actividad',"<small class='text-danger'>","</small>"); ?>
<select name="actividad" id="actividad" class="form-control input-sm">
<option value="">Seleccione un elemento</option>
<?php 	foreach ($componente as $key) { ?>
<option value="<?php echo $key->idComp; ?>" <?php echo set_select('componente', $key->idComp); ?>>[<?php echo $key->nombreComp;?>] <?php echo $key->nombreAct; ?></option>
<?php
}
?>

?>
</select>
</div>-->




<div class="form-group">
<label for="">Nombre del Ítem</label>
<?php echo form_error('nombre',"<small class='text-danger'>","</small>"); ?>

<input type="text" name="nombre" id="nombre" class="form-control input-sm" value="">
</div>

<div class="form-group text-right">
<input type="hidden" name="aceptar" id="inputAceptar" class="form-control" value="">
<button type="submit" class="btn btn-danger btn-sm">Agregar</button>
</div>

</form>
</div>
</div>
</div>

