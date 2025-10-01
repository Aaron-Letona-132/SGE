<?php

function obtenerListado(mysqli $cn){
    $sql = "SELECT g.ID_GRADO, g.ID_NVL, g.NOMBRE_GRADO,
                   n.NOMBRE_NVL
            FROM grado g
            LEFT JOIN nivelacademico n ON n.ID_NVL = g.ID_NVL
                WHERE STATUS_GRADO = 'SI'
            ORDER BY g.ID_GRADO DESC";
    $res = $cn->query($sql);
    $data = [];
    if($res){
        while($row = $res->fetch_assoc()){
            $data[] = $row;
        }
        $res->free();
    }
    return $data;
}

function obtenerListadoNivel(mysqli $cn){
    $sql = "SELECT ID_NVL,
                    NOMBRE_NVL
            FROM nivelacademico
                WHERE STATUS_NVL = 'SI'
            ORDER BY ID_NVL DESC";
    $res = $cn->query($sql);
    $data = [];
    if($res){
        while($row = $res->fetch_assoc()){
            $data[] = $row;
        }
        $res->free();
    }
    return $data;
}

function validarExistencia($conexion, $idNivel, $nombreGrado){
    $sql = "SELECT *
        FROM grado
        WHERE STATUS_GRADO = 'SI'
            AND NOMBRE_GRADO = '$nombreGrado'
            AND ID_NVL = '$idNivel'";
    
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

function insertar($conexion, $idNivel, $nombreGrado){
    $sql = "INSERT INTO grado (ID_NVL, NOMBRE_GRADO, STATUS_GRADO)
            VALUES('$idNivel','$nombreGrado','SI')";

    $resultado = mysqli_query($conexion, $sql);

    return $resultado;
}

function actualizar($conexion, $id, $idNivel, $nombreGrado){
    $sql = "UPDATE grado 
            SET ID_NVL = '$idNivel',
                NOMBRE_GRADO = '$nombreGrado'
            WHERE ID_GRADO = '$id'";

    $resultado = mysqli_query($conexion, $sql);

    return $resultado;
}

function eliminar($conexion, $id){
    $sql = "UPDATE grado SET STATUS_GRADO = 'NO' WHERE ID_GRADO = '$id'";

    $resultado = mysqli_query($conexion, $sql);

    return $resultado;
}
