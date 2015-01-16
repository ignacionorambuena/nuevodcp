<div class="row">
<script type="text/javascript">
var j = jQuery.noConflict();
j(document).ready(function() {
j("#actividad").change(function() {
j("#actividad option:selected").each(function() {
actividad = j('#actividad').val();
j.post("http://intranet.injuv.gob.cl/nuevodcp/perfil/llena_cuenta", {
actividad : actividad
}, function(data) {
j("#item").html(data);
});
});
})
});
</script>


<h3  class="text-center">Nivel Cuenta Presupuestaria</h3>
<hr>
<div class="col-lg-offset-2 col-xs-8 col-sm-8 col-md-8 col-lg-8 ">
<div class="well">
<h4>Agregar Cuenta</h4>
<form action="<?php echo base_url('perfil/agregar_cuenta');?>" method="post">


<div class="form-group">
<label for="">Item</label><?php echo form_error('item',"<small class='text-danger'>","</small>"); ?>
<select name="item" id="item" class="form-control input-sm">
<option value="">Selecciona un item</option>
<?php   foreach ($item as $key) {
echo '<option value="'.$key->idItem.'">'.$key->nombreItem.'</option>';
}
?>
</select>
</div>

<div class="form-group">
<label for="">Nombre Cuenta Presupuestaria</label> <?php echo form_error('nombreCuenta',"<small class='text-danger'>","</small>"); ?>
<input type="text" name="nombreCuenta" id="input" class="form-control input-sm" value="<?php echo set_value('nombreCuenta');?>">
</div>

<div class="form-group text-right">
<input type="hidden" name="aceptar" id="inputAceptar" class="form-control" value="">
<button type="submit" class="btn btn-danger btn-sm">Agregar</button>
</div>

</form>
</div>
</div>
</div>

