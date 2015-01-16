<div class="row">

<h3 class="text-center">Nivel Componente</h3>
<hr>
<div class="col-lg-offset-3 col-xs-6 col-sm-6 col-md-6 col-lg-6">
<div class="well">
<form action="" method="post">
<legend>Agregar Componente</legend>
<div class="form-group">
<label for="">Seleccione Programa (*)</label>
<?php echo form_error('programa',"<small class='text-danger'>","</small>"); ?>
<select name="programa" id="programa" class="form-control input-sm">
<option value="">Seleccione un elemento</option>
<?php 	foreach ($programa as $key) {
echo '<option value="'.$key->idProg.'">'.$key->nombreProg.'</option>';
}
?>
</select>
</div>

<div class="form-group">
<label for="">Nombre de Componente (*)</label>
<?php echo form_error('componente',"<small class='text-danger'>","</small>"); ?>

<input type="text" name="componente" id="componente" class="form-control input-sm" value="">
</div>


<div class="form-group text-right">
<input type="hidden" name="aceptar" id="inputAceptar" class="form-control" value="">
<button type="submit" class="btn btn-danger btn-sm">Agregar</button>
</div>

</form>
</div>
</div>
</div>
