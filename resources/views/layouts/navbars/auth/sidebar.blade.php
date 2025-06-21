<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 pb-2" id="sidenav-main" style="overflow-y: hidden;">
    <div class="sidenav-header mb-5">
        <i class="fas fa-times p-3 cursor-pointer text-seconsdary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="py-2">
            <img src="{{asset('img/logo.svg')}}" class="">
        </a>
    </div>
    {{-- <hr class="horizontal dark mt-0"> --}}
    <div class=" navbar-collapse w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            {{-- INICIO --}}    
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'dashboard' ? 'active' : '' }}" href="{{ route('dashboard') }}">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <span class="material-icons {{ in_array(request()->route()->getName(),['dashboard']) ? 'text-white' : 'text-dark' }}">home</span>
                    </div>
                    <span class="nav-link-text ms-1"><b>INICIO</b></span>
                </a>
            </li>
            {{-- PERFIL DE USUARIO --}}
            @if (auth()->user()->is_admin == 1)
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'perfil' ? 'active' : '' }}" href="{{ route('perfil') }}">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <span class="material-icons {{ in_array(request()->route()->getName(),['perfil']) ? 'text-white' : 'text-dark' }}">account_box</span>
                        </div>
                        <span class="nav-link-text ms-1"><b>PERFIL</b></span>
                    </a>
                </li>
            @endif
            {{-- REGISTRO DE LSB --}}
            @if (auth()->user()->area_id == 11 || auth()->user()->is_admin == 1)
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'lsb' ? 'active' : '' }}" href="{{route('lsb')}}">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <span class="material-icons {{ in_array(request()->route()->getName(),['lsb']) ? 'text-white' : 'text-dark' }}">person</span>
                        </div>
                        <span class="nav-link-text ms-1"><b>REGISTRO LSB</b></span>
                    </a>
                </li>
            @endif
            {{-- REGISTRO 1x10 FFM --}}
            @if (auth()->user()->area_id == 2 || auth()->user()->is_admin == 1)
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'ffm' ? 'active' : '' }}" href="{{ route('ffm') }}">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <span class="material-icons {{ in_array(request()->route()->getName(),['ffm']) ? 'text-white' : 'text-dark' }}">person</span>
                        </div>
                        <span class="nav-link-text ms-1"><b>REGISTRO 1x10 FFM</b></span>
                    </a>
                </li>
            @endif
            {{-- REGISTRO DE NBC --}}
            @if (auth()->user()->area_id == 11 || auth()->user()->is_admin == 1)
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'nbc' ? 'active' : '' }}" href="{{route('nbc')}}">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <span class="material-icons {{ in_array(request()->route()->getName(),['nbc']) ? 'text-white' : 'text-dark' }}">groups</span>
                        </div>
                        <span class="nav-link-text ms-1"><b>REGISTRO DE NBC</b></span>
                    </a>
                </li>
            @endif
            <!-- FORMACION -->
             
            @if (auth()->user()->area_id == 11 || auth()->user()->area_id == 1 || auth()->user()->is_admin == 1)
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'formacion' ? 'active' : '' }}" href="{{route('formacion')}}">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <span class="material-icons {{ in_array(request()->route()->getName(),['formacion']) ? 'text-white' : 'text-dark' }}">auto_stories</span>
                        </div>
                        <span class="nav-link-text ms-1"><b>FORMACIÓN</b></span>
                    </a>
                </li>  
            @endif

            {{-- MAPA --}}
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'mapa' ? 'active' : '' }}" href="{{ route('mapa') }}">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <span class="material-icons {{ in_array(request()->route()->getName(),['mapa']) ? 'text-white' : 'text-dark' }}">person_pin_circle</span>
                    </div>
                    <span class="nav-link-text ms-1"><b>MAPA</b></span>
                </a>
            </li>

            {{-- REPORTES --}}
            @if (auth()->user()->is_admin == 1)
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'reporte' ? 'active' : '' }}" href="{{ route('reporte') }}">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <span class="material-icons {{ in_array(request()->route()->getName(),['reporte']) ? 'text-white' : 'text-dark' }}">print</span>
                        </div>
                        <span class="nav-link-text ms-1"><b>REPORTE</b></span>
                    </a>
                </li>
            @endif

            @if (auth()->user()->is_admin == 1)
            <li class="nav-item mt-2">
                <h6 class="ps-4 ms-2 text-uppercase text-xs font-weight-bolder opacity-6">CONFIGURACIÓN</h6>
            </li>
            @endif
            @if (auth()->user()->is_admin == 1)
                {{-- GESTIÓN DE USUARIOS --}}
                <li class="nav-item">
                    <a class="nav-link {{ Route::currentRouteName() == 'usuario' ? 'active' : '' }}" href="{{ route('usuario') }}">
                        <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                            <span class="material-icons {{ in_array(request()->route()->getName(),['usuario']) ? 'text-white' : 'text-dark' }}">manage_accounts</span>
                        </div>
                        <span class="nav-link-text ms-1"><b>GESTIÓN DE USUARIOS</b></span>
                    </a>
                </li>
                {{-- SAIME --}}
                @if (auth()->user()->is_admin == 1)
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'saime' ? 'active' : '' }}" href="{{ route('saime')}}">
                            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                <span class="material-icons {{ in_array(request()->route()->getName(),['saime']) ? 'text-white' : 'text-dark' }}">business</span>
                            </div>
                            <span class="nav-link-text ms-1"><b>SAIME</b></span>
                        </a>
                    </li>               
                @endif
                {{-- GESTIÓN DE SESIONES --}}
                @if (auth()->user()->is_admin == 1)
                    <li class="nav-item">
                        <a class="nav-link {{ Route::currentRouteName() == 'sessions' ? 'active' : '' }}" href="{{ route('sessions')}}">
                            <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                                <span class="material-icons {{ in_array(request()->route()->getName(),['sessions']) ? 'text-white' : 'text-dark' }}">business</span>
                            </div>
                            <span class="nav-link-text ms-1"><b>GESTIÓN DE SESIONES</b></span>
                        </a>
                    </li>
                @endif
            @endif
            <li class="nav-item">
                <a href="{{ url('logout') }}" class=" nav-link btn bg-gradient-danger active text-white" role="button" aria-pressed="true">Salir</a>
            </li>
        </ul>
    </div>
</aside>
