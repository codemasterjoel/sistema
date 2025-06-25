<div class="main-content mt-5">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                        <div>
                            <h5 class="mb-2 font-bold">REGISTRO DE NUCLEO DE BASE COMUNITARIO</h5>
                        </div>
                        <div class="d-flex flex-row justify-content-between">
                            <input wire:model.live="search" type="text" placeholder="Filtrar por Nombre" class="w-30 px-4 py-2 border border-solid rounded-lg outline-2 font-bold">
                            <!-- <button wire:click="crear()" class="btn bg-gradient-primary btn-sm mb-0" type="button">+&nbsp; NUEVO NBC</button> -->
                            <button type="button" class="btn bg-gradient-primary btn-sm mb-0 font-bold" data-bs-toggle="modal" data-bs-target="#exampleModal">NUEVO NBC</button>
                            {{-- <a href="/nbc/crear/" wire:navigate class="btn bg-gradient-primary btn-sm mb-0 font-bold">+&nbsp; NUEVO NBC</a> --}}
                        </div>
                    </div>
                    @if(session()->has('success')== 'success')
                        @include('livewire.components.success')
                    @endif
                    @if(session()->has('editado')== 'editado')
                        @include('livewire.components.editado')
                    @endif
                    @if(session()->has('mensaje')== 'delete')
                        @include('livewire.components.delete')
                    @endif
                    @if ($nbcs->count())
                        <div class="card-body px-0 pt-0 pb-2">
                            <div class="table-responsive p-0">
                                <table class="table align-items-center mb-0">
                                    <thead>
                                        <tr>
                                            <th class="text-uppercase text-dark font-weight-bolder">#</th>
                                            <th class="text-center text-uppercase text-dark font-weight-bolder">Codigo</th>
                                            <th class="text-center text-uppercase text-dark font-weight-bolder">nombre</th>
                                            <th class="text-center text-uppercase text-dark font-weight-bolder">estado</th>
                                            <th class="text-center text-uppercase text-dark font-weight-bolder">municipio</th>
                                            {{-- <th class="text-center text-uppercase text-dark font-weight-bolder">estatus</th> --}}
                                            <th class="text-center text-uppercase text-dark font-weight-bolder">acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $indice =0; ?>
                                        @foreach ($nbcs as $nbc)
                                        <?php $indice += 1; ?>
                                        <tr><td class="ps-4"><p class=" font-weight-bold mb-0"><?php echo $indice; ?></p></td>
                                            <td class="text-center text-uppercase"><p class=" text-dark font-weight-bold mb-0">{{$nbc->codigo}}</p></td>
                                            <td class="text-center text-uppercase"><p class=" text-dark font-weight-bold mb-0">{{isset($nbc->nombre) ? $nbc->nombre : ''}}</p></td>
                                            <td class="text-center text-uppercase"><p class=" text-dark font-weight-bold mb-0">{{isset($nbc->estado->nombre) ? $nbc->estado->nombre : ''}}</p></td>
                                            <td class="text-center text-uppercase"><p class=" text-dark font-weight-bold mb-0">{{isset($nbc->municipio->nombre) ? $nbc->municipio->nombre : ''}}</p></td>
                                            {{-- <td class="text-center text-uppercase"><p class=" text-dark font-weight-bold mb-0 {{$nbc->estatus ? 'text-cyan-500 bg-cyan-100' : 'text-red-500 bg-red-100'}} rounded-lg">{{$nbc->estatus ? 'activo' : 'inactivo'}}</p></td> --}}
                                            {{-- <td class="text-center text-uppercase"><p class=" text-dark font-weight-bold">{{$lsb->estatus ? 'activo' : 'inactivo'}}</p></td> --}}
                                            <td class="text-center"><a href="#" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Editar NBC">
                                                {{-- <a wire:click="editar('{{$nbc->id}}')" class="text-success px-2 py-1 mb-0" type="button"><span class="material-symbols-outlined">person_edit</span></a> --}}
                                                <button wire:click="editar('{{$nbc->id}}')" type="button" class="text-success px-2 py-1 mb-0" data-bs-toggle="modal" data-bs-target="#exampleModal"><span class="material-symbols-outlined">person_edit</span></button>                                                 
                                                {{-- <a href="{{route('nbc.editar', [$nbc->id])}}" class=" text-success px-2 py-1 mb-0" type="button"><span class="material-symbols-outlined">person_edit</span></a> --}}
                                                <a wire:click="borrar('{{$nbc->id}}')" class=" text-danger font-bold py-2 px-4"><span class="material-symbols-outlined">person_cancel</span></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="card-footer">
                            {{$nbcs->links()}}
                        </div>
                    @else
                        <div class="card-dody px-4 pt-2 py-8 pb-2">
                            <strong class="px-4 mt-8 font-bold">No existen Resultados</strong>
                        </div>
                    @endif
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div wire:ignore.self class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title fs-5 mt-4 text-2xl text-cyan-400 font-bold text-center">REGISTRAR NUEVO NUCLEO DE BASE COMUNITARIO</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                        <form>
                            <div class=" flex items-stretch pt-4"> {{-- campo Nombre del NBC --}}
                                <span class="flex bg-cyan-400 font-bold text-white items-center whitespace-nowrap rounded-l-lg border border-r-0 border-solid border-neutral-900 px-3 py-[0.25rem] text-center">Nombre del NBC</span>
                                <input wire:model="NombreNBC" type="text" class="w-full flex-auto relative pl-3 border border-solid rounded-r-lg font-bold text-neutral-900 text-uppercase outline-2 border-neutral-900" />
                            </div>
                            @error('NombreNBC')<div class="text-danger">{{ $message }}</div> @enderror
                            <div class="row">
                                <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 mb-xl-0  pt-4">
                                    <div class="flex items-center justify-center"> {{-- campo estado --}}
                                        <div class="w-full rounded-lg">
                                            <div class="flex">
                                                <span class="bg-cyan-400 px-3 py-[0.25rem] rounded-tl-lg rounded-bl-lg text-white font-bold">Estado</span>
                                                <select id="estadoId" class="w-full pl-3 border rounded-r-lg text-neutral-900 border-solid border-neutral-900 outline-2 font-bold" wire:model.live="estadoId" required>
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
                                <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 mb-xl-0 pt-4">
                                    <div class="flex items-center justify-center">
                                        <div class="w-full rounded-lg">
                                            <div class="flex">
                                                <span class="bg-cyan-400 px-3 py-[0.25rem] rounded-tl-lg rounded-bl-lg text-white font-bold">Municipio</span>
                                                <select class="w-full pl-3 border rounded-r-lg text-neutral-900 border-solid border-neutral-900 outline-2 font-bold" wire:model.live="municipioId" required>
                                                    <option value="">Seleccione</option>
                                                    @foreach( $municipios as $municipio )
                                                        <option value="{{ $municipio->id }}">{{ $municipio->nombre }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('municipioId')<div class="text-danger">{{ $message }}</div> @enderror
                                        </div>
                                    </div>
                                </div>
                                @endif

                                @if (!is_null($parroquias)) {{-- campo Parroquia --}}
                                <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 mb-xl-0 pt-4">
                                    <div class="flex items-center justify-center">
                                        <div class="w-full rounded-lg">
                                            <div class="flex">
                                                <span class="bg-cyan-400 px-3 py-[0.25rem] rounded-tl-lg rounded-bl-lg text-white font-bold">Parroquia</span>
                                                <select class="w-full pl-3 border rounded-r-lg text-neutral-900 border-solid border-neutral-900 outline-2 font-bold" wire:model="parroquiaId" required>
                                                    <option value="">Seleccione</option>
                                                    @foreach( $parroquias as $parroquia )
                                                    <option value="{{ $parroquia->id }}">{{ $parroquia->nombre }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            @error('parroquiaId')<div class="text-danger">{{ $message }}</div> @enderror
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                            <div class="row">
                                <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 mb-xl-0 pt-4">
                                    <div class="flex items-center justify-center"> {{-- campo consejo comunales --}}
                                        <div class="w-full rounded-lg">
                                            <label for="CantConsejoComunal">Consejo Comunales</label>
                                            <div class="flex">
                                                <input wire:model="CantConsejoComunal" type="number" placeholder="Consejos Comunales" class="w-full bg-white pl-3 text-neutral-900 text-base border font-bold outline-2 rounded-lg border-slate-900">
                                            </div>
                                            @error('CantConsejoComunal')<div class="text-danger">{{ $message }}</div> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 mb-xl-0  pt-4">
                                    <div class="flex items-center justify-center"> {{-- campo base de misiones --}}
                                        <div class="w-full rounded-lg">
                                            <label for="CantBaseMisiones">Bases de Misiones</label>
                                            <div class="flex">
                                                <input wire:model="CantBaseMisiones" type="number" placeholder="Bases de Misiones" class="w-full bg-white pl-3 text-base text-neutral-900 border font-bold outline-0 rounded-lg border-slate-900">
                                            </div>
                                            @error('CantBaseMisiones')<div class="text-danger">{{ $message }}</div> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 mb-xl-0 pt-4">
                                    <div class="flex items-center justify-center"> {{-- campo urbanismos --}}
                                        <div class="w-full rounded-lg">
                                            <label for="CantUrbanismo">Urbanismos</label>
                                            <div class="flex">
                                                <input wire:model="CantUrbanismo" type="number" placeholder="Urbanismos" class="w-full bg-white pl-3 text-base border text-neutral-900 font-bold outline-0 rounded-lg border-slate-200">
                                            </div>
                                            @error('CantUrbanismo')<div class="text-danger">{{ $message }}</div> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 mb-xl-0 pt-4">
                                    <div class="flex items-center justify-center"> {{-- campo cdi --}}
                                        <div class="w-full rounded-lg">
                                            <label for="CantCDI">CDI</label>
                                            <div class="flex">
                                                <input wire:model="CantCDI" type="number" placeholder="CDI" class="w-full bg-white pl-3 text-base border border-solid text-neutral-900 font-bold outline-0 rounded-lg border-slate-900">
                                            </div>
                                            @error('CantCDI')<div class="text-danger">{{ $message }}</div> @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row"> {{-- campo cedula --}}
                                <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 mb-xl-0">
                                    <div class="flex items-center justify-center pt-4">
                                        <div class="w-full rounded-lg">
                                            <div class="flex">
                                                <input wire:model="CedulaJefe" type="number" placeholder="Cedula Jefe de Nucleo" class="w-full px-3 py-[0.25rem] border text-neutral-900 font-bold outline-2 rounded-tl-lg rounded-bl-lg border-slate-900">
                                                <input wire:click="consultar('jefe')" type="button" value="Buscar" class="bg-gradient-primary rounded-tr-lg px-2 rounded-br-lg text-white font-bold transition-colors">
                                            </div>
                                            @error('CedulaJefe')<div class="text-danger">{{ $message }}</div> @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 mb-xl-0">
                                    <div class="flex items-center justify-center pt-4">
                                        <div class="w-full rounded-lg">
                                            <div class="flex">
                                                <span class="bg-cyan-400 px-3 py-[0.25rem] rounded-tl-lg rounded-bl-lg text-white font-bold">Nombre</span>
                                                <input wire:model="NombreJefe" type="text" class="w-full pl-3 border border-solid uppercase rounded-r-lg font-bold text-neutral-900 outline-2 border-slate-900" />
                                            </div>
                                            @error('NombreJefe')<div class="text-danger">{{ $message }}</div> @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="card card-subcategories card-plain">
                            <div class="card-header">
                                <h2 class=" mt-4 text-2xl text-cyan-400 font-bold text-center">ESTRUCTURA DEL NUCLEO DE BASE COMUNITARIO</h2>
                            </div>
                            <div class="card-body">
                                <ul class="nav nav-pills-primary nav-pills-icons justify-content-center">
                                    <li class="nav-item">
                                        <a class="nav-link" wire:click="MenuOrganizador" href="#">
                                            <div class=" bg-gradient-info rounded-t-lg py-3 px-1 text-white">
                                                <div class="card-icon text-center">
                                                <i class="material-icons">groups</i><br>ORGANIZADOR
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" wire:click="MenuFormador" data-toggle="tab" href="#">
                                            <div class=" bg-gradient-primary rounded-t-lg py-3 px-3 text-white">
                                                <div class="card-icon text-center">
                                                <i class="material-icons">auto_stories</i><br>FORMADOR
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" wire:click="MenuMovilizacion" data-toggle="tab" href="#">
                                            <div class=" bg-gradient-secondary rounded-t-lg py-3 px-1 text-white">
                                                <div class="card-icon text-center">
                                                <i class="material-icons">directions_run</i><br>MOVILIZADOR
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" wire:click="MenuDefensa" data-toggle="tab" href="#">
                                            <div class=" bg-gradient-success rounded-t-lg py-3 px-4 text-white">
                                                <div class="card-icon text-center">
                                                <i class="material-icons">military_tech</i><br>DEFENSA  
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" wire:click="MenuProductivo" data-toggle="tab" href="#">
                                            <div class=" bg-gradient-danger rounded-t-lg py-3 px-2 text-white">
                                                <div class="card-icon text-center">
                                                <i class="material-icons">grass</i><br>PRODUCTIVO
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                </ul>
                                {{-- PESTANA ORGANIZADOR --}}
                                @if ($ContentOrganizador)
                                    <br><h4 class="text-info">DATOS DEL ORGANIZADOR DE NBC</h4>
                                    <label class="relative inline-flex cursor-pointer items-center pb-4 py-4 "> {{-- campo activo --}}
                                        <input type="checkbox" value="1" class="peer sr-only" wire:model.live="PoseeOrganizador" />
                                        <div class="peer flex h-8 flex-row-reverse items-center gap-4 rounded-full bg-cyan-600 px-3 after:absolute after:left-1 after: after:h-6 after:w-10 after:rounded-full after:bg-white/40 after:transition-all after:content-[''] peer-checked:bg-orange-600 cheked value='0' peer-checked:after:translate-x-full peer-focus:outline-none text-white">
                                            <span>SI</span>
                                            <span>NO</span>
                                        </div><h5 class="p-2"> Posee Organizador?</h5>
                                    </label>

                                    @if ($FormOrganizador)
                                        <div class="row"> {{-- campo cedula --}}
                                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 mb-xl-0">
                                                <div class="flex items-center justify-center py-4">
                                                    <div class="w-full rounded-lg bg-gray-500">
                                                        <div class="flex">
                                                            <input wire:model="CedulaOrganizador" type="number" placeholder="Cedula Organizador del Nucleo" class=" px-3 py-[0.25rem] w-full text-neutral-900 pl-3 border font-bold outline-2 rounded-tl-lg rounded-bl-lg border-slate-900">
                                                            <input wire:click="consultar('organizador')" type="button" value="Buscar" class="bg-gradient-primary px-3 py-[0.25rem] rounded-tr-lg rounded-br-lg text-white font-bold transition-colors">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 mb-xl-0">
                                                <div class="flex items-center justify-center"> {{-- campo Nombre --}}
                                                    <div class="w-full rounded-lg bg-gray-500">
                                                    <div class="flex">
                                                        <span class="bg-cyan-400 px-3 py-[0.25rem] rounded-tl-lg rounded-bl-lg text-white font-bold">Nombre</span>
                                                        <input wire:model="NombreOrganizador" type="text" class="w-full text-neutral-900 pl-3 text-base border rounded-r-lg font-bold outline-2 border-slate-200" />
                                                    </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endif
                                {{-- PESTANA FORMADOR --}}
                                @if ($ContentFormador)
                                    <br><h4 class="text-info">DATOS DEL FORMADOR DE NBC</h4>
                                    <label class="relative inline-flex cursor-pointer items-center pb-4 py-4 "> {{-- campo activo --}}
                                    <input type="checkbox" value="1" class="peer sr-only" wire:model.live="PoseeFormador" />
                                    <div class="peer flex flex-row-reverse h-8 items-center gap-4 rounded-full bg-cyan-600 px-3 after:absolute after:left-1 after: after:h-6 after:w-10 after:rounded-full after:bg-white/40 after:transition-all after:content-[''] peer-checked:bg-orange-600 cheked value='0' peer-checked:after:translate-x-full peer-focus:outline-none text-white">
                                        <span>SI</span>
                                        <span>NO</span>
                                    </div><h5 class="p-2"> Posee Formador?</h5>
                                    </label>

                                    @if ($FormFormador)
                                    <div class="row"> {{-- campo cedula --}}
                                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 mb-xl-0">
                                            <div class="flex items-center justify-center py-4">
                                                <div class="w-full rounded-lg bg-gray-500">
                                                    <div class="flex">
                                                        <input wire:model="CedulaFormador" type="number" placeholder="Cedula Formador del Nucleo" class="w-full text-neutral-900 pl-3 border font-bold outline-2 rounded-tl-lg rounded-bl-lg border-slate-900">
                                                        <input wire:click="consultar('formador')" type="button" value="Buscar" class="bg-gradient-primary p-2 rounded-tr-lg rounded-br-lg text-white font-bold transition-colors">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 mb-xl-0">
                                            <div class="flex items-center justify-center"> {{-- campo Nombre --}}
                                                <div class="w-full rounded-lg bg-gray-500">
                                                    <div class="flex">
                                                    <span class="bg-cyan-400 p-2 rounded-tl-lg rounded-bl-lg text-white font-bold hover:bg-cyan-500 transition-colors">Nombre</span>
                                                    <input wire:model="NombreFormador" type="text" class="w-full text-neutral-900 pl-3 text-base border rounded-r-lg font-bold outline-2 border-slate-200" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @endif
                                {{-- PESTANA MOVILIZADOR --}}
                                @if ($ContentMovilizador)
                                    <br><h4 class="text-info">DATOS DEL MOVILIZADOR DE NBC</h4>
                                    <label class="relative inline-flex cursor-pointer items-center pb-4 py-4 "> {{-- campo activo --}}
                                    <input type="checkbox" value="1" class="peer sr-only" wire:model.live="PoseeMovilizador" />
                                    <div class="peer flex flex-row-reverse h-8 items-center gap-4 rounded-full bg-cyan-600 px-3 after:absolute after:left-1 after: after:h-6 after:w-10 after:rounded-full after:bg-white/40 after:transition-all after:content-[''] peer-checked:bg-orange-600 cheked value='0' peer-checked:after:translate-x-full peer-focus:outline-none text-white">
                                        <span>SI</span>
                                        <span>NO</span>
                                    </div><h5 class="p-2"> Posee Movilizador?</h5>
                                    </label>

                                    @if ($FormMovilizador)
                                    <div class="row"> {{-- campo cedula --}}
                                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 mb-xl-0">
                                            <div class="flex items-center justify-center py-4">
                                                <div class="w-full rounded-lg bg-gray-500">
                                                    <div class="flex">
                                                        <input wire:model="CedulaMovilizador" type="number" placeholder="Cedula Movilizador del Nucleo" class="w-full bg-white text-neutral-900 pl-3 border font-bold outline-2 rounded-tl-lg rounded-bl-lg border-slate-900">
                                                        <input wire:click="consultar('movilizador')" type="button" value="Buscar" class="bg-gradient-primary p-2 rounded-tr-lg rounded-br-lg text-white font-bold transition-colors">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6 col-lg-12 col-md-12 col-sm-12 mb-xl-0">
                                            <div class="flex items-center justify-center"> {{-- campo Nombre --}}
                                                <div class="w-full rounded-lg bg-gray-500">
                                                    <div class="flex">
                                                    <span class="bg-cyan-400  rounded-tl-lg rounded-bl-lg p-2 text-white font-bold">Nombre</span>
                                                    <input wire:model="NombreMovilizador" type="text" class="w-full text-neutral-900 pl-3 border rounded-r-lg font-bold outline-2 border-slate-900" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @endif
                                {{-- PESTANA DEFENSA --}}
                                @if ($ContentDefensa)
                                    <br><h4 class="text-info">DATOS DE EL DE DEFENSA DE NBC</h4>
                                    <label class="relative inline-flex cursor-pointer items-center pb-4 py-4 "> {{-- campo activo --}}
                                    <input type="checkbox" value="1" class="peer sr-only" wire:model.live="PoseeDefensa" />
                                    <div class="peer flex flex-row-reverse h-8 items-center gap-4 rounded-full bg-cyan-600 px-3 after:absolute after:left-1 after: after:h-6 after:w-10 after:rounded-full after:bg-white/40 after:transition-all after:content-[''] peer-checked:bg-orange-600 cheked value='0' peer-checked:after:translate-x-full peer-focus:outline-none text-white">
                                        <span>SI</span>
                                        <span>NO</span>
                                    </div><h5 class="p-2"> Posee el de Defensa?</h5>
                                    </label>

                                    @if ($FormDefensa)
                                    <div class="row"> {{-- campo cedula --}}
                                        <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 mb-xl-0">
                                            <div class="flex items-center justify-center py-4">
                                                <div class="w-full rounded-lg bg-gray-500">
                                                    <div class="flex">
                                                        <input wire:model="CedulaDefensa" type="number" placeholder="Cedula Defensa del Nucleo" class="w-full text-neutral-900 pl-3 border font-bold outline-2 rounded-tl-lg rounded-bl-lg border-slate-900">
                                                        <input wire:click="consultar('defensa')" type="button" value="Buscar" class="bg-gradient-primary p-2 rounded-tr-lg rounded-br-lg text-white font-bold">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 mb-xl-0">
                                            <div class="flex items-center justify-center"> {{-- campo Nombre --}}
                                                <div class="w-full rounded-lg bg-gray-500">
                                                    <div class="flex">
                                                    <span class="bg-cyan-400 p-2 rounded-tl-lg rounded-bl-lg text-white font-bold">Nombre</span>
                                                    <input wire:model="NombreDefensa" type="text" class="w-full pl-3 border border-solid text-neutral-900 rounded-r-lg font-bold outline-2 border-slate-900" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @endif
                                {{-- PESTANA PRODUCTIVO --}}
                                @if ($ContentProductivo)
                                    <br><h4 class="text-info">DATOS DEL PRODUCTOR DE NBC</h4>
                                    <label class="relative inline-flex cursor-pointer items-center pb-4 py-4 "> {{-- campo activo --}}
                                    <input type="checkbox" value="1" class="peer sr-only" wire:model.live="PoseeProductivo" />
                                    <div class="peer flex flex-row-reverse h-8 items-center gap-4 rounded-full bg-cyan-600 px-3 after:absolute after:left-1 after: after:h-6 after:w-10 after:rounded-full after:bg-white/40 after:transition-all after:content-[''] peer-checked:bg-orange-600 cheked value='0' peer-checked:after:translate-x-full peer-focus:outline-none text-white">
                                        <span>SI</span>
                                        <span>NO</span>
                                    </div><h5 class="p-2"> Posee Productor?</h5>
                                    </label>

                                    @if ($FormProductivo)
                                    <div class="row"> {{-- campo cedula --}}
                                        <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 mb-xl-0">
                                            <div class="flex items-center justify-center py-4">
                                                <div class="w-full rounded-lg bg-gray-500">
                                                    <div class="flex">
                                                        <input wire:model="CedulaProductivo" type="number" placeholder="Cedula Productor del Nucleo" class="w-full text-neutral-900 pl-3 border font-bold outline-2 rounded-tl-lg rounded-bl-lg border-slate-900">
                                                        <input wire:click="consultar('productor')" type="button" value="Buscar" class="bg-gradient-primary p-2 rounded-tr-lg rounded-br-lg text-white font-bold">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 mb-xl-0">
                                            <div class="flex items-center justify-center"> {{-- campo Nombre --}}
                                                <div class="w-full rounded-lg bg-gray-500">
                                                    <div class="flex">
                                                    <span class="bg-cyan-400 p-2 rounded-tl-lg rounded-bl-lg text-white font-bold">Nombre</span>
                                                    <input wire:model="NombreProductivo" type="text" class="w-full pl-2 border border-solid text-neutral-900 rounded-r-lg font-bold outline-2 border-slate-900" />
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @endif

                                <div class="col-sm-12">
                                    <h3 class=" mt-4 text-2xl text-cyan-400 font-bold text-center">GEOREFERENCIACIÓN</h3>
                                </div>
                                <div class="items-center">
                                    <div wire:ignore id="map" style= "width: 100%; height: 600px;" class="mb-4"></div>
                                </div>
                                <div class="row">
                                    <label>COORDENADAS UTM</label>
                                    <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 mb-xl-0 mt-2">
                                        <input wire:model="lat" type="text" name="latitud" value="" id="latitud" class="form-control">
                                        @error('lat')<div class="text-danger">{{ $message }}</div> @enderror
                                    </div>
                                    <div class="col-xl-3 col-lg-12 col-md-12 col-sm-12 mb-xl-0 mt-2">
                                        <input wire:model="lon" type="text" name="longitud" value="" id="longitud" class="form-control">
                                        @error('lon')<div class="text-danger">{{ $message }}</div> @enderror
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

</div>

<script>
  var marker;
  var coords = {};
  initMap = function () 
  {
    navigator.geolocation.getCurrentPosition(
      function (position){
        coords =  {
          lng: position.coords.longitude,
          lat: position.coords.latitude
        };
        setMapa(coords);
      },function(error){console.log(error);});
  }
  function setMapa (coords)
  {
    var map = new google.maps.Map(document.getElementById('map'),
    {
      zoom: 13,
      center:new google.maps.LatLng(coords.lat,coords.lng),
    });
    marker = new google.maps.Marker({
      map: map,
      draggable: true,
      animation: google.maps.Animation.DROP,
      position: new google.maps.LatLng(coords.lat,coords.lng),

    });
    marker.addListener( 'dragend', function (event)
    {
        document.getElementById("latitud").value = this.getPosition().lat();
        document.getElementById("longitud").value = this.getPosition().lng();

        document.getElementById("latitud").dispatchEvent(new Event('input'));
        document.getElementById("longitud").dispatchEvent(new Event('input'));
    });
  }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCZhH6WXRQpmvkrpZ6w-kBIQTqOwHuPncI&callback=initMap&v=weekly" defer></script>

