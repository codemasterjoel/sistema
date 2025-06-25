<?php

namespace App\Http\Livewire\NBC;

use Livewire\Component;

use App\Models\NBC;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Parroquia;
use App\Models\RegistroLuchador;

use Ramsey\Uuid\Uuid;

class Crear extends Component
{
    public $id = 0;
    public $PoseeOrganizador, $PoseeFormador, $PoseeMovilizador, $PoseeDefensa, $PoseeProductivo = false;
    public $ContentOrganizador, $ContentFormador, $ContentMovilizador, $ContentDefensa, $ContentProductivo = false;
    public $FormOrganizador, $FormFormador, $FormMovilizador, $FormDefensa, $FormProductivo = false;
    public $estados = null;
    public $municipios  = null; // Liste de Municipios
    public $parroquias  = null; // Lista de parroquias
    public $CedulaJefe, $CedulaOrganizador, $CedulaFormador, $CedulaMovilizador, $CedulaDefensa, $CedulaProductivo = null; //Cedula
    public $NombreNBC, $lat, $lon = null; // Nombre del NBC
    public $CantConsejoComunal, $CantBaseMisiones, $CantUrbanismo, $CantCDI = null;
    public $NombreJefe, $NombreOrganizador, $NombreFormador, $NombreMovilizador, $NombreDefensa, $NombreProductivo = null; // nombre
    public $IdJefe, $IdOrganizador, $IdFormador, $IdMovilizador, $IdDefensa, $IdProductivo = null; // nombre

    public $estadoId, $municipioId, $parroquiaId = null; //Id que recibo de los campos

    public function render()
    {
        if($this->id)
        {
            $nbc = NBC::findOrFail($this->id);
    
            $this->NombreNBC = $nbc->nombre;
            $this->CedulaJefe = $nbc->jefe->cedula;
            $this->CedulaOrganizador = (isset($nbc->organizador)) ? $nbc->organizador->cedula : "" ;
            $this->CedulaFormador = (isset($nbc->formador)) ? $nbc->formador->cedula : "" ;
            $this->CedulaMovilizador = (isset($nbc->movilizador)) ? $nbc->movilizador->cedula : "" ;
            $this->CedulaDefensa = (isset($nbc->defensa)) ? $nbc->defensa->cedula : "" ;
            $this->CedulaProductivo = (isset($nbc->productivo)) ? $nbc->productivo->cedula : "" ;
    
            $this->IdJefe = $nbc->jefe_id;
            $this->IdOrganizador = (isset($nbc->organizador)) ? $nbc->organizador_id : null ;
            $this->IdFormador = (isset($nbc->formador)) ? $nbc->formador_id : null ;
            $this->IdMovilizador = (isset($nbc->movilizador)) ? $nbc->movilizador_id : null ;
            $this->IdDefensa = (isset($nbc->defensa)) ? $nbc->defensa_id : null ;
            $this->IdProductivo = (isset($nbc->productivo)) ? $nbc->productivo_id : null ;
    
            $this->PoseeOrganizador = (isset($nbc->organizador)) ? true : false ;
            $this->PoseeFormador = (isset($nbc->formador)) ? true : false ;
            $this->PoseeMovilizador = (isset($nbc->movilizador)) ? true : false ;
            $this->PoseeDefensa = (isset($nbc->defensa)) ? true : false ;
            $this->PoseeProductivo = (isset($nbc->productivo)) ? true : false ;
    
            $this->NombreJefe = $nbc->jefe->nombre." ".$nbc->jefe->apellido;
            $this->NombreOrganizador = (isset($nbc->organizador)) ? $nbc->organizador->nombre." ".$nbc->organizador->apellido : "" ;
            $this->NombreFormador = (isset($nbc->formador)) ? $nbc->formador->nombre." ".$nbc->organizador->apellido : "" ;
            $this->NombreMovilizador = (isset($nbc->movilizador)) ? $nbc->movilizador->nombre." ".$nbc->movilizador->apellido : "" ;
            $this->NombreDefensa = (isset($nbc->defensa)) ? $nbc->defensa->nombre." ".$nbc->defensa->apellido : "" ;
            $this->NombreProductivo = (isset($nbc->productivo)) ? $nbc->productivo->nombre." ".$nbc->productivo->apellido : "" ;
    
            $estados = Estado::all();
            $this->estadoId = $nbc->estado_id;
            $this->municipioId = $nbc->municipio_id;
            $this->municipios = Municipio::where('estado_id', $nbc->estado_id)->get();
            $this->parroquiaId = $nbc->parroquia_id;
            $this->parroquias = Parroquia::where('municipio_id', $nbc->municipio_id)->get();
    
            $this->CantConsejoComunal = $nbc->cant_consejos_comunales;
            $this->CantBaseMisiones = $nbc->cant_bases_misiones;
            $this->CantUrbanismo = $nbc->cant_urbanismos;
            $this->CantCDI = $nbc->cant_cdi;
            return view('livewire.n-b-c.crear', ['estados'=>$estados]);
        }else{
            $this->estados = Estado::all();
            return view('livewire.n-b-c.crear', ['estados'=>$this->estados]);
        }
    }

    public function updatedEstadoId($id)
    {
        $this->municipioId = null;
        $this->parroquiaId = null;
        $this->municipios = Municipio::where('estado_id', $id)->get();
    }
}
