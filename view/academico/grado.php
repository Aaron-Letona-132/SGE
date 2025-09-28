<?php 
    require_once("../../library/widgets/header.php");
?>

    <!--========== CONTENTS ==========-->
            <div class = "contenido_div">
                <div class = "margen_contenido">

                    <div class = "titulo_contenido">
                        <a><i class='bx bxs-user'></i>Mantenimiento Grados</a>
                    </div>
                    <!--AQUI VA EL TABLE Y LO DEMAS-->
                    <!--<div id="divListadoUsuarios"></div>-->

                    <div class="content">
                        <div class="container">
                            <div class="page-title">
                                <h3>Grados
                                    <!--<a href="roles.php" class="btn btn-sm btn-outline-primary float-end"><i class='bx bx-briefcase'></i> Roles</a>-->
                                    <a href="clase.php" class="btn btn-sm btn-outline-primary float-end"><i class='bx bx-briefcase'></i> Regresar</a>
                                    <a href="nivel.php" class="btn btn-sm btn-outline-primary float-end" style="margin-right: 10px;"><i class='bx bx-briefcase'></i> Nivel</a>
                                    <a onclick="abrirModal('null', '', '', '', '', '', '')" class="btn btn-sm btn-outline-primary float-end" style="margin-right: 10px;"><i class='bx bx-plus-circle'></i> Agregar</a>
                                </h3>
                            </div>
                            <div class="box box-primary">
                                <div class="box-body">
                                    <div class="box-spacing">
                                        <table width="100%" class="table table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th>Nivel</th>
                                                    <th>Nombre Grado</th>
                                                    <th>Opciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Basico</td>
                                                    <td>1ro Basico</td>
                                                    <td class="text-end">
                                                        <a onclick="abrirModal('<?php echo base64_encode($id);?>', '<?php echo base64_encode($idPra);?>')" class="btn btn-outline-info btn-rounded"><i class='bx bxs-edit'></i></a>
                                                        <a onclick="eliminar('<?php echo base64_encode($id);?>')" class="btn btn-outline-danger btn-rounded"><i class='bx bxs-trash' ></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Basico</td>
                                                    <td>2do Basico</td>
                                                    <td class="text-end">
                                                        <a onclick="abrirModal('<?php echo base64_encode($id);?>', '<?php echo base64_encode($idPra);?>')" class="btn btn-outline-info btn-rounded"><i class='bx bxs-edit'></i></a>
                                                        <a onclick="eliminar('<?php echo base64_encode($id);?>')" class="btn btn-outline-danger btn-rounded"><i class='bx bxs-trash' ></i></a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Primaria</td>
                                                    <td>1ro Primaria</td>
                                                    <td class="text-end">
                                                        <a onclick="abrirModal('<?php echo base64_encode($id);?>', '<?php echo base64_encode($idPra);?>')" class="btn btn-outline-info btn-rounded"><i class='bx bxs-edit'></i></a>
                                                        <a onclick="eliminar('<?php echo base64_encode($id);?>')" class="btn btn-outline-danger btn-rounded"><i class='bx bxs-trash' ></i></a>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </section>
    </main>

    <?php //include ("../../modal/subUsuarioModal.php")?>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <!--<script src="../../assets/js_sge/usuario.js"></script>
    <script>
        $(document).ready(function(){
            cargarListadoUsuarios();
        });
    </script>-->

<?php 
    require_once("../../library/widgets/footer.php");
?>