<?php

namespace App\Livewire\Medicamentos;

use App\Livewire\Forms\Medicamentos\MedicamentoCreateForm;
use App\Models\Medicamento;
use Livewire\Component;
Use Livewire\WithPagination;
class Index extends Component
{
    use WithPagination;
    public $datos = false;
    public $buscar = "SI";
    public $tabla = "SI";
    public $opcione ="";
    public $text ="";
    public MedicamentoCreateForm $medicamento_create;
    
    public function medicamento_store(){
        $this->medicamento_create->store();
        $this->datos = false;
    }
    public function medicamento_edit($id){
        $this->medicamento_create->edit($id);
        $this->datos = true;
    }
    public function change($id){
        //cambiamos el estado del medicamento
        try {
            //code...
            $medicamento = Medicamento::findOrFail($id);
            $medicamento->visible = !$medicamento->visible;
            $medicamento->update();
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
    public function mount(){
    }
    public function render()
    {
        $medicamentos = Medicamento::when($this->opcione,function($q){
            $q->where($this->opcione,'like','%'.$this->text.'%');
        })->orderBy('id','desc')->paginate(8);
        return view('livewire..medicamentos.index',compact('medicamentos'));
    }
}
