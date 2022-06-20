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

        $info= array($persona,$edad);

        return response()->json($info);
    }
 /**
 * @OA\Post(
 *   path="/persona/new",
 *   summary="Form post",
 *   @OA\RequestBody(
 *     @OA\MediaType(
 *       mediaType="multipart/form-data",
 *       @OA\Schema(
 *         @OA\Property(property="nombre"),
 *         @OA\Property(property="apellido"),
 *         @OA\Property(property="Fecha de nacimiento"),
 *         @OA\Property(property="dui"),
 *         @OA\Property(property="estado civil"),
 *         @OA\Property(
 *           description="file to upload",
 *           type="string",
 *           format="binary",
 *         ),
 *       )
 *     )
 *   ),
 *   @OA\Response(response=200, description="Success")
 * )
 */


    public function created(Request $request) {
        
   
        $persona = new Persona([
            "nombre" => $request->nombre,
            "apellido" => $request->apellido,
            "fecha_nacimiento" => $request->fecha_nacimiento,
            "dui" => $request->dui,
            "estado_civil" => $request->estado_civil,    
    
        ]);

        $persona->save();


        return response()->json($persona);
    }





function busca_edad($fecha_nacimiento){
        $dia=date("d");
        $mes=date("m");
        $ano=date("Y");
        
        
        $dianaz=date("d",strtotime($fecha_nacimiento));
        $mesnaz=date("m",strtotime($fecha_nacimiento));
        $anonaz=date("Y",strtotime($fecha_nacimiento));
        
        
        
        if (($mesnaz == $mes) && ($dianaz > $dia)) {
        $ano=($ano-1); }
        
     
        
        if ($mesnaz > $mes) {
        $ano=($ano-1);}
        
   
        
        $edad=($ano-$anonaz);
        
        
        return $edad;
        
        
        }

}
