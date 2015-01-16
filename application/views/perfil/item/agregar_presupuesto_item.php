<script type="text/javascript">
var j= jQuery.noConflict();
j(document).ready(function() {
j("#componente").change(function() {
j("#componente option:selected").each(function() {
componente = j('#componente').val();
j.post("http://intranet.injuv.gob.cl/nuevodcp/perfil/llena_item", {
componente : componente
}, function(data) {
j("#item").html(data);
});
});
})
});
</script>
</head>
<div class="row">
<h3 class="text-center">Nivel Ítem</h3>
<hr>
<div class="col-lg-offset-3 col-xs-6 col-sm-6 col-md-6 col-lg-6 ">
<div class="well">
<h4>Agregar Presupuesto Ítem</h4>
<form action="" method="post" accept-charset="utf-8">

<div class="form-group">

<label for="">Componente</label>
<?php echo form_error('componente',"<small class='text-danger'>","</small>"); ?>

<select name="componente" id="componente" class="form-control input-sm"  value="<?php echo set_value('componente') ?>">
<option value="">Seleccione un Componente</option>
option
<?php
foreach($componente as $fila)
{
?>
<option value="<?=$fila -> idComp ?>"><?=$fila -> nombreComp ?></option>
<?php
}
?>
</select>
</div>


<div class="form-group">
<label for="">Selecciones Item</label>
<?php echo form_error('item',"<small class='text-danger'>","</small>"); ?>
<select name="item" id="item" class="form-control input-sm"  value="<?php echo set_value('item') ?>" >
<option value="">Item</option>
</select>
</div>

<div class="form-group">
<label for="">Año</label>
<?php echo form_error('ano',"<small class='text-danger'>","</small>"); ?>
<select name="ano" id="ano" class="form-control input-sm">
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
<label for="">Monto <small>(Ingrese monto sin el simbolo "$" y puntos)</small></label>
<?php echo form_error('monto',"<small class='text-danger'>","</small>"); ?>
<input type="text" name="monto" onkeypress="return soloNumero(event)" id="input" class="form-control input-sm" value="">
</div>



<div class="form-group text-right">
<input type="hidden" name="aceptar" id="inputAceptar" class="form-control" value="">
<button type="submit" class="btn btn-danger btn-sm">Agregar</button>
</div>

</div>
</div>
</form>
</div>
</div>
</div>
