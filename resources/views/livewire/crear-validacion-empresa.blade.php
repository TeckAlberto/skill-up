<form class="w-1/2 space-y-5 md:w-full" wire:submit.prevent='crearValidacionEmpresa'>

    <div>
        <x-input-label for="rfc" :value="__('Clave RFC')" />
        <x-text-input
            id="rfc"
            class="block w-full mt-1"
            type="text"
            wire:model="rfc"
            :value="old('rfc')"
        />
        @error('rfc')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="telefono" :value="__('Telefono')" />
        <x-text-input
            id="telefono"
            class="block w-full mt-1"
            type="text"
            wire:model="telefono"
            :value="old('telefono')"
        />
        @error('telefono')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <div>
        <x-input-label for="correo" :value="__('Correo')" />
        <x-text-input
            id="correo"
            class="block w-full mt-1"
            type="text"
            wire:model="correo"
            :value="old('correo') ?? $correo"
        />
        @error('correo')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>


    <div>
        <x-input-label for="comprobante" :value="__('Comprobante Fiscal')" />
        <x-text-input
            id="comprobante"
            class="block w-full mt-1"
            type="file"
            wire:model="comprobante"
            accept=".pdf"
        />

        @error('comprobante')
            <livewire:mostrar-alerta :message="$message" />
        @enderror
    </div>

    <x-primary-button class="justify-center w-full">
        {{ __('Mandar Validacion') }}
    </x-primary-button>

</form>
