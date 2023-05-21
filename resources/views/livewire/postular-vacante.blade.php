<div class="flex flex-col items-center p-5 mt-10 text-center bg-gray-100 rounded-md shadow-md">
    <h3 class="text-2xl font-bold text-center my4">Postularme a esta vacante</h3>

    @if (session()->has('mensaje'))
        <p class="p-2 my-5 text-sm font-bold text-green-600 uppercase bg-green-100 border border-green-600 rounded-lg">
            {{ session('mensaje') }}
        </p>
    @elseif (session()->has('postulado'))
        <p class="p-2 my-5 text-sm font-bold text-blue-600 uppercase bg-blue-100 border border-blue-600 rounded-lg">
            {{ session('postulado') }}
        </p>
    @else


        <form wire:submit.prevent='postularme' action="" class="mt-5 w-96 ">

            <x-primary-button class="my-5">
                {{__('Postularme')}}
            </x-primary-button>
        </form>


    @endif

</div>
