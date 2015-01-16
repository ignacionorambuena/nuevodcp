<div class="row" style="padding:5px 0px 5px 0px;">
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
<img src="<?php echo base_url('/img/logo.png'); ?> " alt="" width="70">
</div>
<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 text-right">
<br>
<i class="fa fa-user"></i> Hola, <b><?php echo $nombreUsr; ?></b><br>
<a href="<?php echo base_url('perfil/logout'); ?>" style="color:red;"><i class="fa fa-sign-out">	</i> Cerrar Sesión</a>
</div>
</div>
<nav class="navbar navbar-inverse" role="navigation">
<!-- Brand and toggle get grouped for better mobile display -->
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
</div>

<!-- Collect the nav links, forms, and other content for toggling -->
<div class="collapse navbar-collapse navbar-ex1-collapse">

<ul class="nav navbar-nav navbar-right">
<li><a href="<?php echo base_url('/perfil'); ?>"><i class="fa fa-home"></i> Inicio</a></li>

<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">Programas <b class="caret"></b></a>
<ul class="dropdown-menu">

<li><a href="<?php echo base_url('/perfil/agregar_programa'); ?>">Agregar Programa</a></li>
<li><a href="<?php echo base_url('/perfil/agregar_presupuesto');?>" title="">Agregar Presupuesto</a> </li>
<li><a href="<?php echo base_url('/perfil/programa');?>" title="">Ver Programa</a> </li>


</ul>
</li>

<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">Componentes <b class="caret"></b></a>
<ul class="dropdown-menu">
<li><a href="<?php echo base_url('/perfil/agregar_componente'); ?>">Agregar Componente</a></li>
<li><a href="<?php echo base_url('/perfil/agregar_presupuesto_componente');?>" title="">Agregar Presupuesto</a> </li>
<li><a href="<?php echo base_url('/perfil/componente');?>" title="">Ver Componente</a> </li>
</ul>
</li>

<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">Actividad <b class="caret"></b></a>
<ul class="dropdown-menu">
<li><a href="<?php echo base_url('/perfil/agregar_actividad'); ?>">Agregar Actividad</a></li>
<li><a href="<?php echo base_url('/perfil/agregar_presupuesto_actividad');?>" title="">Agregar Presupuesto</a> </li>
<li><a href="<?php echo base_url('/perfil/actividad');?>" title="">Ver Actividad</a> </li>
</ul>
</li>

<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">Ítem <b class="caret"></b></a>
<ul class="dropdown-menu">
<li><a href="<?php echo base_url('/perfil/agregar_item'); ?>">Agregar Ítem</a></li>

<li><a href="<?php echo base_url('/perfil/item');?>" title="">Ver Ítem</a> </li>
</ul>
</li>

<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">Cuenta <b class="caret"></b></a>
<ul class="dropdown-menu">
<li><a href="<?php echo base_url('/perfil/agregar_cuenta'); ?>">Agregar Cuenta</a></li>
<li><a href="<?php echo base_url('/perfil/agregar_presupuesto_cuenta');?>" title="">Agregar Presupuesto</a> </li>
<li><a href="<?php echo base_url('/perfil/cuenta');?>" title="">Ver Cuenta</a> </li>
</ul>
</li>

<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">PROPIR <b class="caret"></b></a>
<ul class="dropdown-menu">
<li><a href="<?php echo base_url('/perfil/agregar_propir'); ?>">Generar PROPIR Regional</a></li>
<li><a href="<?php echo base_url('/perfil/ver_propir'); ?>">Ver Resumen</a></li>
</ul>
</li>

<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">Gastos<b class="caret"></b></a>
<ul class="dropdown-menu">
<li><a href="<?php echo base_url('/perfil/gastos'); ?>">Ingresar Gastos</a></li>
<li><a href="<?php echo base_url('/perfil/ver_gastos'); ?>">Ver Gastos</a></li>
</ul>
</li>

<!-- <li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">Usuarios <b class="caret"></b></a>
<ul class="dropdown-menu">
<li><a href="<?php echo base_url('/perfil/ver_usuarios'); ?>">Ver Usuarios</a></li>
<li><a href="<?php echo base_url('/perfil/listar_usuarios'); ?>">Agregar Usuario</a></li>
</ul>
</li> -->

<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bell"></i> <span class="badge"><?php echo $cant_noti; ?></span>  <b class="caret"></b></a>
<ul class="dropdown-menu">
<li><a href="<?php echo base_url('/perfil/noti_region'); ?>">Ver OC <span class="badge" style="background:#ddd;"><?php echo $cant_noti; ?></span></a></li>
<li><a href="<?php echo base_url('/perfil/reg_revisados'); ?>">Ver Revisados</a></li>
<!-- <li><a href="<?php echo base_url('/perfil/all_noti'); ?>">Ver Todos</a></li> -->
</ul>
</li>

<!-- <li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">Notificaciones <b class="caret"></b></a>
<ul class="dropdown-menu">
<li><a href="<?php echo base_url('/perfil/ver_usuarios'); ?>">Etapa 1</a></li>
<li><a href="<?php echo base_url('/perfil/ver_usuarios'); ?>">Etapa 2</a></li>
<li><a href="<?php echo base_url('/perfil/ver_usuarios'); ?>">Etapa 3</a></li>
<li><a href="<?php echo base_url('/perfil/ver_usuarios'); ?>">Etapa 4</a></li>
<li><a href="<?php echo base_url('/perfil/ver_usuarios'); ?>">Etapa 5</a></li>
<li><a href="<?php echo base_url('/perfil/ver_usuarios'); ?>">Etapa 6</a></li>
</ul>
</li> -->

<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown">Proveedor <b class="caret"></b></a>
<ul class="dropdown-menu">
<li><a href="<?php echo base_url('/perfil/proveedor'); ?>">Ver Proveedor</a></li>
<li><a href="<?php echo base_url('/perfil/agregar_proveedor'); ?>">Agregar Proveedor</a></li>
</ul>
</li>


</div><!-- /.navbar-collapse -->
</nav>




