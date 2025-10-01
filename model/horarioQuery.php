<?php

function obtenerListado(mysqli $cn){
    $sql = "SELECT ID_HORARIO, HORA_INICIO, HORA_FIN, DIA
            FROM horario
            WHERE STATUS = 'SI'
            ORDER BY ID_HORARIO DESC";
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


function validarExistencia($conexion, $hIni, $hFin, $dia){
     $sql = "SELECT *
        FROM horario
        WHERE STATUS = 'SI'
            AND HORA_INICIO = '$hIni'
            AND HORA_FIN = '$hFin'
            AND DIA = '$dia'";
    
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

function insertar($conexion, $hIni, $hFin, $dia){
    $sql = "INSERT INTO horario (HORA_INICIO, HORA_FIN, DIA, STATUS)
            VALUES('$hIni','$hFin','$dia','SI')";

    $resultado = mysqli_query($conexion, $sql);

    return $resultado;
}

function actualizar($conexion, $id, $hIni, $hFin, $dia){
    $sql = "UPDATE horario 
            SET HORA_INICIO = '$hIni',
                HORA_FIN = '$hFin',
                DIA = '$dia'
            WHERE ID_HORARIO = '$id'";

    $resultado = mysqli_query($conexion, $sql);

    return $resultado;
}

function eliminar($conexion, $id){
    $sql = "UPDATE horario SET STATUS = 'NO' WHERE ID_HORARIO = '$id'";

    $resultado = mysqli_query($conexion, $sql);

    return $resultado;
}
