@extends('admin')
@section('content')

    <div class="clearfix"></div>
    <div class="">
        <div class="row">
            <div class="col-sm-12">
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption">
                            <div class="caption-subject bold font-yellow-casablanca uppercase">
                                Date Range
                            </div>
                            <div class="caption-helper">Defaults to 30 days back</div>
                        </div>
                    </div>
                    <div class="portet-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <form action="{{url('admin/reporting/leads_by_source')}}" method="get" class="form-inline">
                                    <div class="form-group">
                                        <div class="input-group input-large date-picker input-daterange" data-date="10/11/2012" data-date-format="mm/dd/yyyy">
                                            <input type="text" class="form-control" name="start_date" value="{{$_GET['start_date'] or Carbon\Carbon::now()->subDays(30)->format('m/d/Y')}}">
													<span class="input-group-addon">
													to </span>
                                            <input type="text" class="form-control" name="end_date" value="{{$_GET['end_date'] or \Carbon\Carbon::now()->format('m/d/Y')}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn green">Submit</button>
                                    </div>
                                    <div class="form-group">
                                        <a href="{{url('admin/reporting/leads_by_source')}}" class="btn">Reset</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="portlet light">
                    <div class="portlet-title">
                        <div class="caption">
                            All Leads By Source
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
                            All Leads by source and type
                        </div>
                    </div>
                    <div class="portlet-body">
                        <div class="table-scrollable">
                            <table class="table table-striped table-hover">
                                <thead>
                                <tr>
                                    <th>Lead Source</th>
                                    <th>Lead Type</th>
                                    <th>Totals</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($leads as $lead)
                                    <tr>
                                        <td>{{ $lead->lead_source }}</td>
                                        <td>{{ $lead->lead_type }}</td>
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
                labels: {!!json_encode($keys)!!},
                datasets: [
            {
                label: "My First dataset",
                fillColor: "rgba(255, 184, 72,.8)",
                strokeColor: "rgba(0,0,0,0.9)",
                highlightFill: "rgba(220,220,220,0.75)",
                highlightStroke: "rgba(220,220,220,1)",
                data: {!! json_encode($values) !!}
        }
        ]
        };
        var ctx = document.getElementById('myChart').getContext("2d");
        Chart.defaults.global.responsive = true;
        new Chart(ctx).Bar(data);

        })();
    </script>
@endsection