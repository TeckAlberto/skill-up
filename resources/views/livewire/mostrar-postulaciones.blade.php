<div>
    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">

        @forelse ($postulaciones as $postulacion)
            <div class="items-center justify-between p-6 text-gray-900 border-b border-gray-200 md:flex">
                <div class="space-y-5">
                    <a href="{{ route('vacantes.show', $postulacion->vacante->id) }}" class="text-2xl font-bold">
                        {{ $postulacion->vacante->titulo }}
                    </a>

                    <p class="text-sm font-bold text-gray-600">{{$postulacion->vacante->reclutador->name}}</p>

                    <p class="text-sm text-gray-500">Ultimo dia: {{$postulacion->vacante->ultimo_dia->format('d/m/y')}}</p>

                    @if (!$postulacion->vacante->publicado)
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


