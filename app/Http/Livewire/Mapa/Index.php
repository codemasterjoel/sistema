<?php

namespace App\Http\Livewire\Mapa;

use Livewire\Component;
use App\Models\NBC;
use App\Models\Estado;
use Livewire\WithPagination;


class Index extends Component
{
    use WithPagination;
    public $estadoId, $divmapa = null;

    public function render()
    {
        $estados = Estado::all();
        //$this->nbcs = NBC::where('latitud', "<>", "")->get();
        $nbcs = NBC::where('latitud', "<>", "")->get();

        return view('livewire.mapa.index', [
            'estados' => $estados,
            'nbcs' => $nbcs,
        ]);
    }
    public function updatedEstadoId($id)
    {
        $nbcs = NBC::where('estado_id', $this->estadoId);
        return view('livewire.mapa.index', [
            'nbcs' => $nbcs->get(),
        ]);
    }
}