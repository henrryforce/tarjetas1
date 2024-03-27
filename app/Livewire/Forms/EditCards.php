<?php

namespace App\Livewire\Forms;

use App\Models\Card;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\File;
use App\Livewire\Componets\ShowCards;
use Intervention\Image\Facades\Image;

class EditCards extends Component
{
    use WithFileUploads;

    public $id;
    public $cargo;
    public $localidad;
    public $color;
    public $img;
    public $imgOld;
    public $imgNew;
    public $selected;
    public function render()
    {
        return view('livewire.forms.edit-cards',);
    }
    public function updatedSelected($value){
        $userId= auth()->user()->id;
        $cardSelected = Card::where('user_id',$userId)->where('selected',true)->first();
        if($cardSelected && $cardSelected->id != $this->id){
            $this->selected = ! $value;
            $this->dispatch('cardSelectedNoAvalible');
        }else{
            $this->selected = $value;
        }
    }
    #[On('show-edit-modal')]
    public function showEdit(Card $card)
    {
        $this->id = $card->id;
        $this->cargo = $card->texto;
        $this->localidad = $card->localidad;
        $this->color = $card->color;
        $this->img = $card->img;
        $this->selected = boolval($card->selected);
        $this->dispatch('open-modal', 'edit-card');
    }
    public function submit()
    {
        $rules = [
            'cargo' => 'required',
            'localidad' => 'required',
            'color' => 'required',
            'selected' => 'required'
        ];

        if ($this->imgOld) {
            $rules['imgNew'] = 'required|extensions:jpg,png';
        }

        $validated = $this->validate($rules, [
            'imgNew.required' => 'Debes cargar una imagen',
            'imgNew.extensions' => 'Solo se permite el formato jpg o png',
            'cargo.required' => 'Debes ingresar una imagen',
            'localidad.required' => 'Debes ingresar la localidad',
            'color.required' => 'Debes seleccionar un color'
        ]);
        $tarjeta = Card::find($this->id);
        if ($this->imgOld) {
            $path = public_path('uploads/' . $this->imgOld);
            if (File::exists($path)) {
                unlink($path);
            }
            $imagen = $validated['imgNew'];

            // Generar un nombre único para el archivo
            $nombreImagen = Str::uuid() . "." . $imagen->extension();

            // Guardar el archivo en la carpeta uploads
            $imagenServisor = Image::make($imagen);
            $imagenPath = public_path('uploads') . '/' . $nombreImagen;
            $imagenServisor->save($imagenPath);
            $tarjeta->img = $nombreImagen;
        }
        $tarjeta->color = $this->color;
        $tarjeta->texto = $this->cargo;
        $tarjeta->selected = $this->selected;
        $tarjeta->localidad = $this->localidad;
        $tarjeta->save();
        $this->dispatch('close-modal', 'edit-card');
        $this->dispatch('refreshCards')->to(ShowCards::class);
    }
    public function deleteImage()
    {
        $this->imgOld = $this->img;
        $this->img = null;
    }
  
}
