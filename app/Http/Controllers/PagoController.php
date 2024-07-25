<?php

namespace App\Http\Controllers;

use App\Models\Configuracion;
use App\Models\Doctor;
use App\Models\Paciente;
use App\Models\Pago;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;

class PagoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pagos = Pago::all();
        $total_monto = Pago::sum('monto');
        return view('admin.pago.index',compact('pagos','total_monto'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pacientes = Paciente::orderBy('apellidos','asc')->get();
        $doctores = Doctor::orderBy('apellidos','asc')->get();
        return view('admin.pago.create', compact('pacientes','doctores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'monto'=>'required',
            'fecha_pago'=>'required',
            'descripcion'=>'required',
        ]);

        $pago = new Pago();
        $pago->monto = $request->monto;
        $pago->fecha_pago = $request->fecha_pago;
        $pago->descripcion = $request->descripcion;
        $pago->paciente_id = $request->paciente_id;
        $pago->doctor_id = $request->doctor_id;
        $pago->save();

        return redirect()->route('admin.pago.index')
        ->with('mensaje','¡Se ha ingresado el pago de la manera correcta!')
        ->with('icono','success');
        
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pago = Pago::find($id);
        return view('admin.pago.show',compact('pago'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $pacientes = Paciente::orderBy('apellidos','asc')->get();
        $doctores = Doctor::orderBy('apellidos','asc')->get();
        $pago = Pago::find($id);
        return view('admin.pago.edit',compact('pago','pacientes','doctores'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'monto'=>'required',
            'fecha_pago'=>'required',
            'descripcion'=>'required',
        ]);

        $pago = Pago::find($id);
        $pago->monto = $request->monto;
        $pago->fecha_pago = $request->fecha_pago;
        $pago->descripcion = $request->descripcion;
        $pago->paciente_id = $request->paciente_id;
        $pago->doctor_id = $request->doctor_id;
        $pago->save();

        return redirect()->route('admin.pago.index')
        ->with('mensaje','¡Se ha actualizado el pago de la manera correcta!')
        ->with('icono','success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
        Pago::destroy($id);
        return redirect()->route('admin.pago.index')
        ->with('mensaje','¡Se ha borrado el registro de la manera correcta!')
        ->with('icono','success');
    }

    public function confirmDelete($id){
        $pacientes = Paciente::orderBy('apellidos','asc')->get();
        $doctores = Doctor::orderBy('apellidos','asc')->get();
        $pago = Pago::find($id);
        return view('admin.pago.delete',compact('pago'));
    }

    public function pdf($id){
        $configuracion = Configuracion::latest()->first();
        $pago = Pago::find($id);
        $data = "Codigo de sesguridad de comprobante de pago del paciente 
        ".$pago->paciente->apellidos." ".$pago->paciente->nombres." con fecha de pago 
        ".$pago->fecha_pago." con el monto de ".$pago->monto;

        $qrCode = new QrCode($data);
        $writer = new PngWriter();
        $result = $writer->write($qrCode);
        $qrCodeBase64 = base64_encode($result->getString());

        $pdf =  \PDF::loadView('admin.pago.pdf',compact('configuracion','pago','qrCodeBase64'));
        $pdf->output();
        $dompdf = $pdf->getDomPDF();
        $canvas = $dompdf->getCanvas();
        $canvas->page_text(20,800,"Impreso por: ".Auth::user()->email, null, 10, array(0,0,0));
        $canvas->page_text(270,800,"Página {PAGE_NUM} de {PAGE_COUNT}", null, 10, array(0,0,0));
        $canvas->page_text(450,800,"Fecha: ".\Carbon\Carbon::now()->format('d/m/Y')." - ".\Carbon\Carbon::now()->format('H:i:s'),null,10,array(0,0,0));
        return $pdf->stream();
    }
}
