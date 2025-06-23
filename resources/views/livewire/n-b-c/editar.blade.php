<div class="fixed z-50 inset-0 overflow-y-auto ease-out duration-400">
    <div class="flex justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0 min-[576px]:mx-auto min-[576px]:mt-7 min-[576px]:max-w-[500px] min-[992px]:max-w-[800px] min-[1200px]:max-w-[1140px]">
        <div class="fixed inset-0 transition-opacity">
            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        @if(session()->has('yaregistrado')== 'yaregistrado')
            @include('livewire.components.yaregistrado')
        @endif
        @if(session()->has('noencontrada')== 'noencontrada')
            @include('livewire.components.noencontrada')
        @endif
        @if(session()->has('noexiste')== 'success')
            @include('livewire.components.noexiste')
        @endif
        <span class="hidden sm:inline-block sm:align-middle sm:h-screen"></span>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-4xl sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">    
            <div class="min-h-screen flex items-center justify-center">
                <div class="p-4 w-full bg-white rounded-lg">
                    <div class="flex items-center justify-center">
                        <img src="{{asset('img/logo.svg')}}" class="w-52">
                    </div>
                    <h3 class="text-2xl text-cyan-400 font-bold text-center">REGISTRAR NUEVO LUCHADOR</h3>
                    <form>
                        
                        <div class="grid grid-cols-3 gap-4">
                            <div class="flex items-center justify-center pb-4"> {{-- campo estado --}}
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

                            @if (!is_null($municipios)) {{-- campo municipio --}}
                                <div class="flex items-center justify-center pb-4"> {{-- campo estado --}}
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
                            @endif

                            @if (!is_null($parroquias)) {{-- campo Parroquia --}}
                                <div class="flex items-center justify-center pb-4"> {{-- campo estado --}}
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
                                    </div>
                                    @error('parroquiaId') <div class="text-danger">{{ $message }}</div> @enderror
                                </div>
                            @endif
                        </div>

                        <div class="col-sm-12">
                              <h3 class=" mt-4 text-2xl text-cyan-400 font-bold text-center">GEOREFERENCIACIÓN</h3>
                        </div>
                        <div class="items-center">
                            <div wire:ignore id="map" style= "width: 100%; height: 600px;" class="mb-4"></div>
                        </div>
                        <div class="row">
                            <label>COORDENADA UTM</label>
                            <div class="col-sm-3">
                                <input wire:model="lat" type="text" name="latitud" value="10.494134" id="latitud" class="form-control">
                            </div>
                            <div class="col-sm-3">
                                <input wire:model="lon" type="text" name="longitud" value="-66.931854" id="longitud" class="form-control">
                            </div>
                        </div>

                        <div class="px-4 py-3 sm:px-6 sm:flex">
                            <span class="flex w-full rounded-md sm:ml-3 sm:w-auto">
                                <button type="submit" class="w-32 bg-gradient-to-r from-cyan-400 to-cyan-600 font-bold text-white py-2 rounded-lg mx-auto block mb-2" wire:click.prevent="guardar()" >GUARDAR</button>
                            </span>
                            <span class="flex w-full rounded-md sm:ml-3 sm:w-auto">
                                <button type="button" class="w-32 bg-gradient-to-r from-red-400 to-red-600 font-bold text-white py-2 rounded-lg mx-auto block mb-2" wire:click="cerrarModal()">SALIR</button>
                            </span>
                        </div>
                    </form>
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
    });
  }
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCZhH6WXRQpmvkrpZ6w-kBIQTqOwHuPncI&callback=initMap&v=weekly" defer></script>