<div class="row">
<h3 class="text-center">Nivel Presupuesto Actividad</h3>
<hr>
<div class="col-lg-offset-3 col-xs-6 col-sm-6 col-md-6 col-lg-6 ">
<div class="well row">
<form action="<?php echo base_url('perfil/editarActividadPre');?>" method="post">
<?php foreach ($actPre as $actPreEdit ){ ?>
<legend class="">Editar Presupuesto [<? echo $actPreEdit->nombreComp; ?>] "<? echo $actPreEdit->nombreAct; ?>"</legend>
<?php echo validation_errors('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>','</div>'); ?>

<?php if($this->session->flashdata('success')):?>                             
<div class="alert alert-success"><?php echo $this->session->flashdata('success');?></div>
<?php endif;?>

<?php if($this->session->flashdata('error')):?>
<div class="alert alert-error"><?php echo $this->session->flashdata('error'); ?></div>
<?php endif;?>


<div class="form-group">

<input type="hidden" name="idPA" id="idPA"  class="form-control input-sm" value="<? echo $actPreEdit->idPA; ?>">
<label for="">Monto del Componente</label>
<input type="text" name="montoPA" id="montoPA"  class="form-control input-sm" value="<? echo $actPreEdit->montoPA; ?>">
</div>
<div class="form-group">
<label for="">Año</label>
<select name="anoPA" class="form-control input-sm">
<option value="<? echo $actPreEdit->anoPA; ?>" selected>(<? echo $actPreEdit->anoPA; ?>)</option>
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
<label for="">Afecto a 7% PNUD</label>
<div class="row">
<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
<div class="radio">
<label>
<input type="radio" name="afectoPA" id="afectoPA" value="1" checked>
SI
</label>
</div>
</div>
<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3 col-offset-lg-6">
<div class="radio">
<label>
<input type="radio" name="afectoPA" id="input" value="0">
NO
</label>
</div>
</div>

<div class="form-group">
 <div class="col-lg-10">
<button type="submit" class="btn btn-success btn-xs">Guardar</button>
<a href="<?php echo site_url() ?>perfil/componente " class="btn btn-primary btn-xs">Volver</a>
</div>
</div>
</form>
</div>
</div>
</div>