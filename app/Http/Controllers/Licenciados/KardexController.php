<?php

namespace App\Http\Controllers\Licenciados;

use App\Http\Controllers\Controller;
use App\Models\Alergia;
use App\Models\Ambiente;
use App\Models\Dia;
use App\Models\Doctore;
use App\Models\Kardex;
use App\Models\Medicamento;
use App\Models\Paciente;
use App\Models\Servicio;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class KardexController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct()
    {
        /* $this->middleware(['auth:sanctum',config('jetstream.auth_session'),'verified']); */
        $this->middleware('auth');
    }
    public function index()
    {
        //
        try {
            //code...
            $kardexes = Kardex::orderBy('numero','desc')->get();
            return view('licenciados.kardexes.index',compact('kardexes'));
        } catch (\Throwable $th) {
            //throw $th;
            dd($th->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function crear(){
        return view('kardex.index');
    }
    public function editar($id){
        return view('kardex.edit',compact('id'));
    }




    public function create()
    {
        $medicamentos = Medicamento::orderBy('denominacion','asc')
        ->get();
        $doctores = Doctore::orderBy('apellidos','asc')
        ->orderBy('nombres','asc')
        ->get();
        $servicios = Servicio::orderBy('nombre','asc')
        ->get();
        $ambientes = Ambiente::orderBy('nombre','asc')
        ->get();
        return view('licenciados.kardexes.create',compact('medicamentos','doctores','servicios','ambientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            "cliente"=>"required",
            "txtdni"=>"required",
            "nombres"=>"required",
            "apellidoPaterno"=>"required",
            "apellidoMaterno"=>"required",
            "nacimiento"=>"required",
            "edad"=>"required",
            "sexo"=>"required",
            "historia"=>"required",
            //"alergias"=>"required",
            "medico"=>"required",
            "servicio"=>"required",
            "ambiente"=>"required",
            "diagnostico"=>"required",
            "fingreso"=>"required",
            "hingreso"=>"required",
        ]);
        try {
            //code...
            DB::beginTransaction();
            //actualizar al paciente
            $paciente = Paciente::updateOrCreate(
                [
                    'numeroDocumento'=>$request->txtdni,
                ],
                [
                    "nombres"=>$request->nombres,
                    "apellidoPaterno"=>$request->apellidoPaterno,
                    "apellidoMaterno"=>$request->apellidoMaterno,
                    "nacimiento"=>$request->nacimiento,
                    "edad"=>$request->edad,
                    "sexo"=>$request->sexo,
                    "historia"=>$request->historia,
                    "numeroDocumento"=>$request->txtdni,
                ],
            );
            //actualizamos las alergias
            Alergia::where('paciente_id','=',$paciente->id)->delete();
            if(isset($request->alergias)){
                for ($i=0; $i < count($request->alergias); $i++) { 
                    # code...
                    $alergia = new Alergia();
                    $alergia->paciente_id = $paciente->id;
                    $alergia->medicamento_id = $request->alergias[$i];
                    $alergia->user_id = auth()->id();
                    $alergia->fecha = Carbon::now();
                    $alergia->save();
                }
            }
            //numero anterior
            $n = 1;
            $ultimo = Kardex::orderBy('numero','desc')->first();
            if(isset($ultimo->numero)){
                $n= $ultimo->numero + 1;
            }
            //insertamos el KARDEX
            $kardex = new Kardex();
            $kardex->fingreso = $request->fingreso;   
            $kardex->hingreso = $request->hingreso;
            $kardex->numero = $n;
            $kardex->diagnostico = $request->diagnostico;
            $kardex->doctore_id  = $request->medico;
            $kardex->enfermero_id = auth()->id();
            $kardex->servicio_id = $request->servicio;
            $kardex->paciente_id = $paciente->id;
            $kardex->ambiente_id = $request->ambiente;
            $kardex->save();
            //insertamos un dia para este kardex
            $dia = new Dia();
            $dia->fecha = $kardex->fingreso;
            $dia->kardex_id = $kardex->id;
            $dia->save();
            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            dd($th->getMessage());
            return Redirect::route('licenciados.kardexes.index')->with('error','error: NO se guardo el KARDEX');
        }
        return Redirect::route('licenciados.kardexes.index')->with('info','se guardo correctamente el KARDEX');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        try {
            //code...
            $kardex = Kardex::findOrFail($id);
            return view('licenciados.kardexes.show',compact('kardex'));
        } catch (\Throwable $th) {
            //throw $th;
            return Redirect::route('licenciados.kardexes.index')->with('error','se producio un error al intentar imprimir');
        }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        try {
            //code...
            $kardex = Kardex::findOrFail($id);
            $kardex->delete();
        } catch (\Throwable $th) {
            //throw $th;
            return Redirect::route('licenciados.kardexes.index')->with('error','error cuando se intento eliminar este Kardex');
        }
        return Redirect::route('licenciados.kardexes.index')->with('info','se elimino correctamente el registro de Kardex');
    }
}
