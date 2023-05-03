<x-guest-layout>
    <div class="p-3">
        <h1 class="text-2xl font-bold mb-7">Validacion de la empresa: <span class="font-normal">{{ $empresa->name }}</span></h1>
        @if (session()->has('mensaje') || $empresa->validacion)
            @if(session()->has('mensaje'))
                <p class="p-2 my-5 text-sm font-bold text-green-600 uppercase bg-green-100 border border-green-600 rounded-lg">
                    {{ session('mensaje') }}
                </p>
            @endif
            <div class="mb-4 text-gray-600 text-md">
                {{ __('Gracias por hacer la validacion! Nuestros administradores se encargar de validar tus datos lo mas rapido posible, tenga paciencia, este proceso puede tardar hasta 3 dias.') }}
            </div>


        @else
            <div class="md:flex md:justify-center">
                <livewire:crear-validacion-empresa
                    :correo="$empresa->email"
                />

            </div>
        @endif
        <form method="POST" class="mt-3" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="text-sm text-gray-600 rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                {{ __('Cerrar Sesion') }}
            </button>
        </form>
    </div>

</x-guest-layout>
