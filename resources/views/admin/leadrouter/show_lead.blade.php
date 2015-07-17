@extends('admin')
@section('content')
    <div class="clearfix"></div>
    <!-- BEGIN PAGE CONTENT-->
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN PROFILE SIDEBAR -->
            <div class="profile-sidebar" style="width:250px;">
                <!-- PORTLET MAIN -->
                <div class="portlet light profile-sidebar-portlet">
                    <!-- SIDEBAR USERPIC -->
                    <div class="profile-userpic" style="text-align: center;">
                        @if ($lead->profile_img == '')
                            <img alt="" class="img-circle"
                                 src="http://www.gravatar.com/avatar/{{md5($lead->email)}}" class="img-responsive"/>
                        @else
                            <img src="{{$lead->profile_img}}" class="img-responsive" alt="">
                        @endif
                    </div>
                    <!-- END SIDEBAR USERPIC -->
                    <!-- SIDEBAR USER TITLE -->
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name">
                            {{$lead->first_name}} {{$lead->last_name}}
                        </div>
                        <div class="margin-top-20 profile-desc-link">
                            <i class="fa fa-globe"></i>
                            <a href="mailto:<?php echo $lead->email; ?>"><?php echo $lead->email; ?></a>
                        </div>
                        <div class="margin-top-20 visible-xs-block">
                            <a href="tel:<?php echo $lead->phone; ?>" class="btn btn-primary log-call"
                               data-call="<?php echo $lead->id; ?>"><?php echo $lead->phone; ?></a>


                        </div>
                        <div class="margin-top-20 profile-desc-link hidden-xs">
                            <i class="fa fa-phone"></i>
                            <a href="tel:<?php echo $lead->phone; ?>"><?php echo $lead->phone; ?></a>

                        </div>
                        <div class="margin-top-20 profile-desc-link">
                            <i class="fa fa-facebook"></i>
                            <a href="" target="_blank"></a>
                        </div>
                        <div class="margin-top-20"></div>
                        <div class="margin-top-20"></div>
                        <h4>Birthday:<br>{{$lead->birthday or 'Empty'}}</h4>
                        <h4>Created On:<br>{{$lead->created_at}}</h4>
                        <h4 style="margin-bottom:20px">Updated
                            On:<br>{{$lead->updated_at}}</h4>

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
                        <div class="portlet light">
                            <div class="portlet-title tabbable-line">
                                <div class="caption caption-md">
                                    <i class="icon-globe theme-font hide"></i>
                                    <span class="caption-subject font-blue-madison bold uppercase">Lead Profile</span>
                                </div>
                                <ul class="nav nav-tabs">
                                    <li class="active">
                                        <a href="#tab_profile" data-toggle="tab">Overview</a>
                                    </li>
                                </ul>
                            </div>
                            <div class="portlet-body">
                                <div class="tab-content">
                                    <!-- PERSONAL INFO TAB -->
                                    <div class="tab-pane active" id="tab_profile">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <input type="hidden" class="rid" value="<?php echo $lead->id; ?>">
                                                <input type="hidden" id="_token" name="_token" value="{{csrf_token()}}"/>
                                                <table id="user" class="table table-bordered table-striped">
                                                    <tbody>
                                                    <tr>
                                                        <td style="width:25%">
                                                            First Name
                                                        </td>
                                                        <td style="width:75%">
                                                            <a href="#" id="first_name" data-type="text"
                                                               data-pk="<?php echo $lead->id; ?>"
                                                               data-placement="right"
                                                               data-placeholder="Required"
                                                               data-original-title="Enter first Name">
                                                                <?php echo $lead->first_name; ?>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:25%">
                                                            Last Name
                                                        </td>
                                                        <td style="width:75%">
                                                            <a href="#" id="last_name" data-type="text"
                                                               data-pk="<?php echo $lead->id; ?>"
                                                               data-placement="right"
                                                               data-placeholder="Required"
                                                               data-original-title="Enter lastname">
                                                                <?php echo $lead->last_name; ?>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:25%">
                                                            E-Mail
                                                        </td>
                                                        <td style="width:75%">
                                                            <a href="#" id="email" data-type="text"
                                                               data-pk="<?php echo $lead->id; ?>"
                                                               data-placement="right"
                                                               data-placeholder="Required"
                                                               data-original-title="Enter email address">
                                                                <?php echo $lead->email; ?>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:25%">
                                                            Phone
                                                        </td>
                                                        <td style="width:75%">
                                                            <a href="#" id="phone" data-type="text"
                                                               data-pk="<?php echo $lead->id; ?>"
                                                               data-placement="right"
                                                               data-placeholder="Required"
                                                               data-original-title="Enter phone">
                                                                <?php echo $lead->phone; ?>
                                                            </a>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td style="width:25%">
                                                            Status
                                                        </td>
                                                        <td style="width: 75%;">
                                                            <a href="#" id="status" data-type="select"
                                                               data-pk="<?php echo $lead->id; ?>" data-value=""
                                                               data-original-title="Select status">
                                                                <?php echo $lead->status; ?> </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:25%">
                                                            Lead Acceptance Type
                                                        </td>
                                                        <td style="width: 75%;">
                                                            <a href="#" id="type" data-type="select"
                                                               data-pk="<?php echo $lead->id; ?>" data-value=""
                                                               data-original-title="Select type">
                                                                <?php echo $lead->lead_acceptance_type; ?> </a>
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
                                                               data-pk="<?php echo $lead->id; ?>"
                                                               data-placement="right"
                                                               data-original-title="Enter address">
                                                                <?php echo $lead->address; ?>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:25%">
                                                            City
                                                        </td>
                                                        <td style="width:75%">
                                                            <a href="#" id="city" data-type="text"
                                                               data-pk="<?php echo $lead->id; ?>"
                                                               data-placement="right"
                                                               data-original-title="Enter City">
                                                                <?php echo $lead->city; ?>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:25%">
                                                            State
                                                        </td>
                                                        <td style="width:75%">
                                                            <a href="#" id="state" data-type="text"
                                                               data-pk="<?php echo $lead->id; ?>"
                                                               data-placement="right"
                                                               data-original-title="Enter State">
                                                                <?php echo $lead->state; ?>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:25%">
                                                            Zip Code
                                                        </td>
                                                        <td style="width:75%">
                                                            <a href="#" id="zip_code" data-type="text"
                                                               data-pk="<?php echo $lead->id; ?>"
                                                               data-placement="right"
                                                               data-original-title="Enter Zip Code">
                                                                <?php echo $lead->zip_code; ?>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td style="width:25%">
                                                            Source
                                                        </td>
                                                        <td style="width: 75%;">
                                                            <a href="#" id="source" data-type="select"
                                                               data-pk="<?php echo $lead->id; ?>" data-value=""
                                                               data-original-title="Select source">
                                                                <?php echo $lead->source_name; ?> </a>
                                                        </td>
                                                    </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                @include('admin.leadrouter.lead_extra')
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
    <script src="{{asset('backend/pages/scripts/leads_editable.js')}}"
            type="text/javascript"></script>
@stop
@section('init')
    FormEditable.init();
@stop