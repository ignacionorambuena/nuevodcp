
<h3 class="text-center">Planilla PROPIR</h3><hr>
<div class="row">
<div class="col-lg-offset-3 col-xs-6 col-sm-6 col-md-6 col-lg-6">
<div class="well">
<form action="" method="post">

<legend>Generar PROPIR</legend>



<div class="form-group">
<label for="">Actividad</label>
<?php echo form_error('actividad',"<small class='text-danger'>","</small>"); ?>
<select name="actividad" id="actividad" class="form-control input-sm">
<option value="">Seleccione una Actividad</option>
<?php   foreach ($actividad as $key) { ?>
<option value="<?php echo $key->idPA; ?>" <?php echo set_select('actividad', $key->idAct); ?>>[<?php echo $key->nombreComp;?>] <?php echo $key->nombreAct; ?></option>
<?php }
?>
</select>
</div>

<div class="form-group">
<label for="">Cuenta Presupuestaria</label>
<select name="cuenta" id="cuenta" class="form-control input-sm">
<option value="">Seleccione Cuenta</option>
<?php foreach ($cuenta as $key ) { ?>
<option value="<?php echo $key->idCuenta; ?>"<?php echo set_select('cuenta', $key->idCuenta); ?>>[<?php echo $key->nombreItem;?>]
<?php echo $key->nombreCuenta; ?></option>
<?php }
?>

</select>
</div>
<?php if($perfilUsr!=1){ ?>
<div class="form-group">
<label for="">Seleccione Región</label>
<select name="region" id="region" class="form-control input-sm">
<option value="">REGIÓN</option>
<?php foreach ($region as $key ) { ?>
<option value="<?=$key -> idReg ?>"<?php echo set_select('region', $key->idReg); ?>>[<?=$key -> romanoReg ?>]<?=$key -> nombreReg ?></option>
<?php }
?>

</select>
</div>
<?php }
?>
<?php if($perfilUsr==1){ ?>
<div class="form-group">
<label for="">Seleccione Región</label>
<select name="region" id="region" class="form-control input-sm">
<option value="">REGIÓN</option>
<?php foreach ($regionPro as $key ) { ?>
<option value="<?=$key -> idReg ?>"<?php echo set_select('region', $key->idReg); ?>>[<?=$key -> romanoReg ?>]<?=$key -> nombreReg ?></option>
<?php }
?>

</select>
</div>
<?php }
?>

<!--<div class="row">
<?php 	$mes=date('m'); ?>
<div class="form-group col-lg-6">
<label>	Seleccione Mes</label>
<select name="mes" id="" class="form-control input-sm">
<option value="">Seleccione un elemento</option>
<option value=<?php if($mes==1){echo '"1" selected'; } ?>>Enero</option>
<option value=<?php if($mes==2){echo '"2" selected'; } ?>>Febrero</option>
<option value=<?php if($mes==3){echo '"3" selected'; } ?>>Marzo</option>
<option value=<?php if($mes==4){echo '"4" selected'; } ?>>Abril</option>
<option value=<?php if($mes==5){echo '"5" selected'; } ?>>Mayo</option>
<option value=<?php if($mes==6){echo '"6" selected'; } ?>>Junio</option>
<option value=<?php if($mes==7){echo '"7" selected'; } ?>>Julio</option>
<option value=<?php if($mes==8){echo '"8" selected'; } ?>>Agosto</option>
<option value=<?php if($mes==9){echo '"9" selected'; } ?>>Septiembre</option>
<option value=<?php if($mes==10){echo '"10" selected';  } ?>>Octubre</option>
<option value=<?php if($mes==11){echo '"11" selected';  } ?>>Noviembre</option>
<option value=<?php if($mes==12){echo '"12" selected';  } ?>>Diciembre</option>
</select>
</div>-->


<div class="form-group">
<label>Monto</label><small>(Ingrese monto sin el simbolo "$" y puntos)</small>
<input type="text" name="monto" id="monto" class="form-control input-sm" value="" required="required">
</div>


<div class="form-group text-right">
<input type="hidden" name="aceptar" id="inputAceptar" class="form-control" value="">
<button type="submit" class="btn btn-danger btn-sm">Agregar</button>
</div>

</form>
</div>

</div>
