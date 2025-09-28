<?php 
    
    function validarUsuario($conexion, $correo, $password){

        $correo = mysqli_real_escape_string($conexion, $correo);
        $password = mysqli_real_escape_string($conexion, $password);

        $stmt = $conexion->prepare("SELECT A.*
                                        FROM usuario A
                                    LEFT JOIN persona B ON A.ID_PRA = B.ID_PRA
                                    WHERE A.PASSWORD_USR = ?
                                        AND B.CORREO_PRA = ?
                                        AND A.STATUS_USR = 'SI'
                                        AND B.STATUS_PRA = 'SI'");
        $stmt->bind_param("ss", $password, $correo);
    
        $stmt->execute();
    
        $stmt->store_result();
        $num_rows = $stmt->num_rows;
    
        $stmt->close();
    
        if ($num_rows > 0) {
            return true;
        } else {
            return false;
        }

    }

    function obtenerPassword($conexion, $correo) {

        $sql = "SELECT A.PASSWORD_USR
                    FROM usuario A
                LEFT JOIN persona B ON A.ID_PRA = B.ID_PRA
                WHERE B.CORREO_PRA = '$correo'
                    AND A.STATUS_USR = 'SI'
                    AND B.STATUS_PRA = 'SI'";
        
        $res = mysqli_query($conexion, $sql);

        $arreglo = array();

        while ($row = mysqli_fetch_assoc($res)) {
            $arreglo[] = $row;
        }

        foreach ($arreglo as $password){
            $password = trim($correlativo["PASSWORD_USR"]);
        }

        return $password;

    }

?>