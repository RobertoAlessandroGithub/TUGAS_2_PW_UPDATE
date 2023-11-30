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
                {{-- HTML --}}
                <script src="https://code.highcharts.com/highcharts.js"></script>
                <script src="https://code.highcharts.com/modules/exporting.js"></script>
                <script src="https://code.highcharts.com/modules/accessibility.js"></script>
                <figure class="highcharts-figure">
                    <div id="container-1"></div>
                    <p class="highcharts-description">
                    </p>
                </figure>
                {{-- CSS --}}
                <style>
                    .highcharts-figure,
                    .highcharts-data-table table {
                        min-width: 320px;
                        max-width: 800px;
                        margin: 1em auto;
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

                    input[type="number"] {
                        min-width: 50px;
                    }
                </style>
                {{-- JS --}}
                <script>
                    Highcharts.chart('container-1', {
                        chart: {
                            type: 'pie'
                        },
                        title: {
                            text: 'Persentasi Jenis Kelamin'
                        },
                        tooltip: {
                            valueSuffix: '%'
                        },
                        subtitle: {
                            text: 'Source:<a href="https://www.mdpi.com/2072-6643/11/3/684/htm" target="_default">MDPI</a>'
                        },
                        plotOptions: {
                            series: {
                                allowPointSelect: true,
                                cursor: 'pointer',
                                dataLabels: [{
                                    enabled: true,
                                    distance: 20
                                }, {
                                    enabled: true,
                                    distance: -40,
                                    format: '{point.percentage:.1f}%',
                                    style: {
                                        fontSize: '1.2em',
                                        textOutline: 'none',
                                        opacity: 0.7
                                    },
                                    filter: {
                                        operator: '>',
                                        property: 'percentage',
                                        value: 10
                                    }
                                }]
                            }
                        },
                        series: [{
                            name: 'Persentasi',
                            colorByPoint: true,
                            data: [
                                @foreach ($grafik_jk as $item)
                                    {
                                        name: '{{ $item->jk }}',
                                        y: {{ $item->jumlah }}
                                    },
                                @endforeach



                            ]
                        }]
                    });
                </script>

                {{-- HTML GRAFIK MAHASISWA BERDASARKAN JENIS KELAMIN DALAM PRODI --}}
                <script src="https://code.highcharts.com/highcharts.js"></script>
                <script src="https://code.highcharts.com/modules/exporting.js"></script>
                <script src="https://code.highcharts.com/modules/export-data.js"></script>
                <script src="https://code.highcharts.com/modules/accessibility.js"></script>

                <figure class="highcharts-figure">
                    <div id="container-2"></div>
                    <p class="highcharts-description">
                        A basic column chart comparing estimated corn and wheat production
                        in some countries.

                        The chart is making use of the axis crosshair feature, to highlight
                        the hovered country.
                    </p>
                </figure>

                {{-- CSS --}}
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

                {{-- JAVASCRIPT --}}
                <script>
                    Highcharts.chart('container-2', {
                        chart: {
                            type: 'column'
                        },
                        title: {
                            text: 'Corn vs wheat estimated production for 2020',
                            align: 'left'
                        },
                        subtitle: {
                            text: 'Source: <a target="_blank" ' +
                                'href="https://www.indexmundi.com/agriculture/?commodity=corn">indexmundi</a>',
                            align: 'left'
                        },
                        xAxis: {
                            categories: [
                                @foreach ($grafik_jk_prodi as $item)
                                    '{{ $item->nama }}',
                                @endforeach
                            ],
                            crosshair: true,
                            accessibility: {
                                description: 'Countries'
                            }
                        },
                        yAxis: {
                            min: 0,
                            title: {
                                text: '1000 metric tons (MT)'
                            }
                        },
                        tooltip: {
                            valueSuffix: ' (1000 MT)'
                        },
                        plotOptions: {
                            column: {
                                pointPadding: 0.2,
                                borderWidth: 0
                            }
                        },
                        series: [{
                                name: 'L',
                                data: [
                                    @foreach ($grafik_jk_prodi as $item)
                                        {{ $item->L }},
                                    @endforeach
                                ]
                            },
                            {
                                name: 'P',
                                data: [
                                    @foreach ($grafik_jk_prodi as $item)
                                        {{ $item->P }},
                                    @endforeach
                                ]
                            }
                        ]
                    });
                </script>
            </div>
        </div>
    </div>
@endsection
