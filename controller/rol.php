<?php 
    include("../library/configuration/conexion.php");
    include("../model/rolQuery.php");

    $conexion = conectarDB();

    if(isset($_POST["cargarListadoRol"])){

        $resObtener = obtenerListado($conexion);

        ?>
            <div class="content">
                <div class="container">
                    <div class="page-title">
                        <h3>Roles
                            <a href="../administracion/persona.php" class="btn btn-sm btn-outline-primary float-end"><i class='bx bx-briefcase'></i> Regresar</a>
                            <a onclick="abrirModal('null', '')" class="btn btn-sm btn-outline-primary float-end" style="margin-right: 10px;"><i class='bx bx-plus-circle'></i> Agregar</a>
                        </h3>
                    </div>
                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="box-spacing">
                                <table width="100%" class="table table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Nombre Rol</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            foreach( $resObtener as $data){
                                                $id = trim($data["ID_ROL"]);
                                                $nombre = trim($data["NOMBRE_ROL"]);
                                        ?>
                                        <tr>
                                            <td><?php echo $nombre;?></td>
                                            <td class="text-end">
                                                <a onclick="abrirModal('<?php echo base64_encode($id);?>', '<?php echo base64_encode($nombre);?>')" class="btn btn-outline-info btn-rounded"><i class='bx bxs-edit'></i></a>
                                                <a onclick="eliminar('<?php echo base64_encode($id);?>')" class="btn btn-outline-danger btn-rounded"><i class='bx bxs-trash' ></i></a>
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

    if(isset($_POST["datosUsuario"])){

        $id = base64_decode($_POST["id"]);
        $rol = strtoupper(base64_decode($_POST["rol"]));

        $validar = validarExistencia($conexion, $rol);

        if( $id == "null"){

            if($validar){

                $insertar = insertar($conexion, $rol);
                echo ($insertar)? "1":"0";

            }else{
                echo "2";
            }

        }else{

            $actualizar = actualizar($conexion, $id, $rol);
            echo ($actualizar)? "1":"0";

        }

    }

    if(isset($_POST["eliminar"])){
        
        $id = base64_decode($_POST["id"]);

        $eliminar = eliminar($conexion, $id);
        echo ($eliminar)? "1":"0";

    }
?>