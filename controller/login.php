<?php 
    session_start();
    include("../library/configuration/conexion.php");
    include("../model/loginQuery.php");

    $conexion = conectarDB();

    if(isset($_POST["loginValidar"])) {
        $correo = strtoupper(base64_decode($_POST["correo"]));
        $password = strtoupper(base64_decode($_POST["password"]));

        $validacionExiste = validarUsuario($conexion, $correo, $password);

        if($validacionExiste){

            $_SESSION['correo'] = $correo;

            echo "1";

        }else{

            echo "2";

        }

    }

    if(isset($_POST["recoveryPassword"])) {
        $correo = strtoupper(base64_decode($_POST["correo"]));

        $obtenerPassword = obtenerPassword($conexion, $correo);

        if ( $obtenerPassword ) {

            $title = "Recuperar mi contraseña sistema SGE";
            $body = "Un gusto saludarte, tu contraseña que tienes vinculada a este correo electronico es la siguiente: " . $obtenerPassword;

            $email = sendEmail($correo, $title, $body);

            if ( $email == "200" ) {

                echo "1";

            } else {
                echo "0";
            }

        } else {

            echo "0";

        }
    }

?>