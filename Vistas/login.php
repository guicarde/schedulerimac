<?php
session_start();

$disabledSubmit = 1;
$autoRevert = 1;
$autoSubmit = 2;
$js = 'disabledSubmit:true,autoRevert:true,autoSubmit:false';
if (empty($_SESSION)) {
    $_SESSION['mensaje'] = "";
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

    <title>SISTEMA SCHEDULE - IBM</title>

    <!-- Bootstrap core CSS -->
    <link href="../Recursos/assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="../Recursos/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="../Recursos/assets/css/style.css" rel="stylesheet">
    <link href="../Recursos/assets/css/style-responsive.css" rel="stylesheet">
    <style type="text/css">

</style>

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  
  <body onload="nobackbutton();">

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	  <div id="login-page">
	  	<div class="container">
	  	
		      <form class="form-login" action="../Controles/CLogin.php" method="POST">
		        <h2 class="form-login-heading">OPERACIONES RIMAC - RCT</h2>
		        <div class="login-wrap">
		            <input type="text" class="form-control" name="usuario" placeholder="Usuario" required autofocus>
		            <br>
                            <input type="password" class="form-control" name="password" placeholder="Password" required>
                            <?php
                                        if (isset($_SESSION['mensaje']) && $_SESSION['mensaje'] == "Error") {
                                            ?>
                            <br>
                            <br>
                            <div class="alert alert-danger"><b>Error!</b><br> Usuario y/o password ingresados incorrecto(s)!</div> 
                                            <?php
                                            $_SESSION['mensaje'] = "";
                                        }
                                        ?>                            
		            <label class="checkbox">
		                <span class="pull-right">
		                    <a data-toggle="modal" href="login.html#myModal"> Olvidaste Password?</a>
		
		                </span>
		            </label>
		            <button class="btn btn-danger btn-block"  type="submit"><i class="fa fa-lock"></i> INGRESAR</button>
		            <hr>
		            
		           
		            <div class="registration">
		                No tienes una cuenta aún?<br/>
		                <a class="" href="#">
		                    Crear una cuenta
		                </a>
		            </div>
		
		        </div>
		
		          <!-- Modal -->
		          <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
		              <div class="modal-dialog">
		                  <div class="modal-content">
		                      <div class="modal-header">
		                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		                          <h4 class="modal-title">Forgot Password ?</h4>
		                      </div>
		                      <div class="modal-body">
		                          <p>Enter your e-mail address below to reset your password.</p>
		                          <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
		
		                      </div>
		                      <div class="modal-footer">
		                          <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
		                          <button class="btn btn-theme" type="button">Submit</button>
		                      </div>
		                  </div>
		              </div>
		          </div>
		          <!-- modal -->
		
		      </form>	  	
	  	
	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="../Recursos/assets/js/jquery.js"></script>
    <script src="../Recursos/assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="../Recursos/assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("../Recursos/assets/img/new_rimac.png", {speed: 500});
    </script>


  </body>
</html>
