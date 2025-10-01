<div class="modal fade" id="modalNivel" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalNivel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Nivel Académico</h5>
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
                <label for="nombreNivel">Nombre del Nivel:</label>
                <input type="text" class="form-control required" id="nombreNivel">
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
