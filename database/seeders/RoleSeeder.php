<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $admin = Role::create(['name' => 'admin']);
        $secretaria = Role::create(['name' => 'secretaria']);
        $doctor = Role::create(['name' => 'doctor']);
        $paciente = Role::create(['name' => 'paciente']);
        $usuario = Role::create(['name' => 'usuario']);

        // ruta admin-index

        Permission::create(['name' => 'admin.index']);
        
        //rutas admin-configuracion
        Permission::create(['name' => 'admin.configuracion.index'])->syncRoles($admin);
        Permission::create(['name' => 'admin.configuracion.create'])->syncRoles($admin);
        Permission::create(['name' => 'admin.configuracion.store'])->syncRoles($admin);
        Permission::create(['name' => 'admin.configuracion.show'])->syncRoles($admin);
        Permission::create(['name' => 'admin.configuracion.edit'])->syncRoles($admin);
        Permission::create(['name' => 'admin.configuracion.update'])->syncRoles($admin);
        Permission::create(['name' => 'admin.configuracion.confirmDelete'])->syncRoles($admin);
        Permission::create(['name' => 'admin.configuracion.delete'])->syncRoles($admin);

        //rutas admin-usuario
        Permission::create(['name' => 'admin.usuario.index'])->syncRoles($admin);
        Permission::create(['name' => 'admin.usuario.create'])->syncRoles($admin);
        Permission::create(['name' => 'admin.usuario.store'])->syncRoles($admin);
        Permission::create(['name' => 'admin.usuario.show'])->syncRoles($admin);
        Permission::create(['name' => 'admin.usuario.edit'])->syncRoles($admin);
        Permission::create(['name' => 'admin.usuario.update'])->syncRoles($admin);

        //rutas admin-secretaria
        Permission::create(['name' => 'admin.secretaria.index'])->syncRoles($admin);
        Permission::create(['name' => 'admin.secretaria.create'])->syncRoles($admin);
        Permission::create(['name' => 'admin.secretaria.store'])->syncRoles($admin);
        Permission::create(['name' => 'admin.secretaria.show'])->syncRoles($admin);
        Permission::create(['name' => 'admin.secretaria.edit'])->syncRoles($admin);
        Permission::create(['name' => 'admin.secretaria.update'])->syncRoles($admin);
        Permission::create(['name' => 'admin.secretaria.confirmDelete'])->syncRoles($admin);
        Permission::create(['name' => 'admin.secretaria.delete'])->syncRoles($admin);

        //rutas admin-paciente
        Permission::create(['name' => 'admin.paciente.index'])->syncRoles($admin, $secretaria);
        Permission::create(['name' => 'admin.paciente.create'])->syncRoles($admin, $secretaria);
        Permission::create(['name' => 'admin.paciente.store'])->syncRoles($admin, $secretaria);
        Permission::create(['name' => 'admin.paciente.show'])->syncRoles($admin, $secretaria);
        Permission::create(['name' => 'admin.paciente.edit'])->syncRoles($admin, $secretaria);
        Permission::create(['name' => 'admin.paciente.update'])->syncRoles($admin, $secretaria);

        //rutas admin-consultorio
        Permission::create(['name' => 'admin.consultorio.index'])->syncRoles($admin, $secretaria);
        Permission::create(['name' => 'admin.consultorio.create'])->syncRoles($admin, $secretaria);
        Permission::create(['name' => 'admin.consultorio.store'])->syncRoles($admin, $secretaria);
        Permission::create(['name' => 'admin.consultorio.show'])->syncRoles($admin, $secretaria);
        Permission::create(['name' => 'admin.consultorio.edit'])->syncRoles($admin, $secretaria);
        Permission::create(['name' => 'admin.consultorio.update'])->syncRoles($admin, $secretaria);
        Permission::create(['name' => 'admin.consultorio.confirmDelete'])->syncRoles($admin, $secretaria);
        Permission::create(['name' => 'admin.consultorio.delete'])->syncRoles($admin, $secretaria);

        //rutas admin-doctor
        Permission::create(['name' => 'admin.doctor.index'])->syncRoles($admin, $secretaria);
        Permission::create(['name' => 'admin.doctor.create'])->syncRoles($admin, $secretaria);
        Permission::create(['name' => 'admin.doctor.store'])->syncRoles($admin, $secretaria);
        Permission::create(['name' => 'admin.doctor.show'])->syncRoles($admin, $secretaria);
        Permission::create(['name' => 'admin.doctor.edit'])->syncRoles($admin, $secretaria);
        Permission::create(['name' => 'admin.doctor.update'])->syncRoles($admin, $secretaria);
        Permission::create(['name' => 'admin.doctor.confirmDelete'])->syncRoles($admin, $secretaria);
        Permission::create(['name' => 'admin.doctor.delete'])->syncRoles($admin, $secretaria);
        Permission::create(['name' => 'admin.doctor.reporte'])->syncRoles($admin, $secretaria);
        Permission::create(['name' => 'admin.doctor.pdf'])->syncRoles($admin, $secretaria);

        //rutas admin-horario
        Permission::create(['name' => 'admin.horario.index'])->syncRoles($admin, $secretaria);
        Permission::create(['name' => 'admin.horario.create'])->syncRoles($admin, $secretaria);
        Permission::create(['name' => 'admin.horario.store'])->syncRoles($admin, $secretaria);
        Permission::create(['name' => 'admin.horario.show'])->syncRoles($admin, $secretaria);
        Permission::create(['name' => 'admin.horario.confirmDelete'])->syncRoles($admin, $secretaria);
        Permission::create(['name' => 'admin.horario.delete'])->syncRoles($admin, $secretaria);

        // rutas admin-AJAX
        Permission::create(['name' => 'admin.horario.cargarConsultorios'])->syncRoles($admin, $secretaria);

        // rutas admin-reservas
        Permission::create(['name' => 'admin.reserva.reporte'])->syncRoles($admin);
        Permission::create(['name' => 'admin.reserva.pdf'])->syncRoles($admin);
        Permission::create(['name' => 'admin.reserva.pdf_fecha'])->syncRoles($admin);

        // AJAX
        Permission::create(['name' => 'cargarDatosConsultorios'])->syncRoles($usuario, $paciente);
        Permission::create(['name' => 'cargarReservaDoctores'])->syncRoles($admin, $usuario, $paciente);
        Permission::create(['name' => 'verReservas'])->syncRoles($admin, $secretaria);
        Permission::create(['name' => 'admin.evento.create'])->syncRoles($admin, $usuario, $paciente);
        Permission::create(['name' => 'admin.evento.delete'])->syncRoles($admin, $secretaria);


        //rutas para historial
        Permission::create(['name' => 'admin.historial.index'])->syncRoles($doctor);
        Permission::create(['name' => 'admin.historial.create'])->syncRoles($doctor);
        Permission::create(['name' => 'admin.historial.store'])->syncRoles($doctor);
        Permission::create(['name' => 'admin.historial.show'])->syncRoles($doctor);
        Permission::create(['name' => 'admin.historial.edit'])->syncRoles($doctor);
        Permission::create(['name' => 'admin.historial.update'])->syncRoles($doctor);
        Permission::create(['name' => 'admin.historial.confirmDelete'])->syncRoles($doctor);
        Permission::create(['name' => 'admin.historial.delete'])->syncRoles($doctor);
        Permission::create(['name' => 'admin.historial.pdf'])->syncRoles($doctor);

        Permission::create(['name' => 'admin.historial.buscarPaciente'])->syncRoles($admin, $doctor);
        Permission::create(['name' => 'admin.historial.imprimirHistorial'])->syncRoles($admin, $doctor);

        //rutas para pagos

        Permission::create(['name' => 'admin.pago.index'])->syncRoles($secretaria);
        Permission::create(['name' => 'admin.pago.create'])->syncRoles($secretaria);
        Permission::create(['name' => 'admin.pago.store'])->syncRoles($secretaria);
        Permission::create(['name' => 'admin.pago.show'])->syncRoles($secretaria);
        Permission::create(['name' => 'admin.pago.edit'])->syncRoles($secretaria);
        Permission::create(['name' => 'admin.pago.update'])->syncRoles($secretaria);
        Permission::create(['name' => 'admin.pago.confirmDelete'])->syncRoles($secretaria);
        Permission::create(['name' => 'admin.pago.delete'])->syncRoles($secretaria);
        Permission::create(['name' => 'admin.pago.pdf'])->syncRoles($secretaria);
    }
}
