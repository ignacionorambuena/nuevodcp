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
<h3 class="text-center">Panel Revisados Pago Facturas</h3>
<hr>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<div class="well">
<table class="display" id="example" cellspacing="0" width="100%" style="font-size:12px">
<thead>
<tr>
<!-- <th>Firma</th>
<th>Memorándum</th> -->
<th>ESTADO</th>
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
<th>Observación</th>
<th>Adjuntos</th>
</tr>
</thead>
<tbody>
<?php 	foreach($gasto_devengado as $gas){ ?>
<tr>

<!-- <td align="center"><a href="<?php echo base_url('perfil/subir_mseis_firma/'.$gas->codGasto); ?> "><b><i class="fa fa-upload fa-2x"></i></b></a></td> -->
<!-- <td><a href="<?php echo base_url('perfil/memo_etapa_cinco/'.$gas->codGasto); ?> ">Generar Memo</a></td> -->
<td><b style="color:red;"><?php echo $gas->estado; ?></b></td>
<td><?php echo $gas->codGasto; ?> </td>
<td><?php echo $gas->nombreReg; ?> </td>
<td><?php echo $gas->nombreProg; ?> </td>
<td><?php echo $gas->nombreComp; ?> </td>
<td><?php echo $gas->nombreAct; ?> </td>
<td><?php echo $gas->nombreItem; ?> </td>
<td><?php echo $gas->nombreCuenta; ?> </td>
<td><?php echo $gas->codTaller; ?> </td>
<td><?php echo $gas->nombreActGastos; ?> </td>
<td><?php echo substr($gas->productoAct,0,50); ?> </td>
<td><?php echo $gas->monto; ?> </td>
<td><?php echo $gas->mesejecucion; ?> </td>
<td><?php echo $gas->mescontable; ?> </td>
<td><?php echo $gas->fechainicio; ?> </td>
<td><?php echo $gas->tipogasto; ?> </td>
<td><?php echo $gas->observaciones; ?> </td>
<td>

<a class="btn btn-danger btn-sm"data-toggle="modal" href='#modal-<?php echo $gas->codGasto; ?>'><b><i class="fa fa-file-pdf-o"></i></b></a>

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
