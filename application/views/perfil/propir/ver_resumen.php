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



<h3 class="text-center">Ver Propir</h3>
<hr>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<div class="well">
<table class="table table-bordered display" id="example">
<thead>
<tr>
<th>Componente</th>
<th>Actividad</th>
<th>7%</th>
<th>Ítem</th>
<th>Cuenta</th>
<th>Región</th>
<th width="200">Monto</th>
</tr>
</thead>
<tbody>
<?php foreach ($propir as $key) { ?>
<tr>
<td><?php echo $key->nombreComp; ?></td>
<td><?php echo $key->nombreAct; ?></td>
<td><?php if($key->afectoPA==1){echo "SI";}else{ echo "NO";} ?></td>
<td><?php echo $key->nombreItem; ?></td>
<td><?php echo $key->nombreCuenta; ?></td>
<td><?php echo $key->nombreReg; ?></td>
<td width="200"><?php echo "$ ".number_format($key->montoPropir,0,",",".").".-"; ?></td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
</div>
