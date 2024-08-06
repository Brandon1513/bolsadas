<?php

namespace App\Livewire;

use session;
use App\Models\Vacante;
use App\Notifications\NuevoCandidato;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class PostularVacante extends Component
{
    use WithFileUploads;
    public $cv;
    public $vacante;
    protected $rules =[
        'cv' => 'required|mimes:pdf'
    ];
    public function mount(Vacante $vacante)
    {
        $this->vacante = $vacante;
    }
    public function postularme()
    {
       $datos = $this->validate();

       // Almacenar el CV
       $cv = $this->cv->store('public/cv');
       $datos['cv'] = str_replace('public/cv/', '', $cv);

       // Crear el candidato a la vacante
       $this->vacante->candidatos()->create([
            'user_id' => auth()->user()->id,
            'cv' =>$datos['cv']
       ]);
       

       // crear notificación y enviar email
       $this->vacante->reclutador->notify(new NuevoCandidato($this->vacante->id,$this->vacante->titulo, auth()->user()->id));

       // Mostrar un mensaje de ok
       return redirect()->back()-> with('mensaje', 'Se envió correctamente tu información, muchas suerte');
       //session()->flash('mensaje', 'se envio correctamente');
       //return redirect()->back();
    }

    public function render()
    {
        return view('livewire.postular-vacante');
    }
}
