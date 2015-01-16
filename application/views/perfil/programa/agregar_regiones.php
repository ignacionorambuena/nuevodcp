<?php
//foreach ($prog as $key){echo $key."<br>";}
?>

<script>
$(document).ready(function() {
//this calculates values automatically
calculateSum();

$(".txt").on("keydown keyup", function() {
calculateSum();
});
});

function calculateSum() {
var sum = 0;
var total = <?php echo $prog['monto'];?>
//iterate through each textboxes and add the values
$(".txt").each(function() {
//add only if the value is number
if (!isNaN(this.value) && this.value.length != 0) {
    sum += parseInt(this.value);
    $(this).css("border", "2px solid green");
}
else if (this.value.length != 0){
    $(this).css("border", "2px solid red");
}
});


$("input#sum1").val(total-sum);
}

</script>

<br>

<div class="row">
<h3 class="text-center">Agregar Monto Regional</h3>
<hr>

<div class="col-lg-offset-2 col-xs-8 col-sm-8 col-md-8 col-lg-8">

<?php
echo form_open('perfil/agregar_ppto_region','post'); ?>
<div class="well">
<table class="table table-bordered">
<tr>
<td colspan="3">Programa : <b><?php echo $prog['nombreProg']; ?></b></td>
</tr>
<tr>
<td colspan="3">Monto Actual : <b>$<?php  echo str_replace(",",".",number_format($prog['monto'])); ?></b></td>
</tr>
<tr>
<td colspan="3">Monto Total: <input type="text" id='sum1' name="input" style="border:none;background:transparent;"  readonly/></td>
</tr>
</table>
<div class="form-group">
<label>Seleccione Región</label>
<select name="  region" id="" class="form-control input-sm" required>
<option value="">Seleccione un elemento</option>
<?php   foreach ($progregion as $key) {?>
<option value="<?php    echo $key->idReg; ?> "><?php    echo $key->nombreReg; ?></option>
<?php   } ?>
</select>
</div>
<div class="row">
<div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
<label>Monto Región</label>
<input type="text" name="monto" id="montoreg" class="form-control input-sm txt" value="" required="required">
</div>

<div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
<label>Año Presupuesto</label>
<input type="text" name="ano" id="input" class="form-control input-sm" value="<?php echo $prog['ano'];?>" required="required" readonly>
</div>
</div>

<div class="form-group text-right">
<input type="hidden" name="aceptar" id="inputAceptar" class="form-control" value="">
<input type="hidden" name="programa" id="inputAceptar" class="form-control" value="<?php echo $prog['programa'];?>">
<button type="submit" class="btn btn-primary btn-xs">Ingresar</button>
</div>

</div>
</form>
<center>
<a href="<?php echo base_url('perfil/cambiar_region');?>" class="btn btn-default btn-xs">Agregar Otro Presupuesto</a>
</center>
</div>


</div>


