<?php

namespace App\Http\Controllers;

use App\Models\Configuracion;
use App\Models\Doctor;
use App\Models\User;
use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctores = Doctor::with('user')->get();
        return view('admin.doctor.index',compact('doctores'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('admin.doctor.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nombres'=>'required',
            'apellidos'=>'required',
            'run'=>'required|unique:doctors',
            'fono'=>'required',
            'licencia_medica'=>'required',
            'especialidad'=>'required',
            'email'=>'required|max:200|unique:users',
            'password'=>'required|max:200|confirmed',
         ]);
        
         $usuario = new User();
         $usuario->name = $request->nombres;
         $usuario->email = $request->email;
         $usuario->password = Hash::make($request['password']);
         $usuario->save();

         $doctor = new Doctor();
         $doctor->user_id = $usuario->id;
         $doctor->nombres = $request->nombres;
         $doctor->apellidos = $request->apellidos;
         $doctor->run = $request->run;
         $doctor->fono = $request->fono;
         $doctor->licencia_medica = $request->licencia_medica;
         $doctor->especialidad = $request->especialidad;
            
         $doctor->save();
         
        $usuario->assignRole('doctor');
        
         return redirect()->route('admin.doctor.index')
         ->with('mensaje','¡Se ha registrado al doctor de la manera correcta!')
         ->with('icono','success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('admin.doctor.show',compact('doctor'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $doctor = Doctor::findOrFail($id);
        return view('admin.doctor.edit',compact('doctor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $doctor = Doctor::find($id);
        $request->validate([
            'nombres'=>'required',
            'apellidos'=>'required',
            'run'=>'required|unique:doctors,run,'.$doctor->id,
            'fono'=>'required',
            'licencia_medica'=>'required',
            'especialidad'=>'required',
            'email'=>'required|max:200|unique:users,email,'.$doctor->user->id,
            'password'=>'nullable|max:200|confirmed',
         ]);

         $doctor->nombres = $request->nombres;
         $doctor->apellidos = $request->apellidos;
         $doctor->run = $request->run;
         $doctor->fono = $request->fono;
         $doctor->licencia_medica = $request->licencia_medica;
         $doctor->especialidad = $request->especialidad;
         $usuario = User::find($doctor->user->id);
         $usuario->name = $request->nombres;
         $usuario->email = $request->email;
         if($request->filled('password')){
             $usuario->password = Hash::make($request['password']);
         }
         $usuario->save();
         return redirect()->route('admin.doctor.index')
         ->with('mensaje','¡Se ha actualizado al doctor de la manera correcta!')
         ->with('icono','success');
    }

    public function confirmDelete($id){
        $doctor = Doctor::findOrFail($id);
        return view('admin.doctor.delete',compact('doctor'));
    }
    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $doctor = Doctor::find($id);
        $user = $doctor->user;
        $user->delete();
        $doctor->delete();
        return redirect()->route('admin.doctor.index')
            ->with('mensaje','¡Se ha eliminado al doctor de la manera correcta!')
            ->with('icono','success');
        
    }

    public function reporte(){
        return view('admin.doctor.reporte');
    }

    public function pdf(){
        $configuracion = Configuracion::latest()->first();
        $doctores = Doctor::all();
        $pdf =  \PDF::loadView('admin.doctor.pdf',compact('configuracion','doctores'));

        $pdf->output();
        $dompdf = $pdf->getDomPDF();
        $canvas = $dompdf->getCanvas();
        $canvas->page_text(20,800,"Impreso por: ".Auth::user()->email, null, 10, array(0,0,0));
        $canvas->page_text(270,800,"Página {PAGE_NUM} de {PAGE_COUNT}", null, 10, array(0,0,0));
        $canvas->page_text(450,800,"Fecha: ".\Carbon\Carbon::now()->format('d/m/Y')." - ".\Carbon\Carbon::now()->format('H:i:s'),null,10,array(0,0,0));
        return $pdf->stream();
    }
}
