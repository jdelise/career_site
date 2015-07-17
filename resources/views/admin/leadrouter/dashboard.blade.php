@extends('admin')
@section('content')
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
                            <form action="{{url('admin/leadrouter/dashboard')}}" method="get" class="form-inline">
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
                                    <a href="{{url('admin/leadrouter/dashboard')}}" class="btn">Reset</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="portlet box red">
                <div class="portlet-title">
                    <div class="caption">
                        Un-Scrubbed Leads
                    </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-bordered">
                        <thead>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th></th>
                        </thead>
                        <tbody>
                        @foreach($leads as $lead)
                            <tr>
                                <td>{{$lead->last_name}}</td>
                                <td>{{$lead->first_name}}</td>
                                <td>
                                    <a href="{{url("admin/leadrouter/$lead->id/edit")}}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{url("admin/leadrouter/$lead->id")}}">
                                        <i class="fa fa-user"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="4">
                                <?php echo $leads->render(); ?>
                            </td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="portlet box yellow">
                <div class="portlet-title">
                    <div class="caption">
                        Monthly Leads By Source
                    </div>
                </div>
                <div class="portlet-body">
                    <table class="table table-bordered">
                        <thead>
                        <th>Lead Source</th>
                        <th>Count</th>
                        </thead>
                        <tbody>
                        @foreach($lead_sources as $source => $count)

                            <tr>
                                <td>{{$source}}</td>
                                <td>{{$count}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                        <tfoot>
                        <tr>
                            <td colspan="3"><a href="{{url('admin/reporting/leads_by_source')}}">All Leads By Source</a></td>
                        </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-sm-6">
            <div class="portlet box green">
                <div class="portlet-title">
                    <div class="caption">
                        Pending Leads
                    </div>
                </div>
                <div class="portlet-body" style="max-height: 300px;overflow: auto;">
                    <table class="table table-bordered">
                        <thead>
                        <th>Lead Id</th>
                        <th>Est Closing Date</th>
                        <th>Lead Type</th>
                        <th></th>
                        </thead>
                        <tbody>
                        @foreach($pending_leads as $lead)
                            <tr>
                                <td>{{$lead->lead_id}}</td>
                                <td>{{$lead->est_closing_date->format('M d Y')}}</td>
                                <td>{{$lead->lead_type}}</td>
                                <td>
                                    <a href="{{url("admin/leadrouter/$lead->id/edit")}}">
                                        <i class="fa fa-edit"></i>
                                    </a>
                                    <a href="{{url("admin/leadrouter/$lead->id")}}">
                                        <i class="fa fa-user"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection