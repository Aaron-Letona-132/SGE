<?php 

    function obtenerListado($conexion){

        $sql = "SELECT  A.ID_USR,
                        A.ID_PRA,
                        B.NOMBRE_PRA,
                        B.APELLIDO_PRA
                    FROM usuario A
                        LEFT JOIN persona B ON A.ID_PRA = B.ID_PRA
                    WHERE A.STATUS_USR = 'SI'";
        
        $res = mysqli_query($conexion, $sql);

        $arreglo = array();

        while ($row = mysqli_fetch_assoc($res)) {
            $arreglo[] = $row;
        }

        return $arreglo;

    }

    function obtenerPersonas($conexion){

        $sql = "SELECT ID_PRA,
                        NOMBRE_PRA,
                        APELLIDO_PRA
                    FROM persona
                    WHERE STATUS_PRA = 'SI'";
        
        $res = mysqli_query($conexion, $sql);

        $arreglo = array();

        while ($row = mysqli_fetch_assoc($res)) {
            $arreglo[] = $row;
        }

        return $arreglo;

    }

    function validarExistencia($conexion, $idPra){

        $sql = "SELECT * FROM usuario 
                WHERE ID_PRA = '$idPra'
                    AND STATUS_USR = 'SI'";
        
        $res = mysqli_query($conexion, $sql);

        $arreglo = array();
        $j = 0;
        $boolean = false;

        while ($row = mysqli_fetch_assoc($res)) {
            $arreglo[] = $row;
            $j ++;
        }

        if($j > 0){
            $boolean = false;
        }else{
            $boolean = true;
        }

        return $boolean;

    }

    function insertar($conexion, $idPra, $password){

        $idPra = mysqli_real_escape_string($conexion, $idPra);

        $sql = "INSERT INTO usuario (ID_PRA,PASSWORD_USR,STATUS_USR)
                    VALUES('$idPra','$password','SI')";

        $resultado = mysqli_query($conexion, $sql);

        return $resultado;

    }

    function eliminar($conexion, $id){

        $sql = "UPDATE usuario SET STATUS_USR = 'NO' WHERE ID_USR = '$id'";

        $resultado = mysqli_query($conexion, $sql);

        return $resultado;

    }

?>