<aside class="sidenav bg-white navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 pb-2" id="sidenav-main" style="overflow-y: hidden;">
    <div class="sidenav-header mb-8">
        <i class="fas fa-times p-3 cursor-pointer text-seconsdary opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="py-2">
            <img src="{{asset('img/logocenso.png')}}" class="">
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
            <li class="nav-item">
                <a class="nav-link {{ Route::currentRouteName() == 'cuadernillo' ? 'active' : '' }}" href="{{ route('cuadernillo') }}">
                    <div class="icon icon-shape icon-sm shadow border-radius-md bg-white text-center me-2 d-flex align-items-center justify-content-center">
                        <span class="material-icons {{ in_array(request()->route()->getName(),['cuadernillo']) ? 'text-white' : 'text-dark' }}">home</span>
                    </div>
                    <span class="nav-link-text ms-1"><b>CUADERNILLO</b></span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ url('logout') }}" class=" nav-link btn bg-gradient-danger active text-white" role="button" aria-pressed="true">Salir</a>
            </li>
        </ul>
    </div>
</aside>
