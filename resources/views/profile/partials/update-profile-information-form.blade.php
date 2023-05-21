<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Informacion de Perfil') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Actualice la información de perfil.") }}
        </p>
    </header>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="flex gap-10">
            <div class="w-1/2 space-y-6">
                <div class="">
                    <x-input-label for="name" :value="__('Nombre')" />
                    <x-text-input id="name" name="name" type="text" class="block w-full mt-1" :value="old('name', $user->name)" required autofocus autocomplete="name" />

                </div>

                <div>
                    <x-input-label for="contact" :value="($user->rol === 2) ? 'Pagina de contacto' : 'Link de curriculum'" />
                    <x-text-input id="contact" name="contact" type="text" class="block w-full mt-1" :value="old('contact', $user->contact)"  autofocus autocomplete="contact" />

                </div>

                <div>
                    <x-input-label for="description" :value="__('Descripcion')" />
                    <textarea
                        name="description"
                        id="description"
                        class="w-full text-left border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-50 h-72"
                        >{{old('description', $user->description)}}
                    </textarea>

                    <x-input-error class="mt-2" :messages="$errors->get('description')" />
                </div>

                @if(auth()->user()->rol === 1)
                <div>
                    <x-input-label for="university" :value="__('Universidad')" />
                    <x-text-input id="university" name="university" type="text" class="block w-full mt-1" :value="old('university', $user->university)" required autofocus autocomplete="university" />
                    <x-input-error class="mt-2" :messages="$errors->get('university')" />
                </div>
                @endif

                @if(auth()->user()->rol === 1)
                <div>
                    <x-input-label for="studies" :value="__('Estudios')" />
                    <x-text-input id="studies" name="studies" type="text" class="block w-full mt-1" :value="old('studies', $user->studies)" required autofocus autocomplete="studies" />
                    <x-input-error class="mt-2" :messages="$errors->get('studies')" />
                </div>
                @endif


                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" name="email" type="email" class="block w-full mt-1" :value="old('email', $user->email)" required autocomplete="username" />
                    <x-input-error class="mt-2" :messages="$errors->get('email')" />

                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                        <div>
                            <p class="mt-2 text-sm text-gray-800">
                                {{ __('Your email address is unverified.') }}

                                <button form="send-verification" class="text-sm text-gray-600 underline rounded-md hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                    {{ __('Click here to re-send the verification email.') }}
                                </button>
                            </p>

                            @if (session('status') === 'verification-link-sent')
                                <p class="mt-2 text-sm font-medium text-green-600">
                                    {{ __('A new verification link has been sent to your email address.') }}
                                </p>
                            @endif
                        </div>
                    @endif

                </div>

                @if($user->rol === 2 && $user->address)
                    <div>
                        <x-input-label for="address" :value="__('Direccion')" />
                        <x-input-label class="text-black capitalize" for="address" :value="__($user->address)" />

                    </div>
                @endif



            </div>

            <div class="relative space-y-10">

                @if ($user->rol === 1)
                    <div>
                        <x-input-label for="cv" :value="__('Curriculum')" />
                        <x-text-input
                            id="cv"
                            class="block w-full mt-1"
                            type="file"
                            name="cv"
                            accept=".pdf"
                        />

                        <x-input-error class="mt-2" :messages="$errors->get('cv')" />
                    </div>

                    @if ($user->cv)
                        <div>
                            <a
                                href="{{asset('storage/CVs/' . $user->cv)}}" class="inline-flex shadow-sm px-3 py-0.5 border border-gray-600 leading-5 font-medium text-sm rounded-full text-gray-700 bg-white hover:bg-gray-50"
                                target="_blank"
                                rel="noreferrer noopener"
                            >
                                Ver CV
                            </a>
                        </div>
                    @endif

                @endif

                <div>
                    <x-input-label for="image" :value="__('Imagen')" />
                    <x-text-input
                        id="image"
                        class="block w-full mt-1"
                        type="file"
                        name="image"
                        accept="image/*"
                    />
                    <x-input-error class="mt-2" :messages="$errors->get('image')" />
                    @if ($user->image)
                        <div  class="w-64 my-5">
                            <x-input-label :value="__('Imagen Actual')" />

                            <img src="{{asset('storage/images/' . $user->image)}}" alt="{{ 'Imagen Vacante' . " " . $user->name}}">
                        </div>
                    @endif

                </div>

                @if($user->rol == 1 && $user->cv && $user->contact)
                    <div class="absolute bottom-0 p-3 border-gray-700 rounded-lg shadow-md bg-slate-200">
                        <h3 class="font-bold">Nota:</h3>
                        <p class="text-sm">Se encuentran el link de curriculum como el archivo, en este caso se mostrara el archivo y no el link al mostrar el perfil a los demas usuarios</p>
                    </div>
                @endif


            </div>
        </div>

        <div class="flex items-center gap-4 mt-10">
            <x-primary-button>{{ __('Guardar Datos') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Guadado.') }}</p>
            @endif
        </div>

    </form>
</section>
