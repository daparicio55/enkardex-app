<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Alergia;
use App\Models\Ambiente;
use App\Models\Dia;
use App\Models\Dieta;
use App\Models\Doctore;
use App\Models\Examene;
use App\Models\Kardex;
use App\Models\Medicamento;
use App\Models\Paciente;
use App\Models\Servicio;
use App\Models\Unidade;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $ambiente1 = Ambiente::create([
            'nombre'=>'A1'
        ]);
        $ambiente2 = Ambiente::create([
            'nombre'=>'A2'
        ]);
        $ambiente3 = Ambiente::create([
            'nombre'=>'A3'
        ]);
        $ambiente4 = Ambiente::create([
            'nombre'=>'A4'
        ]);
        $servicio1 = Servicio::create([
            'nombre'=>'Cirugia'
        ]);
        $servicio2 = Servicio::create([
            'nombre'=>'Recuperación'
        ]);
        $servicio3 = Servicio::create([
            'nombre'=>'Tratamiento'
        ]);
        $doctore1 = Doctore::create([
            'nombres'=>'Juan Carlos',
            'apellidos'=>'Perez Rodriguez'
        ]);
        $doctore2 = Doctore::create([
            'nombres'=>'Alexander David',
            'apellidos'=>'Aparicio Castro'
        ]);
        $doctore2 = Doctore::create([
            'nombres'=>'Nikolai',
            'apellidos'=>'Aparicio Delgado'
        ]);
        $user1 = User::create([
            'name'=>'Davis Williams',
            'lastname'=>'Aparicio Palomino',
            'dni'=>'43053643',
            'email'=>'dave@gmail.com',
            'password'=>bcrypt('1234'),
        ]);
        $licenciado1 = User::create([
            'name'=>'Manuel',
            'lastname'=>'Quispe Rivera',
            'dni'=>'89654785',
            'email'=>'manuel@gmail.com',
            'password'=>bcrypt('1234'),
        ]);
        //UNIDADES
        $unidade1 = Unidade::create([
            'nombre'=>'mg.'
        ]);
        $unidade2 = Unidade::create([
            'nombre'=>'g.'
        ]);
        //pacientes
        $paciente1 = Paciente::create([
            'nombres'=>'Lionel',
            'apellidoPaterno'=>'Messi',
            'apellidoMaterno'=>'Solano',
            'edad'=>38,
            'sexo'=>'Masculino',
            'nacimiento'=>'1985-03-03',
            'numeroDocumento'=>'12345678',
            'historia'=>'676668',
            'telefono'=>'987456314',
            'correo'=>'messi@elmejor.com',
            'direccion'=>'Jr. Santo Toribio Rodriguez de Mendoza 125'
        ]);
        
        //CREAMOS UN KARDEX
        $kardex1 = Kardex::create([
            'numero'=>1,
            'fingreso'=>Carbon::now(),
            /* 'hingreso'=>Carbon::now(), */
            /* 'fingreso'=>date('Y-m-d',strtotime(Carbon::now())), */
            'hingreso'=>date('H:i:00',strtotime(Carbon::now())),
            'doctore_id'=>$doctore1->id,
            'enfermero_id'=>$licenciado1->id,
            'servicio_id'=>$servicio1->id,
            'paciente_id'=>$paciente1->id,
            'ambiente_id'=>$ambiente2->id,
            'diagnostico'=>'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Explicabo nisi veniam nam ipsam similique, dignissimos error inventore assumenda obcaecati libero culpa cum maiores ad qui, architecto voluptatem repudiandae corrupti alias'
        ]);
        //agregamos un dia al kardex
        $day = Carbon::parse($kardex1->fingreso);
        //$day->addDay();
        Dia::create([
            'fecha'=>$day,
            'kardex_id'=>$kardex1->id,
        ]);
        //Agregamos Examenes
        $examen1 = Examene::create([
            'nombre'=>'Analisis de Sangre'
        ]);
        $examen2 = Examene::create([
            'nombre'=>'Radiografia'
        ]);
        $examen3 = Examene::create([
            'nombre'=>'Analisis de Orina'
        ]);
        $this->call(ProcedimientoSeed::class);
        $this->call(ViaSeed::class);
        $this->call(DietaSeed::class);
        $this->call(MedicamentoSeed::class);
        $this->call(Licenciados::class);

        //creamos alergias
        Alergia::create([
            'paciente_id'=>$paciente1->id,
            'medicamento_id'=>2,
            'user_id'=>$user1->id,
            'fecha'=>Carbon::now()
        ]);
        Alergia::create([
            'paciente_id'=>$paciente1->id,
            'medicamento_id'=>5,
            'user_id'=>$user1->id,
            'fecha'=>Carbon::now()
        ]);
    }
}
