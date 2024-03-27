<x-modal name="edit-card" focusable>
    <div class="p-8 w-full border-white border-2 rounded-md">
        <form novalidate wire:submit='submit'>
            <!-- Cargo -->
            <div class="pb-3">
                <x-input-label for="cargo" :value="__('Cargo')" />
                <x-text-input wire:model='cargo' id="cargo" class="block mt-1 w-full" type="text" name="cargo"
                    required autofocus autocomplete="cargo" />
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
            @if ($img != null)
                <div class="h-35 flex flex-row">
                    <img class="rounded-lg w-20 h-20" src="{{ asset('uploads') . '/' . $img }}" alt="profile-picture" />

                    <x-secondary-button class="border-0" wire:click='deleteImage'>
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd"
                                d="M16.5 4.478v.227a48.816 48.816 0 0 1 3.878.512.75.75 0 1 1-.256 1.478l-.209-.035-1.005 13.07a3 3 0 0 1-2.991 2.77H8.084a3 3 0 0 1-2.991-2.77L4.087 6.66l-.209.035a.75.75 0 0 1-.256-1.478A48.567 48.567 0 0 1 7.5 4.705v-.227c0-1.564 1.213-2.9 2.816-2.951a52.662 52.662 0 0 1 3.369 0c1.603.051 2.815 1.387 2.815 2.951Zm-6.136-1.452a51.196 51.196 0 0 1 3.273 0C14.39 3.05 15 3.684 15 4.478v.113a49.488 49.488 0 0 0-6 0v-.113c0-.794.609-1.428 1.364-1.452Zm-.355 5.945a.75.75 0 1 0-1.5.058l.347 9a.75.75 0 1 0 1.499-.058l-.346-9Zm5.48.058a.75.75 0 1 0-1.498-.058l-.347 9a.75.75 0 0 0 1.5.058l.345-9Z"
                                clip-rule="evenodd" />
                        </svg>
                    </x-secondary-button>

                    <x-input-error :messages="$errors->get('img')" class="mt-2" />
                </div>
            @else
                <div class="pb-3 flex flex-col">
                    <x-input-label for="imagen" :value="__('Imagen')" />
                    {{-- <x-text-input id="nombre" class="block mt-1 w-full" type="text" name="nombre" required
                        autofocus autocomplete="nombre" /> --}}
                    <input type="file" wire:model='imgNew' name="imagen" id="imagen"  accept="image/jpg, image/png"
                        class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600    file:bg-gray-50 file:border-0   file:me-4  file:py-3 file:px-4  dark:file:bg-gray-700 dark:file:text-gray-400">
                    <x-input-error :messages="$errors->get('imgNew')" class="mt-2" />
                </div>
            @endif

            <!-- Seleccionada -->
            <div class="pb-3">
                <x-input-label for="selected" :value="__('Seleccionada')" class="pb-1" />
                <input type="checkbox" id="hs-basic-usage" wire:model.change='selected' name="selected"
                    class="relative w-[3.25rem] h-7 p-px bg-gray-100 border-transparent text-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:ring-green-600 disabled:opacity-50 disabled:pointer-events-none checked:bg-none checked:text-green-600 checked:border-green-600 focus:checked:border-green-600 dark:bg-gray-800 dark:border-gray-700 dark:checked:bg-green-500 dark:checked:border-green-500 dark:focus:ring-offset-gray-600 before:inline-block before:size-6 before:bg-white checked:before:bg-green-200 before:translate-x-0 checked:before:translate-x-full before:rounded-full before:shadow before:transform before:ring-0 before:transition before:ease-in-out before:duration-200 dark:before:bg-gray-400 dark:checked:before:bg-green-200">
                <x-input-error :messages="$errors->get('selected')" class="mt-2" />
            </div>
            <div class="flex flex-col items-center">


                <div class="py-1">
                    <x-primary-button>
                        {{ __('Guardar') }}
                    </x-primary-button>
                </div>
        </form>
    </div>

</x-modal>
@script
    <script>
        $wire.on('cardSelectedNoAvalible', () => {
            Swal.fire({
                title: "Accion denegada",
                text: "Actualmente ya tienes una tarjeta seleccionada como principal y solo puedes tener una seleccionada",
                icon: "error"
            });
        });
        
    </script>
@endscript