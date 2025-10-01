<?php
    include("../library/configuration/conexion.php");
    include("../model/nivelacademicoQuery.php");

    $conexion = conectarDB();

    if(isset($_POST["cargarListado"])){

        $resObtener = obtenerListado($conexion);
        ?>
            <div class="content">
                <div class="container">
                    <div class="page-title">
                        <h3>Niveles Académicos
                            <a href="./grado.php" class="btn btn-sm btn-outline-primary float-end" style="margin-right: 10px;"><i class='bx bx-layer'></i> Grado</a>
                            <a onclick="abrirModal('null', '')" class="btn btn-sm btn-outline-primary float-end" style="margin-right: 10px;"><i class='bx bx-plus-circle'></i> Agregar</a>
                        </h3>
                    </div>
                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="box-spacing">
                                <table width="100%" class="table table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Nivel Académico</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($resObtener as $data){
                                            $id      = trim($data["ID_NVL"]);
                                            $nombre  = trim($data["NOMBRE_NVL"]);
                                        ?>
                                        <tr>
                                            <td><?php echo $nombre; ?></td>
                                            <td class="text-end">
                                                <a 
                                                  onclick="abrirModal(
                                                    '<?php echo base64_encode($id);?>',
                                                    '<?php echo base64_encode($nombre);?>'
                                                  )" 
                                                  class="btn btn-outline-info btn-rounded"
                                                  title="Editar"
                                                >
                                                    <i class='bx bxs-edit'></i>
                                                </a>
                                                <a 
                                                  onclick="eliminar('<?php echo base64_encode($id);?>')" 
                                                  class="btn btn-outline-danger btn-rounded"
                                                  title="Activar/Desactivar"
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

    if(isset($_POST["datosNivel"])){

        $id     = base64_decode($_POST["id"]);
        $nombre = strtoupper(base64_decode($_POST["nombre"]));                              

        $validar = validarExistencia($conexion, $nombre);

        if($id == "null"){
            if($validar){
                $ok = insertar($conexion, $nombre);
                echo ($ok)? "1":"0";   
            }else{
                echo "2";               
            }
        }else{
            
            $ok = actualizar($conexion, $id, $nombre);
            echo ($ok)? "1":"0";
                
        }
    }


    if(isset($_POST["eliminar"])){
        $id = base64_decode($_POST["id"]);

        $ok = eliminar($conexion, $id);
        echo ($ok)? "1":"0";
    }
?>
