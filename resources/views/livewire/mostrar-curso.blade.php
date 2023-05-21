<div class="p-10">
    <div class="mb-5">
        <h3 class="my-3 text-3xl font-bold text-gray-800">
            {{ $curso->titulo }}
        </h3>

        <div class="p-4 my-10 rounded-md shadow-md bg-gray-50 md:grid md:grid-cols-2">
            <p class="my-3 text-sm font-bold text-gray-800 uppercase">Empresa:
                <span class="font-normal normal-case">{{ $curso->reclutador->name }}</span>
            </p>

            <p class="my-3 text-sm font-bold text-gray-800 uppercase">Ultimo dia para postularse:
                <span class="font-normal normal-case">{{ $curso->ultimo_dia->toFormattedDateString() }}</span>
            </p>

            <p class="my-3 text-sm font-bold text-gray-800 uppercase">Costo:
                <span class="font-normal normal-case">${{ $curso->costo }}</span>
            </p>

            <p class="my-3 text-sm font-bold text-gray-800 uppercase">Cupos:
                <span class="font-normal normal-case">{{ $curso->cupos }}</span>
            </p>

            <p class="my-3 text-sm font-bold text-gray-800 uppercase">Modalidad:
                <span class="font-normal normal-case">{{ $curso->modalidad->modalidad }}</span>
            </p>
        </div>

    </div>

    <div class="p-4 my-10 rounded-md shadow-md bg-gray-50 md:flex">

        <img class="w-10" src="{{asset('storage/images/' . $curso->reclutador->image)}}" alt="Imagen {{$curso->reclutador->name}}">

        <p class="my-3 text-sm font-bold text-gray-800 uppercase md:ml-3">Pagina:
            <a class="font-normal text-blue-500 normal-case cursor-pointer">{{ $curso->reclutador->contact }}</a>
        </p>

    </div>

    <div class="gap-4 md:grid md:grid-cols-6">


        <div class="md:col-span-4 ">
            <h2 class="mb-5 text-2xl font-bold ">Descripcion del puesto:</h2>
            <p class="p-2 border-2 rounded-md bg-stone-200 border-stone-500">{{ $curso->descripcion }}</p>
        </div>

    </div>


    @guest
        <div class="p-5 mt-5 text-center border border-dashed bg-gray-50">
            <p>
                Deseas aplicar a esta vacante? <a class="font-bold text-indigo-600" href="{{ route('register') }}">Obten una cuenta y aplica  a este y otros cursos</a>
            </p>
        </div>
    @endguest

    @auth


        @if(auth()->user()->rol === 1 && auth()->user()->perfilCompletado())

            @if (date('m/d/Y') <= $curso->ultimo_dia)
                <livewire:agregar-curso :curso="$curso" />

            @else
                <div class="p-5 mt-5 text-center border border-dashed bg-gray-50">
                    <p class="font-bold">
                        No se puede aplicar a este curso, ya se ha pasado la fecha...
                    </p>
                </div>

            @endif


        @elseif(!auth()->user()->perfilCompletado())
            <div class="p-5 mt-5 text-center border border-dashed bg-gray-50">
                <p>
                    Para aplicar a esta vacante termina de completar tu perfil <a class="font-bold text-indigo-600" href="{{ route('profile.edit') }}">Terminar perfil</a>
                </p>
            </div>

        @elseif(auth()->user()->rol === 3)
            <div class="flex flex-col items-center justify-center p-5 mt-10">
                <button
                wire:click="$emit('ocultarPublicacion', {{ $curso->id }})"
                class="w-full px-5 py-3 text-xs font-bold text-center text-white uppercase bg-orange-600 rounded-lg mt-7 md:w-auto md:mt-0"
            >
                Ocultar Publicacion
            </button>
            </div>

        @endif
    @endauth



</div>
