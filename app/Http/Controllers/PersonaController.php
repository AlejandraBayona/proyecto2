<?php

namespace App\Http\Controllers;
use App\Models\Persona;
use Illuminate\Http\Request;

use App\Http\Requests\PersonaRequest as RequestsPersonaRequest;

class PersonaController extends Controller
{

    public function getByDui($dui) {

    }

    public function create(RequestsPersonaRequest $request) {
        //validando la edad del usuario
        $edad= $this->busca_edad($request->fecha_nacimiento);
       if($edad<18){
             $request->dui="";
        }
        $persona = new Persona([
            "nombres" => $request->nombres,
            "apellidos" => $request->apellidos,
            "fecha_nacimiento" => $request->fecha_nacimiento,
            "dui" => $request->dui,
            "estado_civil" => $request->estado_civil,

        ]);

        $persona->save();
        /*$edad= $this->busca_edad($persona->fecha_nacimiento);

        $info= array($persona,$edad);*/

        return response()->json([
            'message'=>'Informacion agregada con exito',
            'persona'=> $persona,
        ]);
    }





function busca_edad($fecha_nacimiento){
        $dia=date("d");
        $mes=date("m");
        $ano=date("Y");


        $dianaz=date("d",strtotime($fecha_nacimiento));
        $mesnaz=date("m",strtotime($fecha_nacimiento));
        $anonaz=date("Y",strtotime($fecha_nacimiento));


        //si el mes es el mismo pero el día inferior aun no ha cumplido años, le quitaremos un año al actual

        if (($mesnaz == $mes) && ($dianaz > $dia)) {
        $ano=($ano-1); }

        //si el mes es superior al actual tampoco habrá cumplido años, por eso le quitamos un año al actual

        if ($mesnaz > $mes) {
        $ano=($ano-1);}

         //ya no habría mas condiciones, ahora simplemente restamos los años y mostramos el resultado como su edad

        $edad=($ano-$anonaz);


        return $edad;
        }

}
