<?php

namespace App\Http\Controllers\Administrador;

use App\Http\Controllers\Controller;
use App\Models\Paciente;
use Illuminate\Http\Request;
use PHPUnit\Event\Code\Throwable;

class ApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        /* $this->middleware(['auth:sanctum',config('jetstream.auth_session'),'verified']); */
        $this->middleware('auth');
    }
    public function getdni($dni){
        try {
            //vamos a buscar el dni en la base de datos
            if(Paciente::where('numeroDocumento','=',$dni)->count() == 0){
                $token = 'apis-token-6015.6F8CiG1YD5PHFFaFe13Fg1z64ezRlSZx';
                $curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://api.apis.net.pe/v2/reniec/dni?numero=' . $dni,
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_SSL_VERIFYPEER => 0,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 2,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_CUSTOMREQUEST => 'GET',
                    CURLOPT_HTTPHEADER => array(
                        'Referer: https://apis.net.pe/consulta-dni-api',
                        'Authorization: Bearer ' . $token
                    ),
                ));
                $response = curl_exec($curl);
                curl_close($curl);
                // Datos listos para usar
                $persona = json_decode($response);
                if(isset($persona->message)){
                    throw new \Throwable("Este es un error personalizado.");
                }
                $array = [
                    'message'=>true,
                    'nombres'=>$persona->nombres,
                    'apellidoPaterno'=>$persona->apellidoPaterno,
                    'apellidoMaterno'=>$persona->apellidoMaterno,
                    'telefono'=>'INGRESE MANUAL',
                    'correo'=>'sincorreo@gmail.com',
                    'direccion'=>'sin dirección',
                    'cliente'=>0,
                    'nacimiento'=>'INGRESE MANUAL',
                    'edad'=>0,
                    'numeroDocumento'=>$dni,
                    'sexo'=>'Femenino',
                    'historia'=>'0',
                    'alergias'=>[
                        [
                            'id'=>0,
                            'nombre'=>'sin nombre',
                        ]
                    ],
                ];
                return $array; 
            }else{
                //si tenemos registro
                $cliente = Paciente::where('numeroDocumento','=',$dni)->first();
                $alergias = [];
                foreach ($cliente->alergias as $key => $alergia) {
                    # code...
                    array_push($alergias,$alergia->medicamento_id);
                }
                $array = [
                    'message'=>true,
                    'nombres'=>$cliente->nombres,
                    'apellidoPaterno'=>$cliente->apellidoPaterno,
                    'apellidoMaterno'=>$cliente->apellidoMaterno,
                    'telefono'=>$cliente->telefono,
                    'correo'=>$cliente->correo,
                    'direccion'=>$cliente->direccion,
                    'cliente'=>$cliente->id,
                    'nacimiento'=>$cliente->nacimiento,
                    'numeroDocumento'=>$cliente->numeroDocumento,
                    'edad'=>$cliente->edad,
                    'sexo'=>$cliente->sexo,
                    'historia'=>$cliente->historia,
                    'alergias'=>$alergias,
                ];
                return $array;
            }
        } catch (\Throwable $th) {
            //throw $th;
            $array = [
                'message'=>false,
                'description'=>$th->getMessage(),
            ];
            return $array;
        }
    }
}
