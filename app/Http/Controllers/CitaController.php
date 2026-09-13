<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Servicios;
use App\Models\Citas;
use Illuminate\Support\Facades\Auth;


class CitaController extends Controller
{
    //
    // Método para mostrar la vista con la lista de servicios
    public function create()
    {
        // $listaServicios es una variable propia en español
        // Servicios::all() es el método de Eloquent para traer los registros
        $listaServicios = Servicios::all();

        // Enviamos la variable a la vista con el nombre 'servicios'
        return view('citas.crearCita', [
            'serviciosDisponibles' => $listaServicios
        ]);
    }

    // Método para guardar la cita
    public function store(Request $peticion)
    {
        // validate() es una palabra reservada de Laravel
        $peticion->validate([
            'fecha_cita'  => 'required|date|after:now',
            'servicios'   => 'required|array|min:1',
            'servicios.*' => 'exists:servicios,id',
            'nota'       => 'nullable|string|max:500',
        ], [
            'fecha_cita.required' => 'Debes seleccionar una fecha y hora.',
            'fecha_cita.after'    => 'La fecha y hora de la cita debe ser futura.',
            'servicios.required'  => 'Debes seleccionar al menos un servicio.',
        ]);

        // 1. Obtener los servicios seleccionados desde la base de datos y sumar sus precios
        // Asumiendo que la columna del precio en la tabla 'servicios' se llama 'price' o 'precio'
        $montoTotal = Servicios::whereIn('id', $peticion->servicios)->sum('precio');


        // Auth::id() obtiene el ID del usuario actualmente conectado
        // Citas::create() guarda el registro en la tabla 'citas'
        $nuevaCita = Citas::create([
            'user_id'    => Auth::id(),
            'fecha_hora' => $peticion->fecha_cita,
            'estado'     => 'pendiente',
            'nota'      => $peticion->nota,
            'total'     => $montoTotal,
        ]);

        // attach() es la función de Laravel para llenar la tabla intermedia 'cita_servicio'
        $nuevaCita->servicios()->attach($peticion->servicios);

        return redirect()->route('dashboard')->with('exito', '¡Tu cita ha sido reservada correctamente! total: $' . number_format($montoTotal, 2));
    }
}
