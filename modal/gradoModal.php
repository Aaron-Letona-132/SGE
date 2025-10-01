<?php 

    include("../../model/gradoQuery.php");
    $niveles = obtenerListadoNivel($conexion);

    $optsNivel = "";
    foreach ($niveles as $n) {
        $id   = trim($n["ID_NVL"]);
        $name = trim($n["NOMBRE_NVL"]);

        $optsNivel .= "<option value='$id'>$name</option>";
    }
?>
<div class="modal fade" id="modalGrado" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalGrado" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Grado</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cerrarModal()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <input id="txtid" type="hidden" value="null" />
        <form id="formGrado">
          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="idNivel">Nivel Académico:</label>
                <select id="idNivel" class="form-control required">
                  <option value="null">Seleccione un nivel...</option>
                  <?php echo $optsNivel; ?>
                </select>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="nombreGrado">Nombre del Grado:</label>
                <input type="text" class="form-control required" id="nombreGrado">
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
