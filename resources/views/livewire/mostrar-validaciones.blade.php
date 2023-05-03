<div>
    <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">


        @forelse ($solicitudes as $solicitud)
            <div class="items-center justify-between p-6 text-gray-900 border-b border-gray-200 md:flex">
                <div class="space-y-5">
                    <a href="{{ route('validaciones.show', $solicitud->id) }}" class="text-2xl font-bold">
                        {{ $solicitud->user->name }}
                    </a>

                    <p class="text-sm font-bold text-gray-600">{{$solicitud->correo}}</p>
                </div>

                <div class="flex flex-col items-stretch gap-3 mt-5 md:flex-row md:mt-0">


                    <p class="text-sm font-bold text-gray-500">Se valido hace: <span class="font-normal">{{$solicitud->created_at->diffForHumans()}}</span></p>
                </div>
            </div>
        @empty
            <p class="p-3 text-sm text-center text-gray-600">No hay vacantes</p>
        @endforelse

    </div>


    {{-- <div class="mt-10">
        {{ $vacantes->links() }}
    </div> --}}
</div>
