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
        <form action="{{ route('editar.tarea')}}" method="POST" class="modal-body form-inline">
          @csrf
          <div>
          <input type="text" name="descripcion" placeholder="Descripción:" class="form-control card-body">
          </div>
          <div>	
          <input name="lista" value="1" class="form-check-input" type="checkbox" id="" >
          </div>
          <button type="submit" class="btn btn-primary">Editar</button>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        
      </div>
    </div>
  </div>
</div>