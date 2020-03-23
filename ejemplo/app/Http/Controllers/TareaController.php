<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lista_tareas;
use App;

class TareaController extends Controller
{
    public function inicio(){
    	$tarea = App\Lista_tareas::all();
    	return view('Tareas.plantilla',compact('tarea'));
    }

    public function nuevaTarea(Request $request){
    	
    }
}
