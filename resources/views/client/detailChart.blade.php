@extends('layouts.backend')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Chart') }}</div>

                <div class="card-body">
                    <div class="row">

                        <div class="col-md-6">
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

                        <div class="col-md-6">
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

                        <div class="col-md-6">
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

                        <div class="col-md-6">
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

                        <div class="col-md-6">
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


                        <div class="col-md-6">
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

                        <div class="col-md-6">
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

                        <div class="col-md-6">
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
        height: auto !important;
        margin: auto;
        width: 100% !important;
    }
</style>
    
@endpush

@push('js')

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/emn178/chartjs-plugin-labels/src/chartjs-plugin-labels.js"></script>
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
                    '#4472C4',
                    '#FFC000',
                    '#A5A5A5',
                    '#ED7D31',
                   
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
                labels: {
                    render: 'percentage',
                    fontColor: ['white', 'white', 'white', 'white'],
                    precision: 2
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
                    '#4472C4',
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
                labels: {
                    render: 'percentage',
                    fontColor: ['white', 'blue'],
                    precision: 2
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
                    '#4472C4',
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
                labels: {
                    render: 'percentage',
                    fontColor: ['white', 'blue'],
                    precision: 2
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

    var myChart4 = new Chart(ctx4, {
        type: 'horizontalBar',
        data: {
            labels: chart4_label,           
            datasets: [{
                label: 'FORTALEZAS',
                data: chart4_value,
                backgroundColor: [
                    '#4472C4',
                    '#4472C4',
                    '#4472C4',
                    '#4472C4',
                    '#4472C4',                   
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 99, 132, 1)',                    
                ],
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
          
            }
        }
    });

    var ctx5 = document.getElementById('myChart5');
    var chart5_label = <?php echo $chart5_label; ?>;
    var chart5_value = <?php echo $chart5_value; ?>;

    var myChart5 = new Chart(ctx5, {
        type: 'horizontalBar',
        data: {
            labels: chart5_label,           
            datasets: [{
                label: 'FORTALEZAS',
                data: chart5_value,
                backgroundColor: [
                    '#4472C4',
                    '#4472C4',
                    '#4472C4',
                    '#4472C4',
                    '#4472C4',                  
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 99, 132, 1)',                   
                ],
                borderWidth: 1
            }]
        },
        options: {
            legend: {
                display: false,                    
            },                 
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
                backgroundColor: '#4472C4',
                borderColor: 'rgb(255, 99, 132)',
                pointBackgroundColor: 'rgb(255, 99, 132)',
                pointBorderColor: '#fff',
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: 'rgb(255, 99, 132)'
            },
            {
                label: 'second',
                data: chart6_secondValue,
                fill: true,
                backgroundColor: '#FFC000',
                borderColor: 'rgb(255, 99, 132)',
                pointBackgroundColor: 'rgb(255, 99, 132)',
                pointBorderColor: '#fff',
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: 'rgb(255, 99, 132)'
            },
            {
                label: 'third',
                data: chart6_thirdValue,
                fill: true,
                backgroundColor: '#A5A5A5',
                borderColor: 'rgb(255, 99, 132)',
                pointBackgroundColor: 'rgb(255, 99, 132)',
                pointBorderColor: '#fff',
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: 'rgb(255, 99, 132)'
            },
            {
                label: 'fourth',
                data: chart6_fourthValue,
                fill: true,
                backgroundColor: '#ED7D31',
                borderColor: 'rgb(255, 99, 132)',
                pointBackgroundColor: 'rgb(255, 99, 132)',
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
                backgroundColor: '#4472C4',
                borderColor: 'rgb(255, 99, 132)',
                pointBackgroundColor: 'rgb(255, 99, 132)',
                pointBorderColor: '#fff',
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: 'rgb(255, 99, 132)'
            },
            {
                label: 'second',
                data: chart7_secondValue,
                fill: true,
                backgroundColor: '#FFC000',
                borderColor: 'rgb(255, 99, 132)',
                pointBackgroundColor: 'rgb(255, 99, 132)',
                pointBorderColor: '#fff',
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: 'rgb(255, 99, 132)'
            },
            {
                label: 'third',
                data: chart7_thirdValue,
                fill: true,
                backgroundColor: '#A5A5A5',
                borderColor: 'rgb(255, 99, 132)',
                pointBackgroundColor: 'rgb(255, 99, 132)',
                pointBorderColor: '#fff',
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: 'rgb(255, 99, 132)'
            },
            {
                label: 'fourth',
                data: chart7_fourthValue,
                fill: true,
                backgroundColor: '#ED7D31',
                borderColor: 'rgb(255, 99, 132)',
                pointBackgroundColor: 'rgb(255, 99, 132)',
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
                backgroundColor: '#4472C4',
                borderColor: 'rgb(255, 99, 132)',
                pointBackgroundColor: 'rgb(255, 99, 132)',
                pointBorderColor: '#fff',
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: 'rgb(255, 99, 132)'
            },
            {
                label: 'second',
                data: chart8_secondValue,
                fill: true,
                backgroundColor: '#FFC000',
                borderColor: 'rgb(255, 99, 132)',
                pointBackgroundColor: 'rgb(255, 99, 132)',
                pointBorderColor: '#fff',
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: 'rgb(255, 99, 132)'
            },
            {
                label: 'third',
                data: chart8_thirdValue,
                fill: true,
                backgroundColor: '#A5A5A5',
                borderColor: 'rgb(255, 99, 132)',
                pointBackgroundColor: 'rgb(255, 99, 132)',
                pointBorderColor: '#fff',
                pointHoverBackgroundColor: '#fff',
                pointHoverBorderColor: 'rgb(255, 99, 132)'
            },
            {
                label: 'fourth',
                data: chart8_fourthValue,
                fill: true,
                backgroundColor: '#ED7D31',
                borderColor: 'rgb(255, 99, 132)',
                pointBackgroundColor: 'rgb(255, 99, 132)',
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
                }
            }
        }
    });

</script>
    
@endpush
