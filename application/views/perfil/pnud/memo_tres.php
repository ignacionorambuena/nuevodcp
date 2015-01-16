<div class="well" style="font-size:12px;">
<?php foreach($set_memo as $memo){ ?>
<div style="background:#999;padding:5px;">
<table width="100%" border="0">
<tr>
<td width="33.333%">
Instituto Nacional de la Juventud <br>
Servicio Público <br><br>
R.U.T: 60.110.000-2 <br>
Agustinas 1564, Santiago - Centro <br>
Teléfono 620 47 00 - Fax 671 38 34
</td>
<td width="33.333%" align="center" valign="top">
<img src="<?php echo base_url('img/logo_pnud.png'); ?>" alt="" width="40" style="margin-top:-6px;">
</td>
<td align="right" width="33.333%">
<b>
Proyecto Nº 76548 Fortalecimiento y Desarrollo <br>
de Políticas Públicas en Juventud<br>
Programa de las Naciones Unidas para el Desarrollo
</b><br><br>
<h4><b>ORDEN DE COMPRA&nbsp;&nbsp;&nbsp;&nbsp;</b></h4>
</td>
</tr>
<tr>
<td colspan="3" style="border-bottom:1px solid #333;">&nbsp;</td>
</tr>
<tr>
<td>&nbsp;</td>
<td align="right"><b>Nº Orden de Compra :</b> </td>
<td align="right" style="padding:5px;">
<input type="text" value="<?php echo $memo->numerooc; ?> " style="text-align:right;" class="form-control input-sm" disabled>
</td>
</tr>
<tr>
<td>&nbsp;</td>
<td align="right"><b>Fecha :</b> </td>
<td align="right" style="padding:5px;" >
<input type="text" class="form-control input-sm" value="<?php echo $memo->fechaoc; ?> " style="text-align:right;" disabled>
</td>
</tr>
<tr>
<td colspan="3" align="center">
<table width="98%">
<tr>
<td width="13%" align="left"><b style="font-size:14px;">Nombre</b></td>
<td width="2%">:</td>
<td width="85%"><input type="text" class="form-control input-sm" value="<?php echo $memo->nombreProv; ?>" disabled></td>
</tr>
<tr>
<td width="13%" align="left"><b style="font-size:14px;">RUT</b></td>
<td width="2%">:</td>
<td width="85%"><input type="text" value="<?php echo $memo->rutProv; ?>" class="form-control input-sm" disabled></td>
</tr>
<tr>
<td width="13%" align="left"><b style="font-size:14px;">Dirección</b></td>
<td width="2%">:</td>
<td width="85%"><input type="text" value="<?php echo $memo->direccionProv; ?>" class="form-control input-sm" disabled></td>
</tr>
<tr>
<td width="13%" align="left"><b style="font-size:14px;">Teléfono</b></td>
<td width="2%">:</td>
<td width="85%"><input type="text" value="<?php echo $memo->telefonoProv; ?>" class="form-control input-sm" disabled></td>
</tr>

<tr>
<td colspan="3">&nbsp;</td>
</tr>

<tr>
<td colspan="3" width="100%" align="center"><b style="font-size:14px;">Detalle</b></td>
</tr>

<tr>
<td colspan="3">
<textarea name="" class="form-control" rows="10" disabled>
<?php
echo $memo->productoAct;
if($memo->nombreCuentaUno!=NULL)
{
echo "\n\n".$memo->productoAct1;
}
if($memo->nombreCuentaDos!=NULL)
{
echo "\n\n".$memo->productoAct2;
}
if($memo->nombreCuentaTres!=NULL)
{
echo "\n\n".$memo->productoAct3;
}
if($memo->nombreCuentaCuatro!=NULL)
{
echo "\n\n".$memo->productoAct4;
}
if($memo->nombreCuentaCinco!=NULL)
{
echo "\n\n".$memo->productoAct5;
}


?>
</textarea>
</td>
</tr>

<tr>
<td colspan="3">&nbsp;</td>
</tr>

<tr>
<td colspan="3">
<input type="text" name="" id="" class="form-control input-sm" value='Emitir factura a Nombre de "PNUD-76548" (Fortalecimiento y Desarrollo de' style="font-weight: bold;" disabled>
</td>
</tr>

<tr>
<td colspan="3">
<input type="text" name="" id="" class="form-control input-sm" value='Políticas Públicas en Juventud) Rut: 69.500.900-3, Giro: Organismo Internacional' style="font-weight: bold;" disabled>
</td>
</tr>

<tr>
<td colspan="3">
<input type="text" name="" id="" class="form-control input-sm" value='Dirección: Dag.Hammarskjöld 3241, Vitacura, Fono: 654-1000' style="font-weight: bold;" disabled>
</td>
</tr>

<tr>
<td colspan="3">
<?php

if($memo->idReg==1){ $direccion="Av. Arturo Prat #940. Iquique"; }
if($memo->idReg==2){ $direccion="San Martín 2298, Antofagasta"; }
if($memo->idReg==3){ $direccion="Colipi 893, Copiapó"; }
if($memo->idReg==4){ $direccion="Av. Francisco de Aguirre Nº 414, La Serena"; }
if($memo->idReg==5){ $direccion="Errázuriz #1236. Local 13. Valparaíso"; }
if($memo->idReg==6){ $direccion="Cuevas #118. Rancagua"; }
if($memo->idReg==7){ $direccion="1 poniente, 5 norte N°1610"; }
if($memo->idReg==8){ $direccion="Cochrane #790. Concepción"; }
if($memo->idReg==9){ $direccion="General Mackenna #825"; }
if($memo->idReg==10){ $direccion="Cristobal Colón Sur #451"; }
if($memo->idReg==11){ $direccion="Colón #311. Coyhaique."; }
if($memo->idReg==12){ $direccion="Lautaro Navarro #631. Punta Arenas."; }
if($memo->idReg==13){ $direccion="Príncipe de Gales #84. Santiago"; }
if($memo->idReg==14){ $direccion="O’Higgins #268. Valdivia"; }
if($memo->idReg==15){ $direccion="18 de Septiembre #485. Arica"; }
if($memo->idReg==16){ $direccion="Agustinas 1564, Santiago"; }

?>
<input type="text" name="" id="" class="form-control input-sm" value='Enviar Factura a: Dirección de <?php echo $memo->nombreReg.", ".$direccion;?>' disabled>
</td>
</tr>

<tr>
<td colspan="3">
<input type="text" name="" id="" class="form-control input-sm" value='' disabled>
</td>
</tr>

<tr>
<td colspan="3">
<table width="100%">
<tr>
<?php $totalMonto=$memo->monto+$memo->monto1+$memo->monto2+$memo->monto3+$memo->monto4+$memo->monto5; ?>
<td width="50%" align="right"><b>Total <?php if($memo->iva=="SI"){?>con IVA incluído :<?php } else { echo " : "; }?>&nbsp;&nbsp;&nbsp; </b></td>
<td width="50%"> <input type="text" class="form-control input-sm" value="<?= "$ ".number_format($totalMonto,0,",",".");?>" style="font-weight:bold;text-align:right;" disabled></td>
</tr>
<tr>
<td width="50%"> &nbsp;</td>
<td width="50%"> &nbsp;</td>
</tr>
</table>
</td>
</tr>

<tr>
<td colspan="3">
<table width="100%">
<tr>
<td width="10%">Imputación : </td>
<td width="80%"><input type="text" class="form-control input-sm" value="<?= $memo->subtituloProg.'.'.$memo->itemProg.'.'.$memo->asignacionProg.' '.$memo->nombreProg;?>" disabled></td>
</tr>
</table>
</td>
</tr>

<tr>
<td colspan="3">
<table width="100%">
<tr>
<td width="10%">Componente : </td>
<td width="80%"><input type="text" class="form-control input-sm" value="<?= $memo->nombreComp;?>" disabled></td>
</tr>
</table>
</td>
</tr>


<tr>
	<td colspan="3">&nbsp;</td>
</tr>
<tr>
	<td colspan="3">&nbsp;</td>
</tr>
<tr>
	<td colspan="3">&nbsp;</td>
</tr>
<tr>
	<td colspan="3">&nbsp;</td>
</tr>
<tr>
	<td colspan="3">&nbsp;</td>
</tr>

<tr>
<td colspan="3">
<table width="100%">
<tr>
<td width="50%" align="center">
____________________________________<br><br>
VºBº COORDINADORA (S) PNUD
</td>
<td width="50%" align="center">
____________________________________<br><br>
JEFE DAF
</td>
</tr>

<tr>
	<td colspan="3">&nbsp;</td>
</tr>
<tr>
	<td colspan="3">&nbsp;</td>
</tr>
</table>
</td>
</tr>



</table>
<hr>
<center>
<a href="<?php echo base_url('perfil/generate_tres/'.$memo->codGasto); ?>" class="btn btn-danger btn-md btn-block">Generar Orden de Compra</a>
</center>
</td>
</tr>



</table>
</div>
<?php } ?>
</div>

