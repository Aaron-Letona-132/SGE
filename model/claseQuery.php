<?php

function obtenerListado(mysqli $cn){
    $sql = "SELECT c.ID_CURSO, c.ID_GRADO, c.NOMBRE_CURSO, c.STATUS_CURSO,
                   g.NOMBRE_GRADO
            FROM curso c
            LEFT JOIN grado g ON g.ID_GRADO = c.ID_GRADO
            WHERE c.STATUS_CURSO = 'SI'
            ORDER BY c.ID_CURSO DESC";
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

function listarGrados(mysqli $cn){
    $sql = "SELECT ID_GRADO AS id, NOMBRE_GRADO AS nombre
            FROM grado
            WHERE STATUS_GRADO = 'SI'
            ORDER BY NOMBRE_GRADO";
    $res = $cn->query($sql);
    $out = [];
    if($res){
        while($r = $res->fetch_assoc()){
            $out[] = $r;
        }
        $res->free();
    }
    return $out;
}

function validarExistencia($conexion, $idGrado, $nombreCurso){

    $sql = "SELECT *
        FROM curso A
        WHERE A.STATUS_CURSO = 'SI'
            AND A.NOMBRE_CURSO = '$nombreCurso'
            AND A.ID_GRADO = '$idGrado'";
    
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

function insertar($conexion, $idGrado, $nombreCurso){
    $sql = "INSERT INTO curso (ID_GRADO, NOMBRE_CURSO, STATUS_CURSO)
            VALUES('$idGrado','$nombreCurso','SI')";

    $resultado = mysqli_query($conexion, $sql);

    return $resultado;
}

function actualizar($conexion, $id, $idGrado, $nombreCurso){
    $sql = "UPDATE curso 
            SET ID_GRADO = '$idGrado',
                NOMBRE_CURSO = '$nombreCurso'
            WHERE ID_CURSO = '$id'";

    $resultado = mysqli_query($conexion, $sql);

    return $resultado;
}


function eliminar($conexion, $id){
    $sql = "UPDATE curso SET STATUS_CURSO = 'NO' WHERE ID_CURSO = '$id'";

    $resultado = mysqli_query($conexion, $sql);

    return $resultado;
}