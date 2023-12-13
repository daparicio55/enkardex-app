<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Licenciados extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $datos =  [
            ['name'=>'Manuel','lastname'=>'Quispe Narváez','email'=>'mquispe@gmail.com','password'=>'12345678'],
            ['name'=>'Litman','lastname'=>'Umpiri Loja','email'=>'lumpiri@gmail.com','password'=>'12345678'],
            ['name'=>'Vanessa','lastname'=>'Fernández Rojas.','email'=>'vfernandez@gmail.com','password'=>'12345678'],
            ['name'=>'Doris','lastname'=>'Lozano Santa Maria','email'=>'dsanta@gmail.com','password'=>'12345678'],
            ['name'=>'Deisy','lastname'=>'Mego Llaja.','email'=>'dllaja@gmail.com','password'=>'12345678'],
            ['name'=>'José','lastname'=>'Chuquiruna Cabanillas','email'=>'jchuquiruna@gmail.com','password'=>'12345678'],
            ['name'=>'Rocío','lastname'=>'Bejarano Hernández','email'=>'rbejarano@gmail.com','password'=>'12345678'],
            ['name'=>'Hegmer','lastname'=>'Tafur Epquín.','email'=>'htafur@gmail.com','password'=>'12345678'],
            ['name'=>'Diana','lastname'=>'Negreiros Morales','email'=>'dnegreiros@gmail.com','password'=>'12345678'],
            ['name'=>'Nanci','lastname'=>'Guadalupe Lobato.','email'=>'nguadalupe@gmail.com','password'=>'12345678'],
            ['name'=>'Sandra','lastname'=>'Bazan Inga','email'=>'sbazan@gmail.com','password'=>'12345678'],
            ['name'=>'Carmen','lastname'=>'Aliaga Aliaga','email'=>'caliaga@gmail.com','password'=>'12345678'],
            ['name'=>'Milagros','lastname'=>'Poquioma Yalta','email'=>'mpoquioma@gmail.com','password'=>'12345678'],
            ['name'=>'Hortencia','lastname'=>'Santacruz Burga','email'=>'hsantacruz@gmail.com','password'=>'12345678'],
            ['name'=>'Keyla','lastname'=>'Tafur Castro.','email'=>'ktafur@gmail.com','password'=>'12345678'],
            ['name'=>'Carlos','lastname'=>'Valencia Pizarro','email'=>'cvalencia@gmail.com','password'=>'12345678'],
            ['name'=>'Janeth','lastname'=>'Sivirichi Galvez','email'=>'jsivirichi@gmail.com','password'=>'12345678'],
            ['name'=>'Irma','lastname'=>'Vásquez Ramírez','email'=>'ivasquez@gmail.com','password'=>'12345678'],
            ['name'=>'Luz','lastname'=>'Aguilar Guevara','email'=>'laguilar@gmail.com','password'=>'12345678'],
            ['name'=>'Alejandrina','lastname'=>'Garcia Montenegro','email'=>'agarcia@gmail.com','password'=>'12345678'],
            ['name'=>'Livi','lastname'=>'Castro Chavez','email'=>'lcastro@gmail.com','password'=>'12345678'],
            ['name'=>'Carla','lastname'=>'Rodas Paredes','email'=>'crodas@gmail.com','password'=>'12345678'],
            ['name'=>'Wendy','lastname'=>'Mio Paredes','email'=>'wmio@gmail.com','password'=>'12345678'],
        ];
        foreach ($datos as $key => $dato) {
            # code...
            $user = User::create($dato);
            if ($key == 0){
                $user->assignRole(['Administrador','Licenciado']);
            }
            if ($key == 1){
                $user->assignRole(['Administrador','Licenciado']);
            }
        }
    }
}
