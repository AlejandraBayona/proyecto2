<?php

namespace App\Http\Controllers;

use App\Models\Censo;
use App\Models\Persona;
use Illuminate\Http\Request;

class CensoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //$censos = Censo::all();
       $municios= Municipio::
       $censos= Censo::join('personas','persona_id','=','personas.id')->join('municipios','municipio_id','=','municipios.id')->get();
       return $censos;
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    
    public function show($dui)
    {
      $censosss= DB::table('censos')->join('personas','persona_id','=','persona.id')->get();



        $censos = Persona::where('dui', $dui)->get([
            'nombre', 
            'apellido',
            'fecha_nacimiento',
            'dui', 
            'estado_civil'
        ]);
       
        return $censosss;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
