@extends('layouts.nav')
@section('title', 'Home')
@section('content')

    <script
            src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
    </script>

    <div class="container-fluid">
        <div class="d-sm-flex justify-content-between align-items-center mb-4">
            <h3 class="text-dark mb-0">Dashboard</h3>
        </div>
        <div class="row">
            <div class="col-md-6 col-xl-3 mb-4">
                <div class="card shadow border-start-primary py-2">
                    <div class="card-body">
                        <div class="row align-items-center no-gutters">
                            <div class="col me-2">
                                <div class="text-uppercase text-primary fw-bold text-xs mb-1"><span>All emails</span>
                                </div>
                                <div class="text-dark fw-bold h5 mb-0"><span>{{$emails_count}}</span></div>
                            </div>
                            <div class="col-auto"><i class="fas fa-mail-bulk fa-2x text-gray-300"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3 mb-4">
                <div class="card shadow border-start-success py-2">
                    <div class="card-body">
                        <div class="row align-items-center no-gutters">
                            <div class="col me-2">
                                <div class="text-uppercase text-success fw-bold text-xs mb-1"><span>last filter</span>
                                </div>
                                <div class="text-dark fw-bold h5 mb-0"><span>{{$last_filter}}</span></div>
                            </div>
                            <div class="col-auto"><i class="fas fa-check fa-2x text-gray-300"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3 mb-4">
                <div class="card shadow border-start-success py-2">
                    <div class="card-body">
                        <div class="row align-items-center no-gutters">
                            <div class="col me-2">
                                <div class="text-uppercase text-success fw-bold text-xs mb-1"><span class="text-danger">Unsubscriber</span>
                                </div>
                                <div class="text-dark fw-bold h5 mb-0"><span>Later</span></div>
                            </div>
                            <div class="col-auto"><i class="fas fa-times fa-2x text-gray-300"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3 mb-4">
                <div class="card shadow border-start-success py-2">
                    <div class="card-body">
                        <div class="row align-items-center no-gutters">
                            <div class="col me-2">
                                <div class="text-uppercase text-success fw-bold text-xs mb-1"><span>Sent emails</span>
                                </div>
                                <div class="text-dark fw-bold h5 mb-0"><span>Later</span></div>
                            </div>
                            <div class="col-auto"><i class="fas fa-check fa-2x text-gray-300"></i></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3 mb-4">
                <div class="card shadow border-start-info py-2">
                    <div class="card-body">
                        <div class="row align-items-center no-gutters">
                            <div class="col me-2">
                                <div class="text-uppercase text-info fw-bold text-xs mb-1"><span>filters count</span>
                                </div>
                                <div class="row g-0 align-items-center">
                                    <div class="col-auto">
                                        <div class="text-dark fw-bold h5 mb-0 me-3"><span>{{$filters_count}}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-auto"><i class="fas fa-boxes fa-2x text-gray-300"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-7 col-xl-8">
                <div class="card shadow mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="text-primary fw-bold m-0">Filtering Count</h6>
                        <div class="dropdown no-arrow">
                            <button class="btn btn-link btn-sm dropdown-toggle" aria-expanded="false"
                                    data-bs-toggle="dropdown" type="button"><i
                                        class="fas fa-ellipsis-v text-gray-400"></i></button>
                            <div class="dropdown-menu shadow dropdown-menu-end animated--fade-in">
                                <p class="text-center dropdown-header">dropdown header:</p><a class="dropdown-item"
                                                                                              href="#">&nbsp;Action</a><a
                                        class="dropdown-item" href="#">&nbsp;Another action</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#">&nbsp;Something else here</a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="chart-area">
                            <canvas id="myChart"></canvas>
                        </div>
                    </div>

                    @php
                        $counts = [0, 10000, 5000, 15000, 10000, 20000, 15000, 25000];
                            $dates = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug']; // Replace this with your actual date data

                            $chartData = [
                                'type' => 'line',
                                'data' => [
                                    'labels' => $canva_history_date,
                                    'datasets' => [
                                        [
                                            'label' => 'Emails Count',
                                            'fill' => true,
                                            'data' => $canva_history_count,
                                            'backgroundColor' => 'rgba(78, 115, 223, 0.05)',
                                            'borderColor' => 'rgba(78, 115, 223, 1)',
                                        ],
                                    ],
                                ],
                                'options' => [
                                    'maintainAspectRatio' => false,
                                    'legend' => [
                                        'display' => false,
                                        'labels' => [
                                            'fontStyle' => 'normal',
                                        ],
                                    ],
                                    'title' => [
                                        'fontStyle' => 'normal',
                                    ],
                                    'scales' => [
                                        'xAxes' => [
                                            [
                                                'gridLines' => [
                                                    'color' => 'rgb(234, 236, 244)',
                                                    'zeroLineColor' => 'rgb(234, 236, 244)',
                                                    'drawBorder' => false,
                                                    'drawTicks' => false,
                                                    'borderDash' => ['2'],
                                                    'zeroLineBorderDash' => ['2'],
                                                    'drawOnChartArea' => false,
                                                ],
                                                'ticks' => [
                                                    'fontColor' => '#858796',
                                                    'fontStyle' => 'normal',
                                                    'padding' => 20,
                                                ],
                                            ],
                                        ],
                                        'yAxes' => [
                                            [
                                                'gridLines' => [
                                                    'color' => 'rgb(234, 236, 244)',
                                                    'zeroLineColor' => 'rgb(234, 236, 244)',
                                                    'drawBorder' => false,
                                                    'drawTicks' => false,
                                                    'borderDash' => ['2'],
                                                    'zeroLineBorderDash' => ['2'],
                                                ],
                                                'ticks' => [
                                                    'fontColor' => '#858796',
                                                    'fontStyle' => 'normal',
                                                    'padding' => 20,
                                                ],
                                            ],
                                        ],
                                    ],
                                ],
                            ];
                    @endphp

                    <script>
                        var chartData = @json($chartData);
                        var ctx = document.getElementById('myChart').getContext('2d');
                        var myChart = new Chart(ctx, chartData);
                    </script>


                </div>
            </div>
        </div>
    </div>
@endsection
