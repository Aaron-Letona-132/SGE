<div class="modal fade" id="modalHorario" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="modalHorario" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Horario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="cerrarModal()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <div class="modal-body">
        <input id="txtid" type="hidden" value="null" />
        <form id="formHorario">
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="hInicio">Hora Inicio:</label>
                <input type="time" class="form-control required" id="hInicio">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="hFin">Hora Fin:</label>
                <input type="time" class="form-control required" id="hFin">
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-12">
              <div class="form-group">
                <label for="dia">Día:</label>
                <select id="dia" class="form-control required">
                  <option value="1">Lunes</option>
                  <option value="2">Martes</option>
                  <option value="3">Miércoles</option>
                  <option value="4">Jueves</option>
                  <option value="5">Viernes</option>
                  <option value="6">Sábado</option>
                  <option value="7">Domingo</option>
                </select>
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
