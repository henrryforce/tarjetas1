<?php

namespace App\Livewire\Forms;

use App\Models\Card;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Intervention\Image\Facades\Image;

class CearTarjetas extends Component
{
    use WithFileUploads;
    
    public $cargo ='';
    public $localidad = '';
    public $color ='#111C36';
    public $img;
    public $selected = false;
    public $linkedin;
    public $git;
    public $web;
    public $vLink = false;
    public $vGithub = false;
    public $vPweb = false;
    
    public function render()
    {
        return view('livewire.forms.cear-tarjetas');
    }
    public function submit(){
        // dd($this);
        $validated = $this->validate([
            'cargo'=>'required',
            'localidad' => 'required',
            'color'=> 'required',
            'img' => 'required|extensions:jpg,png',
            'selected' => 'required'
        ],[
            'img.required' => 'Debes cargar una imagen',
            'cargo.required' => 'Debes ingresar una imagen',
            'localidad.required' => 'Debes ingresar la localidad',
            'color.required' => 'Debes seleccionar un color'
        ]);
        // Obtener el archivo subido
    $imagen = $validated['img'];

    // Generar un nombre único para el archivo
    $nombreImagen = Str::uuid() . "." . $imagen->extension();

    // Guardar el archivo en la carpeta uploads
    $imagenServisor = Image::make($imagen);
    $imagenPath = public_path('uploads') . '/' . $nombreImagen;
    $imagenServisor->save($imagenPath);
        Card::create([
            'user_id' => auth()->user()->id,
            'color' => $validated['color'],
            'img' => $nombreImagen,
            'texto' => $validated['cargo'],
            'localidad' => $validated['localidad'],
            'selected'=>$validated['selected']
        ]);
        $this->dispatch('tarjetaCreada');
        $this->dispatch('redirectToDashboard');
    }
    public function updatedRedes($value){
        if($value == 'Linkedin'){
            $this->vLink = true;
        }
        elseif($value == 'Github'){
            $this->vGithub = true;
        }
        elseif($value == 'Pagina Web'){
            $this->vPweb = true;
        }
    }
}
