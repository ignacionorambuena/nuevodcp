<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<div class="well">
<table class="table table-bordered">
<thead>
<th width="20%">Nombre Proveedor</th>
<th width="10%">Rut</th>
<th width="10%">Teléfono</th>
<th width="10%">Dirección</th>
<th width="10%">Banco</th>
<th width="10%">Tipo Cuenta</th>
<th width="10%">Número Cuenta</th>
</thead>
<tbody>
<?php


foreach ($filtro as $key) {
?>
<tr>
<td><?php echo $key->nombreProv; ?></td>
<td><?php echo $key->rutProv; ?></td>
<td><?php echo $key->telefonoProv; ?></td>
<td><?php echo $key->direccionProv; ?></td>
<td><?php echo $key->bancoProv; ?></td>
<td><?php echo $key->tipodecuentaProv; ?></td>
<td><?php echo $key->numerocuentaProv; ?></td>

</tr>
<?php
}


?>
</tbody>
</table>
</div>
</div>
</div>
