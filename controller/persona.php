<?php 
    include("../library/configuration/conexion.php");
    include("../model/personaQuery.php");

    $conexion = conectarDB();

    if(isset($_POST["cargarListado"])){

        $resObtener = obtenerListado($conexion);

        ?>
            <div class="content">
                <div class="container">
                    <div class="page-title">
                        <h3>Roles
                            <a href="./rol.php" class="btn btn-sm btn-outline-primary float-end"><i class='bx bx-briefcase'></i> Roles</a>
                            <a onclick="abrirModal('null', '')" class="btn btn-sm btn-outline-primary float-end" style="margin-right: 10px;"><i class='bx bx-plus-circle'></i> Agregar</a>
                        </h3>
                    </div>
                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="box-spacing">
                                <table width="100%" class="table table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Rol</th>
                                            <th>Nombre</th>
                                            <th>CUI</th>
                                            <th>Telefono</th>
                                            <th>Direccion</th>
                                            <th>Correo</th>
                                            <th>Fecha Nacimiento</th>
                                            <th>Genero</th>
                                            <th>Condicion Especial</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            foreach( $resObtener as $data){
                                                $id = trim($data["ID_PRA"]);
                                                $idRol = trim($data["ID_ROL"]);
                                                $nombreRol = trim($data["NOMBRE_ROL"]);
                                                $primerNombre = trim($data["NOMBRE_PRA"]);
                                                $segundoNombre = trim($data["APELLIDO_PRA"]);
                                                $nombre = $primerNombre . " " . $segundoNombre;
                                                $cui = trim($data["CUI_PRA"]);
                                                $telefono = trim($data["TELEFONO_PRA"]);
                                                $direccion = trim($data["DIRECCION_PRA"]);
                                                $correo = trim($data["CORREO_PRA"]);
                                                $fechaNac = trim($data["FECHA_NACIMIENTO_PRA"]);
                                                $genero = trim($data["GENERO_PRA"]);
                                                $condicionEspecial = trim($data["CONDICIONES_ESPEC_PRA"]);
                                        ?>
                                        <tr>
                                            <td><?php echo $nombreRol;?></td>
                                            <td><?php echo $nombre;?></td>
                                            <td><?php echo $cui;?></td>
                                            <td><?php echo $telefono;?></td>
                                            <td><?php echo $direccion;?></td>
                                            <td><?php echo $correo;?></td>
                                            <td><?php echo $fechaNac;?></td>
                                            <td><?php echo $genero;?></td>
                                            <td><?php echo $condicionEspecial;?></td>
                                            <td class="text-end">
                                                <a onclick="abrirModal('<?php echo base64_encode($id);?>', '<?php echo base64_encode($idRol);?>'
                                                , '<?php echo base64_encode($primerNombre);?>', '<?php echo base64_encode($segundoNombre);?>', '<?php echo base64_encode($cui);?>'
                                                , '<?php echo base64_encode($telefono);?>', '<?php echo base64_encode($direccion);?>', '<?php echo base64_encode($correo);?>'
                                                , '<?php echo base64_encode($fechaNac);?>', '<?php echo base64_encode($genero);?>', '<?php echo base64_encode($condicionEspecial);?>')" class="btn btn-outline-info btn-rounded"><i class='bx bxs-edit'></i></a>
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
        $rol = base64_decode($_POST["rol"]);
        $nombre = strtoupper(base64_decode($_POST["nombre"]));
        $apellido = strtoupper(base64_decode($_POST["apellido"]));
        $cui = base64_decode($_POST["cui"]);
        $telefono = strtoupper(base64_decode($_POST["telefono"]));
        $direccion = strtoupper(base64_decode($_POST["direccion"]));
        $fechaNac = strtoupper(base64_decode($_POST["fechaNac"]));
        $genero = strtoupper(base64_decode($_POST["genero"]));
        $condicion = strtoupper(base64_decode($_POST["condicion"]));
        $correo = strtoupper(base64_decode($_POST["correo"]));

        $validar = validarExistencia($conexion, $rol, $nombre, $apellido);

        if( $id == "null"){

            if($validar){

                $insertar = insertar($conexion, $rol, $nombre, $apellido, $cui, $telefono, $direccion, $fechaNac, $genero, $condicion, $correo);
                echo ($insertar)? "1":"0";

            }else{
                echo "2";
            }

        }else{

            $actualizar = actualizar($conexion, $id, $rol, $nombre, $apellido, $cui, $telefono, $direccion, $fechaNac, $genero, $condicion, $correo);
            echo ($actualizar)? "1":"0";

        }

    }

    if(isset($_POST["eliminar"])){
        
        $id = base64_decode($_POST["id"]);

        $eliminar = eliminar($conexion, $id);
        echo ($eliminar)? "1":"0";

    }
?>