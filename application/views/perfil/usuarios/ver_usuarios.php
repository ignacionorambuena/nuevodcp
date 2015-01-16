<br>
<div class="row">
<div class="col-lg-offset-2 col-xs-8 col-sm-8 col-md-8 col-lg-8">
<div class="well">
<table class="table table-hover">
<thead>
<tr>
<th>Nombre</th>
<th>Identificador</th>
<th>Perfil</th>
</tr>
</thead>
<tbody>
<?php foreach($usuarios as $key){
$perfil=$key->perfilUsr;

if ($perfil==0) { $perfil="Director Nacional"; }
if ($perfil==1) { $perfil="Director Regional"; }
if ($perfil==2) { $perfil="Jefe DCP (Coordinador)"; }
if ($perfil==3) { $perfil="Jefe Componente"; }
if ($perfil==4) { $perfil="Jefe Programa"; }
if ($perfil==5) { $perfil="Coordinador Programa (Regional)"; }
if ($perfil==6) { $perfil="Profesional de Apoyo Programa"; }
if ($perfil==7) { $perfil="Profesional de Apoyo Componente"; }
?>

<tr>
<td><?php echo $key->nombreUsr; ?></td>
<td><?php echo $key->usuarioUsr; ?></td>
<td><?php echo $perfil; ?></td>
</tr>
<?php } ?>
</tbody>
</table>
</div>
</div>
</div>
