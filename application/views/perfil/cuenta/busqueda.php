<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<div class="well">
<table class="table table-bordered">
<thead>
<th width="60%">Cuenta</th>
<th width="10%">Presupuesto</th>
<th width="10%">Año</th>
</thead>
<tbody>
<?php


foreach ($filtro as $key) {
?>
<tr>
<td><?php echo $key->nombreCuenta; ?></td>
<td><?php $num=$key->total; echo "$ ".number_format($num); ?></td>
<td><?php echo $key->anoPA; ?></td>

</tr>
<?php
}


?>
</tbody>
</table>
</div>
</div>
</div>
