<?php 
    include("../library/configuration/conexion.php");
    include("../model/usuarioQuery.php");

    $conexion = conectarDB();

    if(isset($_POST["cargarListado"])){

        $resObtener = obtenerListado($conexion);

        ?>
            <div class="content">
                <div class="container">
                    <div class="page-title">
                        <h3>Usuario
                            <a onclick="abrirModal('null', 'null', '')" class="btn btn-sm btn-outline-primary float-end" style="margin-right: 10px;"><i class='bx bx-plus-circle'></i> Agregar</a>
                        </h3>
                    </div>
                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="box-spacing">
                                <table width="100%" class="table table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Nombre</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            foreach( $resObtener as $data){
                                                $id = trim($data["ID_USR"]);
                                                $idPra = trim($data["ID_PRA"]);
                                                $nombre = trim($data["NOMBRE_PRA"]);
                                                $apellido = trim($data["APELLIDO_PRA"]);
                                                $nombreCompleto = $nombre . " " . $apellido;
                                        ?>
                                        <tr>
                                            <td><?php echo $nombreCompleto;?></td>
                                            <td class="text-end">
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
        $idPra = base64_decode($_POST["idPra"]);
        $password = base64_decode($_POST["password"]);

        $validar = validarExistencia($conexion, $idPra);

        if($validar){

            $insertar = insertar($conexion, $idPra, $password);
            echo ($insertar)? "1":"0";

        }else{
            echo "2";
        }

    }

    if(isset($_POST["eliminar"])){
        
        $id = base64_decode($_POST["id"]);

        $eliminar = eliminar($conexion, $id);
        echo ($eliminar)? "1":"0";

    }
?>