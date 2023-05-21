<div>
    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">

        @forelse ($cursos as $curso)
            <div class="items-center justify-between p-6 text-gray-900 border-b border-gray-200 md:flex">
                <div class="space-y-5">
                    <a href="{{ route('cursos.show', $curso->id) }}" class="text-2xl font-bold">
                        {{ $curso->titulo }}
                    </a>

                    <p class="text-sm font-bold text-gray-600">{{$curso->reclutador->name}}</p>

                    <p class="text-sm text-gray-500">Ultimo dia: {{$curso->ultimo_dia->format('d/m/y')}}</p>

                    @if (!$curso->publicado)
                        <p class="text-sm text-red-400">Este curso a sido oculta, revise su publicacion y solucione cualquier irregularidad que note</p>
                    @endif
                </div>

                <div class="flex flex-col items-stretch gap-3 mt-5 cursor-pointer md:flex-row md:mt-0">
                    <p class="px-5 py-3 text-xs font-bold text-center text-white uppercase rounded-lg bg-slate-800">
                        {{ $curso->cursantes->count() }}
                        @if ($curso->cursantes->count() == 1)
                            Inscrito
                        @else
                            Inscritos
                        @endif
                    </p>

                    <a
                        href="{{route('cursos.edit', $curso->id)}}"
                        class="px-5 py-3 text-xs font-bold text-center text-white uppercase bg-blue-800 rounded-lg"
                    >
                        Editar
                    </a>

                    @if (!$curso->publicado)
                        <button
                            wire:click="$emit('activarPublicacion', {{ $curso->id }})"
                            class="px-5 py-3 text-xs font-bold text-center text-white uppercase bg-green-600 rounded-lg"
                        >
                            Activar
                        </button>
                    @endif

                    <button
                        wire:click="$emit('mostrarAlerta', {{ $curso->id }})"
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
        {{ $cursos->links() }}
    </div>
</div>

@push('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        Livewire.on('mostrarAlerta', cursoId => {
            Swal.fire({
                title: 'Eliminar curso?',
                text: "Un curso eliminado no se puede recuperar!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Si, eliminar!',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    //Eliminar la vacante desde el servidor
                    Livewire.emit('eliminarCurso', cursoId)


                    Swal.fire(
                    'Se elimino el curso!',
                    'Eliminado correctamente.',
                    'success'
                    )
                }
            })
            })
    </script>
@endpush
