@extends('components.navbar')
    
@section('container')
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row align-items-center">
            <div class="col-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0 d-flex align-items-center">
                        <li class="breadcrumb-item"><a href=" " class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
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
            <div class="alert alert-danger">{{ session  ('message') }}</div>
        @endif
        <div class="card">
            <div class="card-body">
                <h3>Welcome Jeno !</h3>
                <div class="row">
                    <div class="col-md-8 mt-3">
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




    Highcharts.chart('container', {
        chart: {
            type: 'column'
        },
        title: {
            text: 'Corn vs wheat estimated production for 2023'
        },
        subtitle: {
            text:
                'Source: <a target="_blank" ' +
                'href="https://www.indexmundi.com/agriculture/?commodity=corn">indexmundi</a>'
        },
        xAxis: {
            categories: ['USA', 'China', 'Brazil', 'EU', 'Argentina', 'India'],
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
        series: [
            {
                name: 'Corn',
                data: [387749, 280000, 129000, 64300, 54000, 34300]
            },
            {
                name: 'Wheat',
                data: [45321, 140000, 10000, 140500, 19500, 113500]
            }
        ]
    });

    Highcharts.chart('container2', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Browser market shares in March, 2022'
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
        name: 'Brands',
        colorByPoint: true,
        data: [{
            name: 'Chrome',
            y: 74.77,
            sliced: true,
            selected: true
        },  {
            name: 'Edge',
            y: 12.82
        },  {
            name: 'Firefox',
            y: 4.63
        }, {
            name: 'Safari',
            y: 2.44
        }, {
            name: 'Internet Explorer',
            y: 2.02
        }, {
            name: 'Other',
            y: 3.28
        }]
    }]
});
</script>
@endsection