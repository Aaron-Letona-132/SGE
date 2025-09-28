<?php 

    function obtenerListado($conexion){

        $sql = "SELECT ID_ROL,
                       NOMBRE_ROL
                FROM rol
                WHERE STATUS_ROL = 'SI'";
        
        $res = mysqli_query($conexion, $sql);

        $arreglo = array();

        while ($row = mysqli_fetch_assoc($res)) {
            $arreglo[] = $row;
        }

        return $arreglo;

    }

    function validarExistencia($conexion, $rol){

        $sql = "SELECT * FROM rol WHERE NOMBRE_ROL = '$rol' AND STATUS_ROL = 'SI'";
        
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

    function insertar($conexion, $rol){

        $rol = mysqli_real_escape_string($conexion, $rol);

        $sql = "INSERT INTO rol (NOMBRE_ROL, STATUS_ROL)
                    VALUES('$rol','SI')";

        $resultado = mysqli_query($conexion, $sql);

        return $resultado;

    }

    function actualizar($conexion, $id, $rol){

        $rol = mysqli_real_escape_string($conexion, $rol);

        $sql = "UPDATE rol SET NOMBRE_ROL = '$rol' WHERE ID_ROL = '$id'";

        $resultado = mysqli_query($conexion, $sql);

        return $resultado;

    }

    function eliminar($conexion, $id){

        $sql = "UPDATE rol SET STATUS_ROL = 'NO' WHERE ID_ROL = '$id'";

        $resultado = mysqli_query($conexion, $sql);

        return $resultado;

    }

?>