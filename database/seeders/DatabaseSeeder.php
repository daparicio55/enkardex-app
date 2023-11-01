<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Ambiente;
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
        /* $medicamento1 = Medicamento::create([
            'codigo'=>'010350104',
            'denominacion'=>'TRASTUZUMAB',
            'especificaciones'=>'21mg/mL x 20mL después de la reconstitución (con diluyente)',
            'unidad'=>'AM',
            'restriccion'=>'1,3,8',
            'indicaciones'=>'EN ESTABLECIMIENTOS DE 
            SALUD DE TODOS LOS 
            NIVELES: 
            Cáncer de mama HER 2 NEU +++ 
            ADICIONALMENTE EN 
            ESTABLECIMIENTOS III-2 
            SEGÚN Resolución Ministerial N° 495- 2022/M1NSA: 
            -Como neoadyuvancia para  pacientes con cáncer de mama her2 positivo 
            -Tratamiento de primera línea en pacientes con cáncer de  mama metastásico, cuyos  tumores sobreexpresan her2 o  tienen amplificación del gen HER2
            -En combinación con  quimioterapia, para el tratamiento de pacientes  con adenocarcinoma gástrico o de unión gastroesofágica metastásico, HER2- positivo, que no hayan  recibido un tratamiento  previo para metástasis.',
        ]);
        $medicamento2 = Medicamento::create([
            'codigo'=>'010350214',
            'denominacion'=>'Trastuzumab ',
            'especificaciones'=>'600mg',
            'unidad'=>'AM',
            'restriccion'=>'1,3,8',
            'indicaciones'=>'Para el tratamiento de paciente con cáncer de mama HER-2 positivo en adyuvancia, como una alternativa a Trastuzumab 420mg inyectable',
        ]); */
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
            'apellidos'=>'Messi Solano',
            'edad'=>38,
            'sexo'=>'Masculino',
            'dni'=>'12345678',
            'historia'=>'676668'
        ]);
        $paciente1 = Paciente::create([
            'nombres'=>'Juana',
            'apellidos'=>'Palermo Boluarte',
            'edad'=>30,
            'sexo'=>'Femenino',
            'dni'=>'00000000',
            'historia'=>'856974'
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
    }
}
