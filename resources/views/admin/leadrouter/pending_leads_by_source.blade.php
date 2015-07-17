@extends('admin')
@section('content')

    <div class="clearfix"></div>
    <div class="">
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption">
                            Pending Leads By Source
                        </div>
                    </div>
                    <div class="portlet-body">
                        <canvas id="myChart" width="900" height="200"></canvas>
                    </div>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption">
                            Pending leads by source and type
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-scrollable">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>Lead Type</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($leads as $lead)
                                    <tr>
                                        <td>{{ $lead->lead_source }}</td>
                                        <td>{{ $lead->type }}</td>
                                        <td>{{ $lead->count }}</td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>

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
                labels: {!!json_encode($data_sources)!!},
                datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(255, 184, 72,.8)",
                strokeColor: "rgba(0,0,0,0.9)",
                highlightFill: "rgba(220,220,220,0.75)",
                highlightStroke: "rgba(220,220,220,1)",
                data: {!! json_encode($data_count) !!}
        }
        ]
        };
        var ctx = document.getElementById('myChart').getContext("2d");
        Chart.defaults.global.responsive = true;
        new Chart(ctx).Bar(data);

        })();
    </script>
@endsection