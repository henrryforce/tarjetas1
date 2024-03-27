<?php

namespace App\Livewire\Componets;

use App\Models\Card;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Livewire\Forms\EditCards;
use Illuminate\Support\Facades\File;

class ShowCards extends Component
{
    
    public function render()
    {
        $tarjetas = Card::where('user_id',auth()->user()->id)->orderBy('selected','desc')->get();
        return view('livewire.componets.show-cards',['tarjetas'=>$tarjetas]);
    }
    public function edit(Card $card){
        $this->dispatch('show-edit-modal',$card)->to(EditCards::class);
    }
    public function delete(Card $id){
        $path = public_path('uploads/' . $id->img);
        if (File::exists($path)) {
            unlink($path);
        }
        $id->delete();
        $this->dispatch('$refresh');
        $this->dispatch('tarjetaEliminada');
    }
    #[On('refreshCards')]
    public function refresh(){
        $this->dispatch('tarjetaEditada');
        $this->dispatch('$refresh');
    }


}
