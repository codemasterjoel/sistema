<section>
    @if($modalReset)
        @include('livewire.auth.reset')
    @endif
    @if(session()->has('success')== 'success')
        @include('livewire.components.success')
    @endif
    <div class="page-header">
        <div class="container m-0">
            <div class="row mt-2">
                <div class="col-xl-6 col-sm-12 col-md-6 col-lg-3 mb-xl-0 pb-4">
                    <div class="flex items-start justify-start pb-4">
                        <div class="text-left"><a href="/campamento" wire:navigate class=" text-red-500 mb-0 text-bold text-uppercase text-xl absolute" role="button" aria-pressed="true">Escuela de Base</a></div>
                    </div>
                </div>
                <div class="col-xl-6 col-sm-12 col-md-6 col-lg-3 mb-xl-0">
                    <div class="flex items-start justify-start pb-4">
                        <button type="button" class="btn bg-gradient-primary btn-sm mb-0 font-bold" data-bs-toggle="modal" data-bs-target="#exampleModal">REGISTRATE</button>
                        {{-- <div class="text-right"><a href="/postulacion" wire:navigate class=" text-red-500 mb-0 text-bold text-uppercase text-xl absolute" role="button" aria-pressed="true">Postulate</a></div>                 --}}
                    </div>
                </div>
            </div>
            <div class="nav-item p-2 z-40">
                {{-- <div class="text-left"><a href="/postulacion" wire:navigate class=" text-red-500 mb-0 text-bold text-uppercase absolute" role="button" aria-pressed="true">Escuela de Base</a></div> --}}
            </div>
            <div class="row">
                <div class="col-xl-4 col-lg-5 col-md-6 d-flex flex-column mx-auto">
                    <div class="card card-plain mt-2">
                        <div class="card-header pb-0 text-left bg-transparent">
                            <img src="{{asset('img/logo.svg')}}" class="navbar-brand-img h-100">
                        </div>
                        <div class="card-body">
                            <form wire:submit="login" action="#" method="POST" role="form text-left">
                                <div class="mb-3">
                                    <label class="font-bold" for="email">{{ __('CORREO') }}</label>
                                    <div class="@error('email')border border-danger rounded-3 @enderror">
                                        <input wire:model.live="email" id="email" type="email" class="form-control border border-solid text-neutral-900 border-neutral-900 outline-2 font-bold" placeholder="Email" aria-label="Email" aria-describedby="email-addon">
                                    </div>
                                    @error('email') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="font-bold" for="password">{{ __('CONTRASEÑA') }}</label>
                                    <div class="@error('password')border border-danger rounded-3 @enderror">
                                        <input wire:model.live="password" id="password" type="password" class="form-control border border-solid text-neutral-900 border-neutral-900 outline-2 font-bold" placeholder="Password" aria-label="Password" aria-describedby="password-addon">
                                    </div>
                                    @error('password') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                                <div class=" text-end -mt-3">
                                    <a href="#" wire:click="resetPassword()" class=" text-red-500 text-uppercase font-bold" role="button" aria-pressed="true">¿Olvido la Contraseña?</a>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn bg-gradient-danger w-100 mt-4 mb-0 font-bold">{{ __('Ingresar') }}</button>
                                </div>
                            </form>
                            @if ($showFailureLogin)
                                <div wire:model.live="showFailureLogin" class="mt-3 alert alert-danger alert-dismissible fade show" role="alert">
                                    <span class="alert-text text-white uppercase">Usuario y Contraseña no validos</span>
                                    <button wire:click="$set('showFailureLogin', false)" type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"><strong>X</strong></button>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="oblique position-absolute top-0 h-100 d-md-block d-none me-n8">
                        <div class="oblique-image bg-cover position-absolute fixed-top ms-auto h-100 z-index-0 ms-n6" style="background-image:url('../assets/img/curved-images/fondo_login.jpg')"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                @if(session()->has('success')== 'success')
                    @include('livewire.components.success')
                @endif
                <div class="modal-header">
                    <h3 class="modal-title fs-5 mt-4 text-2xl text-cyan-400 font-bold text-center">REGISTRATE COMO LUCHADOR</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="row">
                            <div class="col-xl-6 col-sm-12 mb-xl-0 pt-4">
                                <div class="flex items-center justify-center"> {{-- campo cedula --}}
                                    <div class="w-full rounded-lg">
                                        <div class="flex">
                                            <span class="flex bg-cyan-400 text-white items-center font-bold whitespace-nowrap rounded-l-lg border-r-0 border-solid px-3 py-[0.25rem] text-center text-base leading-[1.6] dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200">Nacionalidad</span>
                                            <select wire:model.live="nacionalidadId" class="relative m-0 -ml-px block w-[1px] min-w-0 flex-auto rounded-r-lg border border-solid border-neutral-900 bg-clip-padding px-3 py-[0.25rem] font-bold leading-[1.6] text-neutral-900 outline-2 transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-700 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-800 dark:focus:border-primary">
                                                <option value="">Seleccione</option>
                                                <option value="V">V</option>
                                                <option value="E">E</option>
                                            </select>
                                        </div>
                                        @error('nacionalidadId') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-sm-12 mb-xl-0 pt-4">
                                <div class="flex items-center justify-center"> {{-- campo cedula --}}
                                    <div class="w-full rounded-lg">
                                        <div class="flex">
                                            <input wire:model="cedula" type="text"  class="w-full pl-3 border px-3 py-[0.25rem] border-solid text-neutral-900 font-bold outline-2 rounded-tl-lg rounded-bl-lg border-slate-900" onkeypress="$(this).mask('00000000')" placeholder="Cedula" maxlength="8">
                                            <input wire:click="consultar" type="button" value="Buscar" class="bg-gradient-primary px-2 py-[0.25rem] rounded-tr-lg rounded-br-lg text-white font-bold ">
                                        </div>
                                        @error('cedula') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 mb-xl-0 pt-4">
                                <div class="flex items-center justify-center"> {{-- campo Telefono --}}
                                    <div class="w-full rounded-lg">
                                        <div class="flex">
                                            <span class="bg-cyan-400 px-3 py-[0.25rem] rounded-tl-lg rounded-bl-lg text-white font-bold transition-colors">Nombre</span>
                                            <input wire:model="nombre" type="text" class="w-full pl-2 text-neutral-900 border rounded-r-lg font-bold outline-2 border-cyan-900" onkeyup="this.value = this.value.toUpperCase();"/>
                                        </div>
                                        @error('nombre')<div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 mb-xl-0 pt-4">
                                <div class="relative flex flex-wrap items-stretch"> {{-- campo Nivel Academico --}}
                                    <div class="w-full rounded-lg">
                                        <div class="flex">
                                            <span class="bg-cyan-400 px-3 py-[0.25rem] rounded-tl-lg rounded-bl-lg text-white font-bold transition-colors">Apellido</span>
                                            <input wire:model="apellido" type="text" class="w-full pl-2 border rounded-r-lg text-neutral-900 font-bold outline-2 border-cyan-900" onkeyup="this.value = this.value.toUpperCase();"/>
                                        </div>
                                        @error('apellido')<div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 mb-xl-0">
                                <div class="flex items-center justify-center pt-4"> {{-- campo Responsabilidad --}}
                                    <div class="w-full rounded-lg">
                                        <div class="flex">
                                            <span class="bg-cyan-400 py-[0.25rem] px-3 rounded-tl-lg rounded-bl-lg text-white font-bold">Fecha de Nacimiento</span>
                                            <input wire:model="fechaNacimiento" type="date" class=" flex-auto w-[1px] pl-3 border border-solid rounded-r-lg border-slate-900 text-slate-900 outline-2 font-bold" />
                                        </div>
                                        @error('fechaNacimiento') <br><div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 mb-xl-0">
                                <div class="relative flex flex-wrap items-stretch pt-4">
                                    <span class="flex bg-cyan-400 font-bold text-white items-center whitespace-nowrap rounded-l-lg px-3 py-[0.25rem] text-center text-base leading-[1.6]">Genero</span>
                                    <select wire:model="generoId" class="relative m-0 -ml-px block min-w-0 flex-auto border border-solid outline-2 rounded-r-lg bg-clip-padding px-3 py-[0.25rem] font-bold leading-[1.6] border-slate-900 transition text-neutral-900 duration-200 ease-in-out">
                                        <option value="">Seleccione</option>
                                        <option value="1">Masculino</option>
                                        <option value="2">Femenina</option>
                                    </select>
                                    @error('generoId')<div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 mb-xl-0">
                                <div class="flex items-center justify-center pt-4"> {{-- campo Telefono --}}
                                    <div class="w-full rounded-lg">
                                        <div class="flex">
                                            <span class="bg-cyan-400 px-3 py-[0.25rem] rounded-tl-lg rounded-bl-lg text-white font-bold transition-colors">Telefono</span>
                                            <input wire:model="telefono" type="text" class="w-full pl-2 border rounded-r-lg text-neutral-900 font-bold outline-2 border-cyan-900" minlength="15" placeholder="(0000) 000-0000" onkeypress="$(this).mask('(0000) 000-0000')" title="SOLO SE PERMITE NUMEROS, 11 DIGITOS" />
                                        </div>
                                        @error('telefono')<div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 mb-xl-0">
                                <div class="relative flex flex-wrap items-stretch pt-4"> {{-- campo Nivel Academico --}}
                                    <span class="flex bg-cyan-400 font-bold text-white items-center whitespace-nowrap rounded-l-lg border border-r-0 border-solid border-neutral-900 px-3 py-[0.25rem] text-center">Avanzada</span>
                                    <select wire:model="avanzadaId" class="relative m-0 -ml-px block w-[1px] min-w-0 flex-auto rounded-r-lg border border-solid border-neutral-900 bg-clip-padding px-3 py-[0.25rem] font-bold leading-[1.6] text-neutral-900 outline-none transition duration-200 ease-in-out focus:z-[3] focus:border-primary focus:text-neutral-900 focus:shadow-[inset_0_0_0_1px_rgb(59,113,202)] focus:outline-none dark:border-neutral-600 dark:text-neutral-200 dark:placeholder:text-neutral-200 dark:focus:border-primary">
                                        <option value="">Seleccione</option>
                                        @foreach( $avanzadas as $avanzada )
                                            <option value="{{ $avanzada->id }}">{{ $avanzada->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('avanzadaId') <div class="text-danger">{{ $message }}</div> @enderror
                            </div>
                        </div>
                        
                        <div class="row">
                            <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 mb-xl-0">
                                <div class="flex items-center justify-center pt-4"> {{-- campo estado --}}
                                    <div class="w-full rounded-lg">
                                        <div class="flex">
                                            <span class="bg-cyan-400 py-[0.25rem] px-3 rounded-tl-lg rounded-bl-lg text-white font-bold">Estado</span>
                                            <select class="w-full pl-3 border border-solid border-slate-900 text-slate-900 outline-2 font-bold rounded-r-lg " wire:model.live="estadoId" required>
                                                <option value="">Seleccione</option>
                                                @foreach( $estados as $estado )
                                                    <option value="{{ $estado->id }}">{{ $estado->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('estadoId')<div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                            </div>

                            @if (!is_null($municipios)) {{-- campo municipio --}}
                                <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 mb-xl-0">
                                    <div class="flex items-center justify-center pt-4"> {{-- campo estado --}}
                                        <div class="w-full rounded-lg">
                                            <div class="flex">
                                                <span class="bg-cyan-400 py-[0.25rem] px-3 rounded-tl-lg rounded-bl-lg text-white font-bold">Municipio</span>
                                                <select class="w-full pl-3 border font-bold border-solid rounded-r-lg outline-2 text-slate-900 border-slate-900" wire:model.live="municipioId" required>
                                                    <option value="">Seleccione</option>
                                                    @foreach( $municipios as $municipio )
                                                        <option value="{{ $municipio->id }}">{{ $municipio->nombre }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('municipioId') <div class="text-danger">{{ $message }}</div> @enderror
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if (!is_null($parroquias)) {{-- campo Parroquia --}}
                                <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 mb-xl-0">
                                    <div class="flex items-center justify-center pt-4"> {{-- campo estado --}}
                                        <div class="w-full rounded-lg">
                                            <div class="flex">
                                                <span class="bg-cyan-400 py-[0.25rem] px-3 rounded-tl-lg rounded-bl-lg text-white font-bold">Parroquia</span>
                                                <select class="w-full pl-3 border border-solid font-bold border-slate-900 text-slate-900 rounded-r-lg outline-2" wire:model="parroquiaId" required>
                                                    <option value="">Seleccione</option>
                                                    @foreach( $parroquias as $parroquia )
                                                    <option value="{{ $parroquia->id }}">{{ $parroquia->nombre }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('parroquiaId') <div class="text-danger">{{ $message }}</div> @enderror
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-xl-0">
                                <div class="flex items-center justify-center pt-4"> {{-- campo Direccion --}}
                                    <div class="w-full rounded-lg">
                                      <div class="flex">
                                        <span class="bg-cyan-400 py-[0.25rem] px-3 rounded-tl-lg rounded-bl-lg text-white font-bold">Dirección</span>
                                        <input wire:model="direccion" type="text" class="w-full pl-3 border border-solid rounded-r-lg font-bold outline-2 border-slate-900 text-slate-900" onkeyup="this.value = this.value.toUpperCase();"/>
                                      </div>
                                      @error('direccion') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 mb-xl-0">
                                <div class="flex items-center justify-center pt-4"> {{-- campo Responsabilidad --}}
                                    <div class="w-full rounded-lg">
                                        <div class="flex">
                                            <span class="bg-cyan-400 py-[0.25rem] px-3 rounded-tl-lg rounded-bl-lg text-white font-bold">Nivel Academico</span>
                                            <select class=" flex-auto w-[1px] pl-3 border border-solid rounded-r-lg border-slate-900 text-slate-900 outline-2 font-bold" wire:model="nivelAcademicoId" required>
                                                <option value="">Seleccione</option>
                                                @foreach( $nivelesAcademicos as $nivelacademico )
                                                    <option value="{{ $nivelacademico->id }}">{{ $nivelacademico->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('nivelAcademicoId') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 mb-xl-0">
                                <div class="flex items-center justify-center pt-4"> {{-- campo Responsabilidad --}}
                                    <div class="w-full rounded-lg">
                                        <div class="flex">
                                            <span class="bg-cyan-400 py-[0.25rem] px-3 rounded-tl-lg rounded-bl-lg text-white font-bold">Responsabilidad</span>
                                            <select class="w-full pl-3 border border-solid border-slate-900 outline-2 text-slate-900 font-bold rounded-r-lg" wire:model="responsabilidadId" required>
                                                <option value="">Seleccione</option>
                                                @foreach( $responsabilidades as $responsabilidad )
                                                    <option value="{{ $responsabilidad->id }}">{{ $responsabilidad->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @error('responsabilidadId') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 mb-xl-0">
                                <div class="flex items-container justify-center pt-4"> {{-- campo Direccion --}}
                                    <div class="w-full rounded-lg">
                                        <div class="flex">
                                            <label class="relative inline-flex cursor-pointer items-center">
                                                @if ($pertenece_al_psuv)
                                                    <input wire:click="pertenecePSUV()" type="button" value="SI" class=" w-12 bg-gradient-to-r from-cyan-400 to-cyan-600 font-bold text-white py-2 rounded-lg mx-auto block">
                                                @else
                                                    <input wire:click="pertenecePSUV()" type="button" value="NO" class=" w-12 bg-gradient-to-r from-red-400 to-red-600 font-bold text-white py-2 rounded-lg mx-auto block">
                                                @endif
                                                <h5 class="p-2">¿Pertenece al PSUV/JPSUV?</h5>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if ($pertenece_al_psuv)
                                <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 mb-xl-0"> {{-- campo cedula --}}
                                    <div class="flex items-center justify-center pt-4">
                                        <div class="w-full rounded-lg bg-gray-500">
                                            <div class="flex">
                                                <span class="bg-cyan-400 px-3 py-[0.25rem] rounded-tl-lg rounded-bl-lg text-white font-bold ">Nivel</span>
                                                <select class="w-full pl-3 border rounded-r-lg text-neutral-900 border-neutral-900 font-bold border-solid outline-2" wire:model="nivelId" required>
                                                    <option value="">Seleccione</option>
                                                    @foreach( $niveles as $nivel )
                                                    <option value="{{ $nivel->id }}">{{ $nivel->nombre }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        </div>

                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-xl-0">
                                <div class="flex items-container justify-center pt-4"> {{-- campo Direccion --}}
                                    <div class="w-full rounded-lg">
                                        <div class="flex">
                                            <label class="relative inline-flex cursor-pointer items-center">
                                                @if ($vocero)
                                                    <input wire:click="esVocero()" type="button" value="SI" class=" w-12 bg-gradient-to-r from-cyan-400 to-cyan-600 font-bold text-white py-2 rounded-lg mx-auto block">
                                                @else
                                                    <input wire:click="esVocero()" type="button" value="NO" class=" w-12 bg-gradient-to-r from-red-400 to-red-600 font-bold text-white py-2 rounded-lg mx-auto block">
                                                @endif
                                                <h5 class="p-2">¿Es Vocero del Consejo Comunal?</h5>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 mb-xl-0">
                                <div class="flex items-container justify-center mt-4"> {{-- campo Direccion --}}
                                    <div class="w-full rounded-lg">
                                        <div class="flex">
                                            <label class="relative inline-flex cursor-pointer items-center">
                                                @if ($cargo_popular)
                                                    <input wire:click="cambiarCargo()" type="button" value="SI" class=" w-12 bg-gradient-to-r from-cyan-400 to-cyan-600 font-bold text-white py-2 rounded-lg mx-auto block">
                                                @else
                                                    <input wire:click="cambiarCargo()" type="button" value="NO" class=" w-12 bg-gradient-to-r from-red-400 to-red-600 font-bold text-white py-2 rounded-lg mx-auto block">
                                                @endif
                                                <h5 class="p-2">¿Cuenta con un Cargo de elección popular?</h5>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @if ($cargo_popular == 1)
                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 mb-xl-0"> {{-- campo cedula --}}
                                <div class="flex items-center justify-center mt-4">
                                    <div class="w-full rounded-lg bg-gray-500">
                                        <div class="flex">
                                            <span class="bg-cyan-400 px-3 py-[0.25rem] rounded-tl-lg rounded-bl-lg text-white font-bold ">Cargo</span>
                                            <select class="w-full pl-3 border rounded-r-lg text-neutral-900 border-neutral-900 font-bold border-solid outline-2" wire:model="cargo" required>
                                                <option value="">Seleccione</option>
                                                <option value="Diputado(a)">Diputado(a)</option>
                                                <option value="Legislador(a)">Legislador(a)</option>
                                                <option value="Alcalde(a)">Alcalde(a)</option>
                                                <option value="Concejal(a)">Concejal(a)</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                        </div>

                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mb-xl-0">
                                <div class="flex items-center justify-center mt-4"> {{-- campo Correo --}}
                                    <div class="w-full rounded-lg">
                                        <div class="flex">
                                            <span class="bg-cyan-400 py-[0.25rem] px-3 rounded-tl-lg rounded-bl-lg text-white font-bold">Correo</span>
                                            <input wire:model="correo" type="email" class="w-full pl-3 border border-solid text-neutral-900 rounded-r-lg font-bold outline-2 border-slate-900" placeholder="usuario@correo.com" />
                                        </div>
                                        @error('correo') <div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="w-32 bg-gradient-to-r from-red-400 to-red-600 text-white py-2 rounded-lg mx-auto block focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 mb-2" wire:click.prevent="limpiarCampos()" data-bs-dismiss="modal">Salir</button>
                    <button type="submit" class="w-32 bg-gradient-to-r from-cyan-400 to-cyan-600 text-white py-2 rounded-lg mx-auto block focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-cyan-500 mb-2" wire:click.prevent="guardar()">GUARDAR</button>
                </div>
            </div>
        </div>
    </div>
</section>
