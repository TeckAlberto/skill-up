<div>

    <livewire:filtrar-vacantes />

    <div class="py-12">
        <div class="mx-auto max-w-7xl">
            <h3 class="mb-12 text-4xl font-extrabold text-gray-700">Nuestras vacante disponibles</h3>

            <div class="p-6 bg-white divide-y divide-gray-400 rounded-lg shadow-sm">
                @forelse ($vacantes as $vacante)
                    <div class="py-5 md:flex md:justify-between md:items-center">
                        <div class="md:flex-1">
                            <a class="text-2xl font-extrabold text-gray-600" href="{{ route('vacantes.show', $vacante->id)}}">{{$vacante->titulo}}</a>

                            <p class="mb-2 text-base text-gray-600">{{$vacante->empresa}}</p>
                            <p class="mb-2 text-xs font-bold text-gray-600">{{$vacante->salario->salario}}</p>
                            <p class="mb-2 text-xs font-bold text-gray-600">{{$vacante->categoria->categoria}}</p>

                            <p class="text-xs font-bold text-gray-600">
                                Ultimo dia para postularse:
                                <span class="font-normal">{{$vacante->ultimo_dia->format('d/m/Y')}}</span>
                            </p>
                        </div>

                        <div class="mt-5 md:mt-0">
                            <a class="block p-3 text-sm font-bold text-center text-white uppercase bg-indigo-500 rounded-lg" href="{{ route('vacantes.show', $vacante->id)}}">Ver Vacante</a>
                        </div>
                    </div>
                @empty
                    <p class="p-3 text-sm text-center text-gray-600">No hay vacantes aun</p>
                @endforelse
            </div>

        </div>
    </div>


</div>
