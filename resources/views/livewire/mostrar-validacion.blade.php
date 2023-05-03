<div class="p-10">
    <div class="mb-5">
        <h3 class="my-3 text-3xl font-bold text-gray-800">
            {{ $solicitud->user->name }}
        </h3>

        <div class="p-4 my-10 rounded-md bg-gray-50 md:grid md:grid-cols-2">
            <p class="my-3 text-sm font-bold text-gray-800 uppercase">RFC:
                <span class="font-normal normal-case">{{ $solicitud->rfc }}</span>
            </p>

            <p class="my-3 text-sm font-bold text-gray-800 uppercase">Dia de peticion:
                <span class="font-normal normal-case">{{ $solicitud->created_at }}</span>
            </p>

            <p class="my-3 text-sm font-bold text-gray-800 uppercase">Telefono:
                <span class="font-normal normal-case">{{ $solicitud->telefono }}</span>
            </p>

            <p class="my-3 text-sm font-bold text-gray-800 uppercase">Correo:
                <span class="font-normal normal-case">{{ $solicitud->correo }}</span>
            </p>
        </div>

    </div>

    <div class="gap-4 md:grid md:grid-cols-6">
        <div class="md:col-span-2">
            Comprobante de domicilio
            <a
                href="{{asset('storage/comprobantes/' . $solicitud->comprobante)}}" class="inline-flex items-center shadow-sm px-3 py-0.5 border border-gray-600 leading-5 font-medium text-sm rounded-full text-gray-700 bg-white hover:bg-gray-100"
                target="_blank"
                rel="noreferrer noopener"
            >
                Ver
            </a>
        </div>

        <div class="md:col-end-7">

            <button
                wire:click="$emit('aprobarValidacion', {{ $solicitud->id }})"
                class="w-full px-5 py-3 mt-5 text-xs font-bold text-center text-white uppercase bg-green-600 rounded-lg md:w-auto md:mt-0"
            >
                Aprobar Solicitud
            </button>
        </div>
    </div>


    {{-- @cannot('create', App\Models\Vacante::class)
        <livewire:postular-vacante :vacante="$vacante" />
    @endcannot --}}



</div>
