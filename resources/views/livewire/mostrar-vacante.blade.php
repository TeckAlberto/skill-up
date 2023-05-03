<div class="p-10">
    <div class="mb-5">
        <h3 class="my-3 text-3xl font-bold text-gray-800">
            {{ $vacante->titulo }}
        </h3>

        <div class="p-4 my-10 rounded-md bg-gray-50 md:grid md:grid-cols-2">
            <p class="my-3 text-sm font-bold text-gray-800 uppercase">Empresa:
                <span class="font-normal normal-case">{{ $vacante->empresa }}</span>
            </p>

            <p class="my-3 text-sm font-bold text-gray-800 uppercase">Ultimo dia para postularse:
                <span class="font-normal normal-case">{{ $vacante->ultimo_dia->toFormattedDateString() }}</span>
            </p>

            <p class="my-3 text-sm font-bold text-gray-800 uppercase">Categoria:
                <span class="font-normal normal-case">{{ $vacante->categoria->categoria }}</span>
            </p>

            <p class="my-3 text-sm font-bold text-gray-800 uppercase">Salario:
                <span class="font-normal normal-case">{{ $vacante->salario->salario }}</span>
            </p>
        </div>

    </div>

    <div class="gap-4 md:grid md:grid-cols-6">


        <div class="md:col-span-4">
            <h2 class="mb-5 text-2xl font-bold">Descripcion del puesto:</h2>
            <p class="">{{ $vacante->descripcion }}</p>
        </div>
    </div>

    @guest
        <div class="p-5 mt-5 text-center border border-dashed bg-gray-50">
            <p>
                Deseas aplicar a esta vacante? <a class="font-bold text-indigo-600" href="{{ route('register') }}">Obten una cuenta y aplica a esta y otras vacantes</a>
            </p>
        </div>
    @endguest

    @if(auth()->user()->rol === 1)
        <livewire:postular-vacante :vacante="$vacante" />
    @elseif(auth()->user()->rol === 3)
        <div class="flex flex-col items-center justify-center p-5 mt-10">
            <button
            wire:click="$emit('eliminarPublicacion', {{ $vacante->id }})"
            class="w-full px-5 py-3 text-xs font-bold text-center text-white uppercase bg-blue-600 rounded-lg mt-7 md:w-auto md:mt-0"
        >
            Ocultar Publicacion
        </button>
        </div>

    @endif



</div>
