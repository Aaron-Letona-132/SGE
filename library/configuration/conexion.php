<?php

    function conectarDB(){

        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "sge";

        $conn = new mysqli($servername, $username, $password, $database);

        return $conn;

    }

    function cerrarConexion($conexion){

        $respuesta = $conexion->close();

        return $respuesta;

    }
    
?>