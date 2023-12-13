<?php

namespace App\Livewire\Forms\Users;

use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Form;

class UserCreateForm extends Form
{
    //
    public $id;
    public $name;
    public $lastname;
    public $dni;
    public $email;
    public $password;

    public function store(){
        try {
            //code...
            if($this->id){
                $user = User::findOrFail($this->id);
                $user->name = $this->name;
                $user->lastname = $this->lastname;
                $user->dni = $this->dni;
                $user->email = $this->email;
            }else{
    
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    public function edit($id){
        try {
            //code...
            $user = User::findOrFail($id);
            $this->id = $user->id;
            $this->name = $user->name;
            $this->lastname = $user->lastname;
            $this->dni = $user->dni;
            $this->email = $user->email;
            $this->password = $user->password;
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
