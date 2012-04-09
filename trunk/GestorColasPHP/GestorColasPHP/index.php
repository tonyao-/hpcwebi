<?php
print '<?xml version="1.0" encoding="UTF-8"?>';
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>Gestor de cola de procesos IQFR</title>

        <link href="css/estilos.css" rel="stylesheet" type="text/css" />
        <link href="css/login.css" rel="stylesheet" type="text/css" />
        <link href="css/ui-darkness/jquery-ui-1.8.6.custom.css" rel="stylesheet" type="text/css" />
        <link href="css/mbExtruder.css" media="all" rel="stylesheet" type="text/css" />


        <script type="text/javascript" src="inc/jquery-1.7.1.min.js"></script>
        <script type="text/javascript" src="inc/jquery.hoverIntent.min.js"></script>
        <script type="text/javascript" src="inc/jquery.metadata.js"></script>
        <script type="text/javascript" src="inc/jquery.mb.flipText.js"></script>
        <script type="text/javascript" src="inc/mbExtruder.js"></script>

        <script type="text/javascript">
            // Interceptamos el evento submit
            $("#formulario").submit(function() {
                // Enviamos el formulario usando AJAX
                $.ajax({
                    type: "POST",
                    url: "login.php",
		    async:true,
                    data: $(this).serialize(),
                    // Mostramos un mensaje con la respuesta de PHP
                    success: function(data) {
                        $("#formulario").html(data);
                    }
                })
            });
            
            $(function(){
                $("#extruderTop").buildMbExtruder({
                    positionFixed:false,
                    width:320,
                    sensibility:800,
                    position:"top",
                    extruderOpacity:1,
                    flapDim:100,
                    textOrientation:"bt",
                    onExtOpen:function(){},
                    onExtContentLoad:function(){},
                    onExtClose:function(){},
                    hidePanelsOnClose:false,
                    autoCloseTime:0,
		    autoOpenTime:-1,
		    closeOnExternalClick:true,
                    slideTimer:300
                });
            });
        </script>


    </head>

    <body>
        <div class="contenedor">
            <div class="cabecera">
                <div class="rootmenu"></div>
                <div class="submenu">
                    <div class="nav"></div>
                </div>
            </div>


            <div class="estado"></div>

            <div class="contenido">contenido</div>

            <div class="pie">
                <div class="izq">
                    <p>Diseñada y programada por David Armenteros Escabias</p>
                    <p><strong>WebiHPC <a href="www.iqfr.csic.es">Instituto de Química Física Rocasolano</a> | Todos los derechos reservados.</strong></p>
                </div>
                <div class="derch">
                    <a href="http://validator.w3.org/check?uri=referer"><img src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Strict" height="31" width="88" /></a>
                    <a href="http://jigsaw.w3.org/css-validator/check/referer"><img style="border:0;width:88px;height:31px" src="http://jigsaw.w3.org/css-validator/images/vcss" alt="¡CSS Válido!" /></a>
                </div>

            </div>    
        </div>

        <div id="extruderTop" class="{title:'LOGIN'}">
            <div id="bloqueLogin" class="content">
                <?php require_once 'login.php'; ?>
            </div>
        </div>
    </body>
</html>