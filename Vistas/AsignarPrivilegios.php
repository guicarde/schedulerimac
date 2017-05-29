<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("location:login.php");
}

include_once '../DAO/Registro/Usuario.php';
include_once '../DAO/Registro/Menu.php';

$privilegios = $_SESSION['array_menus'];

$usuario = new Usuario();
$usuarios = $usuario->listar_sin_privilegios();

$usuario2 = new Usuario();
$usuarios2 = $usuario2->listar();

$menu = new Menu();
$menus = $menu->listar();

if (isset($_SESSION['usu_idusu'])) {
    $usu_idusu = $_SESSION['usu_idusu'];
} else {
    $usu_idusu = "";
}

if (isset($_SESSION['usumenu_idusumenu'])) {
    $idprivi = $_SESSION['usumenu_idusumenu'];
} else {
    $idprivi = "";
}

//if(isset($_SESSION['usu_idusu']))         { $idusu = $_SESSION['usu_idusu'];} else{ $idusu =""; }
if(isset($_SESSION['usu_nombres_usuario']))         { $nomusu = $_SESSION['usu_nombres_usuario'];} else{ $nomusu =""; }
if(isset($_SESSION['usu_apellidos_usuario']))         { $apeusu = $_SESSION['usu_apellidos_usuario'];} else{ $apeusu =""; }
if(isset($_SESSION['usu_numdoc_usuario']))         { $numdoc = $_SESSION['usu_numdoc_usuario'];} else{ $numdoc =""; }
if(isset($_SESSION['usu_nom_usuario']))         { $usunom = $_SESSION['usu_nom_usuario'];} else{ $usunom =""; }
if(isset($_SESSION['usu_estado']))         { $usu_estado = $_SESSION['usu_estado'];} else{ $usu_estado =""; }
if(isset($_SESSION['usu_email_institucional']))         { $correoinst = $_SESSION['usu_email_institucional'];} else{ $correoinst =""; }
if(isset($_SESSION['usu_fecharegistro']))         { $fechareg = $_SESSION['usu_fecharegistro'];} else{ $fechareg =""; }
if(isset($_SESSION['rol_idrol']))         { $rol_idrol = $_SESSION['rol_idrol'];} else{ $rol_idrol =""; }


if (isset($_SESSION['accion_privilegio']) && $_SESSION['accion_privilegio'] != '') {
$menu2 = new Menu();
$menus2 = $menu2->listar_por_usuario($usu_idusu);
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="">
        <meta name="author" content="Dashboard">
        <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">

        <title>SISTEMA DE GENERACIÓN DE SCHEDULE</title>

        <!-- Bootstrap core CSS -->
        <link href="../Recursos/assets/css/bootstrap.css" rel="stylesheet">
        <!--external css-->
        <link href="../Recursos/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link rel="stylesheet" type="text/css" href="../Recursos/assets/js/bootstrap-datepicker/css/datepicker.css" />
        <link rel="stylesheet" type="text/css" href="../Recursos/assets/js/bootstrap-daterangepicker/daterangepicker.css" />

        <!-- Custom styles for this template -->
        <link href="../Recursos/assets/css/style.css" rel="stylesheet">
        <link href="../Recursos/assets/css/style-responsive.css" rel="stylesheet">

        <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>

   
 <body onload="nobackbutton();">
        <section id="container" >
            <!-- **********************************************************************************************************************************************************
            TOP BAR CONTENT & NOTIFICATIONS
            *********************************************************************************************************************************************************** -->
<?php require 'Cabecera.php' ?>

            <!-- **********************************************************************************************************************************************************
            MAIN SIDEBAR MENU
            *********************************************************************************************************************************************************** -->
            <!--sidebar start-->
            <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
                  <p class="centered"><a href="profile.html"><img src="../Controles/Fotos/<?php echo $_SESSION['foto']; ?>" class="img-circle" width="60"></a></p>
              	  <h5 class="centered"><?php echo $_SESSION['user_personal'] ?></h5>              	  
                  <li class="mt">
                      <a href="index.php">
                          <i class="fa fa-dashboard"></i>
                          <span>Resumen</span>
                      </a>
                  </li>
                  
                  <?php if ($privilegios != null) { ?>
                   <?php foreach ($privilegios as $p) {    ?>
                  
                  <?php if ($p['menu_idmenu']==1) {?>
                  <li class="sub-menu">
                      <a class="active" href="javascript:;"  >
                          <i class="fa fa-users"></i>
                          <span>Usuarios</span>
                      </a>
                      <ul class="sub">
                          <li><a href="GuardarUsuario.php">Registrar Usuario</a></li>
                          <li><a  href="MantenerUsuario.php">Administrar Usuarios</a></li>
                          <li class="active"><a  href="AsignarPrivilegios.php">Asignar Privilegios</a></li>
                          <li><a  href="MantenerPrivilegios.php">Administrar Privilegios</a></li>
                      </ul>
                  </li>
                  <?php } ?>
                  <?php if ($p['menu_idmenu']==2) {?>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-tasks"></i>
                          <span>Actividad</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="MantenerActividad.php">Consultar Actividades</a></li>
                          <li><a  href="GuardarActividad.php">Registrar Actividad</a></li>
                      </ul>
                  </li>
                  <?php } ?>
                  <?php if ($p['menu_idmenu']==3) {?>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-calendar"></i>
                          <span>Periodo</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="MantenerPeriodo.php">Consultar Periodos</a></li>
                          <li><a  href="GuardarPeriodo.php">Registrar Periodo</a></li>
                      </ul>
                  </li>
                  <?php } ?>
                  
                  <?php if ($p['menu_idmenu']==4) {?>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-barcode"></i>
                          <span>Procedimiento</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="MantenerProcedimiento.php">Consultar Procedimientos</a></li>
                          <li><a  href="GuardarProcedimiento.php">Registrar Procedimiento</a></li>
                      </ul>
                  </li>
                  <?php } ?>
                  
                  
                 <?php if ($p['menu_idmenu']==5) {?>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-fax"></i>
                          <span>Ejecutar Schedule</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="SeleccionarSchedule.php">Seleccionar Schedule</a></li>
                          <li><a  href="MisSchedules.php">Mis Schedules</a></li>
                          <li><a  href="SchedulesActivos.php">Schedules Activos</a></li>
                          <li><a  href="SchedulesFinalizados.php">Schedules Finalizados</a></li>
                          <li><a  href="TareasPendientes.php">Tareas Pendientes</a></li>
                      </ul>
                  </li>
                  <?php } ?>                   
                  
                 <?php if ($p['menu_idmenu']==6) {?>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-file-excel-o"></i>
                          <span>Subir Excel</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="GuardarExcel.php">Guardar EXCEL</a></li>
                      </ul>
                  </li>
                  <?php } ?>  
                  
                   <?php } ?>
                  <?php } ?>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-clock-o"></i>
                          <span>Tareas Pendientes</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="TareasPendientes.php">Tareas Pendientes</a></li>
                      </ul>
                  </li>
                  
                       <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-warning"></i>
                          <span>Cambiar Contraseña</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="CambiarContrasenia.php">Cambiar Contraseña</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-lock"></i>
                          <span>Bloquear Sistema</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="lock_screen.php">Bloquear Sistema</a></li>
                      </ul>
                  </li>
                  </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
            <!--sidebar end-->

            <!-- **********************************************************************************************************************************************************
            MAIN CONTENT
            *********************************************************************************************************************************************************** -->
            <!--main content start-->
            <section id="main-content">
                <section class="wrapper">
                    <h3><i class="fa fa-angle-right"></i> ASIGNAR PRIVILEGIOS</h3>

                    <form class="form-horizontal style-form" action="../Controles/Registro/CPrivilegio.php" method="POST">
                        <input type="hidden" id="hiddenusuario" name="hidden_privilegio" value="save">  
                        <input type="hidden" name="idprivi" value="<?php echo $idprivi; ?>"/>

                        <!-- Datos del Usuario -->
                        <div class="row mt">
                            <div class="col-lg-12">
                                <div class="form-panel">
                                    <h4 class="mb"><i class="fa fa-angle-right"></i> Seleccionar Usuario</h4>

                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label">Usuario</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" name="c_usuario" required>
                                                <option>--SELECCIONE--</option>

                                                   <?php foreach ($usuarios2 as $f) {                                                    
                                                    ?>

                                                    <option value="<?php echo $f['usu_idusu']; ?>" <?php if ($usu_idusu == $f['usu_idusu']) echo 'selected'; ?>><?php echo $f['usu_nom_usuario']; ?></option>
                                                <?php } ?>

                                            </select>
                                        </div>
                                    </div>

                                </div>
                            </div><!-- col-lg-12-->      	
                        </div><!-- /row -->

                        <!-- Datos de la Cuenta -->
                        <div class="row mt">
                            <div class="col-lg-12">
                                <div class="form-panel">
                                    <h4 class="mb"><i class="fa fa-angle-right"></i> Seleccionar Menu(s)</h4>
                                    <div class="form-group">                                        
                                        <div class="col-sm-10">                                            
                                            <?php foreach ($menus as $m) { 
                                                    
                                                ?>
                                            
                                            <label class="checkbox-inline">
                                                <input type="checkbox" id="inlineCheckbox<?php echo $m['menu_idmenu']; ?>" name="check_list[]" value="<?php echo $m['menu_idmenu']; ?>" <?php if (isset($_SESSION['accion_privilegio']) && $_SESSION['accion_privilegio'] != '') { if ($menus2 != null) { foreach ($menus2 as $t) { if ($t['menu_idmenu'] == $m['menu_idmenu']) echo 'checked'; }} }?>> <?php echo $m['menu_nombre']; ?>
                                            </label><br>                                            
                                                    <?php } ?>                                   
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label class="col-sm-2 col-sm-2 control-label"></label>
                                        <div class="col-sm-10">
                                            <button type="submit" class="btn btn-theme" data-toggle="modal" data-target="#myModal"><i class="fa fa-check"></i> GUARDAR</button>
                                            <button type="button" class="btn btn-danger" onclick="cancelar();"><i class="fa fa-trash-o"></i> CANCELAR</button>
                                        </div>
                                    </div>


                                </div>
                            </div><!-- col-lg-12-->      

                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            <h4 class="modal-title" id="myModalLabel">Mensaje</h4>
                                        </div>
                                        <div class="modal-body">
                                            Se ha registrado satisfactoriamente los privilegios del usuario.
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                                            <button type="button" class="btn btn-primary">Guardar Cambios</button>
                                        </div>
                                    </div>
                                </div>
                            </div>    
                        </div><!-- /row -->
                    </form>

                    <form  id="formcancelar2" class="form-horizontal style-form" action="../Controles/Registro/CPrivilegio.php" method="POST">

                        <input type="hidden" id="hiddenprivilegio" name="hidden_privilegio" />
                    </form>




                </section><! --/wrapper -->
            </section><!-- /MAIN CONTENT -->

            <!--main content end-->
            <!--footer start-->
            <footer class="site-footer">
                <div class="text-center">
                    2015 - INVERSIONES SERGEL S.A.C.
                    <a href="AsignarPrivilegios.php" class="go-top">
                        <i class="fa fa-angle-up"></i>
                    </a>
                </div>
            </footer>
            <!--footer end-->
        </section>

        <!-- js placed at the end of the document so the pages load faster -->
        <script src="../Recursos/assets/js/jquery.js"></script>
        <script src="../Recursos/assets/js/bootstrap.min.js"></script>
        <script class="include" type="text/javascript" src="../Recursos/assets/js/jquery.dcjqaccordion.2.7.js"></script>
        <script src="../Recursos/assets/js/jquery.scrollTo.min.js"></script>
        <script src="../Recursos/assets/js/jquery.nicescroll.js" type="text/javascript"></script>


        <!--common script for all pages-->
        <script src="../Recursos/assets/js/common-scripts.js"></script>

        <!--script for this page-->
        <script src="../Recursos/assets/js/jquery-ui-1.9.2.custom.min.js"></script>

        <!--custom switch-->
        <script src="../Recursos/assets/js/bootstrap-switch.js"></script>

        <!--custom tagsinput-->
        <script src="../Recursos/assets/js/jquery.tagsinput.js"></script>

        <!--custom checkbox & radio-->

        <script type="text/javascript" src="../Recursos/assets/js/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
        <script type="text/javascript" src="../Recursos/assets/js/bootstrap-daterangepicker/date.js"></script>
        <script type="text/javascript" src="../Recursos/assets/js/bootstrap-daterangepicker/daterangepicker.js"></script>

        <script type="text/javascript" src="../Recursos/assets/js/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
        <script type="text/javascript" src="../Recursos/js/JSGeneral.js"></script>
        <script type="text/javascript" src="../Recursos/js/JSGeneral.js"></script>
        <script src="../Recursos/assets/js/form-component.js"></script>    


        <script>
                                            //custom select box

                                            $(function () {
                                                $('select.styled').customSelect();
                                            });

        </script>

    </body>
</html>
