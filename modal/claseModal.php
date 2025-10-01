<?php 
    include("../../model/claseQuery.php");
    $grados = listarGrados($conexion);

    $optsGrado = "";
    foreach ($grados as $g) {
        $id = trim($g["id"]);
        $nm = trim($g["nombre"]);

        $optsGrado .= "<option value='$id'>$nm</option>";
    }
?>
<div class="modal fade" id="modalClase" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalClase" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Clase</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cerrarModal()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input id="txtid" type="hidden" value="null" />
        <form id="formCurso">

          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="idGrado">Grado:</label>
                <select id="idGrado" class="form-control required">
                  <option value="null">Seleccione un grado...</option>
                  <?php echo $optsGrado; ?>
                </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="nombre">Clase:</label>
                <input type="text" class="form-control required" id="nombre">
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
