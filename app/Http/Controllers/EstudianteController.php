<?php

namespace App\Http\Controllers;


use App\Models\Estudiante;
use Illuminate\Http\Request;


class EstudianteController extends Controller
{
    public function index(Request $request){
        return view('create');
    }

    public function guardar(Request $request){
        $request->validate([
            'nombre' => 'required',
            'edad' => 'required | numeric',
            'direccion' => 'required',
            'email' => 'required | email | unique:estudiantes',
            'pass' => 'required | confirmed',
            'pass_confirmation' => 'required',
        ]);


        $estudiante = new Estudiante;
        $estudiante->nombre = $request->nombre;
        $estudiante->edad = $request->edad;
        $estudiante->direccion = $request->direccion;
        $estudiante->email = $request->email;
        $estudiante->pass = $request->pass;
        $estudiante->pass_confirmation = $request->pass_confirmation;

        $estudiante->save();
        return back()->with('success', 'Formulario validado exitosamente!');
    }
}
