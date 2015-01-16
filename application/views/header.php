<!DOCTYPE html>
<html>
<head>
<title>Control de Presupuestos</title>
<meta charset="utf-8">
<link rel="stylesheet" href="<?php echo base_url('css/bootstrap.min.css'); ?>">
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
<script src="<?php echo base_url('js/jquery.min.js'); ?>" type="text/javascript"></script>
<script src="<?php echo base_url('js/bootstrap.min.js'); ?>" type="text/javascript"></script>
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
<style>
body{
background: url('<?php echo base_url("img/bg.jpg");?>') no-repeat;
background-size: cover;
background-attachment: fixed;
}
</style>
<body>

<div class="container">

