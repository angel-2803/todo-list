<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lista_tareas;
use App;

class TareaController extends Controller
{
    public function inicio(){
    	$tareas = App\Lista_tareas::all();
    	return view('Tareas.plantilla',compact('tareas'));
    }

    public function editar($id){
    	$nota = App\Lista_tareas::findOrFail($id);
        return view('Tareas.plantilla', compact('nota'));
    }

    public function update(Request $request, $id){
    	$notaUpdate = App\Lista_tareas::findOrFail($id);

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
