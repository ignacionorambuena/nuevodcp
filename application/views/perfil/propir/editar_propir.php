
<h3 class="text-center">Planilla PROPIR</h3><hr>
<div class="row">
<div class="col-lg-offset-3 col-xs-6 col-sm-6 col-md-6 col-lg-6">
<div class="well">
<form action="<?php echo base_url('perfil/editarPropir');?>" method="post">
<?php echo validation_errors('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>','</div>'); ?>

<?php if($this->session->flashdata('success')):?>                             
<div class="alert alert-success"><?php echo $this->session->flashdata('success');?></div>
<?php endif;?>

<?php if($this->session->flashdata('error')):?>
<div class="alert alert-error"><?php echo $this->session->flashdata('error'); ?></div>
<?php endif;?>

<legend>Editar PROPIR</legend>
<?php 	
foreach ($propir as $key) {
 ?>

<input type="hidden" name="idPropir" id="idPropir"  class="form-control input-sm" value="<? echo $key->idPropir; ?>">
<?php }
?>
<div class="form-group">
<label for="">Actividad</label>
<?php echo form_error('idPA',"<small class='text-danger'>","</small>"); ?>
<select name="idPA" id="idPA" class="form-control input-sm">
<?php 	
foreach ($propir as $key) {
 ?>
<option value="<?php echo $key->idPA; ?>" <?php echo set_select('idPA', $key->idAct); ?>>[<?php echo $key->nombreComp;?>] <?php echo $key->nombreAct; ?></option>
<?php }
?>

<?php   foreach ($actividad as $key) { ?>
<option value="<?php echo $key->idPA; ?>" <?php echo set_select('idPA', $key->idAct); ?>>[<?php echo $key->nombreComp;?>] <?php echo $key->nombreAct; ?></option>
<?php }
?>
</select>
</div>

<div class="form-group">
<label for="">Cuenta Presupuestaria</label>
<select name="idCP" id="idCP" class="form-control input-sm">
<?php   foreach ($propir as $key) { ?>
<option value="<?php echo $key->idCuenta; ?>"<?php echo set_select('idCP', $key->idCuenta); ?>><?php echo $key->nombreCuenta; ?></option>

<?php }
?>
<?php 	
foreach ($cuenta as $key) {
 ?>
<option value="<?php echo $key->idCuenta; ?>"<?php echo set_select('idCP', $key->idCuenta); ?>>
<?php echo $key->nombreCuenta; ?></option>
<?php }
?>

</select>
</div>

<div class="form-group">
<label for="">Seleccione Región</label>
<select name="idReg" id="idReg" class="form-control input-sm">
<?php   foreach ($propir as $key) { ?>
<option value="<?=$key -> idReg ?>"<?php echo set_select('idReg', $key->idReg); ?>>[<?=$key -> romanoReg ?>]<?=$key -> nombreReg ?></option>
<?php }
?>
<?php   foreach ($region as $key) { ?>
<option value="<?=$key -> idReg ?>"<?php echo set_select('idReg', $key->idReg); ?>>[<?=$key -> romanoReg ?>]<?=$key -> nombreReg ?></option>
<?php }
?>





</select>
</div>
<?php   foreach ($propir as $key) { ?>
<div class="form-group">
<label>Monto</label><small>(Ingrese monto sin el simbolo "$" y puntos)</small>
<input type="text" name="montoPropir" id="montoPropir" class="form-control input-sm" value="<?php echo $key->montoPropir ?>" required="required">
</div>
<?php }
?>

<div class="form-group">
 <div class="col-lg-10">
<button type="submit" class="btn btn-success btn-xs">Guardar</button>
<a href="<?php echo site_url() ?>perfil/ver_propir " class="btn btn-primary btn-xs">Volver</a>
</div>
</div>

</form>
</div>
</div>
</div>
