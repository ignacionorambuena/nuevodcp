<div class="row">
<h3 class="text-center">Nivel Actividad</h3>
<hr>
<div class="col-lg-offset-3 col-xs-6 col-sm-6 col-md-6 col-lg-6 ">
<div class="well">
<h4>Agregar Actividad</h4>
<form action="" method="post" accept-charset="utf-8">

<!--<div class="form-group">
<label for="">Seleccione Componente</label>
<?php echo form_error('componente',"<small class='text-danger'>","</small>"); ?>
<select name="componente" id="componente" class="form-control input-sm">
<option value="">Seleccione un elemento</option>
<?php 	foreach ($componente as $key) {
echo '<option value="'.$key->idComp.'">'.$key->nombreComp.'</option>';
}
?>
</select>
</div>-->
<div class="form-group">
<label for="">Seleccione Componente</label> <abbr title="[PROGRAMA] COMPONENTE"><small>ayuda</small></abbr>
<?php echo form_error('componente',"<small class='text-danger'>","</small>"); ?>
<select name="componente" id="componente" class="form-control input-sm">
<option value="">Seleccione un elemento</option>
<?php 	foreach ($componente as $key) { ?>
<option value="<?php echo $key->idComp; ?>" <?php echo set_select('componente', $key->idComp); ?>>[<?php echo $key->nombreProg; ?>] <?php echo $key->nombreComp;?></option>
<?php
}
?>
</select>
</div>

<div class="form-group">
<label for="">Nombre del Actividad (Rótulo)</label>
<?php echo form_error('nombreAct',"<small class='text-danger'>","</small>"); ?>

<input type="text" name="nombreAct" id="nombreAct" class="form-control input-sm" value="">
</div>

<div class="form-group text-right">
<input type="hidden" name="aceptar" id="inputAceptar" class="form-control" value="">
<button type="submit" class="btn btn-danger btn-sm">Agregar</button>
</div>

</form>
</div>
</div>
</div>

