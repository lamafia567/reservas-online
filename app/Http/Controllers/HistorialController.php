<?php

namespace App\Http\Controllers;

use App\Models\Configuracion;
use App\Models\Historial;
use App\Models\Paciente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistorialController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $historiales = Historial::with('paciente','doctor')->get();
        return view('admin.historial.index',compact('historiales'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pacientes = Paciente::orderBy('apellidos','asc')->get();
        return view('admin.historial.create',compact('pacientes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $historial = new Historial();
        $historial->detalles = $request->detalle;
        $historial->fecha_visita = $request->fecha_visita;
        $historial->paciente_id = $request->paciente_id;
        $historial->doctor_id = Auth::user()->doctor->id;

        $historial->save();

        return redirect()->route('admin.historial.index')
         ->with('mensaje','¡Se ha registrado al historial de la manera correcta!')
         ->with('icono','success');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $historial = Historial::find($id);
        return view('admin.historial.show',compact('historial'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pacientes = Paciente::orderBy('apellidos','asc')->get();
        $historial = Historial::find($id);
        return view('admin.historial.edit',compact('historial','pacientes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $historial = Historial::find($id);
        
        $historial->detalles = $request->detalle;
        $historial->fecha_visita = $request->fecha_visita;
        $historial->paciente_id = $request->paciente_id;
        $historial->doctor_id = Auth::user()->doctor->id;

        $historial->save();

        return redirect()->route('admin.historial.index')
         ->with('mensaje','¡Se ha actualizado al historial de la manera correcta!')
         ->with('icono','success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        $historial = Historial::find($id);
        $historial->delete();
        return redirect()->route('admin.historial.index')
            ->with('mensaje','¡Se ha eliminado al historial de la manera correcta!')
            ->with('icono','success');
    }
    public function confirmDelete($id){
        $historial = Historial::find($id);
        $pacientes = Paciente::orderBy('apellidos','asc')->get();
        return view('admin.historial.delete',compact('historial','pacientes'));
    }

    public function pdf($id){
        $configuracion = Configuracion::latest()->first();
        $historial = Historial::find($id);
        $pdf =  \PDF::loadView('admin.historial.pdf',compact('configuracion','historial'));

        $pdf->output();
        $dompdf = $pdf->getDomPDF();
        $canvas = $dompdf->getCanvas();
        $canvas->page_text(20,800,"Impreso por: ".Auth::user()->email, null, 10, array(0,0,0));
        $canvas->page_text(270,800,"Página {PAGE_NUM} de {PAGE_COUNT}", null, 10, array(0,0,0));
        $canvas->page_text(450,800,"Fecha: ".\Carbon\Carbon::now()->format('d/m/Y')." - ".\Carbon\Carbon::now()->format('H:i:s'),null,10,array(0,0,0));
        return $pdf->stream();
    }

    public function buscarPaciente(Request $request){
        $run = $request->run;
        $paciente = Paciente::where('run',$run)->first();
        return view('admin.historial.buscarPaciente',compact('paciente'));
    }

    public function imprimirHistorial($id){
        $configuracion = Configuracion::latest()->first();
        $paciente = Paciente::find($id);
        $historiales = Historial::where('paciente_id',$id)->get();
        $pdf =  \PDF::loadView('admin.historial.imprimirHistorial',compact('configuracion','historiales','paciente'));

        $pdf->output();
        $dompdf = $pdf->getDomPDF();
        $canvas = $dompdf->getCanvas();
        $canvas->page_text(20,800,"Impreso por: ".Auth::user()->email, null, 10, array(0,0,0));
        $canvas->page_text(270,800,"Página {PAGE_NUM} de {PAGE_COUNT}", null, 10, array(0,0,0));
        $canvas->page_text(450,800,"Fecha: ".\Carbon\Carbon::now()->format('d/m/Y')." - ".\Carbon\Carbon::now()->format('H:i:s'),null,10,array(0,0,0));
        return $pdf->stream();
    }
}
