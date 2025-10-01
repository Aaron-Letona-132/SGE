<?php

function obtenerListado(mysqli $cn){
    $sql = "SELECT ID_NVL, NOMBRE_NVL
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

function validarExistencia($conexion, $nombreNivel){
    $sql = "SELECT *
        FROM nivelacademico
        WHERE STATUS_NVL = 'SI'
            AND NOMBRE_NVL = '$nombreNivel'";
    
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

function insertar($conexion, $nombreNivel){
    $sql = "INSERT INTO nivelacademico (NOMBRE_NVL, STATUS_NVL)
            VALUES('$nombreNivel','SI')";

    $resultado = mysqli_query($conexion, $sql);

    return $resultado;
}

function actualizar($conexion, $id, $nombreNivel){
    $sql = "UPDATE nivelacademico 
            SET NOMBRE_NVL = '$nombreNivel'
            WHERE ID_NVL = '$id'";

    $resultado = mysqli_query($conexion, $sql);

    return $resultado;
}

function eliminar($conexion, $id){
    $sql = "UPDATE nivelacademico SET STATUS_NVL = 'NO' WHERE ID_NVL = '$id'";

    $resultado = mysqli_query($conexion, $sql);

    return $resultado;
}
