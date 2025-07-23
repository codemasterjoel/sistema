 <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
    <div class="container-fluid py-4">
      <div class="row">  {{-- INDICADORES SUPERIORES --}}
        <div class="col-xl-2 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Luchadores</p>
                    <h5 class="font-weight-bolder mb-0">{{$luchadores->count()}}</h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    {{-- <i class="ni ni-money-coins " aria-hidden="true"></i> --}}
                    <span class="material-symbols-outlined text-white m-2">person</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-2 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">1x10</p>
                    <h5 class="font-weight-bolder mb-0">{{$jefe}}</h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <span class="material-symbols-outlined text-white m-2">group</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-2 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">MUJER</p>
                    <h5 class="font-weight-bolder mb-0">{{ $luchadores->where('genero_id', 2)->count() }}</h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <span class="material-symbols-outlined text-white m-2">woman</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-2 col-sm-6">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">HOMBRE</p>
                    <h5 class="font-weight-bolder mb-0">{{ $luchadores->where('genero_id', 1)->count() }}</h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <span class="material-symbols-outlined text-white m-2">man</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-2 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-xs mb-0 text-capitalize">FORMACIÓN</p>
                    <h5 class="font-weight-bolder mb-0">{{$formacions->count()}}</h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <span class="material-symbols-outlined text-white m-2">group</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-2 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-xs mb-0 text-capitalize">POSTULADOS</p>
                    <h5 class="font-weight-bolder mb-0">{{$postulados->count()}}</h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <span class="material-symbols-outlined text-white m-2">group</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


    <div class="container mt-4">
        <!-- Menú de pestañas -->
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="luchador" data-bs-toggle="tab" data-bs-target="#luchador-tab-pane" type="button" role="tab">
                    LUCHADORES
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="nbc-tab" data-bs-toggle="tab" data-bs-target="#nbc-tab-pane" type="button" role="tab">
                    NUCLEO DE BASE COMUNITARIO
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="circuito-tab" data-bs-toggle="tab" data-bs-target="#circuito-tab-pane" type="button" role="tab">
                    CIRCUITO COMUNAL
                </button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="1x10-tab" data-bs-toggle="tab" data-bs-target="#1x10-tab-pane" type="button" role="tab">
                    1X10
                </button>
            </li>
        </ul>

        <!-- Contenido de las pestañas -->
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="luchador-tab-pane" role="tabpanel">
              <div class="row mt-4" wire:ignore.self>
                <div class="col-lg-12 mb-lg-0 mb-4">
                  <div class="card">
                    <div class="card-body p-3">
                      <h5 class=" font-bold">LSB POR ESTADO</h5>
                      <div class="row">
                        <div class="ms-auto text-center mt-5 mt-lg-0">
                          <div class=" border-radius-lg h-100">
                            <canvas id="myChart" wire:ignore id="myChart"></canvas>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="tab-pane fade" id="nbc-tab-pane" role="tabpanel">
            </div>

            <div class="tab-pane fade" id="circuito-tab-pane" role="tabpanel">
            </div>

            <div class="tab-pane fade" id="1x10-tab-pane" role="tabpanel">
              <div class="row mt-4">
                <div class="col-lg-12 mb-lg-0 mb-4">
                  <div class="card">
                    <div class="card-body p-3">
                      <h5 class=" font-bold">INTEGRANTES POR ESTADO</h5>
                      <div class="row">
                        <div class="ms-auto text-center mt-5 mt-lg-0">
                          <div class=" border-radius-lg h-100">
                            <canvas id="integrantes"></canvas>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </div>

  </main>

  <script type="text/javascript">
    var genero = document.getElementById('genero').getContext('2d');
    var myChartGenero = new Chart(genero, {
        type: 'doughnut',
        data: {
            labels: [
              "Femenina", "Masculino"
            ],
            datasets: [{
                label: 'INTEGRANTES POR ESTADO',
                borderRadius: Number.MAX_VALUE,
                borderWidth: 4,
                borderSkipped: false,
                data: [
                @foreach ($generos as $genero)
                  {{ $genero->total }},
                @endforeach
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
  
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
          responsive: true,
          plugins: {
            datalabels:{
              align: 'end',
              anchor: 'end',
              font: function(context) {
                var w = context.chart.width;
                return {
                  size: w < 512 ? 12 : 14,
                  weight: 'bold',
                };
              },
              color: function(context) {
                  return context.dataset.borderColor;
              },
            },
            legend: {
              position: 'bottom',
            },
            title: {
              display: false,
              text: 'Chart.js Bar Chart'
            }
          }
        }
    });
  </script>

  <script type="text/javascript">
    var responsabilidad = document.getElementById('responsabilidad').getContext('2d');
    var myChartResponsabilidad = new Chart(responsabilidad, {
        type: 'pie',
        data: {
            labels: [
              @foreach ( $responsabilidades as $responsabilidad )
                  '{{$responsabilidad->nombre}}',
                @endforeach
            ],
            datasets: [{
                label: 'INTEGRANTES POR ESTADO',
                borderRadius: Number.MAX_VALUE,
                borderWidth: 4,
                borderSkipped: false,
                data: [
                @foreach ($responsabilidades as $responsabilidad)
                  {{ $responsabilidad->total }},
                @endforeach
                ],
                backgroundColor: [
                      'rgba(255, 99, 132, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(255, 206, 86, 0.2)',
                      'rgba(75, 192, 192, 0.2)',
                      'rgba(153, 102, 255, 0.2)',
                      'rgba(255, 159, 64, 0.2)'

                ],
                borderColor: [
                      'rgba(255, 99, 132, 1)',
                      'rgba(54, 162, 235, 1)',
                      'rgba(255, 206, 86, 1)',
                      'rgba(75, 192, 192, 1)',
                      'rgba(153, 102, 255, 1)',
                      'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
          responsive: true,
          plugins: {
            datalabels:{
              align: 'end',
              anchor: 'end',
              font: function(context) {
                var w = context.chart.width;
                return {
                  size: w < 512 ? 12 : 14,
                  weight: 'bold',
                };
              },
              color: function(context) {
                  return context.dataset.borderColor;
              },
            },
            legend: {
              position: 'top',
              display: false,
            },
            title: {
              display: false,
              text: 'Chart.js Bar Chart'
            }
          }
        }
    });
  </script>

  <script type="text/javascript">
    var NivelAcademico = document.getElementById('NivelAcademico').getContext('2d');
    var myChartNA = new Chart(NivelAcademico, {
        type: 'doughnut',
        data: {
            labels: [
              @foreach ( $NivelAcademico as $nivelacademico )
                  '{{$nivelacademico->nombre}}',
                @endforeach
            ],
            datasets: [{
                label: 'INTEGRANTES POR ESTADO',
                borderRadius: Number.MAX_VALUE,
                borderWidth: 4,
                borderSkipped: false,
                data: [
                @foreach ($NivelAcademico as $nivelacademico)
                  {{ $nivelacademico->total }},
                @endforeach
                ],
                backgroundColor: [
                      'rgba(255, 99, 132, 0.2)',
                      'rgba(54, 162, 235, 0.2)',
                      'rgba(255, 206, 86, 0.2)',
                      'rgba(75, 192, 192, 0.2)',
                      'rgba(153, 102, 255, 0.2)',
                      'rgba(255, 159, 64, 0.2)'

                ],
                borderColor: [
                      'rgba(255, 99, 132, 1)',
                      'rgba(54, 162, 235, 1)',
                      'rgba(255, 206, 86, 1)',
                      'rgba(75, 192, 192, 1)',
                      'rgba(153, 102, 255, 1)',
                      'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
          responsive: true,
          plugins: {
            datalabels:{
              align: 'end',
              anchor: 'end',
              font: function(context) {
                var w = context.chart.width;
                return {
                  size: w < 512 ? 12 : 14,
                  weight: 'bold',
                };
              },
              color: function(context) {
                  return context.dataset.borderColor;
              },
            },
            legend: {
              position: 'bottom',
            },
            title: {
              display: false,
              text: 'Chart.js Bar Chart'
            }
          }
        }
    });
  </script>
  
  <script type="text/javascript">
    var ctx = document.getElementById('myChart');
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
            labels: [
              @foreach ( $jefexestado as $estado )
                '{{$estado->nombre}}',
              @endforeach
            ],
            datasets: [{
                label: {display: false},
                legend: {display: false},
                borderRadius: Number.MAX_VALUE,
                borderWidth: 4,
                borderSkipped: false,
                data:[
                  @foreach ( $jefexestado as $estado )
                    '{{$estado->jefes}}',
                  @endforeach
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
          plugins:{
            legend:{
              display:false,
            }
          },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
  </script>
    
  <script type="text/javascript">
    var ctx2 = document.getElementById('integrantes').getContext('2d');
    var myChart2 = new Chart(ctx2, {
        type: 'bar',
        data: {
            labels: [
                @foreach ($integrantexestado as $estados)
                    "{{ $estados->nombre }}",
                @endforeach
            ],
            datasets: [{
                label: 'INTEGRANTES POR ESTADO',
                borderRadius: Number.MAX_VALUE,
                borderWidth: 4,
                borderSkipped: false,
                data: [
                @foreach ($integrantexestado as $estados)
                  {{ $estados->integrantes }},
                @endforeach
                ],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(166, 101, 80, 0.2)',
                    'RGBA(78, 147, 191, 0.2)',
                    'RGBA(78,147,93, 0.2)',
                    'RGBA(78,146,159, 0.2)',
                    'RGBA(78,73,159, 0.2)',
                    'RGBA(78,171,24, 0.2)',
                    'RGBA(184,76,24, 0.2)',
                    'RGBA(184,76,255, 0.2)',
                    'RGBA(184,174,164, 0.2)',
                    'RGBA(245,174,164, 0.2)',
                    'RGBA(194,239,164, 0.2)',
                    'RGBA(255,0,0, 0.2)'
  
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)',
                    'rgba(166, 101, 80, 1)',
                    'RGBA(78, 147, 191, 1)',
                    'RGBA(78,147,93, 1)',
                    'RGBA(78,146,159, 1)',
                    'RGBA(78,73,159, 1)',
                    'RGBA(78,171,24, 1)',
                    'RGBA(184,76,24, 1)',
                    'RGBA(184,76,255, 1)',
                    'RGBA(184,174,164, 1)',
                    'RGBA(245,174,164, 1)',
                    'RGBA(194,239,164, 1)',
                    'RGBA(255,0,0,1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
          responsive: true,
          plugins: {
            datalabels:{
              align: 'end',
              anchor: 'end',
              font: function(context) {
                var w = context.chart.width;
                return {
                  size: w < 512 ? 12 : 14,
                  weight: 'bold',
                };
              },
              color: function(context) {
                  return context.dataset.borderColor;
              },
            },
            legend: {
              display: false,
              position: 'top',
            },
            title: {
              display: false,
              text: 'Chart.js Bar Chart'
            }
          }
        }
    });
  </script>

