@extends('admin')
@section('content')

    <div class="clearfix"></div>
    <div class="">
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption">
                           Monthly Visitors
                        </div>
                    </div>
                    <div class="portlet-body">
                        <canvas id="myChart" width="900" height="200"></canvas>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>

@endsection
@section('footer-content')
    <script src="{{asset('global/plugins/charts_js/charts.js')}}"></script>

    <script>
        (function(){
            var data = {
                labels: {!!json_encode($dates)!!},
                datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(255, 184, 72,.8)",
                strokeColor: "rgba(0,0,0,0.9)",
                highlightFill: "rgba(220,220,220,0.75)",
                highlightStroke: "rgba(220,220,220,1)",
                data: {!! json_encode($visitors) !!}
        }
        ]
        };
        var ctx = document.getElementById('myChart').getContext("2d");
        //var ctx2 = document.getElementById'chart_2'.getContext("2d");
        Chart.defaults.global.responsive = true;
        new Chart(ctx).Line(data,{bezierCurve: false});

        })();
    </script>
@endsection