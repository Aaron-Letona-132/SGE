<?php 

    include("../library/configuration/conexion.php");
    include("../model/claseQuery.php");

    $conexion = conectarDB();

    if(isset($_POST["cargarListado"])){

        $resObtener = obtenerListado($conexion);

        ?>
            <div class="content">
                <div class="container">
                    <div class="page-title">
                        <h3>Clases
                            <a href="./grado.php" class="btn btn-sm btn-outline-primary float-end"><i class='bx bx-book'></i> Grados</a>
                            <a onclick="abrirModal('null', '', '', 'SI')" class="btn btn-sm btn-outline-primary float-end" style="margin-right: 10px;"><i class='bx bx-plus-circle'></i> Agregar</a>
                        </h3>
                    </div>
                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="box-spacing">
                                <table width="100%" class="table table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Grado</th>
                                            <th>Curso</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            foreach( $resObtener as $data){
                                                $id          = trim($data["ID_CURSO"]);
                                                $idGrado     = trim($data["ID_GRADO"]);
                                                $nombreGrado = trim($data["NOMBRE_GRADO"]);
                                                $nombreCurso = trim($data["NOMBRE_CURSO"]);
                                        ?>
                                        <tr>
                                            <td><?php echo $nombreGrado; ?></td>
                                            <td><?php echo $nombreCurso; ?></td>
                                            <td class="text-end">
                                                <a 
                                                  onclick="abrirModal(
                                                    '<?php echo base64_encode($id);?>', 
                                                    '<?php echo base64_encode($idGrado);?>',
                                                    '<?php echo base64_encode($nombreCurso);?>'
                                                  )" 
                                                  class="btn btn-outline-info btn-rounded"
                                                  title="Editar"
                                                >
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


    if(isset($_POST["datosClase"])){

        $id      = base64_decode($_POST["id"]);          
        $idGrado = base64_decode($_POST["idGrado"]);     
        $nombre  = strtoupper(base64_decode($_POST["nombre"]));                      

        $validar = validarExistencia($conexion, $idGrado, $nombre);

        if($id == "null"){

            if($validar){

                $ok = insertar($conexion, $idGrado, $nombre);
                echo ($ok)? "1":"0";  
                 
            }else{
                echo "2";            
            }

        }else{

            $ok = actualizar($conexion, $id, $idGrado, $nombre);
            echo ($ok)? "1":"0";

        }
    }

    if(isset($_POST["eliminar"])){
        $id = base64_decode($_POST["id"]);
        
        $ok = eliminar($conexion, $id);
        echo ($ok)? "1":"0";
    }

?>
