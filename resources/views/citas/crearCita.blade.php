<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Agendar Nueva Cita') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-full mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                <form action="{{ route('citas.store') }}" method="POST" class="space-y-6">
                    @csrf

                    <!-- Selección de Servicios -->
                    <div>
                        <label class="block font-medium text-sm text-gray-700 mb-2">
                            Selecciona los Servicios que deseas:
                        </label>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @foreach($serviciosDisponibles as $servicio)
                                <label class="border rounded-lg p-4 flex items-start space-x-3 cursor-pointer hover:bg-gray-50 border-gray-200">
                                    <input type="checkbox" 
                                           name="servicios[]" 
                                           value="{{ $servicio->id }}" 
                                           class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500 mt-1">
                                    <div>
                                        <span class="font-bold block text-gray-800">{{ $servicio->nombre }}</span>
                                        <span class="text-sm text-gray-500 block">{{ $servicio->descripcion }}</span>
                                        <span class="text-sm font-semibold text-gray-700 mt-1 block">
                                            ${{ number_format($servicio->precio, 2) }} • {{ $servicio->duracion_estimada }} min
                                        </span>
                                    </div>
                                </label>
                            @endforeach
                        </div>
                        @error('servicios')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Fecha y Hora -->
                    <div>
                        <label for="fecha_cita" class="block font-medium text-sm text-gray-700">
                            Fecha y Hora de la Cita:
                        </label>
                        <input type="datetime-local" 
                               id="fecha_cita" 
                               name="fecha_cita" 
                               class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-500 focus:ring-indigo-500" 
                               required>
                        @error('fecha_cita')
                            <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Notas -->
                    <div>
                        <label for="notas" class="block font-medium text-sm text-gray-700">
                            Notas o Especificaciones (Opcional):
                        </label>
                        <textarea id="notas" 
                                  name="notas" 
                                  rows="3" 
                                  placeholder="Ej: Prefiero corte con tijera en los laterales..." 
                                  class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-gray-700 focus:ring-gray-700"></textarea>
                    </div>

                    <div class="flex items-center justify-end">
                        <button type="submit" 
                                class=" bg-gray-700 hover:bg-black text-white font-bold py-2 px-6 rounded-md shadow transition">
                            Confirmar Reserva
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>