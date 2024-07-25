<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [App\Http\Controllers\WebController::class, 'index'])->name('index');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

 // RUTAS ADMIN 

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('admin.index')
->middleware('auth');


// RUTAS ADMIN - CONFIGURACIONES

Route::get('/admin/configuracion', [App\Http\Controllers\ConfiguracionController::class, 'index'])->name('admin.configuracion.index')
->middleware('auth','can:admin.configuracion.index');

Route::get('/admin/configuracion/create', [App\Http\Controllers\ConfiguracionController::class, 'create'])->name('admin.configuracion.create')
->middleware('auth','can:admin.configuracion.create');

Route::post('/admin/configuracion/create', [App\Http\Controllers\ConfiguracionController::class, 'store'])->name('admin.configuracion.store')
->middleware('auth','can:admin.configuracion.store');

Route::get('/admin/configuracion/{id}', [App\Http\Controllers\ConfiguracionController::class, 'show'])->name('admin.configuracion.show')
->middleware('auth','can:admin.configuracion.show');

Route::get('/admin/configuracion/{id}/edit', [App\Http\Controllers\ConfiguracionController::class, 'edit'])->name('admin.configuracion.edit')
->middleware('auth','can:admin.configuracion.edit');

Route::put('/admin/configuracion/{id}', [App\Http\Controllers\ConfiguracionController::class, 'update'])->name('admin.configuracion.update')
->middleware('auth','can:admin.configuracion.update');

Route::get('/admin/configuracion/{id}/confirm-delete', [App\Http\Controllers\ConfiguracionController::class, 'confirmDelete'])->name('admin.configuracion.confirmDelete')
->middleware('auth','can:admin.configuracion.confirmDelete');

Route::delete('/admin/configuracion/{id}', [App\Http\Controllers\ConfiguracionController::class, 'delete'])->name('admin.configuracion.delete')
->middleware('auth','can:admin.configuracion.delete');

 // RUTAS ADMIN - USUARIOS

Route::get('/admin/usuario', [App\Http\Controllers\UsuarioController::class, 'index'])->name('admin.usuario.index')
->middleware('auth','can:admin.usuario.index');

Route::get('/admin/usuario/create', [App\Http\Controllers\UsuarioController::class, 'create'])->name('admin.usuario.create')
->middleware('auth','can:admin.usuario.create');

Route::post('/admin/usuario/create', [App\Http\Controllers\UsuarioController::class, 'store'])->name('admin.usuario.store')
->middleware('auth','can:admin.usuario.store');

Route::get('/admin/usuario/{id}', [App\Http\Controllers\UsuarioController::class, 'show'])->name('admin.usuario.show')
->middleware('auth','can:admin.usuario.show');

Route::get('/admin/usuario/{id}/edit', [App\Http\Controllers\UsuarioController::class, 'edit'])->name('admin.usuario.edit')
->middleware('auth','can:admin.usuario.edit');

Route::put('/admin/usuario/{id}', [App\Http\Controllers\UsuarioController::class, 'update'])->name('admin.usuario.update')
->middleware('auth','can:admin.usuario.update');

  // RUTAS ADMIN-SECRETARIA

Route::get('/admin/secretaria', [App\Http\Controllers\SecretariaController::class, 'index'])->name('admin.secretaria.index')
->middleware('auth','can:admin.secretaria.index');

Route::get('/admin/secretaria/create', [App\Http\Controllers\SecretariaController::class, 'create'])->name('admin.secretaria.create')
->middleware('auth','can:admin.secretaria.create');

Route::post('/admin/secretaria/create', [App\Http\Controllers\SecretariaController::class, 'store'])->name('admin.secretaria.store')
->middleware('auth','can:admin.secretaria.store');

Route::get('/admin/secretaria/{id}', [App\Http\Controllers\SecretariaController::class, 'show'])->name('admin.secretaria.show')
->middleware('auth','can:admin.secretaria.show');

Route::get('/admin/secretaria/{id}/edit', [App\Http\Controllers\SecretariaController::class, 'edit'])->name('admin.secretaria.edit')
->middleware('auth','can:admin.secretaria.edit');

Route::put('/admin/secretaria/{id}', [App\Http\Controllers\SecretariaController::class, 'update'])->name('admin.secretaria.update')
->middleware('auth','can:admin.secretaria.update');

Route::get('/admin/secretaria/{id}/confirm-delete', [App\Http\Controllers\SecretariaController::class, 'confirmDelete'])->name('admin.secretaria.confirmDelete')
->middleware('auth','can:admin.secretaria.confirmDelete');

Route::delete('/admin/secretaria/{id}', [App\Http\Controllers\SecretariaController::class, 'destroy'])->name('admin.secretaria.delete')
->middleware('auth','can:admin.secretaria.delete');

  // RUTAS ADMIN-PACIENTE

Route::get('/admin/paciente', [App\Http\Controllers\PacienteController::class, 'index'])->name('admin.paciente.index')
->middleware('auth','can:admin.paciente.index');

Route::get('/admin/paciente/create', [App\Http\Controllers\PacienteController::class, 'create'])->name('admin.paciente.create')
->middleware('auth','can:admin.paciente.create');

Route::post('/admin/paciente/create', [App\Http\Controllers\PacienteController::class, 'store'])->name('admin.paciente.store')
->middleware('auth','can:admin.paciente.store');

Route::get('/admin/paciente/{id}', [App\Http\Controllers\PacienteController::class, 'show'])->name('admin.paciente.show')
->middleware('auth','can:admin.paciente.show');

Route::get('/admin/paciente/{id}/edit', [App\Http\Controllers\PacienteController::class, 'edit'])->name('admin.paciente.edit')
->middleware('auth','can:admin.paciente.edit');

Route::put('/admin/paciente/{id}', [App\Http\Controllers\PacienteController::class, 'update'])->name('admin.paciente.update')
->middleware('auth','can:admin.paciente.update');

  // RUTAS ADMIN-CONSULTORIO

Route::get('/admin/consultorio', [App\Http\Controllers\ConsultorioController::class, 'index'])->name('admin.consultorio.index')
->middleware('auth','can:admin.consultorio.index');

Route::get('/admin/consultorio/create', [App\Http\Controllers\ConsultorioController::class, 'create'])->name('admin.consultorio.create')
->middleware('auth','can:admin.consultorio.create');

Route::post('/admin/consultorio/create', [App\Http\Controllers\ConsultorioController::class, 'store'])->name('admin.consultorio.store')
->middleware('auth','can:admin.consultorio.store');

Route::get('/admin/consultorio/{id}', [App\Http\Controllers\ConsultorioController::class, 'show'])->name('admin.consultorio.show')
->middleware('auth','can:admin.consultorio.show');

Route::get('/admin/consultorio/{id}/edit', [App\Http\Controllers\ConsultorioController::class, 'edit'])->name('admin.consultorio.edit')
->middleware('auth','can:admin.consultorio.edit');

Route::put('/admin/consultorio/{id}', [App\Http\Controllers\ConsultorioController::class, 'update'])->name('admin.consultorio.update')
->middleware('auth','can:admin.consultorio.update');

Route::get('/admin/consultorio/{id}/confirm-delete', [App\Http\Controllers\ConsultorioController::class, 'confirmDelete'])->name('admin.consultorio.confirmDelete')
->middleware('auth','can:admin.consultorio.confirmDelete');

Route::delete('/admin/consultorio/{id}', [App\Http\Controllers\ConsultorioController::class, 'delete'])->name('admin.consultorio.delete')
->middleware('auth','can:admin.consultorio.delete');

Route::get('/admin/doctor/reporte', [App\Http\Controllers\DoctorController::class, 'reporte'])->name('admin.doctor.reporte')
->middleware('auth','can:admin.doctor.reporte');

Route::get('/admin/doctor/pdf', [App\Http\Controllers\DoctorController::class, 'pdf'])->name('admin.doctor.pdf')
->middleware('auth','can:admin.doctor.pdf');

  // RUTAS ADMIN-DOCTORES

Route::get('/admin/doctor', [App\Http\Controllers\DoctorController::class, 'index'])->name('admin.doctor.index')
->middleware('auth','can:admin.doctor.index');

Route::get('/admin/doctor/create', [App\Http\Controllers\DoctorController::class, 'create'])->name('admin.doctor.create')
->middleware('auth','can:admin.doctor.create');

Route::post('/admin/doctor/create', [App\Http\Controllers\DoctorController::class, 'store'])->name('admin.doctor.store')
->middleware('auth','can:admin.doctor.store');

Route::get('/admin/doctor/{id}', [App\Http\Controllers\DoctorController::class, 'show'])->name('admin.doctor.show')
->middleware('auth','can:admin.doctor.show');

Route::get('/admin/doctor/{id}/edit', [App\Http\Controllers\DoctorController::class, 'edit'])->name('admin.doctor.edit')
->middleware('auth','can:admin.doctor.edit');

Route::put('/admin/doctor/{id}', [App\Http\Controllers\DoctorController::class, 'update'])->name('admin.doctor.update')
->middleware('auth','can:admin.doctor.update');

Route::get('/admin/doctor/{id}/confirm-delete', [App\Http\Controllers\DoctorController::class, 'confirmDelete'])->name('admin.doctor.confirmDelete')
->middleware('auth','can:admin.doctor.confirmDelete');

Route::delete('/admin/doctor/{id}', [App\Http\Controllers\DoctorController::class, 'delete'])->name('admin.doctor.delete')
->middleware('auth','can:admin.doctor.delete');

  // RUTAS ADMIN-HORARIOS

Route::get('/admin/horario', [App\Http\Controllers\HorarioController::class, 'index'])->name('admin.horario.index')
->middleware('auth','can:admin.horario.index');

Route::get('/admin/horario/create', [App\Http\Controllers\HorarioController::class, 'create'])->name('admin.horario.create')
->middleware('auth','can:admin.horario.create');

Route::post('/admin/horario/create', [App\Http\Controllers\HorarioController::class, 'store'])->name('admin.horario.store')
->middleware('auth','can:admin.horario.store');

Route::get('/admin/horario/{id}', [App\Http\Controllers\HorarioController::class, 'show'])->name('admin.horario.show')
->middleware('auth','can:admin.horario.show');

Route::get('/admin/horario/{id}/confirm-delete', [App\Http\Controllers\HorarioController::class, 'confirmDelete'])->name('admin.horario.confirmDelete')
->middleware('auth','can:admin.horario.confirmDelete');

Route::delete('/admin/horario/{id}', [App\Http\Controllers\HorarioController::class, 'delete'])->name('admin.horario.delete')
->middleware('auth','can:admin.horario.delete');

// AJAX
Route::get('/admin/horario/consultorio/{id}', [App\Http\Controllers\HorarioController::class, 'cargarConsultorios'])->name('admin.horario.cargarConsultorios')
->middleware('auth','can:admin.horario.cargarConsultorios');

// RUTAS - USUARIO

Route::get('/consultorio/{id}', [App\Http\Controllers\WebController::class, 'cargarDatosConsultorios'])->name('cargarDatosConsultorios')
->middleware('auth','can:cargarDatosConsultorios');

Route::get('/cargarReservaDoctores/{id}', [App\Http\Controllers\WebController::class, 'cargarReservaDoctores'])->name('cargarReservaDoctores')
->middleware('auth','can:cargarReservaDoctores');

Route::get('/admin/verReservas', [App\Http\Controllers\AdminController::class, 'verReservas'])->name('verReservas')
->middleware('auth','can:verReservas');

Route::post('/admin/evento/create', [App\Http\Controllers\EventController::class, 'store'])->name('admin.evento.create')
->middleware('auth','can:admin.evento.create');

// RUTAS ADMIN-EVENTOS

Route::delete('/admin/evento/delete/{id}', [App\Http\Controllers\EventController::class, 'delete'])->name('admin.evento.delete')
->middleware('auth','can:admin.evento.delete');


// RUTAS RESERVAS

Route::get('/admin/reserva/reporte', [App\Http\Controllers\EventController::class, 'reporte'])->name('admin.reserva.reporte')
->middleware('auth','can:admin.reserva.reporte');

Route::get('/admin/reserva/pdf', [App\Http\Controllers\EventController::class, 'pdf'])->name('admin.reserva.pdf')
->middleware('auth','can:admin.reserva.pdf');

Route::get('/admin/reserva/pdf_fecha', [App\Http\Controllers\EventController::class, 'pdf_fecha'])->name('admin.reserva.pdf_fecha')
->middleware('auth','can:admin.reserva.pdf_fecha');

  // RUTAS HISTORIAL

Route::get('/admin/historial', [App\Http\Controllers\HistorialController::class, 'index'])->name('admin.historial.index')
->middleware('auth','can:admin.historial.index');

Route::get('/admin/historial/create', [App\Http\Controllers\HistorialController::class, 'create'])->name('admin.historial.create')
->middleware('auth','can:admin.historial.create');

Route::post('/admin/historial/create', [App\Http\Controllers\HistorialController::class, 'store'])->name('admin.historial.store')
->middleware('auth','can:admin.historial.store');

Route::get('/admin/historial/buscarPaciente', [App\Http\Controllers\HistorialController::class, 'buscarPaciente'])->name('admin.historial.buscarPaciente')
->middleware('auth','can:admin.historial.buscarPaciente');

Route::get('/admin/historial/{id}', [App\Http\Controllers\HistorialController::class, 'show'])->name('admin.historial.show')
->middleware('auth','can:admin.historial.show');

Route::get('/admin/historial/{id}/edit', [App\Http\Controllers\HistorialController::class, 'edit'])->name('admin.historial.edit')
->middleware('auth','can:admin.historial.edit');

Route::put('/admin/historial/{id}', [App\Http\Controllers\HistorialController::class, 'update'])->name('admin.historial.update')
->middleware('auth','can:admin.historial.update');

Route::get('/admin/historial/{id}/confirm-delete', [App\Http\Controllers\HistorialController::class, 'confirmDelete'])->name('admin.historial.confirmDelete')
->middleware('auth','can:admin.historial.confirmDelete');

Route::delete('/admin/historial/{id}', [App\Http\Controllers\HistorialController::class, 'delete'])->name('admin.historial.delete')
->middleware('auth','can:admin.historial.delete');

Route::get('/admin/historial/pdf/{id}', [App\Http\Controllers\HistorialController::class, 'pdf'])->name('admin.historial.pdf')
->middleware('auth','can:admin.historial.pdf');

Route::get('/admin/historial/paciente/{id}', [App\Http\Controllers\HistorialController::class, 'imprimirHistorial'])->name('admin.historial.imprimirHistorial')
->middleware('auth','can:admin.historial.imprimirHistorial');


// RUTAS PAGO

Route::get('/admin/pago', [App\Http\Controllers\PagoController::class, 'index'])->name('admin.pago.index')
->middleware('auth','can:admin.pago.index');

Route::get('/admin/pago/create', [App\Http\Controllers\PagoController::class, 'create'])->name('admin.pago.create')
->middleware('auth','can:admin.pago.create');

Route::post('/admin/pago/create', [App\Http\Controllers\PagoController::class, 'store'])->name('admin.pago.store')
->middleware('auth','can:admin.pago.store');

Route::get('/admin/pago/{id}', [App\Http\Controllers\PagoController::class, 'show'])->name('admin.pago.show')
->middleware('auth','can:admin.pago.show');

Route::get('/admin/pago/{id}/edit', [App\Http\Controllers\PagoController::class, 'edit'])->name('admin.pago.edit')
->middleware('auth','can:admin.pago.edit');

Route::put('/admin/pago/{id}', [App\Http\Controllers\PagoController::class, 'update'])->name('admin.pago.update')
->middleware('auth','can:admin.pago.update');

Route::get('/admin/pago/{id}/confirm-delete', [App\Http\Controllers\PagoController::class, 'confirmDelete'])->name('admin.pago.confirmDelete')
->middleware('auth','can:admin.pago.confirmDelete');

Route::delete('/admin/pago/{id}', [App\Http\Controllers\PagoController::class, 'delete'])->name('admin.pago.delete')
->middleware('auth','can:admin.pago.delete');

Route::get('/admin/pago/pdf/{id}', [App\Http\Controllers\PagoController::class, 'pdf'])->name('admin.pago.pdf')
->middleware('auth','can:admin.pago.pdf');