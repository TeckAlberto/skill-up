<form class="space-y-5 md:w-1/2" action="" wire:submit.prevent='editarVacante'>

    <div>
        <x-input-label for="titulo" :value="__('Titulo Curso')" />
        <x-text-input
            id="titulo"
            class="block w-full mt-1"
            type="text"
            wire:model="titulo"
            :value="old('titulo')"
        />
        @error('titulo')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="modalidad" :value="__('Modalidad')" />
        <select
            wire:model="modalidad"
            id="categoria"
            class="w-full text-center border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-50"
        >
            <option value="">--Selecciona una categoria--</option>
            @foreach ($modalidades as $modalidad)
                <option value="{{ $modalidad->id}}">{{$modalidad->modalidad}}</option>
            @endforeach

        </select>
        @error('modalidad')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="ultimo_dia" :value="__('Ultimo dia para postularse')" />
        <x-text-input
            id="ultimo_dia"
            class="block w-full mt-1"
            type="date"
            wire:model="ultimo_dia"
            :value="old('ultimo_dia')"
        />
        @error('ultimo_dia')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="descripcion" :value="__('Descripcion del puesto')" />
        <textarea
            wire:model="descripcion"
            id="descripcion"
            class="w-full text-center border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-50 h-72"
            >

        </textarea>
        @error('descripcion')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="cupos" :value="__('Cupo maximo')" />
        <x-text-input
            id="cupos"
            class="block w-full mt-1"
            type="text"
            wire:model="cupos"
            :value="old('cupos')"
        />
        @error('cupos')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="costo" :value="__('Costo')" />
        <x-text-input
            id="costo"
            class="block w-full mt-1"
            type="text"
            wire:model="costo"
            :value="old('costo')"
        />
        @error('costo')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <x-primary-button class="justify-center w-full">
        {{ __('Guardar Cambios') }}
    </x-primary-button>

</form>
