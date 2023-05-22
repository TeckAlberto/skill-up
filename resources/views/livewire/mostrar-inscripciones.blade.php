<div>
    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">

        @forelse ($inscripciones as $inscripcion)
            <div class="items-center justify-between p-6 text-gray-900 border-b border-gray-200 md:flex">
                <div class="space-y-5">
                    <a href="{{ route('cursos.show', $inscripcion->curso->id) }}" class="text-2xl font-bold">
                        {{ $inscripcion->curso->titulo }}
                    </a>

                    <p class="text-sm font-bold text-gray-600">{{$inscripcion->curso->reclutador->name}}</p>

                    <p class="text-sm text-gray-500">Ultimo dia: {{$inscripcion->curso->ultimo_dia->format('d/m/y')}}</p>

                    @if (!$inscripcion->curso->publicado)
                        <p class="text-sm text-red-400">Este empleo a sido oculto, revise su publicacion y solucione cualquier irregularidad que note</p>
                    @endif
                </div>


            </div>
        @empty
            <p class="p-3 text-sm text-center text-gray-600">No hay postulaciones</p>
        @endforelse

    </div>


    {{-- <div class="mt-10">
        {{ $vacantes->links() }}
    </div> --}}
</div>


