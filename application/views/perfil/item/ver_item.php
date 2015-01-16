<div class="row">
<h3 class="text-center">Nivel Item</h3>
<hr>
<div class="col-lg-offset-3 col-xs-6 col-sm-6 col-md-6 col-lg-6 ">
<div class="well row">
<form action="<?php echo base_url('perfil/item');?>" method="post">
<legend>Búsqueda</legend>
<div class="form-group ">
<label for="">Item</label>
<select name="item" id="" class="form-control input-sm" required title="Por favor debe seleccionar un programa">
<option value="">Seleccione un elemento</option>
<option value="99">Ver Todos</option>
<?php 	foreach ($item as $key) {

echo '<option value="'.$key->idItem.'">'.$key->nombreItem.'</option>';

}
?>
</select>
</div>



<div class="form-group text-right col-xs-12 col-sm-12 col-md-12 col-lg-12">
<input type="hidden" name="aceptar" id="inputAceptar" class="form-control" value="">
<button type="submit" class="btn btn-danger btn-xs">Buscar <i class="fa fa-search"></i></button>
</div>
</form>
</div>
</div>
</div>
