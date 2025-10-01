<?php 
    include("../library/configuration/conexion.php");
    include("../model/horarioQuery.php");

    $conexion = conectarDB();

    if(isset($_POST["cargarListado"])){

        $resObtener = obtenerListado($conexion);
        ?>
            <div class="content">
                <div class="container">
                    <div class="page-title">
                        <h3>Horarios
                            <a onclick="abrirModal('null', '', '', '<?php echo base64_encode('1');?>')" class="btn btn-sm btn-outline-primary float-end" style="margin-right: 10px;"><i class='bx bx-plus-circle'></i> Agregar</a>
                        </h3>
                    </div>
                    <div class="box box-primary">
                        <div class="box-body">
                            <div class="box-spacing">
                                <table width="100%" class="table table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>Hora Inicio</th>
                                            <th>Hora Fin</th>
                                            <th>Día</th>
                                            <th>Opciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                            foreach( $resObtener as $data){
                                                $id     = trim($data["ID_HORARIO"]);
                                                $hIni   = trim($data["HORA_INICIO"]);
                                                $hFin   = trim($data["HORA_FIN"]);
                                                $dia    = (int)trim($data["DIA"]);

                                                $dias = [1=>'Lunes',2=>'Martes',3=>'Miércoles',4=>'Jueves',5=>'Viernes',6=>'Sábado',7=>'Domingo'];
                                                $diaTxt = isset($dias[$dia]) ? $dias[$dia] : $dia;
                                        ?>
                                        <tr>
                                            <td><?php echo $hIni; ?></td>
                                            <td><?php echo $hFin; ?></td>
                                            <td><?php echo $diaTxt; ?></td>
                                            <td class="text-end">
                                                <a 
                                                  onclick="abrirModal(
                                                    '<?php echo base64_encode($id);?>',
                                                    '<?php echo base64_encode($hIni);?>',
                                                    '<?php echo base64_encode($hFin);?>',
                                                    '<?php echo base64_encode($dia);?>'
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


    if(isset($_POST["datosHorario"])){

        $id     = base64_decode($_POST["id"]);       
        $hIni   = base64_decode($_POST["hInicio"]);  
        $hFin   = base64_decode($_POST["hFin"]);     
        $dia    = (int)base64_decode($_POST["dia"]);   

        if (strlen($hIni) < 4 || strlen($hFin) < 4 || $hIni >= $hFin) {
            echo "0"; 
            exit;
        }
        if ($dia < 1 || $dia > 7) {
            echo "0";
            exit;
        }

        $validar = validarExistencia($conexion, $hIni, $hFin, $dia);

        if($id == "null"){
            if($validar){
                $ok = insertar($conexion, $hIni, $hFin, $dia);
                echo ($ok)? "1":"0";  
            }else{
                echo "2";             
            }
        }else{
            $ok = actualizar($conexion, (int)$id, $hIni, $hFin, $dia);
            echo ($ok)? "1":"0";
        }
    }

    if(isset($_POST["eliminar"])){
        $id = (int)base64_decode($_POST["id"]);
        
        $ok = eliminar($conexion, $id);
        echo ($ok)? "1":"0";
    }
?>
