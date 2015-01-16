<div class="row">
<h3 class="text-center">Nivel Presupuesto Programa</h3>
<hr>
<div class="col-lg-offset-3 col-xs-6 col-sm-6 col-md-6 col-lg-6 ">
<div class="well row">
<form action="<?php echo base_url('perfil/editarProgramaPre');?>" method="post">
<?php foreach ($progPre as $progPreEdit ){ ?>
<legend class="">Editar Presupuesto "<? echo $progPreEdit->nombreProg; ?>"</legend>
<?php echo validation_errors('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>','</div>'); ?>

<?php if($this->session->flashdata('success')):?>                             
<div class="alert alert-success"><?php echo $this->session->flashdata('success');?></div>
<?php endif;?>

<?php if($this->session->flashdata('error')):?>
<div class="alert alert-error"><?php echo $this->session->flashdata('error'); ?></div>
<?php endif;?>


<div class="form-group">

<input type="hidden" name="idPP" id="idPP"  class="form-control input-sm" value="<? echo $progPreEdit->idPP; ?>">
<label for="">Monto del Programa</label>
<input type="text" name="montoPP" id="montoPP"  class="form-control input-sm" value="<? echo $progPreEdit->montoPP; ?>">
</div>
<div class="form-group">
<label for="">Año</label>
<select name="anoPP" class="form-control input-sm">
<option value="<? echo $progPreEdit->anoPP; ?>" selected>(<? echo $progPreEdit->anoPP; ?>)</option>
<?php
for($x=20;$x>=13;$x--){
?>
<option value="<?php echo "20".$x; ?>"  <?php echo set_select('ano', '20'.$x); ?>><?php echo "20".$x; ?></option>
<?php
}
?>
</select>
</div>
<?php } ?>

<div class="form-group">
 <div class="col-lg-10">
<button type="submit" class="btn btn-success btn-xs">Guardar</button>
<a href="<?php echo site_url() ?>perfil/programa " class="btn btn-primary btn-xs">Volver</a>
</div>
</div>
</form>
</div>
</div>
</div>