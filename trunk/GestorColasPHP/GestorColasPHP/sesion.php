<?php
set_include_path(get_include_path() . PATH_SEPARATOR . 'phpseclib');
require_once('Net/SSH2.php');

    
    function creaSesion($usuario, $contrasenia){
            //Expira la sesion en 30 minutos
            session_cache_expire(30);
            //session_set_cookie_params ( int $lifetime [, string $path [, string $domain [, bool $secure = false [, bool $httponly = false ]]]] )

            session_name($usuario);
            
            //Se crea la sesion
            session_start();
            $_SESSION['nombre_usuario'] = $usuario;
            $_SESSION['pass_acceso'] = $contrasenia;
            $_SESSION['conectado_exito'] = 'SI';
    }
    
    function conectado(){
        if(isset ($_SESSION['conectado_exito'])){
            return ($_SESSION['conectado_exito']=='SI')? true : false;
        }
        return false;
    }
    
    function getUsuario(){
        if(isset ($_SESSION['nombre_usuario'])){
            return $_SESSION['nombre_usuario'];
        }
        
        return '';
    }

    function cierraSesion(){
        session_start();
        session_unset();
        session_destroy();   
    }

    function conectaSSH($usuario, $contrasenia, $host){
	$ssh = new Net_SSH2($host);
	if (!$ssh->login($usuario, $contrasenia)) {
	    return 0;
	}
	else{
	  return 'Se ha conectado correctamente\n'.$ssh->exec('ls -l /home/david');;
	}

	return 0;
    }
?>
