<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PredioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $predios = Predio::all(); 
        return view('predios.index', compact('predios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('predios.nuevo');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Predio::create($request->all());

    return redirect()->route('predios.index')
        ->with('success', 'Predio registrado correctamente');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $predio->update($request->all());

        return redirect()->route('predios.index')
            ->with('success', 'Predio actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
