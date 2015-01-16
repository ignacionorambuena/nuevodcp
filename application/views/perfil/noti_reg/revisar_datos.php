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
dt(document).ready(function() {
    dt('#example').DataTable();
} );
</script>
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


var j= jQuery.noConflict();
j(document).ready(function() {
j(".item").change(function() {
j(".item option:selected").each(function() {
item = j('.item').val();
j.post("<?php echo base_url('perfil/css_item_cuenta');?>", {
item : item
}, function(data) {
j(".cuenta").html(data);
});
});
})
});

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

if(region==1){ document.getElementById('director').value = "Camila Castillo Guerrero";}
if(region==2){ document.getElementById('director').value = "Victor Santoro";}
if(region==3){ document.getElementById('director').value = "Miguel Carvajal";}
if(region==4){ document.getElementById('director').value = "Emilio Reyes Arias";}
if(region==5){ document.getElementById('director').value = "Cristina Pavez Cosio";}
if(region==6){ document.getElementById('director').value = "Jorge Parraguez Caroca";}
if(region==7){ document.getElementById('director').value = "Irene Muñoz Vilches";}
if(region==8){ document.getElementById('director').value = "Leocan Portus";}
if(region==9){ document.getElementById('director').value = "Luis Villegas Cardenas";}
if(region==10){ document.getElementById('director').value = "Felipe Roman";}
if(region==11){ document.getElementById('director').value = "Rodrigo Saldivia";}
if(region==12){ document.getElementById('director').value = "Yenifer Sandoval Alegria";}
if(region==13){ document.getElementById('director').value = "Stefano Ferreccio Bugueño";}
if(region==14){ document.getElementById('director').value = "Rodrigo Lepe Nuñez";}
if(region==15){ document.getElementById('director').value = "Samuel Pozo Alfaro";}
if(region==16){ document.getElementById('director').value = "-";}
});
})
});

</script>

<?php foreach ($ver_cuatro as $rev){ ?>

<div class="row">
<h3 class="text-center">Revisión Región 4ª Etapa</h3>
<hr>
<div class="col-lg-offset-2 col-xs-8 col-sm-8 col-md-8 col-lg-8">

<div class="well row">
<form action="" method="post">
<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12 text-right">
<h4>Código Memo: <b><?php  echo $rev->codGasto; ?></b></h4>

<input type="hidden" name="codigo" class="form-control input-sm" value="<?php  echo "dcp_00".$codigo; ?>">

</div>





<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
<h4 style="padding:2px 0;border-bottom:1px dashed #333; color:blue;"><b>Datos Adjuntos</b></h4>
</div>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<a class="btn btn-block btn-danger"data-toggle="modal" href='#modal-<?php echo $rev->codGasto; ?>'><b>Ver Adjunto <i class="fa fa-file-pdf-o"></i></b></a>



<div class="modal fade" id="modal-<?php echo $rev->codGasto; ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h4 class="modal-title">Archivos Aduntos</h4>
      </div>
      <div class="modal-body">

      <iframe src="<?php echo base_url('perfil/archivos_adjuntos_celda/'.$rev->codGasto); ?>" frameborder="0" width="100%" height="380"></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

</div>


<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
<h4 style="padding:2px 0;border-bottom:1px dashed #333; color:blue;"><b>Datos Factura</b></h4>
</div>

<div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
<label for="">Nº de Boleta oFactura</label>
<input type="text" name="numerofactura" id="input" class="form-control input-sm" value="" required>
</div>

<div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
<label>Monto</label>
<input type="text" name="monto" class="form-control input-sm" value="<?php echo $rev->monto; ?>">
</div>


<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
<h4 style="padding:2px 0;border-bottom:1px dashed #333; color:blue;"><b>Detalle Memorándum</b></h4>
</div>

<div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
<label>A</label>
<select name="jefe" class="form-control input-sm" disabled="">
<option value=""><?php echo $rev->jefedepto; ?></option>
</select>
</div>

<div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
<label>De</label>
<input type="text" name="director" id="director" class="form-control input-sm" value="<?php echo $rev->directorreg; ?>" disabled="">
</div>



<div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
<label>Fecha Memorandum</label>
<input type="text" name="fechamemo" id="datepickerb" class="form-control input-sm" value="<?php echo $rev->fechamemooc; ?>" disabled>
</div>


<div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
<label>Visación (Actual: <?php echo $rev->visacion; ?>)</label>
<input type="text" name="visacion" id="input" class="form-control input-sm" value="" <?php if ($rev->estado == "Anulado") { echo "disabled"; } ?> required>
</div>

<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
<h4 style="padding:2px 0;border-bottom:1px dashed #333; color:blue;"><b>Detalle de Gasto</b></h4>
</div>
<div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
<label>Región</label> <?php echo form_error('region',"<small class='text-danger'>","</small>");?>
<select name="region" class="form-control input-sm region" disabled>
<option value=""><?php echo $rev->nombreReg; ?> </option>
</select>
</div>

<div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
<label>Programa</label>
<select name="programa" class="form-control input-sm programa" disabled>
<option value=""><?php echo $rev->nombreProg; ?></option>
</select>
</div>

<div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
<label>Componente</label>
<select name="componente" class="form-control input-sm componente" disabled>
<option value=""><?php echo $rev->nombreComp; ?></option>
</select>
</div>

<div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
<label>Actividad</label>
<select name="actividad" class="form-control input-sm actividad" disabled>
<option value=""><?php echo $rev->nombreAct; ?></option>
</select>
</div>

<div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
<label>Ítem</label>
<select name="item" class="form-control input-sm item" disabled>
<option value=""><?php echo $rev->nombreItem; ?></option>
</select>
</div>

<div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
<label>Cuenta Presupuestaria</label>
<select name="cuenta" class="form-control input-sm cuenta" disabled>
<option value=""><?php echo $rev->nombreCuenta; ?></option>
</select>
</div>

<?php if($rev->nombreAct=="Talleres") {?>
<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12 codtaller">
<label>Código Taller</label>
<input type="text" name="codtaller" class="form-control input-sm" value="<?php echo $rev->codTaller; ?>" disabled>
</div>
<?php } ?>

<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
<label>Nombre Actividad</label>
<input type="text" name="nombreactividad" class="form-control input-sm" value="<?php echo $rev->nombreActGastos; ?>" disabled>
</div>

<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
<label>Producto</label>
<textarea name="producto" id="" cols="30" rows="5" class="form-control input-sm" disabled><?php echo $rev->productoAct; ?></textarea>
</div>



<div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
<label>IVA Incluido</label>
<select name="iva" class="form-control input-sm" disabled>
<option value=""><?php echo $rev->iva; ?></option>
</select>
</div>


<div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
<label>Mes de Ejecución</label>
<select name="mesejecucion" class="form-control input-sm" disabled>
<option value=""><?php echo $rev->mesejecucion; ?></option>
</select>
</div>

<div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
<label>Fecha Actividad</label>
<input type="text" name="fechaactividad"  class="form-control input-sm" value="<?php echo $rev->fechainicio; ?>" disabled="">
</div>



<div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
<label>Tipo de Gasto</label>
<select name="tipogasto" class="form-control input-sm" disabled>
<option><?php if($rev->tipogasto==1){ echo "Orden de Compra"; } ?></option>
</select>
</div>

<div class="form-group col-xs-6 col-sm-6 col-md-6 col-lg-6">
<label>Estado del Proceso</label>
<input type="text" name="estado" class="form-control input-sm" value="<?php echo $rev->estado; ?>" readonly>
</div>

<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
<label for="">Observaciones</label>
<textarea name="observaciones" class="form-control input-sm" cols="20" rows="5" disabled><?php echo $rev->observaciones; ?></textarea>
</div>


<div class="form-group col-xs-12 col-sm-12 col-md-12 col-lg-12">
<h4 style="padding:2px 0;border-bottom:1px dashed #333; color:blue;"><b>Detalle Proveedor</b></h4>
</div>

<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
<div class="well">
<p><b>RUT:</b> <?php echo $rev->rutProv; ?></p>
<p><b>Nombre:</b> <?php echo $rev->nombreProv; ?></p>
<p><b>Dirección:</b> <?php echo $rev->direccionProv; ?></p>
<p><b>Teléfono:</b> <?php echo $rev->telefonoProv; ?></p>
<p><b>Banco:</b> <?php echo $rev->bancoProv; ?></p>
<p><b>Tipo Cuenta:</b> <?php echo $rev->tipodecuentaProv; ?></p>
<p><b>Nº de Cuenta:</b> <?php echo $rev->numerocuentaProv; ?></p>
</div>

</div>


<div class="form-group text-right col-xs-12 col-sm-12 col-md-12 col-lg-12">
<input type="hidden" name="aceptar" value="a">
	<div class="row">
		<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<button type="submit" class="btn btn-success btn-block">Aceptar <i class="fa fa-check"></i></button>
		</form>
		</div>
	</div>
</div>
</div>



</div>



</div>
</div>
<?php } ?>
