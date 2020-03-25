
<div class="modal fade" id="editmodal-{{$item->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Tarea</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div >
        <form action="{{ route('editar.tarea', $nota->id) }}" method="POST" class="modal-body " >
          @method('PUT')
          @csrf
          <div>
          <input type="text" class="form-control card-body" name="descripcion" value="{{ $nota->descripcion}}" placeholder="Descripción:" >
          </div>
          <div> 
            Estado:
          <input name="lista" value="1" class="" type="checkbox" id="" >
          </div>
          <div>
            Tipo: <br>
            <input type="radio" id="tipo" name="tipo" value="publica">
            publica <br>
            <input type="radio" id="tipo" name="tipo" value="privada">
            privada<br>
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