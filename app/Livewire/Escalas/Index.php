<?php

namespace App\Livewire\Escalas;

use App\Livewire\Forms\Egrupos\EgrupoForm;
use App\Livewire\Forms\Egvalores\EgvaloreForm;
use App\Livewire\Forms\Escalas\Escalaform;

use App\Models\Escala;
use Livewire\Component;
Use Livewire\WithPagination;
class Index extends Component
{
    use WithPagination;
    public Escalaform $escalaform;
    public EgrupoForm $egrupoform;
    public EgvaloreForm $egvaloreform;

    public function escala_store(){
        $this->escalaform->store();
    }
    
    public function escala_edit($id){
        $this->escalaform->edit($id);
    }

    public function egrupo_create($id){
        $this->egrupoform->create($id);
    }
    
    public function egrupo_edit($id){
        $this->egrupoform->edit($id);
    }

    public function egrupo_store(){
        $this->egrupoform->store();
    }

    public function egvalore_create($id){
        $this->egvaloreform->create($id);
    }

    public function egvalore_edit($id){
        $this->egvaloreform->edit($id);
    }

    public function egvalore_store(){
        $this->egvaloreform->store();
    }

    public function render()
    {
        $escalas = Escala::orderBy('id','desc')->paginate(8);
        return view('livewire..escalas.index',compact('escalas'));
    }
}
