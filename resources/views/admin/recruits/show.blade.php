@extends('admin')
@section('page_title','Recruit Profile')
    @stop
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
                            <div class="box-header tabbable-line">
                                <div class="caption caption-md">

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="actions">
                                                <div class="btn-group">
                                                    <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Actions <span class="caret"></span></button>
                                                    <ul class="dropdown-menu">
                                                        <li><a href="#" data-toggle="modal"  data-target="#reassign_lead">Re-Assign</a></li>
                                                        <li><a href="#add_task" data-toggle="modal">Add Task</a></li>
                                                        <li role="separator" class="divider"></li>
                                                        <li><a href="#">Delete Recruit</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4 center" style="color: chocolate;">

                                                <small>Last Contact</small>
                                                <br/>{{$recruit->last_followup_date->diffForHumans or 'Never'}}

                                        </div>
                                        <div class="col-md-4 right">
                                            <small>Assigned To:</small>
                                            <br/>{{$recruit->user->first_name}} {{$recruit->user->last_name}}
                                        </div>
                                    </div>

                                </div>


                            </div>
                            <div class="box-body">
                                <div class="tab-content">
                                    <!-- PERSONAL INFO TAB -->

                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="hidden" class="rid" value="<?php echo $recruit->id; ?>">
                                            <input type="hidden" id="_token" name="_token" value="{{csrf_token()}}"/>
                                            <table id="user" class="table table-bordered table-striped">
                                                <tbody>
                                                <tr>
                                                    <td style="width:25%">
                                                        First Name
                                                    </td>
                                                    <td style="width:75%">
                                                        <a href="#" id="first_name" data-type="text"
                                                           data-pk="<?php echo $recruit->id; ?>"
                                                           data-placement="right"
                                                           data-placeholder="Required"
                                                           data-original-title="Enter first Name">
                                                            <?php echo $recruit->first_name; ?>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width:25%">
                                                        Last Name
                                                    </td>
                                                    <td style="width:75%">
                                                        <a href="#" id="last_name" data-type="text"
                                                           data-pk="<?php echo $recruit->id; ?>"
                                                           data-placement="right"
                                                           data-placeholder="Required"
                                                           data-original-title="Enter lastname">
                                                            <?php echo $recruit->last_name; ?>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width:25%">
                                                        E-Mail
                                                    </td>
                                                    <td style="width:75%">
                                                        <a href="#" id="email" data-type="text"
                                                           data-pk="<?php echo $recruit->id; ?>"
                                                           data-placement="right"
                                                           data-placeholder="Required"
                                                           data-original-title="Enter email address">
                                                            <?php echo $recruit->email; ?>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width:25%">
                                                        Phone
                                                    </td>
                                                    <td style="width:75%">
                                                        <a href="#" id="phone_1" data-type="text"
                                                           data-pk="<?php echo $recruit->id; ?>"
                                                           data-placement="right"
                                                           data-placeholder="Required"
                                                           data-original-title="Enter phone">
                                                            <?php echo $recruit->phone_1; ?>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width:25%">
                                                        Date of birth
                                                    </td>
                                                    <td style="width:75%">
                                                        <a href="#" id="dob" data-type="combodate"
                                                           data-value="{{$recruit->birthday or 'Empty'}}"
                                                           data-format="YYYY-MM-DD"
                                                           data-viewformat="DD/MM/YYYY"
                                                           data-template="D / MMM / YYYY"
                                                           data-pk="1" data-original-title="Select Date of birth">
                                                        </a>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td style="width:25%">
                                                        Status
                                                    </td>
                                                    <td style="width: 75%;">
                                                        <a href="#" id="status" data-type="select"
                                                           data-pk="<?php echo $recruit->id; ?>" data-value=""
                                                           data-original-title="Select status">
                                                            <?php echo $recruit->status; ?> </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width:25%">
                                                        Source
                                                    </td>
                                                    <td style="width: 75%;">
                                                        <a href="#" id="source" data-type="select"
                                                           data-pk="<?php echo $recruit->id; ?>" data-value=""
                                                           data-original-title="Select source">
                                                            <?php echo $recruit->source; ?> </a>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-md-6">
                                            <table id="user" class="table table-bordered table-striped">
                                                <tbody>
                                                <tr>
                                                    <td style="width:25%">
                                                        Address
                                                    </td>
                                                    <td style="width:75%">
                                                        <a href="#" id="address" data-type="text"
                                                           data-pk="<?php echo $recruit->id; ?>"
                                                           data-placement="right"
                                                           data-original-title="Enter address">
                                                            <?php echo $recruit->address; ?>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width:25%">
                                                        City
                                                    </td>
                                                    <td style="width:75%">
                                                        <a href="#" id="city" data-type="text"
                                                           data-pk="<?php echo $recruit->id; ?>"
                                                           data-placement="right"
                                                           data-original-title="Enter City">
                                                            <?php echo $recruit->city; ?>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width:25%">
                                                        State
                                                    </td>
                                                    <td style="width:75%">
                                                        <a href="#" id="state" data-type="text"
                                                           data-pk="<?php echo $recruit->id; ?>"
                                                           data-placement="right"
                                                           data-original-title="Enter State">
                                                            <?php echo $recruit->state; ?>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width:25%">
                                                        Zip Code
                                                    </td>
                                                    <td style="width:75%">
                                                        <a href="#" id="zip_code" data-type="text"
                                                           data-pk="<?php echo $recruit->id; ?>"
                                                           data-placement="right"
                                                           data-original-title="Enter Zip Code">
                                                            <?php echo $recruit->zip_code; ?>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width:25%">
                                                        Hired?
                                                    </td>
                                                    <td style="width:75%">
                                                        <a href="#" id="is_hired" data-type="select"
                                                           data-pk="<?php echo $recruit->id; ?>" data-value=""
                                                           data-original-title="Select hired state">
                                                             {{changeBoolean($recruit->is_hired)}}
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width:25%">
                                                        Mibor ID
                                                    </td>
                                                    <td style="width:75%">
                                                        <a href="#" id="mls_id" data-type="text"
                                                           data-pk="<?php echo $recruit->id; ?>"
                                                           data-placement="right"
                                                           data-original-title="MLS ID">
                                                            <?php echo $recruit->mls_id; ?>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width:25%">
                                                        Experience Level
                                                    </td>
                                                    <td style="width: 75%;">
                                                        <a href="#" id="experience_level" data-type="select"
                                                           data-pk="<?php echo $recruit->id; ?>" data-value=""
                                                           data-original-title="Experience Level">
                                                            <?php echo $recruit->experience_level; ?> </a>
                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            @if($recruit->mls_id != '')
                                                @include('admin.recruits.production')
                                            @endif

                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            @include('admin.recruits.user_extra')
                                        </div>
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
    @include('admin.partials.models.add_task')
    @include('admin.partials.models.add_note')
    @include('admin.partials.models.reassign_lead_model')
    @include('admin.partials.models.add_profile_img')
@stop
@section('footer-content')

    <script src="{{asset('global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.min.js')}}"
            type="text/javascript"></script>
    <script src="{{asset('adminlte/js/form-editable.js')}}"
            type="text/javascript"></script>
    <script src="{{asset('global/plugins/charts_js/charts.js')}}"></script>
    @if($recruit->mls_id != '')
        <script>
            $(function(){
                $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                    checkboxClass: 'icheckbox_minimal-blue',
                    radioClass: 'iradio_minimal-blue'
                });
               /* $('#daterange-btn').daterangepicker(
                        {
                            ranges: {
                                'This Year': [moment().startOf('year'), moment().endOf('month')],
                                'Last 12 Months': [moment().subtract('month', 12).startOf('month'), moment().subtract('month', 1).endOf('month')],
                                'Last Year': [moment().startOf('year').subtract('days',365), moment().startOf('year').subtract('days',1)],
                                '2 Years Ago': [moment().startOf('year').subtract('days',730), moment().startOf('year').subtract('days',366)],
                                '3 Years Ago': [moment().startOf('year').subtract('days',1096), moment().startOf('year').subtract('days',731)]

                            },
                            startDate: moment().startOf('year'),
                            endDate: moment()
                        },
                        function (start, end) {
                            $('#start_date').val(start.format('YYYY-MM-DD'));
                            $('#end_date').val(end.format('YYYY-MM-DD'));
                            $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
                        }
                );*/
                var data = [
                    {
                        value: "<?php echo $numbers['listings_sold']->sum('ClosePrice');?>",
                        color:"#F7464A",
                        highlight: "#FF5A5E",
                        label: "Listings Sold"
                    },
                    {
                        value: "<?php echo $numbers['buyer_sides']->sum('ClosePrice');?>",
                        color: "#46BFBD",
                        highlight: "#5AD3D1",
                        label: "Buyer Sides"
                    },
                    {
                        value: "<?php echo $numbers['listings_sold']->sum('ClosePrice') + $numbers['buyer_sides']->sum('ClosePrice'); ?>",
                        color: "#FDB45C",
                        highlight: "#FFC870",
                        label: "Total Production"
                    },
                    {
                        value: "<?php echo $pastNumbers['listings_sold']->sum('ClosePrice') + $pastNumbers['buyer_sides']->sum('ClosePrice'); ?>",
                        color: "#00ff6a",
                        highlight: "#00ff6a",
                        label: "Total Year Over Year"
                    }
                ];
                var ctx = document.getElementById('myChart').getContext("2d");
                //var ctx2 = document.getElementById'chart_2'.getContext("2d");
                Chart.defaults.global.responsive = true;
                new Chart(ctx).PolarArea(data,{bezierCurve: true});

            });
        </script>
        @endif

@stop

@section('init')
    FormEditable.init();
@stop