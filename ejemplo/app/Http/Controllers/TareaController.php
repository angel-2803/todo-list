<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tareas;
use App\User;
use App;

class TareaController extends Controller
{
    public function inicio(){ // funcion de cosnultar tareas de el usuario logueado
        // Consulta entre tablas con inner join y la condicion para que consulte solo las tareas 
        // del usuario logueado 
        $tareas = User::join("tareas","tareas.user_id","=","users.id")
        ->select("tareas.id","tareas.descripcion","tareas.lista","tareas.tipo","tareas.tarea")
        ->where("users.id","=", auth()->user()->id)->get();
    	// $tareas = App\Tareas::all(); aqui esta consultando todos los datos de la tabla 'tareas'

        // la fucion compact manda los datos o variables a la vista señalada 
    	return view('Tareas.plantilla',compact('tareas'));
    }

    public function editar($id){  //funcion para editar una tarea
    	$nota = App\Tareas::findOrFail($id);
        return view('Tareas.plantilla', compact('nota'));
    }

    public function update(Request $request, $id){
    	$notaUpdate = App\Tareas::findOrFail($id);
            $notaUpdate->tarea = $request->tarea;
            $notaUpdate->descripcion = $request->descripcion;    
            if($request->input('lista')){
             $notaUpdate->lista = 1;
            }else{
             $notaUpdate->lista = 0;
            }
            $notaUpdate->tipo = $request->tipo;
            $notaUpdate->save();
            return redirect()->route('inicio')->with('info', 'Tarea modificada exitosamente');
    }
}
