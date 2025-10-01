<?php 
    include("../library/configuration/conexion.php");
    include("../model/gradoQuery.php");

    $conexion = conectarDB();

    if(isset($_POST["cargarListado"])){

        $resObtener = obtenerListado($conexion);

        ?>
            <div class="content">
                <div class="container">
                    <div class="page-title">
                        <h3>Grados
                            <a href="./nivel.php" class="btn btn-sm btn-outline-primary float-end"><i class='bx bx-collection'></i> Niveles</a>
                            <a href="./clase.php" class="btn btn-sm btn-outline-primary float-end" style="margin-right: 10px;"><i class='bx bx-collection'></i> Clases</a>
                            <a onclick="abrirModal('null', '', '')" class="btn btn-sm btn-outline-primary float-end" style="margin-right: 10px;"><i class='bx bx-plus-circle'></i> Agregar</a>
                        </h3>
                    </div>
                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="box-spacing">
                                <table width="100%" class="table table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Nivel Académico</th>
                                            <th>Grado</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            foreach( $resObtener as $data){
                                                $id          = trim($data["ID_GRADO"]);
                                                $idNivel     = trim($data["ID_NVL"]);
                                                $nombreNivel = trim($data["NOMBRE_NVL"]);
                                                $nombreGrado = trim($data["NOMBRE_GRADO"]);
                                        ?>
                                        <tr>
                                            <td><?php echo $nombreNivel; ?></td>
                                            <td><?php echo $nombreGrado; ?></td>
                                            <td class="text-end">
                                                <a onclick="abrirModal('<?php echo base64_encode($id);?>', '<?php echo base64_encode($idNivel);?>', '<?php echo base64_encode($nombreGrado);?>')"  class="btn btn-outline-info btn-rounded">
                                                    <i class='bx bxs-edit'></i>
                                                </a>
                                                <a 
                                                  onclick="eliminar('<?php echo base64_encode($id);?>')" 
                                                  class="btn btn-outline-danger btn-rounded"
                                                >
                                                    <i class='bx bxs-trash'></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
    }
    if(isset($_POST["datosGrado"])){

        $id         = base64_decode($_POST["id"]);
        $idNivel    = base64_decode($_POST["idNivel"]);
        $nombre     = strtoupper(base64_decode($_POST["nombre"]));

        $validar = validarExistencia($conexion, $idNivel, $nombre);

        if($id == "null"){
            if($validar){
                $insertar = insertar($conexion, $idNivel, $nombre);
                echo ($insertar)? "1":"0";
            }else{
                echo "2";
            }
        }else{
            $actualizar = actualizar($conexion, $id, $idNivel, $nombre);
            echo ($actualizar)? "1":"0";
        }
    }

    if(isset($_POST["eliminar"])){
        
        $id = base64_decode($_POST["id"]);

        $eliminar = eliminar($conexion, $id);
        echo ($eliminar)? "1":"0";
    }
?>
