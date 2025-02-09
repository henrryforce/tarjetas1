<div class="grid lg:grid-cols-2 md:grid-cols-2 gap-4">
    @foreach ($tarjetas as $tarjeta)
        <div class="w-90 lg:w-96 bg-white rounded-lg p-5">
            @if ($tarjeta->selected == 1)
                <div class="flex flex-row-reverse">
                    <a class="text-green-800">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="w-6 h-6">
                            <path fill-rule="evenodd"
                                d="M2.25 12c0-5.385 4.365-9.75 9.75-9.75s9.75 4.365 9.75 9.75-4.365 9.75-9.75 9.75S2.25 17.385 2.25 12Zm13.36-1.814a.75.75 0 1 0-1.22-.872l-3.236 4.53L9.53 12.22a.75.75 0 0 0-1.06 1.06l2.25 2.25a.75.75 0 0 0 1.14-.094l3.75-5.25Z"
                                clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            @endif
            <div class="h-65 ">
                <img class="rounded-lg" src="{{ asset('uploads'). '/'.$tarjeta->img }}"
                    alt="profile-picture" />
            </div>
            <div class="text-center">
                <h4 class="mb-2 text-black">{{ $tarjeta->texto }}</h4>
                <p class="font-medium text-black">{{ $tarjeta->localidad }}</p>
            </div>

            <div class="flex justify-center gap-7 pt-2">
                <a class="text-black cursor-pointer"
                    wire:click="edit({{$tarjeta}})">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                    </svg>
                </a>
                <a class="text-black cursor-pointer" wire:click='delete({{$tarjeta->id}})'>
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m14.74 9-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 0 1-2.244 2.077H8.084a2.25 2.25 0 0 1-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 0 0-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 0 1 3.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 0 0-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 0 0-7.5 0" />
                    </svg>
                </a>
                

            </div>
        </div>
    @endforeach
</div>
@script
    <script>
        $wire.on('tarjetaEditada', () => {
            Swal.fire({
                title: "Tarjeta editada",
                text: "La tarjeta se edito con exito",
                icon: "success"
            });
        });
        $wire.on('tarjetaEliminada', () => {
            Swal.fire({
                title: "Tarjeta eliminada",
                text: "La tarjeta se elimino con exito",
                icon: "success"
            });
        });
    </script>
@endscript