@extends('layout.main')
@section('title', 'Dashboard')

@section('content')
    Fakultas: {{ count($fakultas) }}
    Prodi: {{ count($prodi) }}
    Mahasiswa : {{ count($mahasiswa) }}
    <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <div class="chartjs-size-monitor">
                    <div class="chartjs-size-monitor-expand">
                        <div class=""></div>
                    </div>
                    <div class="chartjs-size-monitor-shrink">
                        <div class=""></div>
                    </div>
                </div>
                <p class="card-title">Website UMDP</p>
                <div class="row mb-3">
                    <div class="col-md-7">
                        <div class="d-flex justify-content-between traffic-status">
                            <div class="item">
                                <p class="mb-">Fakultas</p>
                                <h5 class="font-weight-bold mb-0">{{ count($fakultas) }}</h5>
                                <div class="color-border"></div>
                            </div>
                            <div class="item">
                                <p class="mb-">Program Studi</p>
                                <h5 class="font-weight-bold mb-0">{{ count($prodi) }}</h5>
                                <div class="color-border"></div>
                            </div>
                            <div class="item">
                                <p class="mb-">Mahasiswa</p>
                                <h5 class="font-weight-bold mb-0">{{ count($mahasiswa) }}</h5>
                                <div class="color-border"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <script src="https://code.highcharts.com/highcharts.js"></script>
                <script src="https://code.highcharts.com/modules/exporting.js"></script>
                <script src="https://code.highcharts.com/modules/export-data.js"></script>
                <script src="https://code.highcharts.com/modules/accessibility.js"></script>

                <figure class="highcharts-figure">
                    <div id="container"></div>
                    <p class="highcharts-description">
                    </p>
                </figure>
                {{-- --CSS--- --}}
                <style>
                    .highcharts-figure,
                    .highcharts-data-table table {
                        min-width: 310px;
                        max-width: 800px;
                        margin: 1em auto;
                    }

                    #container {
                        height: 400px;
                    }

                    .highcharts-data-table table {
                        font-family: Verdana, sans-serif;
                        border-collapse: collapse;
                        border: 1px solid #ebebeb;
                        margin: 10px auto;
                        text-align: center;
                        width: 100%;
                        max-width: 500px;
                    }

                    .highcharts-data-table caption {
                        padding: 1em 0;
                        font-size: 1.2em;
                        color: #555;
                    }

                    .highcharts-data-table th {
                        font-weight: 600;
                        padding: 0.5em;
                    }

                    .highcharts-data-table td,
                    .highcharts-data-table th,
                    .highcharts-data-table caption {
                        padding: 0.5em;
                    }

                    .highcharts-data-table thead tr,
                    .highcharts-data-table tr:nth-child(even) {
                        background: #f8f8f8;
                    }

                    .highcharts-data-table tr:hover {
                        background: #f1f7ff;
                    }
                </style>
                {{-- JavaScript --}}
                <script>
                    Highcharts.chart('container', {
                        chart: {
                            type: 'column'

                        },
                        title: {
                            text: 'Grafik Mahasiswa per Program Studi',
                            align: 'center'
                        },

                        subtitle: {
                            text: 'Source: <a target="_blank" ' +
                                'href="https://www.indexmundi.com/agriculture/?commodity=corn">indexmundi</a>',
                            align: 'left'
                        },
                        xAxis: {
                            categories: [
                                @foreach ($grafik_mhs as $item)
                                    '{{ $item->nama }}',
                                @endforeach
                            ],
                            crosshair: true,
                            accessibility: {
                                description: ''
                            }
                        },
                        yAxis: {
                            min: 0,
                            title: {
                                text: 'Mahasiswa'
                            }
                        },
                        tooltip: {
                            valueSuffix: ' (orang)'
                        },
                        plotOptions: {
                            column: {
                                pointPadding: 0.2,
                                borderWidth: 0
                            }
                        },
                        series: [{
                            name: 'Mahasiswa',
                            data: [
                                @foreach ($grafik_mhs as $item)
                                    {{ $item->jumlah }},
                                @endforeach
                            ]
                        }]
                    });
                </script>
            </div>
        </div>
    </div>
@endsection
