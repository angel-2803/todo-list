<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Pensamiento;

class pensamientoController extends Controller
{
    public function __construct(){

        $this->middleware('auth');
    }

    public function index()
    {
        return Pensamiento::where('usuario_id',auth()->id())->get();
    }

    public function store(Request $request)
    {
        $agregaPensamiento = new Pensamiento();
        $agregaPensamiento->descripcion = $request->descripcion;
        $agregaPensamiento->usuario_id = auth()->id();
        $agregaPensamiento->save();

        return $agregaPensamiento;
    }


    public function update(Request $request, $id)
    {
        $pensamiento = Pensamiento::find($id);
        $pensamiento->descripcion = $request->descripcion;
        $pensamiento->save();

        return $pensamiento;
    }

    public function destroy($id)
    {
        $pensamiento = Pensamiento::find($id);
        $pensamiento->delete();
    }
}
