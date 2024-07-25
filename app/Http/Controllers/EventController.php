<?php

namespace App\Http\Controllers;

use App\Models\Configuracion;
use App\Models\Doctor;
use App\Models\Event;
use App\Models\Horario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fecha_reserva'=>'required|date',
            'hora_reserva'=>'required|date_format:H:i',
        ]);
        
        $doctor = Doctor::find($request->doctor_id);
        $fecha_reserva = $request->fecha_reserva;
        $hora_reserva = $request->hora_reserva.':00';

        $dia = date('l',strtotime($fecha_reserva));
        $dia_reserva = $this->traducir_dia($dia);

        $horarios = Horario::where('doctor_id',$doctor->id)
            ->where('dia',$dia_reserva)
            ->where('hora_inicio','<=',$hora_reserva)
            ->where('hora_fin','>=',$hora_reserva)
            ->exists();

        if(!$horarios){
            return redirect()->back()->with([
                'mensaje'=>'El doctor no esta disponible en ese horario.',
                'icono'=>'error',
                'hora_reserva'=>'El doctor no esta disponible en ese horario.', 
            ]);
        }

        $fecha_hora_reserva = $fecha_reserva." ".$hora_reserva;

        $evento_duplicado = Event::where('doctor_id',$doctor->id)
                        ->where('start',$fecha_hora_reserva)
                        ->exists();

        if($evento_duplicado){
            return redirect()->back()->with([
                'mensaje'=>'Ya existe una reserva con este doctor en ese horario. Porfavor seleccione otro horario.',
                'icono'=>'error',
                'hora_reserva'=>'Ya existe una reserva con este doctor en ese horario. Porfavor seleccione otro horario.', 
            ]);
        }

        $evento = new Event();
        $evento->title = $request->hora_reserva." ".$doctor->especialidad;
        $evento->start = $request->fecha_reserva." ".$hora_reserva;
        $evento->end = $request->fecha_reserva." ".$hora_reserva;
        $evento->color = '#e82216';
        $evento->user_id = Auth::user()->id;
        $evento->doctor_id = $request->doctor_id;
        $evento->save();

        return redirect()->route('admin.index')
        ->with('mensaje','¡Se ha registrado la reserva de la cita medica de la manera correcta!')
        ->with('icono','success');
    }
    public function traducir_dia($dia){
        $dias=[
            'Monday'=>'LUNES',
            'Tuesday'=>'MARTES',
            'Wednesday'=>'MIERCOLES',
            'Thursday'=>'JUEVES',
            'Friday'=>'VIERNES',
            'Saturday'=>'SABADO',
            'Sunday'=>'DOMINGO',
        ];
        return $dias[$dia]??$dias;
    }

    /**
     * Display the specified resource.
     */
    public function show(Event $event)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Event $event)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Event $event)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        Event::destroy($id);
        return redirect()->back()->with([
            'mensaje'=>'Se ha eliminado al registro de la manera correcta.',
            'icono'=>'success',
        ]);
    }

    public function reporte(){
        return view('admin.reserva.reporte');
    }

    public function pdf(){
        $configuracion = Configuracion::latest()->first();
        $eventos = Event::all();
        $pdf =  \PDF::loadView('admin.reserva.pdf',compact('configuracion','eventos'));

        $pdf->output();
        $dompdf = $pdf->getDomPDF();
        $canvas = $dompdf->getCanvas();
        $canvas->page_text(20,800,"Impreso por: ".Auth::user()->email, null, 10, array(0,0,0));
        $canvas->page_text(270,800,"Página {PAGE_NUM} de {PAGE_COUNT}", null, 10, array(0,0,0));
        $canvas->page_text(450,800,"Fecha: ".\Carbon\Carbon::now()->format('d/m/Y')." - ".\Carbon\Carbon::now()->format('H:i:s'),null,10,array(0,0,0));
        return $pdf->stream();
    }

    public function pdf_fecha(Request $request){
        $configuracion = Configuracion::latest()->first();
        $fecha_inicio = $request->input('fecha_inicio');
        $fecha_fin = $request->input('fecha_fin');
        $eventos = Event::whereBetween('start',[$fecha_inicio,$fecha_fin])->get();
        $pdf =  \PDF::loadView('admin.reserva.pdf_fecha',compact('configuracion','eventos','fecha_inicio','fecha_fin'));

        $pdf->output();
        $dompdf = $pdf->getDomPDF();
        $canvas = $dompdf->getCanvas();
        $canvas->page_text(20,800,"Impreso por: ".Auth::user()->email, null, 10, array(0,0,0));
        $canvas->page_text(270,800,"Página {PAGE_NUM} de {PAGE_COUNT}", null, 10, array(0,0,0));
        $canvas->page_text(450,800,"Fecha: ".\Carbon\Carbon::now()->format('d/m/Y')." - ".\Carbon\Carbon::now()->format('H:i:s'),null,10,array(0,0,0));
        return $pdf->stream();
    }
}
