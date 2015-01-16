<div class="row">
<h3 class="text-center">Nivel Item</h3>
<hr>
<div class="col-lg-offset-3 col-xs-6 col-sm-6 col-md-6 col-lg-6 ">
<div class="well row">
<form action="<?php echo base_url('perfil/editarItem');?>" method="post">
<legend class="">Editar Item</legend>
<?php echo validation_errors('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">&times;</button>','</div>'); ?>

<?php if($this->session->flashdata('success')):?>                             
<div class="alert alert-success"><?php echo $this->session->flashdata('success');?></div>
<?php endif;?>

<?php if($this->session->flashdata('error')):?>
<div class="alert alert-error"><?php echo $this->session->flashdata('error'); ?></div>
<?php endif;?>

<?php foreach ($item as $itemEdit ){ ?>
<div class="form-group">
<label for="">Nombre del Ítem</label>
<input type="hidden" name="iditem" id="item"  class="form-control input-sm" value="<? echo $itemEdit->idItem; ?>">

<input type="text" name="nombreitem" id="item"  class="form-control input-sm" value="<? echo $itemEdit->nombreItem; ?>">
</div>
<?php } ?>
<div class="form-group">
 <div class="col-lg-10">
<button type="submit" class="btn btn-success btn-xs">Guardar</button>
<a href="<?php echo site_url() ?>perfil/item " class="btn btn-primary btn-xs">Volver</a>
</div>
</div>
</form>
</div>
</div>
</div>