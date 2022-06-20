<?php

namespace App\Http\Controllers;
use App\Models\Censo;

use Illuminate\Http\Request;

/**
 * CensoController
 * @package App\Http\Controllers\CensoController
 * @OA\OpenApi(
 *     @OA\Info(
 *         version="1.0.0",
 *         title="Swagger Test",
 *         @OA\License(name="MIT")
 *     ),
 *     @OA\Server(
 *         description="API server",
 *         url="http://127.0.0.1:8000/",
 *     ),
 * )
 */

class CensoController extends Controller
{

 
    /**                                                                                             
 * @OA\Get(                                                                                         
 *     path="/censos",                                                                                    
 *     description="Home page",                                                                             
 *     @OA\Response(response="default", description="Mostrando datos de los censos")                                 
 * )                                                                                                
 */                                                                                                 
   
    public function index()
    {

        $censos = Censo::select('censos.id', 'personas.*', 'municipios.nombre_municipio')->join('personas', 'persona_id', '=', 'personas.id')->join('municipios', 'municipio_id', '=', 'municipios.id')->get();
        return $censos;
    }

  
    public function create()
    {
        
    }

 
    public function store(Request $request)
    {
       
    }

  

    public function show($dui)
    {

        $censos = Persona::where('dui', $dui)->get([
            'nombre',
            'apellido',
            'fecha_nacimiento',
            'dui',
            'estado_civil',
        ]);

        return $censosss;
    }


    public function edit($id)
    {
        
    }

 
    public function update(Request $request, $id)
    {
       
    }

  
    public function destroy($id)
    {
       
    }
}
