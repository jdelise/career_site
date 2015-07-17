@extends('admin')
@section('header-section')
    <link href="{{asset('adminlte/css/profile.css')}}" rel="stylesheet" type="text/css"/>
@stop
@section('content')
    <div class="clearfix"></div>
    <!-- BEGIN PAGE CONTENT-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN PROFILE SIDEBAR -->
            @include('admin.recruits.profile_sidebar')
            <!-- END BEGIN PROFILE SIDEBAR -->
            <!-- BEGIN PROFILE CONTENT -->
            <div class="profile-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Agent Production for <span>{{Input::get('start_date')}}
                                        - {{Input::get('end_date')}}</span></h3>

                                <div class="actions pull-right">

                                    <form class="form-inline"
                                          action="{{url('admin/reporting/recruit-production')}}/{{$recruit->id}}"
                                          method="get">
                                        <input type="hidden" name="start_date" id="start_date"/>
                                        <input type="hidden" name="end_date" id="end_date"/>

                                        <div class="form-group">
                                            <small id="reportrange"><span></span></small>
                                        </div>
                                        <div class="form-group">
                                            <button class="btn btn-default pull-right" id="daterange-btn">
                                                <i class="fa fa-calendar"></i> Date range
                                                <i class="fa fa-caret-down"></i>
                                            </button>
                                        </div>
                                        <div class="form-group">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" class="minimal" name="past"> Compare?
                                                </label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="submit" value="Go" class="btn btn-primary"/>
                                        </div>
                                    </form>

                                </div>
                            </div>
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="small-box bg-yellow">
                                            <div class="inner">
                                                <h3>{{$numbers['buyer_sides']->count()}}</h3>

                                                <p>Closed Buyers</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fa fa-users"></i>
                                            </div>
                                            <a href="#" class="small-box-footer">
                                                More info <i class="fa fa-arrow-circle-right"></i>
                                            </a>

                                            <div class="hide">
                                                <ul>
                                                    @foreach($numbers['buyer_sides'] as $buyers)

                                                        <li>{{$buyers->StreetNumber}} {{$buyers->StreetName}}
                                                            , {{$buyers['City']}}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="info-box bg-green">
                                            <span class="info-box-icon"><i class="fa fa-money"></i></span>

                                            <div class="info-box-content">
                                                <span class="info-box-number">Buyers Closed</span>
                                                <span class="info-box-number">${{number_format($numbers['buyer_sides']->sum('ClosePrice'),2)}}</span>

                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>


                                    </div>
                                    <div class="col-md-4">
                                        <div class="small-box bg-yellow">
                                            <div class="inner">
                                                <h3>{{$numbers['listings_sold']->count()}}</h3>

                                                <p>Listings Sold</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fa fa-home"></i>
                                            </div>
                                            <a href="#" class="small-box-footer">
                                                More info <i class="fa fa-arrow-circle-right"></i>
                                            </a>

                                            <div class="hide">
                                                <ul>
                                                    @foreach($numbers['listings_sold'] as $listing)

                                                        <li>{{$listing->StreetNumber}} {{$listing->StreetName}}
                                                            , {{$listing->City}}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="info-box bg-green">
                                            <span class="info-box-icon"><i class="fa fa-money"></i></span>

                                            <div class="info-box-content">
                                                <span class="info-box-number">Listings Closed</span>
                                                <span class="info-box-number">${{number_format($numbers['listings_sold']->sum('ClosePrice'),2)}}</span>

                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>

                                    </div>
                                    <div class="col-md-4">
                                        <div class="small-box bg-yellow">
                                            <div class="inner">
                                                <h3>{{$numbers['listings_taken']->count()}}</h3>

                                                <p>Listings Taken</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fa fa-home"></i>
                                            </div>
                                            <a href="#" class="small-box-footer">
                                                More info <i class="fa fa-arrow-circle-right"></i>
                                            </a>

                                            <div class="hide">
                                                <ul>
                                                    @foreach($numbers['listings_taken'] as $listing)

                                                        <li>{{$listing->StreetNumber}} {{$listing->StreetName}}
                                                            , {{$listing->City}} - {{$listing->Status}}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="info-box bg-green">
                                            <span class="info-box-icon"><i class="fa fa-money"></i></span>

                                            <div class="info-box-content">
                                                <span class="info-box-number">Total Closed</span>
                                                <span class="info-box-number">${{number_format($numbers['listings_sold']->sum('ClosePrice') + $numbers['buyer_sides']->sum('ClosePrice'),2)}}</span>


                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>


                                    </div>
                                </div>
                                <hr/>
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3>Year Over Year</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="small-box bg-yellow">
                                            <div class="inner">
                                                <h3>{{$pastNumbers['buyer_sides']->count()}}</h3>

                                                <p>Closed Buyers</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fa fa-users"></i>
                                            </div>
                                            <a href="#" class="small-box-footer">
                                                More info <i class="fa fa-arrow-circle-right"></i>
                                            </a>

                                            <div class="hide">
                                                <ul>
                                                    @foreach($pastNumbers['buyer_sides'] as $buyers)

                                                        <li>{{$buyers->StreetNumber}} {{$buyers->StreetName}}
                                                            , {{$buyers['City']}}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="info-box bg-green">
                                            <span class="info-box-icon"><i class="fa fa-money"></i></span>

                                            <div class="info-box-content">
                                                <span class="info-box-number">Buyers Closed</span>
                                                <span class="info-box-number">${{number_format($pastNumbers['buyer_sides']->sum('ClosePrice'),2)}}</span>

                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="small-box bg-yellow">
                                            <div class="inner">
                                                <h3>{{$pastNumbers['listings_sold']->count()}}</h3>

                                                <p>Listings Sold</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fa fa-home"></i>
                                            </div>
                                            <a href="#" class="small-box-footer">
                                                More info <i class="fa fa-arrow-circle-right"></i>
                                            </a>

                                            <div class="hide">
                                                <ul>
                                                    @foreach($pastNumbers['listings_sold'] as $listing)

                                                        <li>{{$listing->StreetNumber}} {{$listing->StreetName}}
                                                            , {{$listing->City}}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="info-box bg-green">
                                            <span class="info-box-icon"><i class="fa fa-money"></i></span>

                                            <div class="info-box-content">
                                                <span class="info-box-number">Listings Closed</span>
                                                <span class="info-box-number">${{number_format($pastNumbers['listings_sold']->sum('ClosePrice'),2)}}</span>

                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="small-box bg-yellow">
                                            <div class="inner">
                                                <h3>{{$pastNumbers['listings_taken']->count()}}</h3>

                                                <p>Listings Taken</p>
                                            </div>
                                            <div class="icon">
                                                <i class="fa fa-home"></i>
                                            </div>
                                            <a href="#" class="small-box-footer">
                                                More info <i class="fa fa-arrow-circle-right"></i>
                                            </a>

                                            <div class="hide">
                                                <ul>
                                                    @foreach($pastNumbers['listings_taken'] as $listing)

                                                        <li>{{$listing->StreetNumber}} {{$listing->StreetName}}
                                                            , {{$listing->City}} - {{$listing->Status}}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="info-box bg-green">
                                            <span class="info-box-icon"><i class="fa fa-money"></i></span>

                                            <div class="info-box-content">
                                                <span class="info-box-number">Total Closed</span>
                                                <span class="info-box-number">${{number_format($pastNumbers['listings_sold']->sum('ClosePrice') + $pastNumbers['buyer_sides']->sum('ClosePrice'),2)}}</span>


                                            </div>
                                            <!-- /.info-box-content -->
                                        </div>
                                    </div>
                                </div>
                                <hr/>
                                <div class="row">
                                    <div class="col-md-12"><h3>Charts</h3></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">

                                    </div>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- END PROFILE CONTENT -->
        </div>

    </div>
    <!-- END PAGE CONTENT-->
    <div class="clearfix"></div>


@stop
@section('models')
    @include('admin.partials.models.add_profile_img')
@stop
@section('footer-content')

    <script>
        $(function () {
            $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass: 'iradio_minimal-blue'
            });
            $('#daterange-btn').daterangepicker(
                    {
                        ranges: {
                            'This Year': [moment().startOf('year'), moment().endOf('month')],
                            'Last 12 Months': [moment().subtract('month', 12).startOf('month'), moment().subtract('month', 1).endOf('month')],
                            'Last Year': [moment().startOf('year').subtract('days', 365), moment().startOf('year').subtract('days', 1)],
                            '2 Years Ago': [moment().startOf('year').subtract('days', 730), moment().startOf('year').subtract('days', 366)],
                            '3 Years Ago': [moment().startOf('year').subtract('days', 1096), moment().startOf('year').subtract('days', 731)]

                        },
                        startDate: moment().startOf('year'),
                        endDate: moment()
                    },
                    function (start, end) {
                        $('#start_date').val(start.format('YYYY-MM-DD'));
                        $('#end_date').val(end.format('YYYY-MM-DD'));
                        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                    }
            );
        });
    </script>
@stop
