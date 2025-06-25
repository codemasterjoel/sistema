<?php

namespace App\Http\Livewire\Luchador;

use Livewire\Component;

use App\Models\RegistroLuchador;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Parroquia;
use App\Models\Genero;
use App\Models\Avanzada;
use App\Models\NivelAcademico;
use App\Models\Nivel;
use App\Models\Responsabilidad;
use App\Models\Saime;
use App\Mail\UserCreated;
use Carbon\Carbon;

use Ramsey\Uuid\Uuid;
use Livewire\WithPagination;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Mail;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $modal, $estado, $filtro = false;
    public $estados, $municipios, $parroquias, $nivelesAcademicos, $niveles, $responsabilidades = null;
    public $cedula, $nacionalidad, $avanzadas, $correo, $direccion, $fechaNacimiento, $nombre, $apellido = null;
    public $generos, $pertenece_al_psuv, $cargo, $vocero, $cargo_popular = null;
    public $estatus, $telefono, $edad, $inactivo, $id = null;
    public $search = "";
    public $paisId, $estadoId, $municipioId, $parroquiaId, $nivelAcademicoId, $responsabilidadId, $avanzadaId, $generoId, $nivelId = null; //Id que recibo de los campos

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        $lsbs = RegistroLuchador::where('cedula', 'like', "%$this->search%")
        ->where('estado_id', '<>', '25')
        ->paginate(5);
        $this->estados = Estado::all();
        $this->nivelesAcademicos = NivelAcademico::all();
        $this->niveles = Nivel::all();
        $this->responsabilidades = Responsabilidad::where('nivel','>=', auth()->user()->nivel_id)->pluck('nombre', 'id');
        $this->avanzadas = Avanzada::all();
        $this->generos = Genero::all();

        return view('livewire.luchador.index', ['lsbs'=>$lsbs]);
    }
    public function crear()
    {
        $this->limpiarCampos();
        $this->abrirModal();
    }
    public function verfiltro()
    {
        if ($this->filtro) {
            $this->filtro = false;
        } else {
            $this->filtro = true;
        }
    } 
    public function abrirModal() 
    {
        $this->modal = true;
    }
    public function cerrarModal() 
    {
        $this->limpiarCampos();
        $this->modal = false;
    }
    public function limpiarCampos()
    {
        $this->estatus = false;
        $this->cedula = null;
        $this->nombre = null;
        $this->apellido = null;
        $this->fechaNacimiento = null;
        $this->telefono = null;
        $this->correo = null;
        $this->avanzadaId = null;
        $this->generoId = null;
        $this->nivelAcademicoId = null;
        $this->responsabilidadId = null;
        $this->estadoId = null;
        $this->municipioId = null;
        $this->parroquiaId = null;
        $this->direccion = null;
        $this->paisId = null;
        $this->nacionalidad = null;
        $this->edad = null;
        $this->nivelId = null;
        $this->pertenece_al_psuv = null;
        $this->cargo = null;
        $this->vocero = null;
        $this->cargo_popular = null;
    }
    public function updatedEstadoId($id)
    {
        $this->municipioId = null;
        $this->parroquiaId = null;
        $this->municipios = Municipio::where('estado_id', $id)->get();
    }
    public function updatedMunicipioId($id)
    {
        $this->parroquiaId = null;
        $this->parroquias = Parroquia::where('municipio_id', $id)->get();
    }
    public function consultar()
    {
        
        $existelsb = RegistroLuchador::where('cedula', '=', $this->cedula)->get();
        
        if (count($existelsb) > 0) //se encuentra registrado como jefe
        {
            session()->flash('yaregistrado', 'yaregistrado');
        } else 
        {
            $saime = Saime::where('cedula', '=', $this->cedula)->get();
            if (count($saime) > 0) {
                $saime = $saime->first();
                $this->nombre = $saime->nombre1." ".$saime->nombre2;
                $this->apellido = $saime->apellido1." ".$saime->apellido2;
                $this->generoId = $saime->genero_id;
                $this->fechaNacimiento = $saime->fecha_nac;
            } else {
                session()->flash('noencontrada', 'noencontrada');
            }
        }

    }
    public function editar($id)
    {
        $lsb = RegistroLuchador::findOrFail($id);

        $this->id = $id;
        $this->estatus =$lsb->estatus;
        $this->cedula = $lsb->cedula;
        $this->nombre = $lsb->nombre;
        $this->apellido = $lsb->apellido;
        $this->fechaNacimiento = $lsb->fecha_nac;
        $this->generoId = $lsb->genero_id;
        $this->telefono = $lsb->telefono;
        $this->nivelAcademicoId = $lsb->nivel_academico_id;
        $this->avanzadaId = $lsb->avanzada_id;
        $this->responsabilidadId = $lsb->responsabilidad_id;
        $this->estadoId = $lsb->estado_id;
        $this->municipioId = $lsb->municipio_id;
        $this->municipios = Municipio::where('estado_id', $lsb->estado_id)->get();
        $this->parroquiaId = $lsb->parroquia_id;
        $this->parroquias = Parroquia::where('municipio_id', $lsb->municipio_id)->get();
        $this->correo = $lsb->correo;
        $this->direccion = $lsb->direccion;
        $this->nacionalidad = $lsb->letra;
        $this->edad = $lsb->edad;
        $this->nivelId = $lsb->nivel_id;
        $this->pertenece_al_psuv = $lsb->pertenece_al_psuv;
        $this->cargo = $lsb->cargo;
        $this->vocero = $lsb->vocero;
        $this->cargo_popular = $lsb->cargo_popular;
        
        session()->flash('success', 'success');

        $this->abrirModal();
    }
    public function guardar()
    {
        if ($this->estatus == false) {
            $this->inactivo = Carbon::now()->toDateTimeString();
        }else
        {
            $this->inactivo = null;
        }
        $this->edad = Carbon::parse($this->fechaNacimiento)->age;

        $lsb = RegistroLuchador::updateOrCreate(['id' => $this->id],
            [
            'letra' => $this->nacionalidad,
            'estatus' => $this->estatus,
            'cedula' => $this->cedula,
            'nombre' => $this->nombre,
            'apellido' => $this->apellido,
            'fecha_nac' => $this->fechaNacimiento,
            'telefono' => $this->telefono,
            'correo' => $this->correo,
            'avanzada_id' => $this->avanzadaId,
            'genero_id' => $this->generoId,
            'nivel_academico_id' => $this->nivelAcademicoId,
            'responsabilidad_id' => $this->responsabilidadId,
            'estado_id' => $this->estadoId,
            'municipio_id' => $this->municipioId,
            'parroquia_id' => $this->parroquiaId,
            'direccion' => $this->direccion,
            'edad' => $this->edad,
            'inactivo' => $this->inactivo,
            'nivel_id' => $this->nivelId,
            'pertenece_al_psuv' => $this->pertenece_al_psuv,
            'cargo' => $this->cargo,
            'vocero' => $this->vocero,
            'cargo_popular' => $this->cargo_popular,
        ]);
         
        session()->flash('success', 'success');
         
         $this->cerrarModal();
         $this->limpiarCampos();
    }
    public function borrar($id)
    {
        RegistroLuchador::find($id)->delete();
        session()->flash('integranteEliminado', 'success');
    }
    public function fichalsb($id)
    {
        $lsbs = RegistroLuchador::find($id);

        // return view('reportes.lsb');
        $pdf = Pdf::loadView('livewire.reportes.lsb', ['lsb'=>$lsbs]);
        set_time_limit(0);
        ini_set("memory_limit",-1);
        ini_set('max_execution_time', 0);
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
        }, 'constancia.pdf');
    }
    public function verficha($id) 
    {
        $lsbs = RegistroLuchador::find($id);

        return view ('livewire.reportes.lsb', ['lsb'=>$lsbs]);
    }
    public function carnet($id)
    {
        // return view('livewire.reportes.carnet');
        $lsbs = RegistroLuchador::find($id);

        $pdf = Pdf::loadView('livewire.reportes.carnet', data:['lsb'=>$lsbs]);
        $pdf ->set_paper("carnet", "landscape");

        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
        }, 'carnet.pdf');
    }
    public function pertenecePSUV()
    {
        if ($this->pertenece_al_psuv) {
            $this->pertenece_al_psuv = false;
            $this->nivelId = null;
        }else
        {
            $this->pertenece_al_psuv = true;
        }
    }
    public function esVocero()
    {
        if ($this->vocero) {
            $this->vocero = false;
        } else {
            $this->vocero = true;
        }
    }
    public function cambiarCargo()
    {
        if ($this->cargo_popular) {
            $this->cargo_popular = false;
            $this->cargo = null;
        }else
        {
            $this->cargo_popular = true;
        }
    }
}
