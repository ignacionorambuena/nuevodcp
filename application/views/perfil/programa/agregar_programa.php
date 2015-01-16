<div class="row">

<h3 class="text-center">Nivel Programa</h3>
<hr>
<div class="col-lg-offset-2 col-xs-8 col-sm-8 col-md-8 col-lg-8 ">
<div class="well">
<h4>Agregar Programa</h4>
<form action="" method="post" accept-charset="utf-8">
<div class="form-group">
<label for="">Subtitulo</label>
<?php echo form_error('subtitulo',"<small class='text-danger'>","</small>"); ?>
<input type="text" name="subtitulo" id="input" class="form-control input-sm" value="<?php set_value('subtitulo');?>" size="5">
</div>

<div class="form-group">
<label for="">Ítem</label>
<?php echo form_error('item',"<small class='text-danger'>","</small>"); ?>
<input type="text" name="item" id="input" class="form-control input-sm" value="<?php set_value('item');?>" size="5">
</div>

<div class="form-group">
<label for="">Asignación</label>
<?php echo form_error('asignacion',"<small class='text-danger'>","</small>"); ?>
<input type="text" name="asignacion" id="input" class="form-control input-sm" value="<?php set_value('asignacion');?>" size="5">
</div>

<div class="form-group">
<label for="">Nombre del Programa</label>
<?php echo form_error('asignacion',"<small class='text-danger'>","</small>"); ?>
<input type="text" name="nombre" id="input" class="form-control input-sm" value="<?php set_value('nombre');?>">
</div>
<input type="hidden" name="aceptar" id="inputAceptar" class="form-control" value="">

<div class="form-group text-right">
<button type="submit" class="btn btn-danger btn-sm">Agregar</button>
</div>

</form>
</div>
</div>
</div>

