<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Configuracion;
use App\Models\Consultorio;
use App\Models\Doctor;
use App\Models\Horario;
use App\Models\Secretaria;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use function PHPSTORM_META\map;

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

        //  SEEDER ROLES Y PERMISOS

        $this->call([RoleSeeder::class,]);

        User::create([
            'name' => 'Administrador',
            'email' => 'admin@admin.com',
            'password' => Hash::make('admin123')
        ])->assignRole('admin');

        User::create([
            'name' => 'Doctor',
            'email' => 'doctor@admin.com',
            'password' => Hash::make('doctor123')
        ])->assignRole('doctor');

        Doctor::create([
            'nombres'=>'Doc',
            'apellidos'=>'tor',
            'run'=>'1234567-9',
            'fono'=>'77777777777',
            'licencia_medica'=>'Si',
            'especialidad'=>'PODOLOGÍA',
            'user_id'=>'2'
        ]);

        User::create([
            'name' => 'Doctor2',
            'email' => 'doctor2@admin.com',
            'password' => Hash::make('doctor123')
        ])->assignRole('doctor');

        Doctor::create([
            'nombres'=>'Doc',
            'apellidos'=>'tor 2',
            'run'=>'121231-9',
            'fono'=>'77777777777',
            'licencia_medica'=>'Si',
            'especialidad'=>'NEUROLOGÍA',
            'user_id'=>'3'
        ]);

        User::create([
            'name' => 'Doctor3',
            'email' => 'doctor3@admin.com',
            'password' => Hash::make('doctor123')
        ])->assignRole('doctor');

        Doctor::create([
            'nombres'=>'Doc',
            'apellidos'=>'tor 3',
            'run'=>'1215151-9',
            'fono'=>'77777777777',
            'licencia_medica'=>'Si',
            'especialidad'=>'TRAUMATOLOGÍA',
            'user_id'=>'4'
        ]);

        User::create([
            'name' => 'Secretaria',
            'email' => 'secretaria@admin.com',
            'password' => Hash::make('secretaria123')
        ])->assignRole('secretaria');

        Secretaria::create([
            'nombres'=>'Secre',
            'apellidos'=>'Taria',
            'run'=>'12321421',
            'fono'=>'77777777',
            'direccion'=>'Zona Miraflores',
            'fecha_nacimiento'=>'10/09/1990',
            'user_id'=>'5'
        ]);

        Consultorio::create([
            'nombre'=>'PODOLOGÍA',
            'capacidad'=>'15',
            'ubicacion'=>'2do Piso | Sala 205',
            'telefono'=>'77777777',
            'especialidad'=>'PODOLOGÍA',
            'estado'=>'ACTIVO',
        ]);

        Consultorio::create([
            'nombre'=>'NEUROLOGÍA',
            'capacidad'=>'15',
            'ubicacion'=>'3cer Piso | Sala1205',
            'telefono'=>'77777777',
            'especialidad'=>'NEUROLOGÍA',
            'estado'=>'INACTIVO',
        ]);


        Consultorio::create([
            'nombre'=>'TRAUMATOLOGÍA',
            'capacidad'=>'15',
            'ubicacion'=>'4to Piso | Sala 305',
            'telefono'=>'77777777',
            'especialidad'=>'TRAUMATOLOGÍA',
            'estado'=>'ACTIVO',
        ]);

        User::create([
            'name' => 'Paciente',
            'email' => 'paciente@admin.com',
            'password' => Hash::make('paciente123')
        ])->assignRole('paciente');

        User::create([
            'name' => 'Usuario',
            'email' => 'usuario@admin.com',
            'password' => Hash::make('usuario123')
        ])->assignRole('usuario');
        
        $this->call([PacienteSeeder::class,]);

        Horario::create([
            'dia'=>'LUNES',
            'hora_inicio'=>'08:00:00',
            'hora_fin'=>'15:00:00',
            'doctor_id'=>'1',
            'consultorio_id'=>'1',
        ]);

        Configuracion::create([
            'nombre'=>'Vital Salud y Belleza.',
            'direccion'=>'//',
            'fono'=>'958641918',
            'correo'=>'vital@gmail.com',
            'logo'=>'logos/VwDUVFVFhfOZbh7fiYzOLxhxdT5apgOZJgOvW5LM.jpg',
        ]);

    }
}
