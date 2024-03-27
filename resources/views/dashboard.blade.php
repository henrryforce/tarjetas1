<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex justify-between items-center" >
                    <div>Tarjetas de Presentacion digital</div>
                    <a href="{{route('tarjeta')}}" class="ms-4 px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-red">
                        {{ __('Agregar Tarjeta') }}
                    </a>
                    
                </div>
                
                
            </div>
        </div>
    </div>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100 flex  justify-around items-center" >
                
                        <livewire:componets.show-cards/>
                        
                        <livewire:forms.edit-cards/>
                </div>
            </div>
        </div>
    </div>
    @push('scripts')
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @endpush
</x-app-layout>
