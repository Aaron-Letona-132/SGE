<?php 

    function obtenerListado($conexion){

        $sql = "SELECT A.ID_PRA,
                        A.ID_ROL,
                        B.NOMBRE_ROL,
                        A.NOMBRE_PRA,
                        A.APELLIDO_PRA,
                        A.CUI_PRA,
                        A.TELEFONO_PRA,
                        A.DIRECCION_PRA,
                        A.CORREO_PRA,
                        A.FECHA_NACIMIENTO_PRA,
                        A.GENERO_PRA,
                        A.CONDICIONES_ESPEC_PRA
                    FROM persona A
                        LEFT JOIN rol B ON A.ID_ROL = B.ID_ROL
                    WHERE A.STATUS_PRA = 'SI'";
        
        $res = mysqli_query($conexion, $sql);

        $arreglo = array();

        while ($row = mysqli_fetch_assoc($res)) {
            $arreglo[] = $row;
        }

        return $arreglo;

    }

    function obtenerRol($conexion){

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

    function validarExistencia($conexion, $rol, $nombre, $apellido){

        $sql = "SELECT * FROM persona 
                WHERE ID_ROL = '$rol' 
                    AND NOMBRE_PRA = '$nombre'  
                    AND APELLIDO_PRA = '$apellido' 
                    AND STATUS_PRA = 'SI'";
        
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

    function insertar($conexion, $rol, $nombre, $apellido, $cui, $telefono, $direccion, $fechaNac, $genero, $condicion, $correo){

        $sql = "INSERT INTO persona (ID_ROL,NOMBRE_PRA,APELLIDO_PRA,CUI_PRA,TELEFONO_PRA,DIRECCION_PRA,CORREO_PRA,FECHA_NACIMIENTO_PRA,GENERO_PRA,CONDICIONES_ESPEC_PRA,STATUS_PRA)
                    VALUES('$rol','$nombre','$apellido','$cui','$telefono','$direccion','$correo','$fechaNac','$genero','$condicion','SI')";

        $resultado = mysqli_query($conexion, $sql);

        return $resultado;

    }

    function actualizar($conexion, $id, $rol, $nombre, $apellido, $cui, $telefono, $direccion, $fechaNac, $genero, $condicion, $correo){

        $sql = "UPDATE persona 
                SET ID_ROL = '$rol',
                    NOMBRE_PRA = '$nombre',
                    APELLIDO_PRA = '$apellido',
                    CUI_PRA = '$cui',
                    TELEFONO_PRA = '$telefono',
                    DIRECCION_PRA = '$direccion',
                    CORREO_PRA = '$correo',
                    FECHA_NACIMIENTO_PRA = '$fechaNac',
                    GENERO_PRA = '$genero',
                    CONDICIONES_ESPEC_PRA = '$condicion'
                WHERE ID_PRA = '$id'";

        $resultado = mysqli_query($conexion, $sql);

        return $resultado;

    }

    function eliminar($conexion, $id){

        $sql = "UPDATE persona SET STATUS_PRA = 'NO' WHERE ID_PRA = '$id'";

        $resultado = mysqli_query($conexion, $sql);

        return $resultado;

    }

?>