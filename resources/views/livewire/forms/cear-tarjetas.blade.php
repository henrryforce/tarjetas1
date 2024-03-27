<div class="p-8 w-10/12 md:w-5/12 lg:w-5/12 border-white border-2 rounded-md">
    <form novalidate wire:submit='submit'>
        <!-- Cargo -->
        <div class="pb-3">
            <x-input-label for="cargo" :value="__('Cargo')" />
            <x-text-input wire:model='cargo' id="cargo" class="block mt-1 w-full" type="text" name="cargo" required
                autofocus autocomplete="cargo" />
            <x-input-error :messages="$errors->get('cargo')" class="mt-2" />
        </div>
        <!-- Localidad -->
        <div class="pb-3">
            <x-input-label for="localidad" :value="__('Localidad')" />
            <x-text-input id="localidad" wire:model='localidad' class="block mt-1 w-full" type="text"
                name="localidad" required autofocus autocomplete="localidad" />
            <x-input-error :messages="$errors->get('localidad')" class="mt-2" />
        </div>
        <!-- Color -->
        <div class="pb-3">
            <x-input-label for="color" :value="__('Color de fondo')" />
            {{--
            <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" required
                autofocus autocomplete="nombre" /> --}}
            <input type="color" wire:model='color'
                class="p-1 h-10 w-14 block bg-white border border-gray-200 cursor-pointer rounded-lg disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700"
                id="color" name="color" value="#2563eb" title="Choose your color">
            <x-input-error :messages="$errors->get('color')" class="mt-2" />
        </div>
        <!-- Imagen -->
        <div class="pb-3 flex flex-col">
            <x-input-label for="imagen" :value="__('Imagen')" />
            {{-- <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" required
                autofocus autocomplete="nombre" /> --}}
            <input type="file" wire:model='img' name="imagen" id="imagen"
                class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600    file:bg-gray-50 file:border-0   file:me-4  file:py-3 file:px-4  dark:file:bg-gray-700 dark:file:text-gray-400">
            <x-input-error :messages="$errors->get('img')" class="mt-2" />
        </div>
        {{-- Redes --}}
        <div class="pb-3 	">
            <h3 class="text-gray-700 dark:text-gray-300 pb-3">Redes Sociales </h3>
            {{-- <div class="relative h-10  min-w-[200px]">
                <select  wire:model.change="redes"
                    class="peer h-full w-full rounded-[7px] border border-blue-gray-200 border-t-transparent bg-transparent px-3 py-2.5 font-sans text-sm font-normal text-blue-gray-700 outline outline-0 transition-all placeholder-shown:border placeholder-shown:border-blue-gray-200 placeholder-shown:border-t-blue-gray-200 empty:!bg-gray-900 focus:border-2 focus:border-gray-900 focus:border-t-transparent focus:outline-0 disabled:border-0 disabled:bg-blue-gray-50 dark:text-gray-400">
                    <option value="default" >Selecciona una opcion</option>
                    <option value="Linkedin" >Linkedin</option>
                    <option value="Github">Github</option>
                    <option value="Pagina Web">Pagina Web</option>

                </select>
                <label
                    class="before:content[' '] after:content[' '] pointer-events-none absolute left-0 -top-1.5 flex h-full w-full select-none text-[11px] font-normal leading-tight text-blue-gray-400 transition-all before:pointer-events-none before:mt-[6.5px] before:mr-1 before:box-border before:block before:h-1.5 before:w-2.5 before:rounded-tl-md before:border-t before:border-l before:border-blue-gray-200 before:transition-all after:pointer-events-none after:mt-[6.5px] after:ml-1 after:box-border after:block after:h-1.5 after:w-2.5 after:flex-grow after:rounded-tr-md after:border-t after:border-r after:border-blue-gray-200 after:transition-all peer-placeholder-shown:text-sm peer-placeholder-shown:leading-[3.75] peer-placeholder-shown:text-blue-gray-500 peer-placeholder-shown:before:border-transparent peer-placeholder-shown:after:border-transparent peer-focus:text-[11px] peer-focus:leading-tight peer-focus:text-gray-400 peer-focus:before:border-t-2 peer-focus:before:border-l-2 peer-focus:before:border-gray-900 peer-focus:after:border-t-2 peer-focus:after:border-r-2 peer-focus:after:border-gray-900 peer-disabled:text-transparent peer-disabled:before:border-transparent peer-disabled:after:border-transparent peer-disabled:peer-placeholder-shown:text-blue-gray-500 dark:text-gray-400">
                    Redes Sociales 
                </label>
                <input type="checkbox" wire:model.change="vLink">
            </div> --}}
            <div class="flex-column">
                <div>
                    <label for="vLink" class="inline-flex items-center">
                        <input wire:model.change="vLink" id="vLink" type="checkbox"
                            class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                            name="remember">
                        <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Linkedin') }}</span>
                    </label>
                </div>
                <div>
                    <label for="vGithub" class="inline-flex items-center">
                        <input wire:model.change="vGithub" id="vGithub" type="checkbox"
                            class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                            name="remember">
                        <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Github') }}</span>
                    </label>
                </div>
                <div>
                    <label for="vPweb" class="inline-flex items-center">
                        <input wire:model.change="vPweb" id="vPweb" type="checkbox"
                            class="rounded dark:bg-gray-900 border-gray-300 dark:border-gray-700 text-indigo-600 shadow-sm focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                            name="remember">
                        <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">{{ __('Pagina Web') }}</span>
                    </label>
                </div>



            </div>
            @if ($vLink )
                <div class="pb-3 	">
                    <x-input-label for="linkedin" :value="__('Linkedin')" />
                    <x-text-input id="linkedin" wire:model='linkedin' class="block mt-1 w-full" type="text"
                        name="linkedin" required autofocus autocomplete="linkedin" />
                    <x-input-error :messages="$errors->get('linkedin')" class="mt-2" />
                </div>
            @endif
            @if ($vGithub )
                <div class="pb-3 	">
                    <x-input-label for="git" :value="__('GitHub')" />
                    <x-text-input id="git" wire:model='git' class="block mt-1 w-full" type="text"
                        name="git" required autofocus autocomplete="git" />
                    <x-input-error :messages="$errors->get('git')" class="mt-2" />
                </div>
            @endif
            @if ($vPweb )
                <div class="pb-3">
                    <x-input-label for="web" :value="__('Pagina Web')" />
                    <x-text-input id="web" wire:model='web' class="block mt-1 w-full" type="text"
                        name="web" required autofocus autocomplete="web" />
                    <x-input-error :messages="$errors->get('web')" class="mt-2" />
                </div>
            @endif


        </div>


        <!-- Seleccionada -->
        <div class="pb-3">
            <x-input-label for="nombre" :value="__('Seleccionada')" class="pb-1" />
            <input type="checkbox" id="hs-basic-usage" wire:model='selected'
                class="relative w-[3.25rem] h-7 p-px bg-gray-100 border-transparent text-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:ring-green-600 disabled:opacity-50 disabled:pointer-events-none checked:bg-none checked:text-green-600 checked:border-green-600 focus:checked:border-green-600 dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-green-500 dark:checked:border-green-500 dark:focus:ring-offset-gray-600 before:inline-block before:size-6 before:bg-white checked:before:bg-green-200 before:translate-x-0 checked:before:translate-x-full before:rounded-full before:shadow before:transform before:ring-0 before:transition before:ease-in-out before:duration-200 dark:before:bg-gray-400 dark:checked:before:bg-green-200">
            <x-input-error :messages="$errors->get('nombre')" class="mt-2" />
        </div>
        <div class="flex flex-col items-center">


            <div class="py-1 ">
                <x-primary-button>
                    {{ __('Guardar') }}
                </x-primary-button>
            </div>
            <div class="py-1">
                <x-secondary-button>
                    {{ __('Descargar') }}
                </x-secondary-button>
            </div>
            <div class="py-1">
                <x-secondary-button>
                    {{ __('Compartir') }}
                </x-secondary-button>
            </div>
        </div>
    </form>
</div>
@script
    <script>
        $wire.on('tarjetaCreada', () => {
            Swal.fire({
                title: "Tarjeta creada",
                text: "La tarjeta se creo con exito",
                icon: "success"
            });
        });
        $wire.on('redirectToDashboard', () => {
            setTimeout(() => {
                window.location.href =
                    "{{ route('dashboard') }}"; // Reemplaza 'dashboard' con el nombre de la ruta correspondiente
            }, 2000); // Retraso de 2 segundos antes de redirigir
        });
    </script>
@endscript
