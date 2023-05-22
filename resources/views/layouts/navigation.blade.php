<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="flex items-center shrink-0">
                    <a href="{{ route('vacantes.index') }}">
                        <x-application-logo class="block w-auto text-gray-800 fill-current h-9" />
                    </a>
                </div>

                <!-- Navigation Links -->
                @auth

                    @can('create', App\Models\Vacante::class)
                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">

                            @if (auth()->user()->perfilCompletado() && auth()->user()->rol === 2 )
                                <x-nav-link :href="route('vacantes.index')" :active="request()->routeIs('vacantes.index')">
                                    {{ __('Mis vacantes') }}
                                </x-nav-link>
                                <x-nav-link :href="route('cursos.index')" :active="request()->routeIs('cursos.index')">
                                    {{ __('Mis cursos') }}
                                </x-nav-link>
                                <x-nav-link :href="route('vacantes.create')" :active="request()->routeIs('vacantes.create')">
                                    {{ __('Crear Publicacion') }}
                                </x-nav-link>
                                {{-- request()->routeIs('vacantes.create') --}}

                            @endif
                        </div>
                    @endcan

                    @if (auth()->user()->perfilCompletado() && auth()->user()->rol === 1 )

                        <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">

                            <x-nav-link :href="route('vacantes.user', auth()->user()->id)" :active="request()->routeIs('vacantes.user')">
                                {{ __('Mis postulaciones') }}
                            </x-nav-link>
                            <x-nav-link :href="route('cursos.user', auth()->user()->id)" :active="request()->routeIs('cursos.user')">
                                {{ __('Mis inscripcioness') }}
                            </x-nav-link>

                        </div>

                    @endif


                    @if(auth()->user()->rol === 3)

                    <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">


                        <x-nav-link :href="route('validaciones.index')" :active="request()->routeIs('validaciones.index')">
                            {{ __('Ver Solicitudes') }}
                        </x-nav-link>
                    </div>

                    @endif

                @endauth


            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                @auth

                    @can('create', App\Models\Vacante::class)
                        <a class="flex flex-col items-center justify-center mr-3 text-sm font-extrabold text-white bg-indigo-600 rounded-full w-7 h-7 hover:bg-indigo-800" href="{{ route('notificaciones') }}">
                            {{Auth::user()->unreadNotifications->count()}}
                        </a>
                    @endcan


                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 transition duration-150 ease-in-out bg-white border border-transparent rounded-md hover:text-gray-700 focus:outline-none">
                                <div>{{ Auth::user()->name }}</div>

                                <div class="ml-1">
                                    <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Perfil') }}
                            </x-dropdown-link>

                            @if (auth()->user()->rol != 2)
                                <x-dropdown-link :href="route('perfiles.show', auth()->user()->id)">
                                    {{ __('Vista') }}
                                </x-dropdown-link>
                            @endif

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <x-dropdown-link :href="route('logout')"
                                        onclick="event.preventDefault();
                                                    this.closest('form').submit();">
                                    {{ __('Cerrar Sesion') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @endauth

                @guest
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex">
                    <x-nav-link :href="route('login')">
                        {{ __('Iniciar Sesion') }}
                    </x-nav-link>

                    <x-nav-link :href="route('register')" >
                        {{ __('Crear Cuenta') }}
                    </x-nav-link>
                </div>
                @endguest
            </div>


            <!-- Hamburger -->
            <div class="flex items-center -mr-2 sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 text-gray-400 transition duration-150 ease-in-out rounded-md hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500">
                    <svg class="w-6 h-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        @auth
            <div class="pt-2 pb-3 space-y-1">

                @can('create', App\Models\Vacante::class)
                    <x-responsive-nav-link :href="route('vacantes.index')" :active="request()->routeIs('vacantes.index')">
                        {{ __('Mis vacantes') }}
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('cursos.index')" :active="request()->routeIs('cursos.index')">
                        {{ __('Mis cursos') }}
                    </x-responsive-nav-link>

                    <x-responsive-nav-link :href="route('vacantes.create')" :active="request()->routeIs('vacantes.create')">
                        {{ __('Crear vacante') }}
                    </x-responsive-nav-link>


                @endcan




                @if (auth()->user()->rol === 2)
                    <div class="flex items-center gap-2 p-3">
                        <a class="flex flex-col items-center justify-center text-sm font-extrabold text-white bg-indigo-600 rounded-full w-7 h-7 hover:bg-indigo-800" href="{{ route('notificaciones') }}">
                            {{Auth::user()->unreadNotifications->count()}}
                        </a>

                        <p class="text-base font-medium text-gray-600">
                            @choice('Notificacion|Notificaciones', Auth::user()->unreadNotifications->count())
                        </p>
                    </div>
                @endif

            </div>

            <!-- Responsive Settings Options -->
            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="px-4">
                    <div class="text-base font-medium text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="text-sm font-medium text-gray-500">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Perfil') }}
                    </x-responsive-nav-link>

                    @if (auth()->user()->rol != 2)
                        <x-responsive-nav-link :href="route('perfiles.show', auth()->user()->id)">
                            {{ __('Vista') }}
                        </x-responsive-nav-link>
                    @endif



                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Cerrar Sesion') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        @endauth


        @guest
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('login')">
                {{ __('Iniciar Sesion') }}
            </x-responsive-nav-link>

            <x-responsive-nav-link :href="route('register')" >
                {{ __('Crear Cuenta') }}
            </x-responsive-nav-link>
        </div>
        @endguest

    </div>
</nav>
