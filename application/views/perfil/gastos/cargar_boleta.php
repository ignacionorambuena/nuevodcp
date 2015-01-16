<div class="row">
<h3 class="text-center">Adjuntar Archivos</h3>
<hr>
<div class="col-lg-offset-3 col-xs-6 col-sm-6 col-md-6 col-lg-6">
<div class="well">
<?=form_open_multipart('perfil/do_upload_boleta/'.$codigomemo); ?>
<!-- <div class="form-group">
<label for="">Adjuntar Memorandum Firmado</label>
<input type="file" name="memo_uno" class="form-control input-sm"  size="20" />
</div>

<div class="form-group">
<label for="">Adjuntar Archivos Requeridos</label>
<input type="file" name="userfile" class="form-control input-sm"  size="20" />
</div>
<div class="form-group text-right">
<input type="submit" name="aceptar" value="Subir Archivo" class="btn btn-sm btn-danger" />
</div>

</form>
<div class="form-group"> -->
<div class="form-group">
<?php
echo form_label('Archivos Requeridos', 'file1');
?>
<input type="file" name="file1" class="form-control" value="" required="required">

</div>




<div class="form-group text-right">
<?php
$class = array('class' => 'btn btn-danger btn-sm','value'=>'Cargar Archivos','name'=>'submit');
echo form_submit($class);
?>
</div>
<?php if($error){
echo "<div class='alert alert-warning text-center'>".$error."</div>";
}
?>
</div>

</div>
</div>
</div>

