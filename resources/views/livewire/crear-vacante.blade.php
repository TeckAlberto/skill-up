<form class="space-y-5 md:w-1/2" action="" wire:submit.prevent='crearVacante'>

        <div>
            <x-input-label for="titulo" :value="__('Titulo')" />
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
            <x-input-label for="tipo" :value="__('Tipo de Publicacion')" />
            <select
                wire:model="tipo"
                id="tipo"
                class="w-full text-center border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-50"
                wire:change="activarPublicacion"
            >
                <option value="">--Selecciona un tipo--</option>
                <option value="1">Empleo</option>
                <option value="2">Curso</option>


            </select>
            @error('tipo')
                <livewire:mostrar-alerta :message="$message" />
            @enderror
        </div>

       @if (!$activado)
            <div>
                <x-input-label for="salario" :value="__('Salario Mensual')" />
                <select
                    wire:model="salario"
                    id="salario"
                    class="w-full text-center border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-50"
                >
                    <option value="">--Selecciona un salario--</option>
                    @foreach ($salarios as $salario)
                        <option value="{{ $salario->id}}">{{$salario->salario}}</option>
                    @endforeach

                </select>
                @error('salario')
                    <livewire:mostrar-alerta :message="$message" />
                @enderror
            </div>

            <div>
                <x-input-label for="categoria" :value="__('Categoria')" />
                <select
                    wire:model="categoria"
                    id="categoria"
                    class="w-full text-center border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-50"
                >
                    <option value="">--Selecciona una categoria--</option>
                    @foreach ($categorias as $categoria)
                        <option value="{{ $categoria->id}}">{{$categoria->categoria}}</option>
                    @endforeach

                </select>
                @error('categoria')
                    <livewire:mostrar-alerta :message="$message" />
                @enderror
            </div>
       @endif

        <div>
            <x-input-label for="modalidad" :value="__('Modalidad')" />
            <select
                wire:model="modalidad"
                id="modalidad"
                class="w-full text-center border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-50"
            >
                <option value="">--Selecciona una modalidad--</option>
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
            <x-input-label for="descripcion" :value="__('Descripcion')" />
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

        @if ($activado)
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
        @endif



        <x-primary-button class="justify-center w-full">
            {{ __('Crear Publicacion') }}
        </x-primary-button>

    </form>
