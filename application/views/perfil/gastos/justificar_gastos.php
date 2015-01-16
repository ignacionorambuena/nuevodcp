<h3 class="text-center">Justificar Gastos</h3><hr>

<div class="row">
<div class="col-lg-offset-3 col-xs-6 col-sm-6 col-md-6 col-lg-6">
<div class="well">
<form action="<?php echo base_url('perfil/justificar_gastos');?>" method="post">
<legend>Justificar Gastos</legend>
<div class="form-group">
<label for="">Región</label>
<select name="region" id="inputRegion" class="form-control input-sm">
<option value="">Seleccione Región</option>
<?php
foreach ($region as $key) {
?>
<option value="<?php echo $key->idReg;?>"><?php echo $key->nombreReg; ?></option>
<?
}
?>
</select>
</div>

<div class="form-group text-right">
<input type="hidden" name="aceptar" id="inputAceptar" class="form-control" value="">
<button type="submit" class="btn btn-primary btn-xs">Aceptar</button>
</div>
</form>
</div>
</div>
</div>
