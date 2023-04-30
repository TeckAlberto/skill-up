<x-guest-layout>
    <div class="flex items-center pt-6 bg-gray-100 sm:flex-col h-96 sm:justify-center sm:pt-0">
        <div class="relative w-full sm:max-w-sm">
            <div class="absolute w-full h-full transform bg-blue-400 shadow-lg card rounded-3xl -rotate-6"></div>
            <div class="absolute w-full h-full transform bg-red-400 shadow-lg card rounded-3xl rotate-6"></div>
            <div class="relative w-full px-6 py-4 bg-gray-100 shadow-md rounded-3xl">
                <label for="email" class="block text-lg font-medium text-center text-gray-700">
                    Acceso denegado
                </label>

                <div class="flex flex-col mt-4">
                    <p class="text-center">
                        Lo siento, no tienes permiso para acceder a esta página.
                    </p>
                </div>

                <div class="mt-8">
                    <a href="{{ route('vacantes.index') }}" class="w-full px-4 py-2 font-bold text-white transition duration-150 ease-in-out bg-gray-500 rounded-full hover:bg-gray-700 focus:outline-none focus:shadow-outline">
                        Inicio
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
