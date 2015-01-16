<div class="row">
<h3 class="text-center">Nivel Actividad</h3>
<hr>
<div class="col-lg-offset-3 col-xs-6 col-sm-6 col-md-6 col-lg-6 ">
<div class="well row">
<form action="<?php echo base_url('perfil/actividad');?>" method="post">
<legend>Búsqueda</legend>
<div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
<label for="">Actividad</label>
<select name="actividad" id="" class="form-control input-sm" required title="Por favor debe seleccionar un programa">
<option value="">Seleccione un elemento</option>
<option value="99">Ver Todos</option>
<?php 	foreach ($actividad as $key) {

echo '<option value="'.$key->idAct.'">'.$key->nombreAct.'</option>';

}
?>
</select>
</div>


<div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6" >
<label for="">Seleccione Año</label>
<select name="ano" id="" class="form-control input-sm" required title="Por favor debe seleccionar un año">
<option value="">Seleccione un año</option>
<?php 	for ($i=20; $i >= 13 ; $i--) {
echo '<option value="20'.$i.'">20'.$i.'</option>';
} ?>
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
