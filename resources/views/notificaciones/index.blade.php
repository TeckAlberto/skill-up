<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Notificaciones') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="my-10 text-2xl font-bold text-center">Mis notificaciones</h1>

                    <div class="divide-y divide-gray-200">
                        @forelse ($notificaciones as $notificacion)
                            <div class="p-5 lg:items-center lg:flex lg:justify-between">
                                <div>
                                    <p>Tienes un nuevo candidato en:
                                        <span class="font-bold">{{ $notificacion->data['nombre_vacante'] }}</span>
                                    </p>

                                    <p>
                                        <span class="font-bold">{{ $notificacion->created_at->diffForHumans() }}</span>
                                    </p>
                                </div>

                                <div class="mt-5 lg:mt-0">
                                    <a href="{{ route('candidatos.index', $notificacion->data['id_vacante'])}}" class="p-3 text-sm font-bold text-white uppercase bg-indigo-500 rounded-lg">
                                        Ver Candidatos
                                    </a>

                                </div>
                            </div>
                        @empty
                            <p class="text-center text-gray-600">No hay notificaciones nuevas</p>
                        @endforelse
                    </div>



                </div>
            </div>
        </div>
    </div>
</x-app-layout>
