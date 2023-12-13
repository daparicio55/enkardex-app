<?php

namespace App\Livewire\Licenciados;

use App\Livewire\Forms\Users\UserCreateForm;
use App\Models\User;
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
    public UserCreateForm $user_create;

    public function user_store(){
        $this->user_create->store();
        $this->datos = false;
    }
    
    public function user_edit($id){
        $this->user_create->edit($id);
        $this->datos = true;
    }

    public function render()
    {
        $licenciados = User::when($this->opcione,function($q){
            $q->where($this->opcione,'like','%'.$this->text.'%');
        })->orderBy('id','desc')->paginate(8);
        return view('livewire..licenciados.index',compact('licenciados'));
    }
}
