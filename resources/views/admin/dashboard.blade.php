@extends('components.navbar')

@section('container')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 d-flex align-items-center">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                        {{-- <li class="breadcrumb-item active" aria-current="page">Dashboard</li> --}}
                    </ol>
                </nav>
                <h1 class="mb-0 fw-bold">Dashboard</h1>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        @if (Session::get('success'))
                <div class="alert alert-success">{{ Session::get('success') }}</div>
        @endif
        @if(session('message'))
            <div class="alert alert-danger">{{ session('message') }}</div>
        @endif
        <div class="card">
            <div class="card-body">
                <h3>Welcome {{ Auth::User()->name }}!</h3>
                <div class="row mt-3">
                    <div class="col-md-8">
                        <figure class="highcharts-figure">
                            <div id="container"></div>
                        </figure>
                    </div>
                    <div class="col-4">
                        <figure class="highcharts-figure">
                            <div id="container2"></div>
                        </figure>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>


<script>
    const purchaseData = @json($chartData);

    const categories = purchaseData.map(item => item.date);
    const data = purchaseData.map(item => item.total);

    Highcharts.chart('container', {
        chart: {
            type: 'column'
        },
        title: {
            text: '30 hari terakhir penjualan'
        },
        xAxis: {
            categories: categories,
            crosshair: true,
            labels: {
                step: 1,
                rotation: -45,
                style: {
                    fontSize: '12px'
                }
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Total Penjualan'
            }
        },
        tooltip: {
            headerFormat: '<b>{point.key}</b><br>',
            pointFormat: 'Total: <b>{point.y}</b>'
        },
        plotOptions: {
            column: {
                pointPadding: 0.2,
                borderWidth: 0
            }
        },
        series: [{
            name: 'Tanggal Penjualan',
            data: data
        }]
    });

    const pieData = @json($productData);

    Highcharts.chart('container2', {
        chart: {
            type: 'pie'
        },
        colors: ['#4CAF50','#547792','#FF9800','#F44336','#2196F3'], 
        title: {
            text: '30 hari terakhir penjualan product'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
            point: {
                valueSuffix: '%'
            }
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: false
                },
                showInLegend: true
            }
        },
        series: [{
            name: 'Products',
            colorByPoint: true,
            data: pieData
        }]
    });


</script>


@endsection
