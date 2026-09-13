<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('THE BARBERS HOUSE') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <!-- ALERTA DE ÉXITO -->
            @if (session('exito'))
                <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg shadow-sm">
                    <strong>¡Reserva exitosa!</strong> {{ session('exito') }}
                </div>
            @endif
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <h3 class="text-lg font-bold mb-4">Bienvenido a la Barbería</h3>
                
                <!-- Botón para ir a Agendar Cita -->
                <a href="{{ route('citas.create') }}" 
                   class="inline-block bg-gray-700 text-white font-bold px-4 py-2 rounded shadow hover:bg-black transition">
                    + Agendar Nueva Cita
                </a>

            </div>
        </div>
    </div>
</x-app-layout>