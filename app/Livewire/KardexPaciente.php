<?php

namespace App\Livewire;

use App\Livewire\Forms\DiaCreateForm;
use App\Livewire\Forms\DiaDeleteForm;
use App\Livewire\Forms\DiadietaCreateForm;
use App\Livewire\Forms\DiadietaDeleteForm;
use App\Livewire\Forms\DiaExameneCreateForm;
use App\Livewire\Forms\DiaExameneDeleteForm;
use App\Livewire\Forms\DiaindicacioneCreateForm;
use App\Livewire\Forms\DiaProcedimientoCreateForm;
use App\Livewire\Forms\DiaProcedimientoDeleteForm;
use App\Livewire\Forms\DoneDiaExameneCreateForm;
use App\Livewire\Forms\DoneDiaProcedimientoCreateForm;
use App\Livewire\Forms\Escalas\Escalaform;
use App\Livewire\Forms\MedicamentoCreateForm;
use App\Livewire\Forms\MedicamentoDeleteForm;
use App\Livewire\Forms\PacienteCreateForm;
use App\Models\Ambiente;
use App\Models\Dia;
use App\Models\Dieta;
use App\Models\Doctore;
use App\Models\Escala;
use App\Models\Examene;
use App\Models\Kardex;
use App\Models\Medicamento;
use App\Models\Procedimiento;
use App\Models\Servicio;
use App\Models\Via;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Http\Request;

class KardexPaciente extends Component
{
    //propiedades para mount;
    public $medicamentos;
    public $medicamento_id="";
    public $doctores;
    public $doctore_id = "";
    public $servicios;
    public $servicio_id = "";
    public $ambientes;
    public $ambiente_id = "";
    public $dietas;
    public $dieta_id="";
    public $vias;
    public $examenes;
    public $procedimientos;
    public $procedimiento_id;
    public $escalas;
    public $escala_id = "";

    public $fecha;
    public $hora;
    public $diagnostico;
    
    public $kardex;
    public $kardex_id=0;
    public $dia_id=0;
    
    
    public MedicamentoCreateForm $medicamento_create;
    public MedicamentoDeleteForm $medicamento_delete;
    public DiaindicacioneCreateForm $diaindicacione_create;
    public DiadietaCreateForm $diadieta_create;
    public DiadietaDeleteForm $diadieta_delete;
    public DiaCreateForm $dia_create;
    public DiaDeleteForm $dia_delete;
    public PacienteCreateForm $paciente_store;
    
    public DiaExameneCreateForm $diaexamene_create;
    public DiaExameneDeleteForm $diaexamene_delete;
    public DoneDiaExameneCreateForm $donediaexamene_create;
    public DiaProcedimientoCreateForm $diaprocedimiento_create;
    public DiaProcedimientoDeleteForm $diaprocedimiento_delete;
    public DoneDiaProcedimientoCreateForm $donediaprocedimiento_create;

    public Escalaform $escala_form;
    
    ##DIA EXAMENE
    public function escalacreate(){
        $this->escala_form->crear($this->escala_id);
    }
    public function escalastore(){
        $this->escala_form->guardar($this->dia_id,$this->escala_id);
    }
    public function donediaprocedimientostore($id){
        $this->donediaprocedimiento_create->store($id);
    }
    public function diaexamenestore(){
        $this->diaexamene_create->store($this->dia_id);
    }
    public function diaexamendestroy($id){
        $this->diaexamene_delete->destroy($id);
    }
    public function donediaexamenestore($id){
        $this->donediaexamene_create->store($id);
    }
    
    public function diaprocedimientostore(){
        $this->diaprocedimiento_create->store($this->dia_id);
    }
    public function diaprocedimientodestroy($id){
        $this->diaprocedimiento_delete->destroy($id);
    }
    //pacientes
    public function buscardni(){
        $this->paciente_store->buscardni();
        $this->fecha = date('Y-m-d',strtotime(Carbon::now()));
        $this->hora = date('H:i:00',strtotime(Carbon::now()));
    }
    #DIA DIETA
    public function diadietastore(){
        $this->diadieta_create->store($this->dieta_id,$this->dia_id);
        $this->dieta_id = "";
    }
    public function diadietadelete($id){
        $this->diadieta_delete->destroy($id);
    }
    ##FIN DIA DIETA
    ##DIA
    public function diacreate(){
        $this->dia_create->store($this->kardex_id);
    }
    public function diadestroy($dia){
        $this->dia_delete->destroy($dia);
    }
    ##FIN DIA
    
    public function diaindicacionecreate($hora,$dia,$indicacione,$tipo){
        $this->diaindicacione_create->store($hora,$dia,$indicacione,$tipo);
    }
    
    ##MEDICAMENTOS
    public function medicamentostore(){
        //dd($this->medicamento_id);
        try {
            //code...
            $this->medicamento_create->store($this->kardex_id,$this->medicamento_id);
        } catch (\Throwable $th) {
            //throw $th;
        }
        
    }
    public function medicamentodestroy($id) {
        $this->medicamento_delete->destroy($id);
        $this->kardex = Kardex::find($this->kardex_id);
    }
    ##FIN
    public function selectday($id){
        $this->dia_id = $id;
    }
    
    #FUNCIONES DE KARDEX#
    public function storekardex(){
        //guardamos y creamos un nuevo Kardex
        try {
            //code...
            $this->paciente_store->store();
            //datos del Kardex 
            if ($this->kardex_id == 0) {
                # code...
                DB::beginTransaction();
                $kardex = new Kardex();
                $kardex->fingreso = $this->fecha;   
                $kardex->hingreso = $this->hora;
                $kardex->numero = $this->lastnumberkardex();
                $kardex->diagnostico = $this->diagnostico;
                $kardex->doctore_id  = $this->doctore_id;
                $kardex->enfermero_id = auth()->id();
                $kardex->servicio_id = $this->servicio_id;
                $kardex->paciente_id = $this->paciente_store->id;
                $kardex->ambiente_id = $this->ambiente_id;
                $kardex->save();
                $dia = new Dia();
                $dia->fecha = $kardex->fingreso;
                $dia->kardex_id = $kardex->id;
                $dia->save();
                $this->kardex_id = $kardex->id;
                DB::commit();
            }else{
                DB::beginTransaction();
                $kardex = Kardex::findOrFail($this->kardex_id);
                $kardex->fingreso = $this->fecha;   
                $kardex->hingreso = $this->hora;
                $kardex->diagnostico = $this->diagnostico;
                $kardex->doctore_id  = $this->doctore_id;
                $kardex->servicio_id = $this->servicio_id;
                $kardex->paciente_id = $this->paciente_store->id;
                $kardex->ambiente_id = $this->ambiente_id;
                $kardex->update();
                DB::commit();
            }
            $this->kardex = Kardex::find($this->kardex_id);
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollBack();
            dd($th->getMessage());
        }
    }
    public function lastnumberkardex(){
        $n = 1;
        $ultimo = Kardex::orderBy('numero','desc')->first();
        if(isset($ultimo->numero)){
            $n= $ultimo->numero + 1;
        }
        return $n;
    }
    #FIN KARDEX#

    #FUNCIONES INICIALES
    public function mount($id){
        $this->doctores = Doctore::orderBy('apellidos','asc')
        ->orderby('nombres','asc')
        ->get();
        $this->servicios = Servicio::orderBy('nombre','asc')
        ->get();
        
        $this->medicamentos = Medicamento::orderBy('denominacion','asc')
        ->get();
        $this->vias = Via::orderBy('nombre','asc')
        ->get();
        $this->dietas = Dieta::orderBy('nombre','asc')
        ->get();
        $this->examenes = Examene::orderBy('nombre','asc')
        ->get();
        $this->procedimientos = Procedimiento::orderBy('nombre','asc')
        ->get();
        $this->escalas = Escala::orderBy('nombre','asc')
        ->get();

        if($id != 0){
            $this->kardex_id = $id;
            $this->kardex = Kardex::find($this->kardex_id);
            $this->paciente_store->nombres = $this->kardex->paciente->nombres;
            $this->paciente_store->dni = $this->kardex->paciente->numeroDocumento;
            $this->paciente_store->apellidopaterno = $this->kardex->paciente->apellidoPaterno;
            $this->paciente_store->apellidomaterno = $this->kardex->paciente->apellidoMaterno;
            $this->paciente_store->edad = $this->kardex->paciente->edad;
            $this->paciente_store->telefono = $this->kardex->paciente->telefono;
            $this->paciente_store->sexo = $this->kardex->paciente->sexo;
            $this->paciente_store->historia = $this->kardex->paciente->historia;
            $this->fecha = $this->kardex->fingreso;
            $this->hora = $this->kardex->hingreso;
            $this->servicio_id = $this->kardex->servicio_id;
            $this->ambiente_id = $this->kardex->ambiente_id;
            $this->doctore_id = $this->kardex->doctore_id;
            $this->diagnostico = $this->kardex->diagnostico;
        }
        $this->ambientes = Ambiente::orderBy('ambiente','asc')
        ->orderBy('cama','asc')
        ->where('servicio_id','=',$this->servicio_id)
        ->get();
    }
    public function servicio_change(){
        $this->ambientes = Ambiente::orderBy('ambiente','asc')
        ->orderBy('cama','asc')
        ->where('servicio_id','=',$this->servicio_id)
        ->get();
    }
    public function render()
    {
        return view('livewire.kardex-paciente');
    }
    #FIN FUNCIONES INICIALES#
}
