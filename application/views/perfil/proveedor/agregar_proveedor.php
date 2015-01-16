


<h3  class="text-center">Proveedores</h3>
<hr>
<div class="col-lg-offset-2 col-xs-8 col-sm-8 col-md-8 col-lg-8 ">
<div class="well">
<h4>Agregar Proveedor</h4>
<form action="<?php echo base_url('perfil/agregar_proveedor');?>" method="post">


<div class="form-group">
<label for="">Nombre Proveedor</label> <?php echo form_error('nombreProv',"<small class='text-danger'>","</small>"); ?>
<input type="text" name="nombreProv" id="input" class="form-control input-sm" value="<?php echo set_value('nombreProv');?>">
</div>

<div class="form-group">
<label for="">Rut Proveedor</label> <?php echo form_error('rutProv',"<small class='text-danger'>","</small>"); ?>
<input type="text" name="rutProv" id="input" class="form-control input-sm" value="<?php echo set_value('rutProv');?>">
</div>

<div class="form-group">
<label for="">Teléfono Proveedor</label> <?php echo form_error('telefonoProv',"<small class='text-danger'>","</small>"); ?>
<input type="text" name="telefonoProv" id="input" class="form-control input-sm" value="<?php echo set_value('telefonoProv');?>">
</div>

<div class="form-group">
<label for="">Dirección Proveedor</label> <?php echo form_error('direccionProv',"<small class='text-danger'>","</small>"); ?>
<input type="text" name="direccionProv" id="input" class="form-control input-sm" value="<?php echo set_value('direccionProv');?>">
</div>

<div class="form-group">
<label for="">Banco Proveedor</label>
<select name="bancoProv" id="" class="form-control input-sm" required title="Por favor debe seleccionar una cuenta">
<option value="">Seleccione un elemento</option>
<option value="Banco Estado">Banco Estado</option>
<option value="Banco De Chile">Banco De Chile</option>
<option value="Banco Scotiabank">Banco Scotiabank</option>
<option value="Banco Edwards">Banco Edwards</option>
<option value="Banco BCI">Banco BCI</option>
<option value="Corpbanca">Corpbanca</option>
<option value="Banco Condell">Banco Condell</option>
<option value="Banco Bice">Banco Bice</option>
<option value="HSBC Bank">HSBC Bank</option>
<option value="Banco Santander">Banco Santander</option>
<option value="Banefe">Banefe</option>
<option value="Banco Itaú">Banco Itaú</option>
<option value="Banco Security">Banco Security</option>
<option value="Banco Falabella">Banco Falabella</option>
<option value="Banco Ripley">Banco Ripley</option>
<option value="Banco Penta">Banco Penta</option>
<option value="Banco Paris">Banco Paris</option>
<option value="Banco BBVA">Banco BBVA</option>
<option value="Banco BBVA Express">Banco BBVA Express</option>
</select>
</div>


<div class="form-group">
<label for="">Tipo De Cuenta Proveedor</label>
<select name="tipodecuentaProv" id="" class="form-control input-sm" required title="Por favor debe seleccionar una cuenta">
<option value="">Seleccione un elemento</option>
<option value="Cuenta Corriente">Cuenta Corriente</option>
<option value="Cuenta Vista">Cuenta Vista</option>
<option value="Cuenta Rut">Cuenta Rut</option>
</select>
</div>


<div class="form-group">
<label for="">Número De Cuenta Proveedor</label> <?php echo form_error('numerocuentaProv',"<small class='text-danger'>","</small>"); ?>
<input type="text" name="numerocuentaProv" id="input" class="form-control input-sm" value="<?php echo set_value('numerocuentaProv');?>">
</div>

<div class="form-group text-right">
<input type="hidden" name="aceptar" id="inputAceptar" class="form-control" value="">
<button type="submit" class="btn btn-danger btn-sm">Agregar</button>
</div>

</form>
</div>
</div>
</div>

