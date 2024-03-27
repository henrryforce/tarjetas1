<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Creacion de Tarjetas') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 ">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex justify-center items-center">
                    <h1 style="font-size: 2rem;">Diseña tu tarjeta</h1>

                </div>
                <div class="lg:pl-20 flex justify-between items-center flex-col md:flex-row p-5 lg:flex-row  xl:flex-row">
                    <livewire:forms.cear-tarjetas>
                    
                    <div>
                        visualizacion
                    </div>
                </div>

            </div>
        </div>
    </div>
    @push('scripts')
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @endpush
    
</x-app-layout>