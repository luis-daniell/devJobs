<?php

namespace App\Http\Controllers;

use App\Vacante;
use App\Candidato;
use Illuminate\Http\Request;
use App\Notifications\NuevoCandidato;

class CandidatoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Validacion
        $data = $request->validate([
            'nombre' => 'required',
            'email' => 'required|email',
            'cv' => 'required|mimes:pdf|max:1000',
            'vacante_id' => 'required'
        ]);


        //Almacenar archivo pdf
        if($request->file('cv'))
        {
            $archivo = $request->file('cv');
            $nombreArchivo = time() . "." . $request->file('cv')->extension();
            $ubicacion = public_path('/storage/cv');
            $archivo->move($ubicacion, $nombreArchivo);

            //return $nombreArchivo;
        }


        //FORMA DE RELACION
        $vacante = Vacante::find($data['vacante_id']); //EN ESTE METODO SE HACE LA RELACION EN VACANTE
        $vacante->candidatos()->create([
            'nombre' => $data['nombre'],
            'email' => $data['email'],
            'cv' => $nombreArchivo
        ]);

        $reclutador = $vacante->reclutador;
        $reclutador->notify(new NuevoCandidato($vacante->titulo));


        //PERMITE ACCEDER A LA COLECCION
        // $vacante->candidatos->create

        //PERMITE ACCEDER A LAS FUNCIONES DE LA COLECCION
        // $vacante->candidatos()->create


        //Una Forma
        // $candidato = new Candidato();
        // $candidato->nombre =$data['nombre'];
        // $candidato->email = $data['email'];
        // $candidato->vacante_id = $data['vacante_id'];
        // $candidato->cv = "123.pdf";
        // $candidato->save();


        //Segunda Forma
        // $candidato = new Candidato($data); //EN ESTE METODO SE RELLENA EL FILLABLE EN Candidato.php
        // $candidato->cv = "123.pdf";
        // $candidato->save();

        //Tercer Forma
        // $candidato = new Candidato();
        // $candidato->fill($data);
        // $candidato->cv = "123.pdf";
        // $candidato->save();


        return back()->with('estado', 'Tus Datos se enviarion correctamente! SUERTE!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function show(Candidato $candidato)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidato $candidato)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Candidato $candidato)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Candidato  $candidato
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidato $candidato)
    {
        //
    }
}
