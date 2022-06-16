<?php

namespace App\Http\Controllers;
use App\Models\Persona;
use Illuminate\Http\Request;
use App\Http\Request\PersonaRequest;

class PersonaController extends Controller
{
   
    public $GetFilter = [
        "id",
        "nombre",
        "apellido",
        "fecha_nacimiento",
        "dui",
        "estado_civil",
    ];


    public function getByDui($dui) {
        $persona = Persona::Where("dui", $dui)->get($this->GetFilter)->first();
        $edad= $this->busca_edad($persona->fecha_nacimiento);

        $info= array('persona'=>$persona,'edad'=>$edad);

        return response()->json($info);
    }

    public function created(Request $request) {
        //validando la edad del usuario
        $edad= $this->busca_edad($request->fecha_nacimiento);
       if($edad<18){
             $request->dui=null;

        }
        $persona = new Persona([
            "nombre" => $request->nombre,
            "apellido" => $request->apellido,
            "fecha_nacimiento" => $request->fecha_nacimiento,
            "dui" => $request->dui,
            "estado_civil" => $request->estado_civil,    
    
        ]);

        $persona->save();
        /*$edad= $this->busca_edad($persona->fecha_nacimiento);

        $info= array($persona,$edad);*/

        return response()->json($persona);
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
