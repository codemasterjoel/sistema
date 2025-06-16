<?php

namespace App\Http\Livewire\Formacion;

use App\Models\Nivel;
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
    public $municipios, $municipioId, $estados, $estadoId, $parroquias, $parroquiaId, $nacionalidad, $direccion, $nivelesAcademicos, $niveles, $nivelAcademicoId, $responsabilidades, $responsabilidad, $cedula, $avanzadas, $avanzada, $correo, $fechaNacimiento = null; //Fecha Nacimiento
    public $nombreCompleto, $nombre, $apellido, $generos, $generoId, $estatus, $telefono, $vocero, $pertenece_al_psuv, $cargo_popular, $cargo, $nivelId= null;
    public $search = "";
    public $data = "campamento";

    public function updatingSearch()
    {
        $this->resetPage();
    }
    public function render()
    {
        $lsbs = RegistroLuchador::where('cedula', 'like', "%$this->search%")->where('estado_id', '<>', '25')->paginate(5);
        $postulados = postulado::where('cedula', 'like', "%$this->search%")->paginate(5);
        // $postulados = postulado::where('cedula', 'like', "%$this->search%")->where('estado_id', '=', auth()->user()->estado_id)->paginate(5);
        $formacions = Formacion::where('cedula', 'like', "%$this->search%")->orderBy('created_at', 'Asc')->paginate(5);
        $campamento = Campamento::where('cedula', 'like', "%$this->search%")->orderBy('created_at', 'Asc')->paginate(5);
        $this->nivelesAcademicos = NivelAcademico::all();
        $this->estados = Estado::all();
        $this->niveles = Nivel::all();

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
    public function cerrarModal() 
    {
        $this->modalPostulado =  false;
        $this->modalLuchador = false;
        $this->modalFormacion  = false;
        $this->modalCampamento  = false;
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
    public function verFormacion($id)
    {
        $postulado = Formacion::findOrFail($id);

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
    public function editarEstudiante($id)
    {
        $estudiante = Campamento::findOrFail($id);

        $this->id = $id;
        $this->nacionalidad = $estudiante->letra;
        $this->nombre = $estudiante->nombre;
        $this->estatus = $estudiante->estatus;
        $this->vocero = $estudiante->vocero;
        $this->pertenece_al_psuv = $estudiante->pertenece_al_psuv;
        $this->cargo_popular = $estudiante->cargo_popular;
        $this->cargo = $estudiante->cargo;
        $this->nivelId = $estudiante->nivel_id;
        $this->cedula = $estudiante->cedula;
        $this->apellido = $estudiante->apellido;
        $this->fechaNacimiento = $estudiante->fecha_nac;
        $this->telefono = $estudiante->telefono;
        $this->correo = $estudiante->correo;
        $this->direccion = $estudiante->direccion;
        $this->generoId = $estudiante->genero_id;
        $this->nivelAcademicoId = $estudiante->nivel_academico_id;
        $this->estadoId = $estudiante->estado_id;
        $this->municipios = Municipio::where('estado_id', $estudiante->estado_id)->get();
        $this->municipioId = $estudiante->municipio_id;
        $this->parroquias = Parroquia::where('municipio_id', $estudiante->municipio_id)->get();
        $this->parroquiaId = $estudiante->parroquia_id;

        $this->modalCampamento = true;
    }
    public function actualizarEstudiante($id)
    {
        $this->validate([
            'nacionalidad' => 'required',
            'nombre' => 'required',
            'apellido' => 'required',
            'cedula' => 'required|unique:campamentos,cedula,'.$this->id,
            'fechaNacimiento' => 'required|date',
            'telefono' => 'required',
            'correo' => 'nullable|email',
            'direccion' => 'nullable|string|max:255',
            'generoId' => 'required|exists:generos,id',
            'nivelAcademicoId' => 'required|exists:nivel_academicos,id',
            'estadoId' => 'required|exists:estados,id',
            'municipioId' => 'required|exists:municipios,id',
            'parroquiaId' => 'required|exists:parroquias,id',
        ]);

        $estudiante = Campamento::findOrFail($this->id);
        $estudiante = RegistroLuchador::updateOrCreate(['id' => $this->id],
            [
                'letra' => $this->nacionalidad,
                'nombre' => $this->nombre,
                'apellido' => $this->apellido,
                'cedula' => $this->cedula,
                'fecha_nac' => Carbon::parse($this->fechaNacimiento),
                'telefono' => $this->telefono,
                'correo' => $this->correo,
                'direccion' => $this->direccion,
                'genero_id' => $this->generoId,
                'nivel_academico_id' => $this->nivelAcademicoId,
                'estado_id' => $this->estadoId,
                'municipio_id' => $this->municipioId,
                'parroquia_id' => $this->parroquiaId,
            ]);


        session()->flash('message', __('Estudiante actualizado correctamente.'));
        $this->modalCampamento = false;
    }
}
