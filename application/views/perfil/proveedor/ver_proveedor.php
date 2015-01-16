<!-- <div class="row">
<h3 class="text-center">Proveedor</h3>
<hr>
<div class="col-lg-offset-3 col-xs-6 col-sm-6 col-md-6 col-lg-6 ">
<div class="well row">
<form action="<?php echo base_url('perfil/proveedor');?>" method="post">
<legend>Búsqueda</legend>
<div class="form-group">
<label for="">Proveedor</label>
<select name="nombreProv" id="" class="form-control input-sm" required title="Por favor debe seleccionar un programa">
<option value="">Seleccione un elemento</option>
<option value="99">Ver Todos</option>
<?php 	foreach ($proveedor as $key) {

echo '<option value="'.$key->idProv.'">'.$key->nombreProv.'</option>';

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
</div> -->

<script src="<?php echo base_url('js/jquery-1.11.1.min.js');?>"></script>
<script src="<?php echo base_url('js/jquery.dataTables.min.js');?>"></script>
<link rel="stylesheet" href="<?php echo base_url('css/jquery.dataTables.css');?>">
<script>
var dt= jQuery.noConflict();
dt(document).ready( function() {
dt('#example').dataTable( {
"fnInitComplete": function(oSettings, json) {
dt("#overlay").hide();
}
} );
} );
</script>
<style>
#overlay {
    text-align: center;
    top:0;left:0;right:0;bottom:0;
    background: rgba(255,255,255,0.9);
    position: fixed;
    padding-top:15%;
    overflow: hidden;
    z-index: 9999999;
}
</style>
<div class="row">
<h3 class="text-center">Ver Proveedor</h3>
<hr>
<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
<div class="well">
<div id="overlay"><i class="fa fa-circle-o-notch fa-5x fa-spin"></i><br><h1>CARGANDO</h1><h4>Debido a nuestra amplia base de proveedores esto puede tardar unos instantes, por favor espera un momento.</h4></div>
<table class="display" id="example" cellspacing="0" width="100%">
<thead>
<tr>
<th>Rut</th>
<th>Nombre</th>
<th>Banco</th>
<th>Cuenta</th>
<th>Numero Cuenta</th>
<th>Editar</th>
<th>Eliminar</th>

</tr>
</thead>
<tbody>

<?php foreach ($proveedor as $prov) { ?>
<tr>
<td width="15%"><?php echo $prov->rutProv;  ?> </td>
<td width="40%"><?php echo ucwords(strtolower($prov->nombreProv)); ?> </td>
<td width="15%"><?php echo $prov->bancoProv;  ?></td>
<td width="15%"><?php echo $prov->tipodecuentaProv;  ?></td>
<td width="15%"><?php echo $prov->numerocuentaProv;  ?></td>
<td align="center">
<form action="<?php echo base_url('perfil/editarproveedor');?>" method="post">
<input type="hidden" name="idProv" class="form-control" value="<?php echo $prov->rutProv; ?>">
<button type="submit" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></button>
</form>
</td>
<td align="center">
<form action="<?php echo base_url('perfil/eliminarproveedor');?>" method="post">
<input type="hidden" name="idProv" class="form-control" value="<?php echo $prov->rutProv; ?>">
<button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
</form>
</td>
</tr>
<?php } ?>
</tbody>
</table>

</div>
</div>
</div>
