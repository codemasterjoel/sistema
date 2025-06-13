<?php

namespace App\Http\Livewire\Formacion;

use Livewire\Component;
use App\Models\RegistroLuchador;
use Livewire\WithPagination;
use App\Models\postulacion as postulado;
use App\Models\Estado;
use App\Models\Municipio;
use App\Models\Parroquia;
use App\Models\Genero;
use App\Models\Avanzada;
use App\Models\NivelAcademico;
use App\Models\Responsabilidad;
use App\Models\Formacion;
use App\Models\Campamento;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;

class Index extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $modalLuchador, $modalPostulado, $modalFormacion, $verPostulado, $modalCampamento = false;
    public $municipios, $municipio, $estados, $estado, $parroquias, $parroquia, $direccion, $nivelesAcademicos, $nivelAcademico, $responsabilidades, $responsabilidad, $cedula, $avanzadas, $avanzada, $correo, $fechaNacimiento = null; //Fecha Nacimiento
    public $nombreCompleto, $generos, $generoId, $estatus, $telefono = null; //Telefono
    public $search = "";
    public $data = "campamento";

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        $lsbs = RegistroLuchador::where('cedula', 'like', "%$this->search%")->where('estado_id', '<>', '25')->paginate(5);
        $postulados = postulado::where('cedula', 'like', "%$this->search%")->where('estado_id', '=', auth()->user()->estado_id)->paginate(5);
        $formacions = Formacion::where('cedula', 'like', "%$this->search%")->orderBy('created_at', 'Asc')->paginate(5);
        $campamento = Campamento::where('cedula', 'like', "%$this->search%")->orderBy('created_at', 'Asc')->paginate(5);
        $this->nivelesAcademicos = NivelAcademico::all();
        $this->estados = Estado::all();

        return view('livewire.formacion.index', ['lsbs'=>$lsbs, 'postulados'=>$postulados, 'formacions'=>$formacions, 'campamento'=>$campamento, 'campamentos'=>$campamento]);
    }
    public function ver($campo) 
    {
        $this->data = $campo;
    }
    public function verLuchador($id)
    {
        $lsb = RegistroLuchador::findOrFail($id);

        $this->id = $id;
        $this->estatus = $lsb->estatus;
        $this->cedula = $lsb->cedula;
        $this->nombreCompleto = $lsb->nombre." ".$lsb->apellido;
        $this->fechaNacimiento = $lsb->fecha_nac;
        $this->telefono = $lsb->telefono;
        $this->correo = $lsb->correo;
        $this->avanzada = $lsb->avanzada->nombre;
        $this->genero = $lsb->genero->nombre;
        $this->nivelAcademico = $lsb->nivelAcademico->nombre;
        $this->responsabilidad = $lsb->responsabilidad->nombre;
        $this->estado = $lsb->estado->nombre;
        if (isset($lsb->municipio->nombre)){
            $this->municipio = $lsb->municipio->nombre;
        }else {
            $this->municipio = null;
        }
        
        if (isset($lsb->parroquia->nombre)) {
            $this->parroquia = $lsb->parroquia->nombre;
        } else {
            $this->parroquia = null;
        }
        
        $this->modalLuchador = true;

    }
    public function cerrarModalLuchador() 
    {
        $this->modalLuchador = false;
    }
    public function verPostulacion($id)
    {
        $postulado = postulado::findOrFail($id);

        $this->id = $id;
        $this->cedula = $postulado->cedula;
        $this->nombreCompleto = $postulado->nombre." ".$postulado->apellido;
        $this->fechaNacimiento = $postulado->fecha_nac;
        $this->telefono = $postulado->telefono;
        $this->correo = $postulado->correo;
        $this->generoId = $postulado->genero_id;
        $this->nivelAcademico = $postulado->nivelAcademico->nombre;
        $this->estado = $postulado->estado->nombre;
        $this->municipio = $postulado->municipio->nombre;
        $this->parroquia = $postulado->parroquia->nombre;
        $this->direccion = $postulado->direccion;

        $this->modalPostulado = true;
    }
    public function cerrarModalPostulado() 
    {
        $this->modalPostulado = false;
    }
    public function verFormacion($id)
    {
        $postulado = postulado::findOrFail($id);

        $this->id = $id;
        $this->cedula = $postulado->cedula;
        $this->nombreCompleto = $postulado->NombreCompleto;
        $this->fechaNacimiento = $postulado->fecha_nac;
        $this->telefono = $postulado->telefono;
        $this->correo = $postulado->correo;
        $this->genero = $postulado->genero->nombre;
        $this->nivelAcademico = $postulado->nivelAcademico->nombre;
        $this->estado = $postulado->estado->nombre;
        $this->municipio = $postulado->municipio->nombre;
        $this->parroquia = $postulado->parroquia->nombre;
        $this->direccion = $postulado->direccion;

        $this->modalFormacion = true;
    }
    public function cerrarModalFormacion() 
    {
        $this->modalFormacion = false;
    }
    public function certificado($id)
    {
        $estudiante = Campamento::find($id);

        // return view('livewire.reportes.certificado', ['estudiante' => $estudiante]);
        $pdf = Pdf::loadView('livewire.reportes.certificado', ['estudiante'=>$estudiante]);
        set_time_limit(0);
        ini_set("memory_limit",-1);
        ini_set('max_execution_time', 0);
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
        }, 'certificado.pdf');
    }
}
