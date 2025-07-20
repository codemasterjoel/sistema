<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use App\Models\User;
use App\Models\Avanzada;
use App\Models\Estado;
use App\Models\NivelAcademico;
use App\Models\Profesion;
use App\Models\Nivel;
use App\Models\Responsabilidad;
use App\Models\Genero;
use App\Models\Municipio;
use App\Models\Parroquia;
use App\Models\Saime;
use App\Models\RegistroLuchador;
use App\Models\Comuna;
use Carbon\Carbon;
use Ramsey\Uuid\Uuid;


use Illuminate\Support\Facades\Mail;

use App\Mail\UserCreated;
use App\Mail\resetMail;

class Login extends Component
{
    public $estatus, $pertenece_al_psuv, $cargo_popular= false;
    public $estados, $municipios, $parroquias, $comunas, $nivelesAcademicos, $profesiones, $niveles, $avanzadas, $responsabilidades = null;
    public $cedula, $nacionalidadId, $correo, $direccion, $fechaNacimiento, $nombre, $apellido = null;
    public $generos, $cargo, $vocero = null;
    public $telefono, $edad, $inactivo, $id = null;
    public $paisId, $estadoId, $municipioId, $parroquiaId, $comunaId, $nivelAcademicoId, $profesionId, $responsabilidadId, $avanzadaId, $generoId, $nivelId = null; //Id que recibo de los campos


    public $email, $modalReset = null;
    public $password = null;
    public $remember_me = false;  
    public $showSuccesNotification, $showFailureNotification, $showFailureLogin = false;

    protected $rules = [
        'email' => 'required|email:rfc,dns',
        'password' => 'required',
    ];

    public function mount() 
    {
        if(auth()->user()){
            redirect('/dashboard');
        }
    }
    public function login() 
    {    
        $user = User::where('email', '=', $this->email)->first();
        
        if(isset($user)){
            if($user->email == $this->email and password_verify($this->password, $user->password)) 
            {
                auth()->login($user, $this->remember_me);
                return redirect()->intended('/dashboard'); 
            }else
            {
                $this->showFailureLogin = true;
            }
        }else
        {
            $this->showFailureLogin = true;
        }
    }
    public function render()
    {
        $this->avanzadas = Avanzada::all();
        $this->estados = Estado::all();
        $this->nivelesAcademicos = NivelAcademico::all();
        $this->niveles = Nivel::all();
        $this->responsabilidades = Responsabilidad::all();
        $this->generos = Genero::all();
        return view('livewire.auth.login');
    }
    public function resetPassword()
    {
        $this->modalReset = true;
    }
    public function recoverPassword()
    {
        $user = User::where('email', '=', $this->email)->first();
        
        //dd($user);

        if(isset($user))
        {
            //dd($user->email);
            //return view('livewire.auth.reset');
            Mail::to($user->email)->send(new resetMail());
            $this->showSuccesNotification = true;
        }
        else
        {
            $this->showFailureNotification = true;
        }
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
        $this->id = null;
        $this->municipios = null;
        $this->parroquias = null;
        $this->estados = null;
        $this->comunas = null;
        $this->comunaId = null;
        $this->profesionId = null;
        $this->profesiones = null;
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
    public function updatedParroquiaId($id){
        $this->comunaId = null;
        $this->comunas = Comuna::where('parroquia_id', $id)->get();
    }
    public function updatedNivelAcademicoId($id){
        $this->profesionId = null;
        $this->profesiones = Profesion::where('nivel_academico_id', $id)->get();
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
    public function guardar()
    {

        $this->estatus ?? $this->estatus=false;
        $this->pertenece_al_psuv ?? $this->pertenece_al_psuv = false;
        $this->vocero ?? $this->vocero = false;
        $this->cargo_popular ?? $this->cargo_popular = false;

        $this->validate([
            'nacionalidadId' => 'required',
            'cedula' => 'required|numeric',
            'nombre' => 'required',
            'apellido' => 'required',
            'fechaNacimiento' => 'required|date',
            'telefono' => 'required',
            'correo' => 'required|email',
            'avanzadaId' => 'required',
            'generoId' => 'required',
            'nivelAcademicoId' => 'required',
            'responsabilidadId' => 'required',
            'estadoId' => 'required',
            'municipioId' => 'required',
            'parroquiaId' => 'required',
            'direccion' => 'required',
        ]);

        if ($this->estatus == false) {
            $this->inactivo = Carbon::now()->toDateTimeString();
        }else
        {
            $this->inactivo = null;
        }
        $this->edad = Carbon::parse($this->fechaNacimiento)->age;

        $lsb = RegistroLuchador::updateOrCreate(['id' => $this->id],
            [
            'letra' => $this->nacionalidadId,
            'cedula' => $this->cedula,
            'nombre' => $this->nombre,
            'apellido' => $this->apellido,
            'fecha_nac' => $this->fechaNacimiento,
            'telefono' => $this->telefono,
            'correo' => $this->correo,
            'avanzadaId' => $this->avanzadaId,
            'genero_id' => $this->generoId,
            'nivel_academico_id' => $this->nivelAcademicoId,
            'profesion_id' => $this->profesionId,
            'responsabilidad_id' => $this->responsabilidadId,
            'estado_id' => $this->estadoId,
            'municipio_id' => $this->municipioId,
            'parroquia_id' => $this->parroquiaId,
            'comuna_id' => $this->comunaId,
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
        $this->limpiarCampos();
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
    public function activo()
    {
        if ($this->estatus) {
            $this->estatus = false;
        } else {
            $this->estatus = true;
        }
    }
}
