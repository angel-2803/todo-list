<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Lista_tareas;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('principal', function () {
    return view('Tareas/plantilla');
})->name('index');

Route::get('crear', function () {
    return view('Tareas/crear');
});
Route::get('editar', function () {
    return view('Tareas/editar');
});

Route::get('principal','TareaController@inicio')->name('inicio');

Route::post('tarea', function(Request $request){
	$newtarea = new Lista_tareas;
    $newtarea->descripcion = $request->input('descripcion');
     
     if($request->input('lista')){
     	$newtarea->lista = 1;
     }else{
     	$newtarea->lista = 0;
     }

    	 $newtarea->save();
    	 return redirect()->route('inicio')->with('info', 'Tarea creada exitosamente');
})->name('nueva.tarea');

Route::delete('eliminar/{id}', function($id){
	$tarea = Lista_tareas::findOrFail($id);
	$tarea->delete();
	return redirect()->route('inicio')->with('info', 'Tarea eliminada exitosamente');
})->name('tarea.eliminada');

Route::get('editar/{id}','TareaController@editar')->name('Tareas.editar');

Route::put('editar/{id}','TareaController@update')->name('editar.tarea');

Auth::routes();

