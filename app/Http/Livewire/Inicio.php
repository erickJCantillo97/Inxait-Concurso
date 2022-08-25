<?php

namespace App\Http\Livewire;

use App\Exports\UserExport;
use App\Models\Ciudad;
use App\Models\Departamento;
use App\Models\Ganador;
use App\Models\User;
use Livewire\Component;


class Inicio extends Component
{
    public $departamento_id, $ciudad, $nombre, $apellidos, $celular, $cedula, $email, $habeas, $modelOpen, $users;
    public $ganador;


    public function render()
    {
        $this->users = User::inRandomOrder()->get();
        return view('livewire.inicio',
        [
            'departamentos' => Departamento::orderBy('name')->get(),
            'ciudades' => Ciudad::where('departamento_id', $this->departamento_id)->orderBy('name')->get(),

        ]
        );
    }

    public function add(){
        User::create([
            'name' => $this->nombre,
            'apellidos'=> $this->apellidos,
            'ciudad_id' => $this->ciudad,
            'email'=> $this->email,
            'cedula' => $this->cedula,
            'habeasData' => $this->habeas 
        ]);
        $this->modelOpen = false;
    }

    public function realizarConcurso(){
        $this->ganador = 'ID: '.$this->users[0]->id.'<br>Nombre: '. $this->users[0]->name. ' <br>Identificación: '.$this->users[0]->cedula;
        Ganador::create([
            'user_id' => $this->users[0]->id,
        ]);
    }

 
}
