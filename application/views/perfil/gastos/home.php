  <link rel="stylesheet" href="<?php echo base_url('css/jquery-ui.css');?>">
  <script src="<?php echo base_url('js/jquery-1.10.2.js');?>"></script>
  <script src="<?php echo base_url('js/jquery-ui.js');?>"></script>

<script>
var c= jQuery.noConflict();
c.datepicker.regional['es'] = {
 closeText: 'Cerrar',
 prevText: '<Ant',
 nextText: 'Sig>',
 currentText: 'Hoy',
 monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
 monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
 dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
 dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
 dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
 weekHeader: 'Sm',
 dateFormat: 'dd/mm/yy',
 firstDay: 1,
 isRTL: false,
 showMonthAfterYear: false,
 yearSuffix: ''
 };
c.datepicker.setDefaults(c.datepicker.regional['es']);
  c(function() {
    c( "#datepicker" ).datepicker();
  });
    c(function() {
    c( "#datepickerb" ).datepicker();
  });
</script>
 <script src="<?php echo base_url('js/jquery-1.11.1.min.js');?>"></script>
<script src="<?php echo base_url('js/jquery.dataTables.min.js');?>"></script>
<link rel="stylesheet" href="<?php echo base_url('css/jquery.dataTables.css');?>">
<script>
var dt= jQuery.noConflict();
// dt(document).ready(function() {
//     dt('#example').DataTable();
// } );

// dt(function(){
// setTimeout(function(){

// dt("#example").dataTable({
// fnInitComplete: function () {
// dt("#overlay").hide();
// }
// });
// }, 1);
// });

dt(document).ready( function() {
dt('#example').dataTable( {
"fnInitComplete": function(oSettings, json) {
dt("#overlay").hide();
}
} );
} );


</script>
<style>
.display { display: none;}
</style>
<script type="text/javascript">
var j= jQuery.noConflict();
j(document).ready(function() {
j(".programa").change(function() {
j(".programa option:selected").each(function() {
programa = j('.programa').val();
j.post("<?php echo base_url('perfil/css_prog_comp');?>", {
programa : programa
}, function(data) {
j(".componente").html(data);
});
});
})
});

var j= jQuery.noConflict();
j(document).ready(function() {
j(".componente").change(function() {
j(".componente option:selected").each(function() {
componente = j('.componente').val();
j.post("<?php echo base_url('perfil/css_comp_act');?>", {
componente : componente
}, function(data) {
j(".actividad").html(data);
});
});
})
});


<?php for($x=0;$x<=5;$x++){ ?>
var j= jQuery.noConflict();
j(document).ready(function() {
j(".item<?php echo $x;?>").change(function() {
j(".item<?php echo $x;?> option:selected").each(function() {
item = j('.item<?php echo $x;?>').val();
j.post("<?php echo base_url('perfil/css_item_cuenta');?>", {
item : item
}, function(data) {
j(".cuenta<?php echo $x;?>").html(data);
});
});
})
});
<?php } ?>

var j= jQuery.noConflict();
j(document).ready(function() {
j(".actividad").change(function() {
j(".actividad option:selected").each(function() {
actividad = j('.actividad').val();
if(actividad==53){
j(".codtaller").css('display','block');
}
else{
j(".codtaller").css('display','none');
}
});
})
});


var j= jQuery.noConflict();
j(document).ready(function() {
j(".region").change(function() {
j(".region option:selected").each(function() {
region = j('.region').val();

if(region==1){
  document.getElementById("tipogasto").options[1].disabled = false;
  document.getElementById("tipogasto").options[5].disabled = true;
$('#a').show();
$('#de').show();
$('#a_despues').hide();
$('#de_despues').hide();
document.getElementById('director').value = "Camila Castillo Guerrero";}
if(region==2){
  document.getElementById("tipogasto").options[1].disabled = false;
  document.getElementById("tipogasto").options[5].disabled = true;
$('#a').show();
$('#de').show();
$('#a_despues').hide();
$('#de_despues').hide();
document.getElementById('director').value = "Victor Santoro";}
if(region==3){
  document.getElementById("tipogasto").options[1].disabled = false;
  document.getElementById("tipogasto").options[5].disabled = true;
$('#a').show();
$('#de').show();
$('#a_despues').hide();
$('#de_despues').hide();
document.getElementById('director').value = "Miguel Carvajal";}
if(region==4){
  document.getElementById("tipogasto").options[1].disabled = false;
  document.getElementById("tipogasto").options[5].disabled = true;
$('#a').show();
$('#de').show();
$('#a_despues').hide();
$('#de_despues').hide();
document.getElementById('director').value = "Emilio Reyes Arias";}
if(region==5){
  document.getElementById("tipogasto").options[1].disabled = false;
  document.getElementById("tipogasto").options[5].disabled = true;
$('#a').show();
$('#de').show();
$('#a_despues').hide();
$('#de_despues').hide();
document.getElementById('director').value = "Cristina Pavez Cosio";}
if(region==6){
  document.getElementById("tipogasto").options[1].disabled = false;
  document.getElementById("tipogasto").options[5].disabled = true;
$('#a').show();
$('#de').show();
$('#a_despues').hide();
$('#de_despues').hide();
document.getElementById('director').value = "Jorge Parraguez Caroca";}
if(region==7){
  document.getElementById("tipogasto").options[1].disabled = false;
  document.getElementById("tipogasto").options[5].disabled = true;
$('#a').show();
$('#de').show();
$('#a_despues').hide();
$('#de_despues').hide();
document.getElementById('director').value = "Irene Muñoz Vilches";}
if(region==8){
  document.getElementById("tipogasto").options[1].disabled = false;
  document.getElementById("tipogasto").options[5].disabled = true;
$('#a').show();
$('#de').show();
$('#a_despues').hide();
$('#de_despues').hide();
document.getElementById('director').value = "Leocan Portus";}
if(region==9){
  document.getElementById("tipogasto").options[1].disabled = false;
  document.getElementById("tipogasto").options[5].disabled = true;
$('#a').show();
$('#de').show();
$('#a_despues').hide();
$('#de_despues').hide();
document.getElementById('director').value = "Luis Villegas Cardenas";}
if(region==10){
  document.getElementById("tipogasto").options[1].disabled = false;
  document.getElementById("tipogasto").options[5].disabled = true;
$('#a').show();
$('#de').show();
$('#a_despues').hide();
$('#de_despues').hide();
document.getElementById('director').value = "Felipe Roman";}
if(region==11){
  document.getElementById("tipogasto").options[1].disabled = false;
  document.getElementById("tipogasto").options[5].disabled = true;
$('#a').show();
$('#de').show();
$('#a_despues').hide();
$('#de_despues').hide();
document.getElementById('director').value = "Rodrigo Saldivia";}
if(region==12){
  document.getElementById("tipogasto").options[1].disabled = false;
  document.getElementById("tipogasto").options[5].disabled = true;
$('#a').show();
$('#de').show();
$('#a_despues').hide();
$('#de_despues').hide();
document.getElementById('director').value = "Yenifer Sandoval Alegria";}
if(region==13){
  document.getElementById("tipogasto").options[1].disabled = false;
  document.getElementById("tipogasto").options[5].disabled = true;
$('#a').show();
$('#de').show();
$('#a_despues').hide();
$('#de_despues').hide();
document.getElementById('director').value = "Stefano Ferreccio Bugueño";}
if(region==14){
  document.getElementById("tipogasto").options[1].disabled = false;
  document.getElementById("tipogasto").options[5].disabled = true;
$('#a').show();
$('#de').show();
$('#a_despues').hide();
$('#de_despues').hide();
document.getElementById('director').value = "Rodrigo Lepe Nuñez";}
if(region==15){
  document.getElementById("tipogasto").options[1].disabled = false;
  document.getElementById("tipogasto").options[5].disabled = true;
$('#a').show();
$('#de').show();
$('#a_despues').hide();
$('#de_despues').hide();
document.getElementById('director').value = "Samuel Pozo Alfaro";}
if(region==16){
    document.getElementById("tipogasto").options[5].disabled = false;
document.getElementById("tipogasto").options[1].disabled = true;
$('#de').hide();
$('#de_despues').show('slow');

$('#a').hide();
$('#a_despues').show('slow');
document.getElementById('jefe_despues').value = "Orlando Mancilla";
}

});
})
});

</script>

<style>
#overlay {
    text-align: center;
    top:0;left:0;right:0;bottom:0;
    background: rgba(255,255,255,0.9);
    position: fixed;
    padding-top:15%;
    overflow: hidden;
    z-index: 9999999;
}
</style>

<div class="row">
<h3 class="text-center">Gastos</h3>
<hr>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

<div class="well row">
<form action="" method="post">
<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12 text-right">
<?php $codigo=$codigo+1; ?>
<h4>Cod. Ingreso: <b><?php  echo "dcp_00".$codigo; ?></b></h4>

<input type="hidden" name="codigo" class="form-control input-sm" value="<?php  echo "dcp_00".$codigo; ?>">

</div>



<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
<h4 style="padding:2px 0;border-bottom:1px dashed #333; color:blue;"><b>Detalle Proveedor</b></h4>
</div>


<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12" style="background:#fefefe;border:1px solid #ddd;">
<div id="overlay"><i class="fa fa-refresh fa-5x fa-spin"></i><br><h1>CARGANDO</h1><h4>Debido a nuestra amplia base de proveedores esto puede tardar unos instantes, por favor espera un momento.</h4></div>
<table class="display" id="example" cellspacing="0" width="100%">
<thead>
<tr>
<th>Rut</th>
<th>Nombre</th>
<th>Banco</th>
<th>Cuenta</th>
<th>Numero Cuenta</th>
<th>Opción <?php echo "<br>".form_error('proveedor',"<small class='text-danger'>","</small>");?></th>

</tr>
</thead>
<tbody>

<?php foreach ($proveedor as $prov) { ?>
<tr>
<td width="15%"><?php echo $prov->rutProv;  ?> </td>
<td width="40%"><?php echo ucwords(strtolower($prov->nombreProv)); ?> </td>
<td width="15%"><?php echo $prov->bancoProv;  ?></td>
<td width="15%"><?php echo $prov->tipodecuentaProv;  ?></td>
<td width="15%"><?php echo $prov->numerocuentaProv;  ?></td>
<td>
<div class="radio">
<label>
<input type="radio" name="proveedor" value="<?php echo $prov->idProv; ?> ">
</label>
</div>
</td>
</tr>
<?php } ?>
</tbody>
</table>

</div>
<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
<h4 style="padding:2px 0;border-bottom:1px dashed #333; color:blue;"><b>Detalle de Gasto</b></h4>
</div>
<div class="form-group col-xs-3 col-sm-3 col-md-3 col-lg-3">
<label>Región</label> <?php echo form_error('region',"<small class='text-danger'>","</small>");?>
<select name="region" class="form-control input-sm region">
<option value="">Seleccione Región</option>
<?php
foreach ($region as $reg) {
?>
<option value="<?php echo $reg->idReg;?>" <?php echo set_select('region',$reg->idReg);?>><?php echo $reg->nombreReg;?></option>
<?php
}
?>
</select>
</div>

<div class="form-group col-xs-3 col-sm-3 col-md-3 col-lg-3">
<label>Programa</label> <?php echo form_error('programa',"<small class='text-danger'>","</small>");?>
<select name="programa" class="form-control input-sm programa">
<option value="">Seleccione Programa</option>
<?php
foreach ($programa as $prog) {
?>
<option value="<?php echo $prog->idProg;?>"><?php echo $prog->nombreProg;?></option>
<?php
}
?>
</select>
</div>

<div class="form-group col-xs-3 col-sm-3 col-md-3 col-lg-3">
<label>Componente</label> <?php echo form_error('componente',"<small class='text-danger'>","</small>");?>
<select name="componente" class="form-control input-sm componente">
<option value="">Debe seleccionar un programa</option>
</select>
</div>

<div class="form-group col-xs-3 col-sm-3 col-md-3 col-lg-3">
<label>Actividad</label> <?php echo form_error('actividad',"<small class='text-danger'>","</small>");?>
<select name="actividad" class="form-control input-sm actividad">
<option value="">Debe seleccionar un componente</option>
</select>
</div>
<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
<h4 style="padding:2px 0;border-bottom:1px dashed #333; color:blue;"><b>Gasto</b></h4>
</div>

<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
<label>Tipo de Gasto</label> <?php echo form_error('tipogasto',"<small class='text-danger'>","</small>");?>
<select name="tipogasto" id="tipogasto" class="form-control input-sm" required>
<option value="">Seleccione un elemento</option>
<option value="1" >Orden de Compra</option>
<option value="2" >Boleta Honorarios</option>
<option value="3" >Pago Directo</option>
<option value="4">Licitación</option>
<option value="5">Orden de Compra Nivel Central</option>

</select>
</div>
<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<table class="table table-bordered">
<thead style="font-size:11px;">
<tr>
<th>Nº</th>
<th>Ítem</th>
<th>Cuenta Presupuestaria</th>
<th>Cod. Taller</th>
<th>Nombre Actividad</th>
<th width="300">Producto</th>
<th>Monto</th>
</tr>
</thead>
<tbody>
<?php for($i=0;$i<=5;$i++){ ?>
<tr <?php if($i%2==0){echo "bgcolor='#D3D3D3'";}?>>
<td><?php echo $i+1; ?></td>
<td>
<select name="item<?php echo $i; ?>" class="form-control input-sm item<?php echo $i;?>">
<option value="">Seleccione Ítem</option>
<?php
foreach ($item as $it) {
?>
<option value="<?php echo $it->idItem;?>"><?php echo $it->nombreItem;?></option>
<?php
}
?>
</select>
</td>

<td>
<select name="cuenta<?php echo $i; ?>" class="form-control input-sm cuenta<?php echo $i;?>">
<option value="">Selecciona un Ítem</option>
</select>
</td>

<td>
<input type="text" name="codtaller<?php echo $i; ?>" class="form-control input-sm codtaller" value="" style="display:none;">
</td>

<td>
<input type="text" name="nombreactividad<?php echo $i; ?>" class="form-control input-sm" value="<?php echo set_value('nombreactividad');?>">
</td>

<td>
<textarea name="producto<?php echo $i; ?>" id="" rows="5" class="form-control input-sm"><?php echo set_value('producto');?></textarea>
</td>

<td>
<script type="text/javascript">
function soloNumero(e)
{
   key = e.keyCode || e.which;
  tecla = String.fromCharCode(key).toLowerCase();
  letras = "1234567890";
  especiales = [48,8];
  tecla_especial = false
  for(var i in especiales){
      if(key == especiales[i]){
   tecla_especial = true;
   break;
       }
  }
       if(letras.indexOf(tecla)==-1 && !tecla_especial)
    return false;
}



</script>
<input type="text" name="monto<?php echo $i; ?>" class="form-control input-sm" value="<?php echo set_value('monto');?>" onkeypress="return soloNumero(event)">
</td>

</tr>
<?php } ?>

</tbody>
</table>
</div>

<!-- ====== -->


<div class="form-group col-xs-3 col-sm-3 col-md-3 col-lg-3">
<label>IVA Incluido</label> <?php echo form_error('iva',"<small class='text-danger'>","</small>");?>
<select name="iva" class="form-control input-sm">
<option value="SI">SI</option>
<option value="NO">NO</option>
</select>
</div>


<div class="form-group col-xs-3 col-sm-3 col-md-3 col-lg-3">
<label>Mes de Ejecución</label> <?php echo form_error('mesejecucion',"<small class='text-danger'>","</small>");?>
<select name="mesejecucion" class="form-control input-sm">
<option value="Enero">Enero</option>
<option value="Febrero">Febrero</option>
<option value="Marzo">Marzo</option>
<option value="Abril">Abril</option>
<option value="Mayo">Mayo</option>
<option value="Junio">Junio</option>
<option value="Julio">Julio</option>
<option value="Agosto">Agosto</option>
<option value="Septiembre">Septiembre</option>
<option value="Octubre">Octubre</option>
<option value="Noviembre'">Noviembre</option>
<option value="Diciembre">Diciembre</option>
</select>
</div>

<div class="form-group col-xs-3 col-sm-3 col-md-3 col-lg-3">
<label>Fecha Actividad</label> <?php echo form_error('fechaactividad',"<small class='text-danger'>","</small>");?>
<input type="date" name="fechaactividad" class="form-control input-sm" value="<?php echo set_value('fechaactividad');?>">
</div>

<div class="form-group col-xs-3 col-sm-3 col-md-3 col-lg-3">
<label>Estado del Proceso</label> <?php echo form_error('estado',"<small class='text-danger'>","</small>");?>
<input type="text" name="estado" class="form-control input-sm" value="Solicitado" readonly>
</div>

<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
<label for="">Observaciones</label> <?php echo form_error('observaciones',"<small class='text-danger'>","</small>");?>
<textarea name="observaciones" class="form-control input-sm" cols="20" rows="5"><?php echo set_value('observaciones');?></textarea>
</div>

<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
<h4 style="padding:2px 0;border-bottom:1px dashed #333; color:blue;"><b>Detalle Memorándum</b></h4>
</div>

<div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4" id="a" >
<label>A</label> <?php echo form_error('jefe',"<small class='text-danger'>","</small>");?>
<select name="jefe" class="form-control input-sm">
<option value="">Seleccione una opción</option>
<option value="Angela Venegas A">Angela Venegas Avila</option>
<option value="Marcos Barreto M">Marcos Barreto Muñoz</option>
<option value="Soledad Castillo M">Soledad Castillo M</option>
</select>
</div>

<div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4" id="a_despues" style="display:none;">
<label>A</label> <?php echo form_error('jefe',"<small class='text-danger'>","</small>");?>
<input type="text" name="" id="jefe_despues" class="form-control input-sm" readonly="">
</div>

<!-- SI SELECCIONA NIVEL CENTRAL ESTA SECCIÓN SERÁ ACTIVADA ========================================== -->
<div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4" id="de" >
<label>De</label> <?php echo form_error('director',"<small class='text-danger'>","</small>");?>
<input type="text" name="director" id="director" class="form-control input-sm" readonly="">
</div>


<div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4" style="display:none;" id="de_despues">
<label>De</label> <?php echo form_error('director',"<small class='text-danger'>","</small>");?>
<select name="director_b" class="form-control input-sm">
<option value="">Seleccione una opción</option>
<option value="Angela Venegas A">Angela Venegas Avila</option>
<option value="Marcos Barreto M">Marcos Barreto Muñoz</option>
<option value="Soledad Castillo M">Soledad Castillo M</option>
</select>
</div>
<!-- SI SELECCIONA NIVEL CENTRAL ESTA SECCIÓN SERÁ ACTIVADA ========================================== -->




<!-- <div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
<label>Fecha Memorandum</label> -->
<input type="hidden" name="fechamemo" id="datepickerb" class="form-control input-sm" value="NULL" readonly="">
<!-- </div> -->


<div class="form-group col-xs-4 col-sm-4 col-md-4 col-lg-4">
<label>Visación</label> <?php echo form_error('visacion',"<small class='text-danger'>","</small>");?>
<input type="text" name="visacion" id="input" class="form-control input-sm" value="<?php echo set_value('visacion');?>">
</div>






<div class="form-group text-right col-xs-12 col-sm-12 col-md-12 col-lg-12">
<input type="hidden" name="aceptar" value="a">
<button type="submit" class="btn btn-primary btn-md">Ingresar Gasto</button>

</div>

</form>
</div>

</div>
</div>
