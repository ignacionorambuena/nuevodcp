<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
	<div class="well">
	<table class="table table-hover">
	<thead>
	<tr>
	<th>Memorandum</th>
	<th>Archivo Adjunto</th>
	</tr>
	</thead>
	<tbody>
	<?php foreach($arch_adjuntos as $file){ ?>
	<tr>
	<td>Solicitud OC para Adquisición</td>
	<td>
	<?php if($file->adj_memo_uno==""){
	?>
	<i class="fa fa-ban"></i>
	<?php
	}else{ ?>
	<a href="<?php echo base_url($file->adj_memo_uno); ?>" target="_blank"><i class="fa fa-file-pdf-o"></i></a>
	<?php } ?>
	</td>
	</tr>
	<tr>
	<td>Solicitud de Orden de Compra</td>
	<td>
	<?php if($file->adj_memo_dos==""){
	?>
	<i class="fa fa-ban"></i>
	<?php
	}else{ ?>
	<a href="<?php echo base_url($file->adj_memo_dos); ?>" target="_blank"><i class="fa fa-file-pdf-o"></i></a>
	<?php } ?>
	</td>
	</tr>
	<tr>
	<td>Orden de Compra</td>
	<td>
	<?php if($file->adj_memo_tres==""){
	?>
	<i class="fa fa-ban"></i>
	<?php
	}else{ ?>
	<a href="<?php echo base_url($file->adj_memo_tres); ?>" target="_blank"><i class="fa fa-file-pdf-o"></i></a>
	<?php } ?>
	</td>
	</tr>
	<tr>
	<td>Solicita Pago de Factura</td>
	<td>
	<?php if($file->adj_memo_cuatro==""){
	?>
	<i class="fa fa-ban"></i>
	<?php
	}else{ ?>
	<a href="<?php echo base_url($file->adj_memo_cuatro); ?>" target="_blank"><i class="fa fa-file-pdf-o"></i></a>
	<?php } ?>
	</td>
	</tr>
	<tr>
	<td>Pago de Factura</td>
	<td>
	<?php if($file->adj_memo_cinco==""){
	?>
	<i class="fa fa-ban"></i>
	<?php
	}else{ ?>
	<a href="<?php echo base_url($file->adj_memo_cinco); ?>" target="_blank"><i class="fa fa-file-pdf-o"></i></a>
	<?php } ?>
	</td>
	</tr>
	<tr>
	<td>Documentos Procedimiento PNUD</td>
	<td>
	<?php if($file->adjunto==""){
	?>
	<i class="fa fa-ban"></i>
	<?php
	}else{ ?>
	<a href="<?php echo base_url($file->adjunto); ?>" target="_blank"><i class="fa fa-file-pdf-o"></i></a>
	<?php } ?>
	</td>
	</tr>
	<?php } ?>
	</tbody>
	</table>
	</div>
	</div>
</div>





