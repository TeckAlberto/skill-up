<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ $perfil->name }}
        </h2>
    </x-slot>

    <div class="flex items-center justify-center mt-10">
        <div class="w-2/3 p-8 bg-white rounded-lg shadow-lg">
          <div class="flex items-center">
            <div class="flex-shrink-2 ">
              <img src="{{ asset('storage/images/' . $perfil->image )}}" alt="Imagen de perfil" class="w-4/5 h-auto rounded-full">
            </div>
            <div class="ml-4">
              <h2 class="mb-4 text-2xl font-semibold">Perfil de Usuario</h2>
              <div class="space-y-4">
                <div>
                  <h3 class="font-semibold">Nombre:</h3>
                  <p class="text-gray-700">{{$perfil->name}}</p>
                </div>
                <div>
                  <h3 class="font-semibold">Email:</h3>
                  <p class="text-gray-700">{{$perfil->email}}</p>
                </div>
                <div>
                  <h3 class="font-semibold">Universidad:</h3>
                  <p class="text-gray-700">{{$perfil->university}}</p>
                </div>
                <div>
                  <h3 class="font-semibold">Estudios:</h3>
                  <p class="text-gray-700">{{$perfil->studies}}</p>
                </div>
                <div>
                  <h3 class="font-semibold">Descripción:</h3>
                  <p class="text-gray-700">{{$perfil->description}}</p>
                </div>
                <div class="flex flex-col">
                  <h3 class="font-semibold">CV:</h3>

                @if ($perfil->cv)
                    <a href="{{ asset('storage/CVs/' . $perfil->cv)}}" class="w-1/3 p-2 mt-3 font-bold text-center text-white uppercase bg-blue-600 rounded-lg">Ver CV</a>
                @else
                    <a href="{{$perfil->contact}}" class="text-blue-300">{{$perfil->contact}}</a>
                @endif

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


</x-app-layout>
