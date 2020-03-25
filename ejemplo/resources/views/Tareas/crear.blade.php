<div class="modal fade" id="crear" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Crear Tarea</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div >
        <form action="{{ route('nueva.tarea')}}" method="POST" class="modal-body ">
          @csrf
          <div>
          <input type="text" name="descripcion" placeholder="Descripción:" class="form-control card-body">
          </div>
          <div><br>
          	<label>Estado:</label>
            <input name="lista" value="1" class=" " type="checkbox" id="" >
          </div>
          <div>
            Tipo <br>
            <input type="radio" id="tipo" name="tipo" value="publica">
            <label for="tipo">publica</label><br>
            <input type="radio" id="tipo" name="tipo" value="privada">
            <label for="tipo">privada</label><br>
          </div>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
  </div>
</div>