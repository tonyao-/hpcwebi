<?php

require_once 'sesion.php';

//Codigo de error
$error = 0;

//Proviene de introducir usuario y contraseña para loguearse
if (isset($_POST['login'])) {
    if (!empty($_POST['user']) && !empty($_POST['pass'])) {

        $usuario = $_POST["user"];
        $contrasenia = $_POST["pass"];

        $valido = conectaSSH($usuario, $contrasenia, 'localhost');

        if ($valido == 0) {
            //Usuario o contraseña no validos
            mensajeLoginError("Usuario o contraseña no válidos");
            $error = 1;
            
        } else {
	    creaSesion($usuario, $contrasenia);
            //Usuario logueado
            mensajeLogueado($usuario);
	    mensaje($valido);
            $error = 0;
        }
    } else { //Datos mal introducidos
        mensajeLoginError("Introduzca correctamente usuario y contraseña");
        $error = -1;
    }
} else {
    //Proviene de desloguearse
    if (isset($_POST['logout'])) {
        //Usuario deslogueado	
        cierraSesion();
        mensajeLogout();
    } else {
        //MENSAJE DE LOGIN PRIMERO
        mensajeLogin();
    }
}


return 0;

function mensajeLogin() {
    echo '<form id="formulario" action="' . $_SERVER['PHP_SELF'] . '" method="post">';

    echo '<div>
		    <label for="usuario">Login <span class="small">Introduce tu usuario</span></label>
		    <input id="usuario" class="campo" type="text" name="user" size="20" />
	      </div>';
    echo '<div>
		    <label for="password">Contraseña <span class="small">Introduce tu contraseña</span></label>
		    <input class="campo" id="password" type="password" name="pass" size="20" /></label>
	      </div>';
    echo '<input class="boton" name="login" type="submit" value="Entrar" />';
    echo '</form>';
}

function mensajeLogueado($usuario) {
    echo '<form id="formulario" action="' . $_SERVER['PHP_SELF'] . '" method="post">';
    mensaje("El usuario ".$usuario. " está logueado");
    echo '<div><input id="logout"type="submit" name="logout" value="logout" /></div>';
    echo '</form>';
}

function mensajeLogout() {
    mensaje('La sesión se cerró correctamente');
    mensajeLogin();
}

function mensajeLoginError($error) {
    echo '<div class="ui-widget">
			<div class="ui-state-error ui-corner-all"> 
				<div><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span>' . $error . '</div>
			</div>
              </div>';

    mensajeLogin();
}

function mensaje($mensaje) {
    echo '<div class="ui-widget">
                    <div class="ui-state-highlight ui-corner-all"> 
                        <div><span class="ui-icon ui-icon-info" style="float: left; margin-right: .3em;"></span>' . $mensaje . '</div>
                    </div>
             </div>';
}

?>