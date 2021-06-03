@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Chart') }}</div>

                <div class="card-body">
                    <div class="row">

                        <div class="col-md-4">
                            <div class="mb-5">
                                <div class="text-center">
                                    <h4>
                                      PERFIL GLOBAL CULTURAL
                                    </h4>
                                </div>
                                <div>
                                  <canvas id="myChart1" height="280" width="600"></canvas>
                                </div>
                              </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-5">
                                <div class="text-center">
                                    <h4>
                                        INDICE EVAS
                                    </h4>
                                </div>
                                <div>
                                    <canvas id="myChart2" height="280" width="600"></canvas>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-5">
                                <div class="text-center">
                                    <h4>
                                        INDICE EVAS
                                    </h4>
                                </div>
                                <div>
                                    <canvas id="myChart3" height="280" width="600"></canvas>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-5">
                                <div class="text-center">
                                    <h4>
                                        FORTALEZAS
                                    </h4>
                                </div>
                                <div>
                                    <canvas id="myChart4" height="280" width="600"></canvas>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="mb-5">
                                <div class="text-center">
                                    <h4>
                                        FORTALEZAS
                                    </h4>
                                </div>
                                <div>
                                    <canvas id="myChart5" height="280" width="600"></canvas>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-5">
                            <div class="mb-5">
                                <div class="text-center">
                                    <h4>
                                        DIMENSIONES CULTURALES
                                    </h4>
                                </div>
                                <div>
                                    <canvas id="myChart6" height="280" width="600"></canvas>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="table-responsive py-4">
                                <table class="table align-items-center table-flush text-center"  id="datatable-basic100">
                                    <thead class="thead-light">
                                        <tr>                                   
                                            <th scope="col">{{ __(' ') }}</th>                                     
                                            <th scope="col" style="background-color: #595959">{{ __(' REACTIVO ') }}</th> 
                                            <th scope="col" style="background-color: #D9D9D9">{{ __(' CONVENCIONAL ') }}</th> 
                                            <th scope="col" style="background-color: #66CCFF">{{ __(' EVOLUTIVO ') }}</th>
                                            <th scope="col" style="background-color: #33CCCC">{{ __(' AGIL ') }}</th>                                                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($result9s as $option)
                                            <tr>                 
                                                <td>{{ $option->name }}</td>                                      
                                                <td>{{ $option->REACTIVO }}</td>         
                                                <td>{{ $option->CONVENCIONAL }}</td>         
                                                <td>{{ $option->EVOLUTIVO }}</td>         
                                                <td>{{ $option->AGIL }}</td>       
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="mb-5">
                                <div class="text-center">
                                    <h4>
                                        INDICE EVAS
                                    </h4>
                                </div>
                                <div>
                                    <canvas id="myChart10"></canvas>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="mb-5">
                                <div class="text-center">
                                    <h4>
                                        FACTORES CRÍTICOS
                                    </h4>
                                </div>
                                <div>
                                    <canvas id="myChart7" height="280" width="600"></canvas>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="table-responsive py-4">
                                <table class="table align-items-center table-flush text-center"  id="datatable-basic101">
                                    <thead class="thead-light">
                                        <tr >                                   
                                            <th scope="col" style="background-color: ">{{ __(' ') }}</th>                                     
                                            <th scope="col" style="background-color: #595959">{{ __(' REACTIVO ') }}</th> 
                                            <th scope="col" style="background-color: #D9D9D9">{{ __(' CONVENCIONAL ') }}</th> 
                                            <th scope="col" style="background-color: #EAD5FF">{{ __(' EVOLUTIVO ') }}</th>
                                            <th scope="col" style="background-color: #A375FF">{{ __(' AGIL ') }}</th>                                                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($result11s as $option)
                                            <tr>                 
                                                <td>{{ $option->name }}</td>                                      
                                                <td>{{ $option->REACTIVO }}</td>         
                                                <td>{{ $option->CONVENCIONAL }}</td>         
                                                <td>{{ $option->EVOLUTIVO }}</td>         
                                                <td>{{ $option->AGIL }}</td>       
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="mb-5">
                                <div class="text-center">
                                    <h4>
                                        INDICE EVAS
                                    </h4>
                                </div>
                                <div>
                                    <canvas id="myChart12"></canvas>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-5">
                            <div class="mb-5">
                                <div class="text-center">
                                    <h4>
                                        CUADRO DE MANDO INTEGRAL
                                    </h4>
                                </div>
                                <div>
                                    <canvas id="myChart8" height="280" width="600"></canvas>
                                </div>
                            </div>
                        </div>                      

                        <div class="col-md-5">
                            <div class="table-responsive py-4">
                                <table class="table align-items-center table-flush text-center"  id="datatable-basic102">
                                    <thead class="thead-light">
                                        <tr>                                   
                                            <th scope="col">{{ __(' ') }}</th>                                     
                                            <th scope="col" style="background-color: #595959">{{ __(' REACTIVO ') }}</th> 
                                            <th scope="col" style="background-color: #D9D9D9">{{ __(' CONVENCIONAL ') }}</th> 
                                            <th scope="col" style="background-color: #C5E0B4">{{ __(' EVOLUTIVO ') }}</th>
                                            <th scope="col" style="background-color: #92D050">{{ __(' AGIL ') }}</th>                                                                           
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($result13s as $option)
                                            <tr>                 
                                                <td>{{ $option->name }}</td>                                      
                                                <td>{{ $option->REACTIVO }}</td>         
                                                <td>{{ $option->CONVENCIONAL }}</td>         
                                                <td>{{ $option->EVOLUTIVO }}</td>         
                                                <td>{{ $option->AGIL }}</td>       
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="col-md-2">
                            <div class="mb-5">
                                <div class="text-center">
                                    <h4>
                                        INDICE EVAS
                                    </h4>
                                </div>
                                <div>
                                    <canvas id="myChart14"></canvas>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="text-center bg-dark text-white chart_title">
                                <h4>
                                    COMPONENTS MAS REACTIVOS
                                </h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table align-items-center table-flush text-center"  id="datatable-basic103">                                  
                                    <tbody>
                                        @php
                                            $k = 1;
                                        @endphp
                                        @foreach ($result15s as $option)
                                            <tr>   
                                                <td class="bg-dark text-white px-2">{{ $k }}</td>                 
                                                <td>{{ $option->name }}</td>                                      
                                                <td>{{ $option->REACTIVOS }}</td>                                                             
                                            </tr>
                                            @php
                                                $k++;
                                            @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="text-center bg-gray text-white chart_title">
                                <h4>
                                    COMPONENTS MAS CONVENCIONALES
                                </h4>
                            </div>
                            <div class="table-responsive">                               
                                <table class="table align-items-center table-flush text-center"  id="datatable-basic104">                                   
                                    <tbody>
                                        @php
                                            $k = 1;
                                        @endphp
                                        @foreach ($result16s as $option)
                                            <tr>              
                                                <td class="bg-gray text-white px-2">{{ $k }}</td>   
                                                <td>{{ $option->name }}</td>                                      
                                                <td>{{ $option->CONVENCIONALES }}</td>                                                             
                                            </tr>
                                            @php
                                                $k++;
                                            @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="col-md-4 mb-4">
                            <div class="text-center bg-blue text-white chart_title">
                                <h4>
                                    COMPONENTS MAS EVOLUTIVOS_AGILES
                                </h4>
                            </div>
                            <div class="table-responsive">                               
                                <table class="table align-items-center table-flush text-center"  id="datatable-basic105">                                   
                                    <tbody>
                                        @php
                                            $k = 1;
                                        @endphp
                                        @foreach ($result17s as $option)
                                            <tr>          
                                                <td class="bg-blue text-white px-2">{{ $k }}</td>       
                                                <td>{{ $option->name }}</td>                                      
                                                <td>{{ $option->EVOLUTIVOS_AGILES }}</td>                                                             
                                            </tr>
                                            @php
                                            $k++;
                                            @endphp
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('css') 
    <style>
        canvas{
            max-width: 500px !important;
            margin: auto;
            width: 100% !important;
        }

        .container{
            max-width: 1340px;
        }

        #myChart10,
        #myChart12,
        #myChart14,
        #myChart16{
            margin-top: 42px;
        }

        .card .table td, .card .table th{
            padding-left: 0;
            padding-right: 0;
        }

        .table td{
            padding-top: 0px;
            padding-bottom: 0px;
            height: 30px;
        }

        .chart_title h4{
            color: #ffffff;
        }

        #datatable-basic100 tr td{
            border-color: #33CCCC;
        }

        #datatable-basic101 tr td{
            border-color: #A375FF;
        }

        #datatable-basic102 tr td{
            border-color: #92D050;
        }
    </style>    
@endpush

@push('js')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.0/Chart.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/emn178/chartjs-plugin-labels/src/chartjs-plugin-labels.js"></script> --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.9.4/dist/Chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@0.7.0"></script>

<script>
    var ctx = document.getElementById('myChart1');
    var chart1 = <?php echo $chart1; ?>;
    var myChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
            labels: ['REACTIVO', 'CONVENCIONAL', 'EVOLUTIVO', 'AGIL'],
            datasets: [{
                label: '',
                data: chart1,
                backgroundColor: [
                    '#33CCCC',
                    '#66CCFF',
                    '#A5A5A5',
                    '#404040',
                   
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    
                ],
                borderWidth: 1
            }]
        },
        options: {
            legend: {
                    display: false,                    
            },
            plugins: {
                datalabels: {
                    anchor: 'center',
                    color: 'white',
                    labels: {
                        title: {
                            font: {
                                weight: 'bold'
                            }
                        },
                        value: {
                            color: 'green'
                        },
                        
                    },
                    formatter: function(value, context) {
                        return Math.round(value) + '%';
                    }
                },
                legend: {
                    display: false,                    
                },
                scales: {
                    x: {
                        grid: {
                            display: false,                           
                        }
                    },
                    y: {
                        grid: {
                            beginAtZero: true,
                            display: false,                           
                        }
                    }
                },              

            }
        }
    });

    var ctx1 = document.getElementById('myChart2');
    var chart2 = <?php echo $chart2; ?>;
    var myChart2 = new Chart(ctx1, {
        type: 'doughnut',
        data: {
            labels: ['INDICE_EVOL', 'COMP_INDICE_EVOL'],
            datasets: [{
                label: '',
                data: chart2,
                backgroundColor: [
                    '#CC0099',
                    '#FFFFFF',
                    
                   
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {   
            legend: {
                    display: false,                    
            },         
            plugins: {
                datalabels: {
                    anchor: 'center',
                    color: 'white',
                    labels: {
                        title: {
                            font: {
                                weight: 'bold'
                            }
                        },
                        value: {
                            color: 'green'
                        },
                        
                    },
                    formatter: function(value, context) {
                        return Math.round(value) + '%';
                    }
                },                
                scales: {
                    x: {
                        grid: {
                            display: false,                           
                        }
                    },
                    y: {
                        grid: {
                            beginAtZero: true,
                            display: false,                           
                        }
                    }
                }
            }
        }
    });

    var ctx3 = document.getElementById('myChart3');
    var chart3 = <?php echo $chart3; ?>;
    var myChart3 = new Chart(ctx3, {
        type: 'doughnut',
        data: {
            labels: ['INDICE_ESTABILIDAD', 'COMP_INDICE_ESTABILIDAD'],
            datasets: [{
                label: '',
                data: chart3,
                backgroundColor: [
                    '#0099CC',
                    '#FFFFFF',                    
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                ],
                borderWidth: 1
            }]
        },
        options: {
            legend: {
                display: false,                    
            },
            indexAxis: 'y',            
            plugins: {
                datalabels: {
                    anchor: 'center',
                    color: 'white',
                    labels: {
                        title: {
                            font: {
                                weight: 'bold'
                            }
                        },
                        value: {
                            color: 'green'
                        },
                        
                    },
                    formatter: function(value, context) {
                        return Math.round(value) + '%';
                    }
                },                 
                scales: {
                    x: {
                        grid: {
                            display: false,
                            beginAtZero: true,
                        }
                    },
                    y: {
                        grid: {
                            display: false,
                            beginAtZero: true,
                        }
                    }
                }
            }
        }
    });

    var ctx4 = document.getElementById('myChart4');
    var chart4_label = <?php echo $chart4_label; ?>;
    var chart4_value = <?php echo $chart4_value; ?>;
    var backgroundColor1 = [];
    for (let i = 0; i < chart4_label.length; i++) {
        backgroundColor1.push('#00B0F0');
    }

    var myChart4 = new Chart(ctx4, {
        type: 'horizontalBar',
        data: {
            labels: chart4_label,           
            datasets: [{
                label: 'FORTALEZAS',
                data: chart4_value,
                backgroundColor: backgroundColor1,
                borderColor: [
                    // 'rgba(255, 99, 132, 1)',
                    // 'rgba(255, 99, 132, 1)',
                    // 'rgba(255, 99, 132, 1)',
                    // 'rgba(255, 99, 132, 1)',
                    // 'rgba(255, 99, 132, 1)',                    
                ],
                borderWidth: 1
            }]
        },
        options: {
            legend: {
                display: false,                    
            },
            plugins: {                
                datalabels: {
                    anchor: 'end',
                    color: 'blue',
                    labels: {
                        title: {
                            font: {
                                weight: 'bold'
                            }
                        },
                        value: {
                            color: 'green'
                        },
                        
                    },
                    formatter: function(value, context) {
                        return Math.round(value*100) + '%';
                    }
                }               
            },
            scales: {
                yAxes: [{
                    ticks: {
                    }, 
                    gridLines: {
                        display: false,
                    }
                }],
                xAxes: [{
                    ticks: {
                    }, 
                    gridLines: {
                        display: false,
                    }
                }],
               
            }
        }
    });

    var ctx5 = document.getElementById('myChart5');
    var chart5_label = <?php echo $chart5_label; ?>;
    var chart5_value = <?php echo $chart5_value; ?>;

    var backgroundColor2 = [];
    for (let i = 0; i < chart5_label.length; i++) {
        backgroundColor2.push('#595959');
    }

    var myChart5 = new Chart(ctx5, {
        type: 'horizontalBar',
        data: {
            labels: chart5_label,           
            datasets: [{
                label: 'FORTALEZAS',
                data: chart5_value,
                backgroundColor: backgroundColor2,
                borderColor: [
                    // 'rgba(255, 99, 132, 1)',
                    // 'rgba(255, 99, 132, 1)',
                    // 'rgba(255, 99, 132, 1)',
                    // 'rgba(255, 99, 132, 1)',
                    // 'rgba(255, 99, 132, 1)',                   
                ],
                borderWidth: 1
            }]
        },
        options: {
            legend: {
                display: false,                    
            },
            plugins: {                
                datalabels: {
                    anchor: 'end',
                    color: 'blue',
                    labels: {
                        title: {
                            font: {
                                weight: 'bold'
                            }
                        },
                        value: {
                            color: 'green'
                        },
                        
                    },
                    formatter: function(value, context) {
                        return Math.round(value*100) + '%';
                    }
                }               
            },
            scales: {
                yAxes: [{
                    ticks: {
                    }, 
                    gridLines: {
                        display: false,
                    }
                }],
                xAxes: [{
                    ticks: {
                    }, 
                    gridLines: {
                        display: false,
                    }
                }],
               
            }                 
        }
    });

    var ctx6 = document.getElementById('myChart6');
    var chart6_label = <?php echo $chart6_label; ?>;
    var chart6_firstValue = <?php echo $chart6_firstValue; ?>;
    var chart6_secondValue = <?php echo $chart6_secondValue; ?>;
    var chart6_thirdValue = <?php echo $chart6_thirdValue; ?>;
    var chart6_fourthValue = <?php echo $chart6_fourthValue; ?>;
  
    var myChart6 = new Chart(ctx6, {
        type: 'radar',
        data: {
            labels: chart6_label,           
            datasets: [
            {
                label: 'first',
                data: chart6_firstValue,
                fill: true,
                backgroundColor: '#595959',
                borderColor: '',
                pointBackgroundColor: '',
                pointBorderColor: '#fff',
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: 'rgb(255, 99, 132)'
            },
            {
                label: 'second',
                data: chart6_secondValue,
                fill: true,
                backgroundColor: '#D9D9D9',
                borderColor: '',
                pointBackgroundColor: '',
                pointBorderColor: '#fff',
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: 'rgb(255, 99, 132)'
            },
            {
                label: 'third',
                data: chart6_thirdValue,
                fill: true,
                backgroundColor: '#66CCFF',
                borderColor: '',
                pointBackgroundColor: '',
                pointBorderColor: '#fff',
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: 'rgb(255, 99, 132)'
            },
            {
                label: 'fourth',
                data: chart6_fourthValue,
                fill: true,
                backgroundColor: '#33CCCC',
                borderColor: '',
                pointBackgroundColor: '',
                pointBorderColor: '#fff',
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: 'rgb(255, 99, 132)'
            }]
        },
        options: {
            legend: {
                display: false,                    
            },
            plugins: {
                legend: {
                    display: false,
                    labels: {
                        color: 'rgb(255, 99, 132)'
                    }
                },
                datalabels: {
                    display: false,                   
                }
            }
        }
    });

    var ctx7 = document.getElementById('myChart7');
    var chart7_label = <?php echo $chart7_label; ?>;
    var chart7_firstValue = <?php echo $chart7_firstValue; ?>;
    var chart7_secondValue = <?php echo $chart7_secondValue; ?>;
    var chart7_thirdValue = <?php echo $chart7_thirdValue; ?>;
    var chart7_fourthValue = <?php echo $chart7_fourthValue; ?>;
  
    var myChart7 = new Chart(ctx7, {
        type: 'radar',
        data: {
            labels: chart7_label,           
            datasets: [
            {
                label: 'first',
                data: chart7_firstValue,
                fill: true,
                backgroundColor: '#595959',
                borderColor: '',
                pointBackgroundColor: '',
                pointBorderColor: '#fff',
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: 'rgb(255, 99, 132)'
            },
            {
                label: 'second',
                data: chart7_secondValue,
                fill: true,
                backgroundColor: '#D9D9D9',
                borderColor: '',
                pointBackgroundColor: '',
                pointBorderColor: '#fff',
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: 'rgb(255, 99, 132)'
            },
            {
                label: 'third',
                data: chart7_thirdValue,
                fill: true,
                backgroundColor: '#EAD5FF',
                borderColor: '',
                borderColor: '',
                pointBorderColor: '#fff',
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: 'rgb(255, 99, 132)'
            },
            {
                label: 'fourth',
                data: chart7_fourthValue,
                fill: true,
                backgroundColor: '#A375FF',
                borderColor: '',
                borderColor: '',
                pointBorderColor: '#fff',
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: 'rgb(255, 99, 132)'
            }]
        },
        options: {
            legend: {
                display: false,                    
            },
            plugins: {
                legend: {
                    display: false,
                    labels: {
                        color: 'rgb(255, 99, 132)'
                    }
                },
                datalabels: {
                    display: false,                   
                }
            }  
        }
    });

    var ctx8 = document.getElementById('myChart8');
    var chart8_label = <?php echo $chart8_label; ?>;
    var chart8_firstValue = <?php echo $chart8_firstValue; ?>;
    var chart8_secondValue = <?php echo $chart8_secondValue; ?>;
    var chart8_thirdValue = <?php echo $chart8_thirdValue; ?>;
    var chart8_fourthValue = <?php echo $chart8_fourthValue; ?>;
  
    var myChart8 = new Chart(ctx8, {
        type: 'radar',
        data: {
            labels: chart8_label,           
            datasets: [
            {
                label: 'first',
                data: chart8_firstValue,
                fill: true,
                backgroundColor: '#595959',
                borderColor: '',
                borderColor: '',
                pointBorderColor: '#fff',
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: 'rgb(255, 99, 132)'
            },
            {
                label: 'second',
                data: chart8_secondValue,
                fill: true,
                backgroundColor: '#D9D9D9',
                borderColor: '',
                borderColor: '',
                pointBorderColor: '#fff',
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: 'rgb(255, 99, 132)'
            },
            {
                label: 'third',
                data: chart8_thirdValue,
                fill: true,
                backgroundColor: '#C5E0B4',
                borderColor: '',
                borderColor: '',
                pointBorderColor: '#fff',
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: 'rgb(255, 99, 132)'
            },
            {
                label: 'fourth',
                data: chart8_fourthValue,
                fill: true,
                backgroundColor: '#92D050',
                borderColor: '',
                borderColor: '',
                pointBorderColor: '#fff',
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: 'rgb(255, 99, 132)'
            }]
        },
        options: {
            legend: {
                display: false,                    
            },
            plugins: {
                legend: {
                    display: false,
                    labels: {
                        color: 'rgb(255, 99, 132)'
                    }
                },
                datalabels: {
                    display: false,                   
                }
            }
        }
    });

    var ctx10 = document.getElementById('myChart10');
    var chart10_label = <?php echo $chart10_label; ?>;
    var chart10_value = <?php echo $chart10_firstValue; ?>;    

    $('#myChart10').css('height', (chart10_label.length*31)+'px');    
      
    var backgroundColor3 = [];
    for (let i = 0; i < chart10_label.length; i++) {
        backgroundColor3.push('#00B0F0');
    }

    var myChart10 = new Chart(ctx10, {
        type: 'horizontalBar',
        data: {
            labels: chart10_label,                   
            datasets: [{
                label: '',
                data: chart10_value,
                backgroundColor: backgroundColor3, 
                borderColor: [],              
                borderWidth: 1
            }],
           
        },
        options: {
            legend: {
                display: false,                    
            },
            plugins: {                
                datalabels: {
                    anchor: 'end',
                    color: 'blue',
                    labels: {
                        title: {
                            font: {
                                weight: 'bold'
                            }
                        },
                        value: {
                            color: 'green'
                        },
                        
                    },
                    formatter: function(value, context) {
                        return Math.round(value) + '%';
                    }
                }               
            },
            scales: {
                yAxes: [{
                    ticks: {
                        display: false,
                    }, 
                    gridLines: {
                        display: false,
                    }
                }],
                xAxes: [{
                    ticks: {
                        display: false,
                    }, 
                    gridLines: {
                        display: false,
                    }
                }],
               
            }
        }
    });

    var ctx12 = document.getElementById('myChart12');
    var chart12_label = <?php echo $chart12_label; ?>;
    var chart12_value = <?php echo $chart12_firstValue; ?>;

    $('#myChart12').css('height', (chart12_label.length*31)+'px');

    var backgroundColor4 = [];
    for (let i = 0; i < chart12_label.length; i++) {
        backgroundColor4.push('#A375FF');
    }

    var myChart12 = new Chart(ctx12, {
        type: 'horizontalBar',
        data: {
            labels: chart12_label,           
            datasets: [{
                label: '',
                data: chart12_value, 
                backgroundColor: backgroundColor4,   
                borderWidth: 1
            }]
        },
        options: {
            legend: {
                display: false,                    
            },
            plugins: {
                datalabels: {
                    anchor: 'end',
                    color: 'blue',
                    labels: {
                        title: {
                            font: {
                                weight: 'bold'
                            }
                        },
                        value: {
                            color: 'green'
                        },
                        
                    },
                    formatter: function(value, context) {
                        return Math.round(value) + '%';
                    }
                }
            },
            scales: {
                yAxes: [{
                    ticks: {
                        display: false,
                    }, 
                    gridLines: {
                        display: false,
                    }
                }],
                xAxes: [{
                    ticks: {
                        display: false,
                    }, 
                    gridLines: {
                        display: false,
                    }
                }],
               
            }
        }
    });

    var ctx14 = document.getElementById('myChart14');
    var chart14_label = <?php echo $chart14_label; ?>;
    var chart14_value = <?php echo $chart14_firstValue; ?>;

    $('#myChart14').css('height', (chart14_label.length*31)+'px');

    var backgroundColor5 = [];
    for (let i = 0; i < chart14_value.length; i++) {
        backgroundColor5.push('#92D050');
    }

    var myChart14 = new Chart(ctx14, {
        type: 'horizontalBar',
        data: {
            labels: chart14_label,           
            datasets: [{
                label: '',
                data: chart14_value, 
                backgroundColor: backgroundColor5,   
                borderWidth: 1
            }]
        },
        options: {
            legend: {
                display: false,                    
            },
            plugins: {
                labels: {
                    render: 'percentage',             
                    precision: 2
                },  
                datalabels: {
                    anchor: 'end',
                    color: 'blue',
                    labels: {
                        title: {
                            font: {
                                weight: 'bold'
                            }
                        },
                        value: {
                            color: 'green'
                        },
                        
                    },
                    formatter: function(value, context) {
                        return Math.round(value) + '%';
                    }
                }
          
            },
            scales: {
                yAxes: [{
                    ticks: {
                        display: false,
                    }, 
                    gridLines: {
                        display: false,
                    }
                }],
                xAxes: [{
                    ticks: {
                        display: false,
                    }, 
                    gridLines: {
                        display: false,
                    }
                }],
               
            }
        }
    });   

</script>
    
@endpush
