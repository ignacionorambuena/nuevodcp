<div class="row">
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<h3 id="title"><b>Nivel Región</b></h3>
</div>
<div class="col-lg-offset-3 col-xs-6 col-sm-6 col-md-6 col-lg-6 ">
<div class="well">
<h4>Agregar Presupuesto Región</h4>
<form action="" method="get" accept-charset="utf-8">
<div class="form-group">
<label for="">Seleccione Programa</label>
<select name="" class="form-control input-sm">
<option>Promoción de la Asociatividad y la Ciudadanía Juvenil</option>
<option>Programa de Empoderamiento e Inclusión de jóvenes</option>
<option>Programa Servicio Joven</option>
</select>
</div>

<div class="form-group">
<label for="">Seleccione Ítem</label>
<select name="" class="form-control input-sm">
<option>Gastos en Personal</option>
<option>Bienes y SS de consumo</option>
<option>Transferencias. (Incluido 7% PNUD)</option>
<option>Activos no financieros</option>
</select>
</div>

<div class="form-group">
<label for="">Año</label>
<select name="" class="form-control input-sm">
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
<label for="">Total por Región <small>(Ingrese monto sin el simbolo "$" y puntos)</small></label>
<input type="text" name="" id="input" class="form-control input-sm" value="">
</div>

<div class="form-group text-right">
<button type="submit" class="btn btn-danger btn-sm">Agregar</button>
</div>

</form>
</div>
</div>
</div>
