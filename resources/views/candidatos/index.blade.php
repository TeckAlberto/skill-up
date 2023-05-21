<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Candidatos Vacante') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h1 class="my-10 text-2xl font-bold text-center">Candidatos Vacante: {{ $vacante->titulo }}</h1>

                    <div class="p-5 md:flex md:justify-center">
                        <ul class="w-full divide-y divide-gray-200">
                            @forelse ($vacante->candidatos as $candidato)
                                <li class="flex items-center p-3">
                                    <div class="flex-1 space-y-1">
                                        <p class="text-2xl font-bold text-gray-800"><a href="">{{$candidato->user->name}}</a></p>
                                        <p class="text-xl text-gray-800">{{$candidato->user->email}}</p>
                                        <p class="text-xl font-medium text-gray-800">Dia que se postulo:
                                            <span class="font-normal">{{$candidato->created_at->diffForHumans()}}</span>
                                        </p>
                                    </div>
                                        <a
                                            href="{{ route('perfiles.show', $candidato->user->id)}}" class="inline-flex items-center px-5 py-2 text-sm font-medium leading-5 text-gray-700 bg-white border border-gray-600 rounded-full shadow-sm hover:bg-gray-100"
                                            target="_blank"
                                            rel="noreferrer noopener"
                                        >
                                            Ver
                                        </a>
                                    <div>

                                    </div>
                                </li>
                            @empty
                                <p class="p-3 text-sm text-center text-gray-600">No hay candidatos aun</p>
                            @endforelse
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
