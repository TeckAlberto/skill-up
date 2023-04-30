 <div>
    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">

        @forelse ($vacantes as $vacante)
            <div class="items-center justify-between p-6 text-gray-900 border-b border-gray-200 md:flex">
                <div class="space-y-5">
                    <a href="{{ route('vacantes.show', $vacante->id) }}" class="text-2xl font-bold">
                        {{ $vacante->titulo }}
                    </a>

                    <p class="text-sm font-bold text-gray-600">{{$vacante->empresa}}</p>

                    <p class="text-sm text-gray-500">Ultimo dia: {{$vacante->ultimo_dia->format('d/m/y')}}</p>
                </div>

                <div class="flex flex-col items-stretch gap-3 mt-5 md:flex-row md:mt-0">
                    <a
                        href="{{ route('candidatos.index', $vacante) }}"
                        class="px-5 py-3 text-xs font-bold text-center text-white uppercase rounded-lg bg-slate-800"
                    >
                        {{ $vacante->candidatos->count()}}
                        Candidatos
                    </a>

                    <a
                        href="{{route('vacantes.edit', $vacante->id)}}"
                        class="px-5 py-3 text-xs font-bold text-center text-white uppercase bg-blue-800 rounded-lg"
                    >
                        Editar
                    </a>

                    <button
                        wire:click="$emit('mostrarAlerta', {{ $vacante->id }})"
                        class="px-5 py-3 text-xs font-bold text-center text-white uppercase bg-red-600 rounded-lg"
                    >
                        Eliminar
                    </button>
                </div>
            </div>
        @empty
            <p class="p-3 text-sm text-center text-gray-600">No hay vacantes</p>
        @endforelse

    </div>


    <div class="mt-10">
        {{ $vacantes->links() }}
    </div>
</div>

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        Livewire.on('mostrarAlerta', vacanteId => {
            Swal.fire({
                title: 'Eliminar vacante?',
                text: "Una vacante eliminada no se puede recuperar!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    //Eliminar la vacante desde el servidor
                    Livewire.emit('eliminarVacante', vacanteId)


                    Swal.fire(
                    'Se elimino la vacante!',
                    'Eliminado correctamente.',
                    'success'
                    )
                }
            })
            })
    </script>
@endpush
