<?php 
    include("../../model/usuarioQuery.php");

    $obtener = obtenerPersonas($conexion);

    $linea = "";
    foreach($obtener as $data){
        $id = trim($data["ID_PRA"]);
        $nombre = trim($data["NOMBRE_PRA"]) . " " . trim($data["APELLIDO_PRA"]);

        $linea.= "<option value='$id'>$nombre</option>";
    }
?>

<div class="modal fade" id="modalUsuario" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalUsuario" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cerrarModal()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input id="txtid" type="hidden" value="null" />
                <form id="formNivel">

                    <a class="modal-titulo-contenido">Informacion Personal</a>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="idPra">Personas:</label>
                                <select id="idPra" class="form-control required">
                                    <option value="null">Seleccione una persona...</option>
                                    <?php echo $linea;?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="txtNombre">Contraseña:</label>
                                <input type="text" class="form-control required" id="password">
                            </div>
                        </div>
                    </div>

                </form>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-danger" onclick="cerrarModal()">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="Guardar()">Guardar</button>
            </div>
        </div>
    </div>
</div>