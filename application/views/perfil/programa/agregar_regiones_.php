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
<h3 class="text-center">Agregar monto regional</h3>
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
<tr bgcolor="#ddd">
<td><b>Región</b></td>
<td><b>Monto</b></td>
<td><b>Año</b></td>
</tr>
<tbody>
<?php
foreach ($region as $key) {
?>
<tr>
<td><?php echo $key->nombreReg; ?></td>
<td>
<input type="text" name="montoReg<?php echo $key->idReg;?>" class="form-control input-sm txt"  required="required">
<input type="hidden" name="regionReg<?php echo $key->idReg;?>" class="form-control" value="<?php echo $key->idReg;?>">
<input type="hidden" name="anoReg<?php echo $key->idReg;?>" class="form-control" value="<?php echo $prog['ano']; ?>">
<input type="hidden" name="programaReg<?php echo $key->idReg;?>" class="form-control" value="<?php echo $prog['programa']; ?>">

</td>
<td><?php echo $prog['ano']; ?></td>

</tr>
<?php
}
?>
<tr>
<td colspan="3"><div class="form-group text-right">
<input type="hidden" name="aceptar" id="inputAceptar" class="form-control" value="">
<button type="submit" class="btn btn-primary btn-xs">Guardar</button>
</div></td>
</tr>
</tbody>
</table>
</div>
</form>
</div>


</div>


