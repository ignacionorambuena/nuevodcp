<script src="<?php echo base_url('js/jquery-1.11.1.min.js');?>"></script>
<script src="<?php echo base_url('js/jquery.dataTables.min.js');?>"></script>
<link rel="stylesheet" href="<?php echo base_url('css/jquery.dataTables.css');?>">
<script>
var dt= jQuery.noConflict();
dt(document).ready(function() {
    dt('#example').DataTable({
    	"scrollX":true
    });
} );
</script>
<div class="row">
<h3 class="text-center">Ver Gasto</h3>
<hr>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

<div class="well">
<table class="display" id="example" cellspacing="0" width="100%" style="font-size:12px">
<thead>
<tr>
<th>Firma</th>
<th>Memorándum</th>
<th>Código</th>
<th>Región</th>
<th>Programa</th>
<th>Componente</th>
<th>Actividad</th>
<th>Item</th>
<th>Cuenta</th>
<th>Cod. Taller</th>
<th>Nombre Actividad</th>
<th>Producto</th>
<th>Monto</th>
<th>Mes de Ejecución</th>
<th>Mes Contable</th>
<th>Fecha Actividad</th>
<th>Gasto</th>
<th>Estado</th>
<th>Observación</th>
<th>Adjuntos</th>
</tr>
</thead>
<tbody>
<?php 	foreach($gastos as $gas){ ?>
<tr>
<td align="center">
<?php
if($gas->adj_memo_uno=="" and $gas->adjunto==""){
if($gas->tipogasto==2){
?>
<a href="<?php echo base_url('perfil/adjuntar_boleta/'.$gas->codGasto); ?>"><i class="fa fa-upload fa-2x"></i> </a>
<?php
}
if($gas->tipogasto==3){
?>
<a href="<?php echo base_url('perfil/adjuntar_boleta/'.$gas->codGasto); ?>"><i class="fa fa-upload fa-2x"></i> </a>
<?php
}
else if($gas->tipogasto==4){
?>
<a href="<?php echo base_url('perfil/adjuntar_boleta/'.$gas->codGasto); ?>"><i class="fa fa-upload fa-2x"></i> </a>
<?php
}
else if($gas->tipogasto==5){
?>
<a href="<?php echo base_url('perfil/adjuntar_oc_nc/'.$gas->codGasto); ?>"><i class="fa fa-upload fa-2x"></i> </a>
<?php
}
else if($gas->tipogasto==1)
{
?>
<a href="<?php echo base_url('perfil/adjuntar/'.$gas->codGasto); ?>"><i class="fa fa-upload fa-2x"></i> </a>
<?php
}//Fin Else tipo gasto
}else{
?>
<i class="fa fa-check fa-3x"></i>
<?php
}
?>
</td>
<td>
<?php
if ($gas->tipogasto==2) {
echo "<i class='fa fa-ban fa-3x'></i>";
}
else if ($gas->tipogasto==3) {
echo "<i class='fa fa-ban fa-3x'></i>";
}
else if ($gas->tipogasto==4) {
echo "<i class='fa fa-ban fa-3x'></i>";
}
else if ($gas->tipogasto==5) {
?>
<a href="<?php echo base_url('perfil/memo_etapa_dos/'.$gas->codGasto); ?>">Generar Memo</a>
<?php
}else{
?>
<a href="<?php echo base_url('perfil/generar_memo/'.$gas->codGasto); ?>">Generar Memo</a>
<?php } ?>
</td>
<td><?php echo $gas->codGasto; ?> </td>
<td><?php echo $gas->nombreReg; ?> </td>
<td><?php echo $gas->nombreProg; ?> </td>
<td><?php echo $gas->nombreComp; ?> </td>
<td><?php echo $gas->nombreAct; ?> </td>
<td><?php echo $gas->nombreItem; ?> </td>
<td><?php echo $gas->nombreCuenta; ?> </td>
<td><?php echo $gas->codTaller; ?> </td>
<td><?php echo $gas->nombreActGastos; ?> </td>
<td><?php echo $gas->productoAct; ?> </td>
<td><?php echo $gas->monto; ?> </td>
<td><?php echo $gas->mesejecucion; ?> </td>
<td><?php echo $gas->mescontable; ?> </td>
<td><?php echo $gas->fechainicio; ?> </td>
<td><?php echo $gas->tipogasto; ?> </td>
<td><?php echo $gas->estado; ?> </td>
<td><?php echo $gas->observaciones; ?> </td>
<td>
<?php
if($gas->adj_memo_uno!="" and $gas->adjunto!=""){
?>
<a class="btn btn-danger btn-sm"data-toggle="modal" href='#modal-<?php echo $gas->codGasto; ?>'><b><i class="fa fa-file-pdf-o"></i></b></a>
<?php
}else{
?>
<i class="fa fa-ban fa-3x"></i>
<?php
}
?>
</td>

<div class="modal fade" id="modal-<?php echo $gas->codGasto; ?>">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				<h4 class="modal-title">Archivos Aduntos</h4>
			</div>
			<div class="modal-body">

			<iframe src="<?php echo base_url('perfil/archivos_adjuntos_celda/'.$gas->codGasto); ?>" frameborder="0" width="100%" height="380"></iframe>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

</tr>
<?php 	} ?>
</tbody>
</table>
</div>
</div>
</div>
