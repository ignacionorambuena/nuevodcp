
<div class="row">
<h3  class="text-center">Nivel Cuenta Presupuestaria</h3>
<hr>
<div class="col-lg-offset-3 col-xs-6 col-sm-6 col-md-6 col-lg-6 ">
<div class="well">
<h4>Agregar Presupuesto Cuenta</h4>
<form action="<?php echo base_url('perfil/agregar_presupuesto_cuenta'); ?>" method="post" accept-charset="utf-8">

<div class="form-group">
<label for="">Cuenta Presupuestaria</label>
<?php echo form_error('cuenta',"<small class='text-danger'>","</small>"); ?>
<select name="cuenta" id="cuenta" class="form-control input-sm"  value="" >
<option value="">Seleccione Cuenta Presupuestaria</option>
<?php   foreach ($cuenta as $key) {
echo '<option value="'.$key->idCuenta.'">'.$key->nombreCuenta.'</option>';
}
?>
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
<label for="">Total por Cuenta <small>(Ingrese monto sin el simbolo "$" y puntos)</small></label>
<?php echo form_error('monto',"<small class='text-danger'>","</small>"); ?>
<input type="text" name="monto" onkeypress="return soloNumero(event)" id="input" class="form-control input-sm" value="">
</div>

<div class="form-group text-right">
<input type="hidden" name="aceptar" id="inputAceptar" class="form-control" value="1">
<button type="submit" class="btn btn-danger btn-sm">Agregar</button>
</div>

</form>
</div>
</div>
</div>
