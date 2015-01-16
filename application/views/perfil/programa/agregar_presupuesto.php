<div class="row">
<h3 class="text-center">Nivel Programa</h3>
<hr>
<div class="col-lg-offset-3 col-xs-6 col-sm-6 col-md-6 col-lg-6 ">
<div class="well">
<h4>Agregar Presupuesto</h4>
<form action="" method="post" accept-charset="utf-8">
<div class="form-group">
<label for="">Seleccione Programa</label>
<?php echo form_error('programa',"<small class='text-danger'>","</small>"); ?>
<select name="programa" id="" class="form-control input-sm">
<option value="">Seleccione un elemento</option>
<?php 	foreach ($programa as $key) {?>
<option value="<?php echo $key->idProg;?>"  <?php echo set_select('programa', $key->idProg); ?>><?php echo $key->nombreProg;?></option>
<?php
}
?>
</select>
</div>

<div class="form-group">
<label for="">Año</label>
<?php echo form_error('ano',"<small class='text-danger'>","</small>"); ?>
<select name="ano" class="form-control input-sm">
<option value="" selected>Seleccione un elemento</option>
<?php
for($x=20;$x>=13;$x--){
?>
<option value="<?php echo "20".$x; ?>"  <?php echo set_select('ano', '20'.$x); ?>><?php echo "20".$x; ?></option>
<?php
}
?>
</select>
</div>

<div class="form-group">
<label for="">Monto <small>(Ingrese monto sin el simbolo "$" y puntos)</small></label>
<?php echo form_error('monto',"<small class='text-danger'>","</small>"); ?>
<input type="text" name="monto" id="input" class="form-control input-sm" value="<?php echo set_value('monto'); ?>">
<input type="hidden" name="aceptar" id="inputAceptar" class="form-control" >
</div>

<div class="form-group text-right">
<button type="submit" class="btn btn-danger btn-sm">Agregar</button>
</div>

</form>
</div>
</div>
</div>
