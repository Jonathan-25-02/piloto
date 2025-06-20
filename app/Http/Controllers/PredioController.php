<?php

namespace App\Http\Controllers;

use App\Models\Predio;
use Illuminate\Http\Request;

class PredioController extends Controller
{
    /**
     * Muestra todos los predios.
     */
    public function index()
    {
        $predios = Predio::all(); 
        return view('predios.index', compact('predios'));
    }

    /**
     * Muestra el formulario para crear un nuevo predio.
     */
    public function create()
    {
        return view('predios.nuevo');
    }

    /**
     * Guarda un nuevo predio en la base de datos.
     */
    public function store(Request $request)
    {
        Predio::create($request->all());

        return redirect()->route('predios.index')
            ->with('success', 'Predio registrado correctamente');
    }

    /**
     * Muestra el formulario para editar un predio.
     */
    public function edit($id)
    {
        $predio = Predio::findOrFail($id);
        return view('predios.editar', compact('predio'));
    }

    /**
     * Actualiza un predio específico.
     */
    public function update(Request $request, $id)
    {
        $predio = Predio::findOrFail($id);
        $predio->update($request->all());

        return redirect()->route('predios.index')
            ->with('success', 'Predio actualizado correctamente');
    }

    /**
     * Elimina un predio de la base de datos.
     */
    public function destroy($id)
    {
        $predio = Predio::findOrFail($id);
        $predio->delete();

        return redirect()->route('predios.index')
            ->with('success', 'Predio eliminado correctamente');
    }
}
