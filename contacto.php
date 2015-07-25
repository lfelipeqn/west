<?php
if (isset($_POST["submit"])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $message = $_POST['message'];
        $contact = $_POST['contacto'];
        $from = 'Administrador Web'; 
        $to = 'lfelipeqn@gmail.com'; 
        $subject = 'Mensaje desde West Engineering ';
        
        $body = "De: $name\n No. Contacto: $contact\n E-Mail: $email\n Mensage:\n $message";
 
        // Check if name has been entered
        if (!$_POST['name']) {
            $errName = 'Ingrese su nombre';
        }
        //Check if simple anti-bot test is correct
        if (!$_POST['contacto']) {
            $errContact = 'Digite su número de contacto';
        }
        // Check if email has been entered and is valid
        if (!$_POST['email'] || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $errEmail = 'Ingrese su dirección de correo';
        }
        
        //Check if message has been entered
        if (!$_POST['message']) {
            $errMessage = 'Ingrese su mensaje';
        }
        
 
// If there are no errors, send the email
    if (!$errName && !$errEmail && !$errMessage && !$errHuman) {
        if (mail ($to, $subject, $body, $from)) {
            $result='<div class="alert alert-success">Muchas Gracias! Estaremos en contacto próximamente, </div>';
        } else {
            $result='<div class="alert alert-danger">Se ha presentado un error. Intente enviar su mensaje Nuevamente</div>';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="iso8859-1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="cache-control" content="no-cache">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>West Ingenieria</title>

    <!-- Bootstrap -->
    
    <link href="css/bootstrap.min.css" rel="stylesheet"> 
    <link href="css/menu.css" rel="stylesheet"> 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="js/jquery.bxslider/jquery.bxslider.min.js"></script>
    <link href="js/jquery.bxslider/jquery.bxslider.css" rel="stylesheet" />
    
    
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
      <div class="container">
      <div class="row">
        <div class="col-md-4 contenedor2">
            <div class="logo2"><a href="index.html"><img src="img/Logo.png" width="80px" /></a></div>
            <div class="seccion"><span style="text-shadow: 1px 3px 9px #330066;">Contacto</span></div>
            <div>
                <h3>&nbsp;</h3>
                <h3>&nbsp;</h3>
                <h3>&nbsp;</h3>
                <h3>&nbsp;</h3>
                <h3>&nbsp;</h3>
            </div>
        </div>
        <div class="col-md-8">
            <div class="pre-menu"></div>
            <nav class="navbar menu">
                <a href="ingenieria.html"><button type="button" class="btn btn-default navbar-btn">Ingenieria</button></a>
                <a href="suministros.html"><button type="button" class="btn btn-default navbar-btn">Suministros</button></a>
                <a href="obras.html"><button type="button" class="btn btn-default navbar-btn">Obras</button></a>
                <a href="servicios.html"><button type="button" class="btn btn-default navbar-btn">Servicios</button></a>
                <a href="mantenimiento.html"><button type="button" class="btn btn-default navbar-btn">Mantenimiento</button></a>
                <a href="gerencia.html"><button type="button" class="btn btn-default navbar-btn">Gerencia</button></a>
                <a href="clientes.html"><button type="button" class="btn btn-default navbar-btn">Clientes</button></a>
            </nav>
            <div>
                &nbsp;
                <form class="form-horizontal contacto" role="form" method="post" action="contacto.php" style="width: 80%;">
                    <?php 
                        if(isset($result)){
                            echo $result;
                        }else{
                    ?>
                        <div class="form-group">
                            <label for="name" class="col-sm-2 control-label">Nombre</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name" name="name" placeholder="Nombre y Apellido" value="">
                                <?php echo "<p class='text-danger'>$errName</p>";?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="contact" class="col-sm-2 control-label">No.Contacto</label>
                            <div class="col-sm-10">
                                <input type="tel" class="form-control" id="contacto" name="contacto" placeholder="315123456" value="">
                                <?php echo "<p class='text-danger'>$errContact</p>";?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="email" class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-10">
                                <input type="email" class="form-control" id="email" name="email" placeholder="example@correo.com" value="">
                                <?php echo "<p class='text-danger'>$errEmail</p>";?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="message" class="col-sm-2 control-label">Mensaje</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" rows="4" name="message" placeholder="Peticiones, Quejas y Reclamos"></textarea>
                                <?php echo "<p class='text-danger'>$errMessage</p>";?>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2">
                                <input id="submit" name="submit" type="submit" value="Enviar" class="btn btn-primary">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-10 col-sm-offset-2"></div>
                        </div>
                    <?php
                        }
                    ?>
                </form>
            </div>
        </div>
      </div>
      </div>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
