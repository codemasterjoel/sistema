<div class="main-content mt-5">
    <div class="row">
        <div class="col-12">
            <div class="card mb-4 mx-4">
                <div class="card-header pb-0">
                    <div>
                        <h5 class="mb-2 font-bold">CUADERNILLO</h5>
                    </div>
                    <div class="d-flex flex-row justify-content-between">
                        <input wire:model.live="search" type="text" placeholder="Filtrar por Centro" class="w-30 px-4 py-2 border border-solid rounded-lg outline-2 font-bold">
                    </div>
                    @if($modal)
                        @include('livewire.cuadernillo.reporte')
                    @endif
                    <div class="card-body px-0 pt-0 pb-2">
                        <div class="table-responsive p-0">
                            <table class="table align-items-center mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-uppercase text-dark font-weight-bolder">#</th>
                                        <th class="text-uppercase text-dark font-weight-bolder ps-2">Parroquia</th>
                                        <th class="text-center text-uppercase text-dark font-weight-bolder">Código</th>
                                        <th class="text-center text-uppercase text-dark font-weight-bolder">centro</th>
                                        <th class="text-center text-uppercase text-dark font-weight-bolder">acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $indice =0; ?>
                                    @foreach ($centros as $centro)
                                        <?php $indice += 1; ?>
                                        <tr>
                                            <td class="ps-4"><p class="font-weight-bold text-dark mb-0"><?php echo $indice ?></p></td>
                                            <td class="ps-4"><p class="font-weight-bold text-dark mb-0">{{$centro->parroquia->nombre}}</p></td>
                                            <td class="ps-4"><p class="font-weight-bold text-dark mb-0">{{$centro->codigo}}</p></td>
                                            <td class="ps-4"><p class="font-weight-bold text-dark mb-0">{{$centro->nombre}}</p></td>
                                            <td class="text-center"><a href="#" class="mx-3" data-bs-toggle="tooltip" data-bs-original-title="Editar Saime">
                                                <a wire:click="crear('{{$centro->id}}')" class=" text-success px-2 py-1 mb-0" type="button"><span class="material-symbols-outlined">task</span></a>
                                                {{-- <a wire:click="borrar('{{$centro->id}}')" class=" text-danger font-bold py-2 px-4"><span class="material-symbols-outlined">person_cancel</span></a> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer">
                         {{$centros->links()}}
                    </div>
                        {{-- <div class="flex items-center justify-center pb-4">
                            <div class="w-full rounded-lg bg-red-500 text-white">
                                <div class="flex">
                                    <span class="bg-cyan-900 py-[0.25rem] px-3 rounded-tl-lg rounded-bl-lg text-white font-bold">Parroquia</span>
                                    <select class="w-full pl-3 border border-solid border-slate-900 rounded-r-lg text-gray-900 font-bold outline-2" wire:model.live="parroquiaId" required>
                                        <option value="">Seleccione</option>
                                        @foreach( $parroquias as $parroquia )
                                        <option value="{{ $parroquia->id }}">{{ $parroquia->nombre }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                @error('parroquiaId')
                                    {{$message}}
                                @enderror
                            </div>
                        </div> --}}
                        {{-- @if (!is_null($centros))
                            <div class="flex items-center justify-center pb-4">
                                <div class="w-full rounded-lg bg-red-500 text-white">
                                    <div class="flex">
                                        <span class="bg-cyan-900 py-[0.25rem] px-3 rounded-tl-lg rounded-bl-lg text-white font-bold">Centro</span>
                                        <select class="w-full pl-3 border border-solid border-slate-900 rounded-r-lg text-gray-900 font-bold outline-2" wire:model="centroId" required>
                                            <option value="">Seleccione</option>
                                            @foreach( $centros as $centro )
                                            <option value="{{ $centro->id }}">{{ $centro->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('centroId')
                                        {{$message}}
                                    @enderror
                                </div>
                            </div>
                        @endif --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
