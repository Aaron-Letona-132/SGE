<?php 
    include("../../model/personaQuery.php");

    $obtenerRol = obtenerRol($conexion);

    $linea = "";
    foreach($obtenerRol as $rol){
        $id = trim($rol["ID_ROL"]);
        $nombreRol = trim($rol["NOMBRE_ROL"]);

        $linea.= "<option value='$id'>$nombreRol</option>";
    }
?>

<div class="modal fade" id="modalPersona" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalPersona" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Persona</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cerrarModal()">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input id="txtid" type="hidden" value="null" />
                <form id="formNivel">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="rol">Rol:</label>
                                <select id="rol" class="form-control required">
                                    <option value="null">Seleccione un rol...</option>
                                    <?php echo $linea;?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="txtNombre">Nombres:</label>
                                <input type="text" class="form-control required" id="nombre">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="txtNombre">Apellidos:</label>
                                <input type="text" class="form-control required" id="apellido">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="txtNombre">Cui:</label>
                                <input type="text" class="form-control required" id="cui">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="txtNombre">Telefono:</label>
                                <input type="text" class="form-control required" id="telefono">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="txtNombre">Correo:</label>
                                <input type="text" class="form-control required" id="correo">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="txtNombre">Direccion:</label>
                                <input type="text" class="form-control required" id="direccion">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="txtNombre">Fecha Nacimiento:</label>
                                <input type="text" class="form-control required" id="fechaNac">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="txtNombre">Genero:</label>
                                <input type="text" class="form-control required" id="genero">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="txtNombre">Condicion Especial:</label>
                                <input type="text" class="form-control required" id="condicionEsp">
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