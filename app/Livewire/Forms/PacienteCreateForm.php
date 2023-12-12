<?php

namespace App\Livewire\Forms;

use App\Models\Paciente;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Psy\CodeCleaner\FunctionContextPass;

class PacienteCreateForm extends Form
{
    //
    public $id;
    public $nombres;
    public $apellidopaterno;
    public $apellidomaterno;
    public $dni;
    public $sexo;
    public $historia;
    public $telefono;
    public $edad;
    public $talla;
    public $peso;

    public function edit($id){
        try {
            //code...
            $paciente = Paciente::findOrFail($id);
            $this->id = $paciente->id;
            $this->nombres = $paciente->nombres;
            $this->apellidomaterno = $paciente->apellidoMaterno;
            $this->apellidopaterno = $paciente->apellidoPaterno;
            $this->dni = $paciente->numeroDocumento;
            $this->sexo = $paciente->sexo;
            $this->historia = $paciente->historia;
            $this->edad = $paciente->edad;
            $this->talla =  $paciente->talla;
            $this->peso = $paciente->peso;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function store(){
        try {
            //code...
            $paciente = Paciente::updateOrCreate(
                [
                    'numeroDocumento'=>$this->dni,
                ],
                [
                    'nombres'=>$this->nombres,
                    'apellidoPaterno'=>$this->apellidopaterno,
                    'apellidoMaterno'=>$this->apellidomaterno,
                    'sexo'=>$this->sexo,
                    'historia'=>$this->historia,
                    'telefono'=>$this->telefono,
                    'edad'=>$this->edad,
                    'peso'=>$this->peso,
                    'talla'=>$this->talla,
                ]
            );
            $this->id = $paciente->id;
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
        }
    }

    public function buscardni(){
        //buscamos el paciente
        $paciente = $this->getdni($this->dni);
        //llenamos las propiedades
        $this->nombres = $paciente['nombres'];
        $this->apellidopaterno = $paciente['apellidoPaterno'];
        $this->apellidomaterno = $paciente['apellidoMaterno'];
        $this->edad = $paciente['edad'];
        $this->sexo = $paciente['sexo'];
        $this->telefono = $paciente['telefono'];
        $this->historia = $paciente['historia'];
        $this->talla = $paciente['talla'];
        $this->peso = $paciente['peso'];
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
                    'telefono'=>'999999999',
                    'correo'=>'sincorreo@gmail.com',
                    'direccion'=>'sin dirección',
                    'cliente'=>0,
                    'nacimiento'=>'INGRESE MANUAL',
                    'edad'=>0,
                    'numeroDocumento'=>$dni,
                    'sexo'=>'Femenino',
                    'historia'=>'0',
                    'talla'=>null,
                    'peso'=>null,
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
                    'peso'=>$cliente->peso,
                    'talla'=>$cliente->talla,
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
