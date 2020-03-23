<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="{{asset('css/app.css')}}" rel="stylesheet"> 
    <title>Tareas</title>
  </head>
  <body><br>
   <div class="container">
     <a href="" class="btn btn-primary ">Inicio</a>
     <a href="" class="btn btn-primary float-right" data-toggle="modal" data-target="#crear">Crear</a>

     @extends('Tareas.crear')
     
     <br>
    
   <div   id="app" class="container"><br>
    @if(session('info'))
              <div class="alert alert-success">
                {{ session('info') }}
              </div>
            @endif
     <h1>Tareas</h1>
     <table class="table">
  <thead>
    
    <tr>
      <th scope="col">#</th>
      <th scope="col">Descripción</th>
      <th scope="col">Checado</th>
      <th scope="col">Accion</th>
    </tr>
  </thead>
  <tbody>
    @foreach( $tarea as $tareas )
    <tr>
      <th scope="row" >{{$tareas->id}}</th>
      <td>{{$tareas->descripcion}}</td>
      <td>
        @if($tareas->lista==1)
        <input name="lista" value="1" checked=true class="form-check-input" type="checkbox" id="" disabled >
        @else
        <input name="lista" value=""  class="form-check-input" type="checkbox" id="" disabled >
      @endif
      </td>
      
      <td class="form-inline">
        <a href="javascript: document.getElementById('delete-{{ $tareas->id }}').submit()" class="btn btn-danger btn-sm form-inline">Eliminar</a>
        <form id="delete-{{$tareas->id}}" action="{{ route('tarea.eliminada', $tareas->id)}}" method="POST">
          @method('delete')
          @csrf
        </form>
      
     
        <a href="javascript: document.getElementById('get-{{ $tareas->id }}').submit()" class="btn btn-success btn-sm form-inline">Editar</a>
        <form id="get-{{$tareas->id}}" action="{{ route('tarea.edit', $tareas->id)}}" method="GET">
          
          @csrf
        </form>
      </td>
      
    </tr>
    @endforeach
  </tbody>
  </table>
     
    
    
   
   </div>
   
   </div>
   

    <script src="{{asset('js/app.js')}}"></script> 
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>