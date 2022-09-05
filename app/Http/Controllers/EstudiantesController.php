<?php

namespace App\Http\Controllers;

use App\Models\Departamento;
use App\Models\Paises;
use App\Models\Municipio;
use App\Models\Estudiante;
use Illuminate\Http\Request;


class EstudiantesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $estudiantico = Estudiante::all();
        return view('estudiantes.index' , compact('estudiantico'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $paises = Paises::all();
        $departamentos = Departamento::all();
        $municipios = Municipio::all();
        return view('estudiantes.create', compact('paises','departamentos','municipios'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $estudiantico = new Estudiante();
        $estudiantico->tipo_documento = $request-> input('tipo_documento');
        $estudiantico->num_documento = $request-> input('num_documento');
        if($request->hasFile('documento_identidad')){
            $estudiantico->documento_identidad = $request->file('documento_identidad')->store('public/estudiantes');
        }
        $estudiantico->nombre= $request-> input('nombre');
        $estudiantico->primer_apellido= $request-> input('primer_apellido');
        $estudiantico->segundo_apellido= $request-> input('segundo_apellido');
        $estudiantico->genero= $request-> input('genero');
        $estudiantico->fecha_nacimiento= $request-> input('fecha_nacimiento');
        $estudiantico->estrato= $request-> input('estrato');
        $estudiantico->save();
        return view('Estudiantes.to_update');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estudiantico = Estudiantes::find($id);
        return view('estudiantes.edit' , compact('estudiantico'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
