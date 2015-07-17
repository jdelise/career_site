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
            <div class="profile-sidebar" style="width:250px;">
                <!-- PORTLET MAIN -->
                <div class="box profile-sidebar-portlet">

                    <!-- SIDEBAR USERPIC -->
                    <div class="profile-userpic" style="text-align: center;">
                            <img alt="" class="img-circle"
                                 src="http://www.gravatar.com/avatar/{{md5($recruit['Email'])}}" class="img-responsive"/>

                    </div>
                    <!-- END SIDEBAR USERPIC -->
                    <!-- SIDEBAR USER TITLE -->
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name">
                            {{$recruit['FullName']}}
                        </div>
                        <div class="margin-top-20 profile-desc-link">
                            <i class="fa fa-globe"></i>
                            <a href="mailto:<?php echo $recruit['Email']; ?>"><?php echo $recruit['Email']; ?></a>
                        </div>
                        <div class="margin-top-20 visible-xs-block">
                            <a href="tel:<?php echo $recruit['CellPhone']; ?>" class="btn btn-primary log-call"><?php echo $recruit['CellPhone']; ?></a>
                        </div>
                        <div class="margin-top-20 profile-desc-link hidden-xs">
                            <i class="fa fa-phone"></i>
                            <a href="tel:<?php echo $recruit['CellPhone']; ?>"><?php echo $recruit['CellPhone']; ?></a>
                        </div>

                    </div>
                    <div class="clearfix"></div>
                    <!-- END SIDEBAR USER TITLE -->
                    <!-- SIDEBAR BUTTONS -->

                    <!-- END MENU -->
                </div>
                <!-- END PORTLET MAIN -->
                <!-- PORTLET MAIN -->

                <!-- END PORTLET MAIN -->
            </div>
            <!-- END BEGIN PROFILE SIDEBAR -->
            <!-- BEGIN PROFILE CONTENT -->
            <div class="profile-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-header tabbable-line">
                                <div class="caption caption-md">
                                    <h3 class="box-title">Agent Info</h3>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="tab-content">
                                    <!-- PERSONAL INFO TAB -->

                                    <div class="row">
                                        <div class="col-md-6">
                                            <table id="user" class="table table-bordered table-striped">
                                                <tbody>
                                                <tr>
                                                    <td style="width:25%">
                                                        First Name
                                                    </td>
                                                    <td style="width:75%">
                                                        <?php echo $recruit['FirstName']; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width:25%">
                                                        Last Name
                                                    </td>
                                                    <td style="width:75%">
                                                        <?php echo $recruit['LastName']; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width:25%">
                                                        E-Mail
                                                    </td>
                                                    <td style="width:75%">
                                                        <?php echo $recruit['Email']; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width:25%">
                                                        Mibor ID
                                                    </td>
                                                    <td style="width:75%">
                                                        {{$recruit['MLSID']}}
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
                                                        <?php echo $recruit['StreetAddress']; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width:25%">
                                                        City
                                                    </td>
                                                    <td style="width:75%">
                                                        <?php echo $recruit['StreetCity']; ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width:25%">
                                                        State
                                                    </td>
                                                    <td style="width:75%">
                                                       IN
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width:25%">
                                                        Zip Code
                                                    </td>
                                                    <td style="width:75%">
                                                        {{$recruit['StreetPostalCode']}}
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width:25%">
                                                        Add to crm?
                                                    </td>
                                                    <td style="width:75%">
                                                        <a href="{{url('admin/mibor_sync/add-mibor-agent-to-crm')}}/{{$recruit['MLSID']}}" class="btn btn-primary">Add to crm</a>
                                                    </td>
                                                </tr>

                                                </tbody>
                                            </table>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="box">
                                                <div class="box-header">
                                                    <h3 class="box-title">Agent Production last 12 months</h3>

                                                </div>
                                                <div class="box-body">
                                                    @if($numbers)
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="small-box bg-yellow">
                                                                    <div class="inner">

                                                                        <h3>{{count($numbers['buyer_sides'])}}</h3>

                                                                        <p>Closed Buyers</p>
                                                                    </div>
                                                                    <div class="icon">
                                                                        <i class="fa fa-users"></i>
                                                                    </div>


                                                                </div>
                                                                <div class="info-box bg-green">
                                                                    <span class="info-box-icon"><i class="fa fa-money"></i></span>

                                                                    <div class="info-box-content">
                                                                        <span class="info-box-number">Buyers Closed</span>

                                                                        <span class="info-box-number">${{number_format(array_sum(array_pluck($numbers['buyer_sides'],'ClosePrice')),2)}}</span>
                                                                    </div>
                                                                    <!-- /.info-box-content -->
                                                                </div>


                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="small-box bg-yellow">
                                                                    <div class="inner">
                                                                        <h3>{{count($numbers['listings_sold'])}}</h3>

                                                                        <p>Listings Sold</p>
                                                                    </div>
                                                                    <div class="icon">
                                                                        <i class="fa fa-home"></i>
                                                                    </div>



                                                                </div>
                                                                <div class="info-box bg-green">
                                                                    <span class="info-box-icon"><i class="fa fa-money"></i></span>

                                                                    <div class="info-box-content">
                                                                        <span class="info-box-number">Listings Closed</span>
                                                                        <span class="info-box-number">${{number_format(array_sum(array_pluck($numbers['listings_sold'],'ClosePrice')),2)}}</span>

                                                                    </div>
                                                                    <!-- /.info-box-content -->
                                                                </div>

                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="small-box bg-yellow">
                                                                    <div class="inner">
                                                                        <h3>{{count($numbers['listings_taken'])}}</h3>

                                                                        <p>Listings Taken</p>
                                                                    </div>
                                                                    <div class="icon">
                                                                        <i class="fa fa-home"></i>
                                                                    </div>

                                                                </div>
                                                                <div class="info-box bg-green">
                                                                    <span class="info-box-icon"><i class="fa fa-money"></i></span>

                                                                    <div class="info-box-content">
                                                                        <span class="info-box-number">Total Closed</span>
                                                                        <span class="info-box-number">${{number_format(array_sum(array_pluck($numbers['listings_sold'],'ClosePrice')) + array_sum(array_pluck($numbers['buyer_sides'],'ClosePrice')),2)}}</span>


                                                                    </div>
                                                                    <!-- /.info-box-content -->
                                                                </div>


                                                            </div>
                                                        </div>
                                                    @endif

                                                </div>
                                            </div>

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

@section('footer-content')

    <script src="{{asset('global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.min.js')}}"
            type="text/javascript"></script>
    <script src="{{asset('adminlte/js/form-editable.js')}}"
            type="text/javascript"></script>
    <script>
        $(function(){
            $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
                checkboxClass: 'icheckbox_minimal-blue',
                radioClass: 'iradio_minimal-blue'
            });
            $('#daterange-btn').daterangepicker(
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
            );
        });
    </script>
@stop

@section('init')
    FormEditable.init();
@stop