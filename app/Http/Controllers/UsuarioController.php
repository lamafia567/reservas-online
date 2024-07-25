<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function index(){
        $usuarios = User::all(); 
        return view('admin.usuario.index',compact('usuarios'));
    }
    public function create(){
        return view('admin.usuario.create');
    }
    public function store(Request $request){
        $request->validate([
           'name'=>'required|max:100',
           'email'=>'required|max:200|unique:users',
           'password'=>'required|max:200|confirmed',
        ]);
        $usuario = new User();
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        $usuario->password = Hash::make($request['password']);
        $usuario->save();
        return redirect()->route('admin.usuario.index')
        ->with('mensaje','¡Se ha registrado al usuario de la manera correcta!')
        ->with('icono','success');
    }
    public function show($id){
        $usuario = User::findOrFail($id);
        return view('admin.usuario.show',compact('usuario'));
    }
    public function edit($id){
        $usuario = User::findOrFail($id);
        return view('admin.usuario.edit',compact('usuario'));
    }
    public function update(Request $request,$id){
        $usuario = User::find($id);
        $request->validate([
            'name'=>'required|max:100',
            'email'=>'required|max:200|unique:users,email,'.$usuario->id,
            'password'=>'nullable|max:200|confirmed',
         ]);
        $usuario->name = $request->name;
        $usuario->email = $request->email;
        if($request->filled('password')){
            $usuario->password = Hash::make($request['password']);
        }
        $usuario->save();
        return redirect()->route('admin.usuario.index')
         ->with('mensaje','¡Se ha actualizado al usuario de la manera correcta!')
         ->with('icono','success');
    }
}
