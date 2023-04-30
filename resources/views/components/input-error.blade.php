{{-- @props(['messages'])

@if ($messages)
    <div id="alert-component" {{ $attributes->merge(['class' => 'bg-red-100 border-l-8 border-red-600 text-red-600 font-bold px-4 py-3 rounded-md flex items-center justify-between space-x-4 transition-all duration-500']) }}>
        <div class="text-sm">{{ $messages }}</div>
        <button id="close-alert" class="focus:outline-none">&times;</button>
    </div>
@endif

<script>
    var alertComponent = document.querySelector('#alert-component');
    var closeAlertButton = document.querySelector('#close-alert');

    setTimeout(function() {
        if (alertComponent) {
            alertComponent.classList.add('opacity-0', 'h-0', 'overflow-hidden');
        }
    }, 4000);

    if (closeAlertButton) {
        closeAlertButton.addEventListener('click', function() {
            alertComponent.classList.add('opacity-0', 'h-0', 'overflow-hidden');
        });
    }
</script> --}}

@props(['messages'])

@if ($messages)
    <ul id="alert-component" {{ $attributes->merge(['class' => 'list-none bg-red-100 border-l-8 border-red-600 text-red-600 font-bold px-4 py-3 flex items-center justify-between space-x-4 transition-all duration-500 visible']) }}>
        @foreach ((array) $messages as $message)
            <li id="close-alert" class=focus:outline-none">{{ $message }}</li>
        @endforeach
    </ul>
@endif

<script>
    setTimeout(function() {
        var alertComponent = document.querySelector('#alert-component');
        if (alertComponent && alertComponent.classList.contains('visible')) {
            alertComponent.remove();
        }
    }, 4000);
</script>

