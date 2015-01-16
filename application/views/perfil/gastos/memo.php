<div class="well" style="font-size:12px;">
<?php foreach($set_memo as $memo){ ?>
<table width="100%" border="0">
<tr>
<td width="8%" valign="top"><img src="http://extranet.injuv.gob.cl/tarjeta_joven/images/logo_injuv_v2.jpg" alt="" width="120"></td>
</tr>
<tr>
</table>

<table width="100%" border="0">
<td rowspan="16" width="12%">&nbsp;</td>
<td>
<table width="100%" border="0" cellpadding="5">

<tr>
<?php
$busca = array('á','é','í','ó','ú');
$remplaza = array('Á','É','Í','Ó','Ú');
?>
<td colspan="3">MEMORANDUM <?php echo strtoupper(str_replace($busca,$remplaza,$memo->nombreProg)." - ".$memo->romanoReg); ?> &nbsp;&nbsp;&nbsp;Nº &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;/&nbsp;&nbsp;&nbsp;/<?php echo date('Y'); ?></td>
</tr>
<tr>
<td colspan="3">&nbsp;</td>
</tr>
<tr>
<td width="9%" valign="top">A</td>
<td width="1%" valign="top">:</td>
<td width="90%" valign="top">
<?php echo strtoupper(str_replace($busca,$remplaza,$memo->jefedepto)); ?><br>
JEFE DEPTO. (S) COORDINACIÓN PROGRAMÁTICA<br>
INSTITUTO NACIONAL DE LA JUVENTUD
</td>
</tr>

<tr>
<td width="9%" valign="top">DE</td>
<td width="1%" valign="top">:</td>
<td width="90%" valign="top">
<?php echo strtoupper(str_replace($busca,$remplaza,$memo->directorreg)); ?><br>
DIRECCIÓN REGIONAL<br>
INSTITUTO NACIONAL DE LA JUVENTUD
</td>
</tr>

<tr>
<td width="9%" valign="top">REF</td>
<td width="1%" valign="top">:</td>
<td width="90%" valign="top"></td>
</tr>

<tr>
<td width="9%" valign="top">MAT.</td>
<td width="1%" valign="top">:</td>
<td width="90%" valign="top">

<?php
if ($memo->tipogasto==1) {
echo "SOLICITA O.C PARA ADQUISICIÓN";
}
else if ($memo->tipogasto==2) {
echo "SOLICITA PAGO DE BOLETA HONORARIO";
}

else if ($memo->tipogasto==3) {
echo "SOLICITA PAGO";
}

else if ($memo->tipogasto==4) {
echo "SOLICITA PAGO DE LICITACIÓN";
}
else if ($memo->tipogasto==5) {
echo "SOLICITA O.C PARA ADQUISICIÓN";
}
?>


</td>
</tr>

<tr>
<td width="9%" valign="top">FECHA</td>
<td width="1%" valign="top">:</td>
<td width="90%" valign="top">
<?php
// $mes=date('F');
// if($mes=="January"){ $mes_e="Enero";}
// if($mes=="February"){ $mes_e="Febrero";}
// if($mes=="March"){ $mes_e="Marzo";}
// if($mes=="April"){ $mes_e="Abril";}
// if($mes=="May"){ $mes_e="Mayo";}
// if($mes=="June"){ $mes_e="Junio";}
// if($mes=="July"){ $mes_e="Julio";}
// if($mes=="August"){ $mes_e="Agosto";}
// if($mes=="September"){ $mes_e="Septiembre";}
// if($mes=="October"){ $mes_e="Octubre";}
// if($mes=="November"){ $mes_e="Noviembre";}
// if($mes=="December"){ $mes_e="Diciembre";}

?>

</td>
</tr>

<tr>
<td colspan="3">&nbsp;</td>
</tr>

<tr>
<td colspan="3" align="justify">
<?php
if ($memo->tipogasto==1) {
$tipoemision="de la orden de compra";
}
else if ($memo->tipogasto==2) {
$tipoemision="de la Boleta de Honorario";
}

else if ($memo->tipogasto==3) {
$tipoemision="del pago";
}

else if ($memo->tipogasto==4) {
$tipoemision="del pago de licitación";
}
else if ($memo->tipogasto==5) {
$tipoemision="de la orden de compra";
}
?>

De mi consideración:<br>
Junto con saludarle, solicito a usted tramitar la emisión <?php echo $tipoemision; ?> para implementación de las actividad del DCP, de acuerdo a los datos expuestos a continuación:
</td>
</tr>
<tr>
<td colspan="3">&nbsp;</td>
</tr>
<tr>
<td colspan="3">
<table width="100%" border="0">
<tr>
<td width="12%">Razón Social :</td>
<td width="88%"><?php echo $memo->nombreProv; ?></td>
</tr>
<tr>
<td width="12%">RUT :</td>
<td width="88%"><?php echo $memo->rutProv; ?></td>
</tr>
<tr>
<td width="12%">Dirección :</td>
<td width="88%"><?php echo $memo->direccionProv; ?></td>
</tr>
<tr>
<td width="12%">Teléfono :</td>
<td width="88%"><?php echo $memo->telefonoProv; ?></td>
</tr>
<tr>
<td width="12%">Observaciones :</td>
<td width="88%"><?php echo $memo->observaciones; ?></td>
</tr>
</table>
</td>
</tr>
<tr>
<td colspan="3">&nbsp;</td>
</tr>
<tr>
<td colspan="3">
<table width="100%" border="1" cellpadding="2">
<tr>
<td width="5%" align="center"><b>Cod. Ingreso</b></td>
<td width="60%" align="center"><b>Detalle de la adquisición</b></td>
<td width="10%" align="center"><b>Cuenta presupuestaria</b></td>
<td width="10%" align="center"><b>Ítem Gasto</b></td>
<td width="10%" align="center"><b>Monto</b></td>
</tr>
<tr>

<?php
if($memo->nombreCuentaUno!=NULL) { $AA=1;} else{ $AA=0; }
if($memo->nombreCuentaDos!=NULL) { $BB=1;} else{ $BB=0; }
if($memo->nombreCuentaTres!=NULL) { $CC=1;} else{ $CC=0; }
if($memo->nombreCuentaCuatro!=NULL) { $DD=1;} else{ $DD=0; }
if($memo->nombreCuentaCinco!=NULL) { $EE=1;} else{ $EE=0; }
$FF=1;
$rowtotal=$AA+$BB+$CC+$DD+$EE+$FF;
?>

<td align="center" rowspan="<?php echo $rowtotal; ?>"><?php echo $memo->codGasto; ?></td>
<td align="justify"><?php echo $memo->productoAct; ?></td>
<td align="center"><?php echo $memo->nombreCuenta; ?></td>
<td align="center"><?php echo $memo->nombreItem; ?></td>
<td align="center"><?php echo "$ ".number_format($memo->monto,0,",","."); ?></td>
</tr>
<?php if($memo->nombreCuentaUno!=NULL) { ?>
<tr>
<td align="justify"><?php echo $memo->productoAct1; ?></td>
<td align="center"><?php echo $memo->nombreCuentaUno; ?></td>
<td align="center"><?php echo $memo->nombreItemUno; ?></td>
<td align="center"><?php echo "$ ".number_format($memo->monto1,0,",","."); ?></td>
</tr>
<?php } ?>

<?php if($memo->nombreCuentaDos!=NULL) { ?>
<tr>
<td align="justify"><?php echo $memo->productoAct2; ?></td>
<td align="center"><?php echo $memo->nombreCuentaDos; ?></td>
<td align="center"><?php echo $memo->nombreItemDos; ?></td>
<td align="center"><?php echo "$ ".number_format($memo->monto2,0,",","."); ?></td>
</tr>
<?php } ?>

<?php if($memo->nombreCuentaTres!=NULL) { ?>
<tr>
<td align="justify"><?php echo $memo->productoAct3; ?></td>
<td align="center"><?php echo $memo->nombreCuentaTres; ?></td>
<td align="center"><?php echo $memo->nombreItemTres; ?></td>
<td align="center"><?php echo "$ ".number_format($memo->monto3,0,",","."); ?></td>
</tr>
<?php } ?>

<?php if($memo->nombreCuentaCuatro!=NULL) { ?>
<tr>
<td align="justify"><?php echo $memo->productoAct4; ?></td>
<td align="center"><?php echo $memo->nombreCuentaCuatro; ?></td>
<td align="center"><?php echo $memo->nombreItemCuatro; ?></td>
<td align="center"><?php echo "$ ".number_format($memo->monto4,0,",","."); ?></td>
</tr>
<?php } ?>
<?php if($memo->nombreCuentaCinco!=NULL) { ?>
<tr>
<td align="justify"><?php echo $memo->productoAct5; ?></td>
<td align="center"><?php echo $memo->nombreCuentaCinco; ?></td>
<td align="center"><?php echo $memo->nombreItemCinco; ?></td>
<td align="center"><?php echo "$ ".number_format($memo->monto5,0,",","."); ?></td>
</tr>
<?php } ?>
<td colspan="4" align="right">Total
<?php
if($memo->iva=="SI"){
?>
IVA incl:
<?php
}else{
echo " : &nbsp;&nbsp;";
}
?>
</td>
<?php

$totalMonto=$memo->monto+$memo->monto1+$memo->monto2+$memo->monto3+$memo->monto4+$memo->monto5;

?>
<td align="center"><?php echo "$ ".number_format($totalMonto,0,",","."); ?></td>
</tr>
</table>
</td>
</tr>
<tr>
<td colspan="3">&nbsp;</td>
</tr>
<tr>
<td colspan="3" align="justify">
Esta solicitud cuenta con VºBº del <?php echo $memo->nombreComp; ?> en virtud que se ajusta a lo presupuestado. Los gastos deberán ser imputados al <?php echo $memo->nombreProg; ?>, <?php echo $memo->nombreComp; ?> <?php echo $memo->romanoReg; ?> Región. <br><br>
Sin otro particular, se despide.
</td>
</tr>
<tr><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td></tr>
<tr><td>&nbsp;</td></tr>
<tr>
<td colspan="3" align="center">
<b>
<?php
echo strtoupper($memo->directorreg);
?><br>
DIRECTOR REGIONAL<br>
<?php
echo strtoupper($memo->nombreReg);
?><br>
INSTITUTO NACIONAL DE LA JUVENTUD
</b>
</td>
</tr>
<tr>
<td colspan="3">&nbsp;</td>
</tr>
<tr>
<td colspan="3">&nbsp;</td>
</tr>
<tr>
<td colspan="3" align="left">
<b><?php echo $memo->visacion; ?></b><br>
cc: Archivo Dirección Regional de <?php echo $memo->nombreReg; ?>
</td>
</tr>
</table>
</td>
<td rowspan="16" width="10%">&nbsp;</td>
</table>
<hr>
<center>
<a href="<?php echo base_url('perfil/generate/'.$memo->codGasto); ?>" class="btn btn-danger btn-block btn-md">Generar Memorándum</a>
</center>
<?php } ?>
</div>
