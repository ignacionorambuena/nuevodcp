
<script>
function des_reg(){
var asd=document.getElementById('region');

document.getElementById('region').selectedIndex=0;
asd.setAttribute('disabled','disabled');
}

function act_reg(){
var director=document.getElementById('region');

var programa=document.getElementById('programa');
programa.setAttribute('disabled','disabled');
var componente=document.getElementById('componente');
componente.setAttribute('disabled','disabled');
document.getElementById('componente').selectedIndex=0;
document.getElementById('programa').selectedIndex=0;
director.removeAttribute('disabled');
}
function prog(){
var programa=document.getElementById('programa');
programa.removeAttribute('disabled');
document.getElementById('componente').selectedIndex=0;
var componente=document.getElementById('componente');
componente.setAttribute('disabled','disabled');
}

function comp(){
var componente=document.getElementById('componente');
componente.removeAttribute('disabled');
document.getElementById('programa').selectedIndex=0;
var programa=document.getElementById('programa');
programa.setAttribute('disabled','disabled');
}


function dcp(){
document.getElementById('componente').selectedIndex=0;
document.getElementById('programa').selectedIndex=0;
var componente=document.getElementById('componente');
componente.setAttribute('disabled','disabled');
var programa=document.getElementById('programa');
programa.setAttribute('disabled','disabled');
}

</script>
<br>
<div class="row">
<div class="col-lg-offset-2 col-xs-8 col-sm-8 col-md-8 col-lg-8">
<div class="well">
<form id="formulario-lista-activos" class="form-horizontal" action="" method="POST">
<legend class="">Agregar nuevo Perfil</legend>
<div class="row">
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6" style="border-right:1px dashed #ccc;margin-right:10px;">
<table class="table table-condensed">
<thead>
<tr>
<th>Seleccione Perfil</th>
</tr>
</thead>
<tbody>
<tr><td><?php echo form_error('perfil',"<small class='text-danger'>","</small>"); ?></td></tr>
<tr>
<td>Director Nacional</td>
<td>
<div class="radio">
<input type="radio" name="perfil" id="input" value="0" onclick="des_reg();dcp();">
</div>
</td>
</tr>

<tr>
<td>Director Regional</td>
<td>
<div class="radio">
<input type="radio" name="perfil" id="input" value="1" onclick="act_reg();">
</div>
</td>
</tr>

<tr>
<td>Jefe DCP (Coordinador)</td>
<td>
<div class="radio">
<input type="radio" name="perfil" id="input" value="2" onclick="des_reg();dcp();">
</div>
</td>
</tr>

<tr>
<td>? Jefe Componente</td>
<td>
<div class="radio">
<input type="radio" name="perfil" id="input" value="3" onclick="des_reg();" disabled>
</div>
</td>
</tr>

<tr>
<td>? Jefe Programa</td>
<td>
<div class="radio">
<input type="radio" name="perfil" id="input" value="4" onclick="des_reg();" disabled>
</div>
</td>
</tr>

<tr>
<td>Coordinador Programa (Regional) </td>
<td>
<div class="radio">
<input type="radio" name="perfil" id="input" value="5" onclick="act_reg();">
</div>
</td>
</tr>

<tr>
<td>Profesional de Apoyo Programa</td>
<td>
<div class="radio">
<input type="radio" name="perfil" id="input" value="6" onclick="des_reg();prog();">
</div>
</td>
</tr>

<tr>
<td>Profesional de Apoyo Componente</td>
<td>
<div class="radio">
<input type="radio" name="perfil" id="input" value="7" onclick="des_reg();comp();">
</div>
</td>
</tr>

</tbody>
</table>
</div>
<div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6" >
<table class="table table-condensed">
<thead>
<tr>
<th>&nbsp;</th>
</tr>
</thead>
<tbody>
<tr>
<td>

<?php echo form_error('usuario',"<small class='text-danger'>","</small>"); ?>
<select name="usuario" class="form-control input-sm">
<option value="">--Seleccione Usuario--</option>
<?
foreach ($listar as $key)
{
echo "<option value='".$key->account_lid."'>".ucwords(strtolower($key->n_fn))."</option>";

}
?>
</select>

</td>
</tr>
<tr>
<td>
<select name="region" id="region" class="form-control input-sm">
<option value="">--Seleccione una región--</option>
<?
foreach ($region as $reg)
{
echo "<option value='".$reg->idNR."'>".ucwords(strtolower($reg->nombreNR))."</option>";
}
?>
</select>
</td>
</tr>
<tr>
<td>
<select name="programa" id="programa" class="form-control input-sm">
<option value="">--Seleccione un programa--</option>
<?
foreach ($programa as $pro)
{
echo "<option value='".$pro->idProg."'>".ucfirst(strtolower($pro->nombreProg))."</option>";
}
?>
</select>
</td>
</tr>
<tr>
<td>
<select name="componente" id="componente" class="form-control input-sm">
<option value="">--Seleccione un componente--</option>
<?
foreach ($componente as $com)
{
echo "<option value='".$com->idComponente."'>".ucfirst(strtolower($com->nombreComponente))."</option>";
}
?>
</select>
</td>
</tr>
</tbody>
</table>

<div class="form-group text-right">
<input type="hidden" name="aceptar" id="inputAceptar" class="form-control" value="1">
<button type="submit" class="btn btn-primary btn-xs">Registrar Perfil</button>
</div>
<?php
$correcto=$this->session->flashdata('ok');
?>

<?php echo $correcto;?>


</div>
</div>
</form>
</div>
</div>
</div>

