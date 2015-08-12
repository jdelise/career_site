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
                        @if ($agent->photo == '')
                            <img alt="" class="img-circle"
                                 src="http://www.gravatar.com/avatar/{{md5($agent->email_address)}}" class="img-responsive"/>
                        @else
                            <img src="{{$agent->photo}}" class="img-circle" alt="">
                        @endif

                    </div>
                    <!-- END SIDEBAR USERPIC -->
                    <!-- SIDEBAR USER TITLE -->
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name">
                            {{$agent->first_name}} {{$agent->last_name}}
                        </div>
                        <input type="hidden" class="uid" value="{{$agent->id}}">
                        <input type="hidden" id="_token" name="_token" value="{{csrf_token()}}"/>
                        <div class="margin-top-20 profile-desc-link">
                            <i class="fa fa-globe"></i>
                            <a href="mailto:<?php echo $agent->email_address; ?>"><?php echo $agent->email_address; ?></a>
                        </div>
                        <div class="margin-top-20"></div>
                        <div class="margin-top-20"></div>
                        <h4>Created At:<br>{{$agent->created_at->diffForHumans()}}</h4>
                        <h4 style="margin-bottom:20px">Last Updated:<br>{{$agent->updated_at->diffForHumans()}}</h4>

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
                                    <h3 class="box-title">{{$agent->first_name}} {{$agent->last_name}}</h3>
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
                                                        <a href="#" id="first_name" data-type="text"
                                                           data-pk="<?php echo $agent->id; ?>"
                                                           data-placement="right"
                                                           data-placeholder="Required"
                                                           data-original-title="Enter First Name">
                                                            <?php echo $agent->first_name; ?>
                                                        </a>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width:25%">
                                                        Last Name
                                                    </td>
                                                    <td style="width:75%">
                                                        <a href="#" id="last_name" data-type="text"
                                                           data-pk="<?php echo $agent->id; ?>"
                                                           data-placement="right"
                                                           data-placeholder="Required"
                                                           data-original-title="Enter Last Name">
                                                            <?php echo $agent->last_name; ?>
                                                            </a>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width:25%">
                                                        E-Mail
                                                    </td>
                                                    <td style="width:75%">
                                                        <a href="#" id="email_address" data-type="text"
                                                           data-pk="<?php echo $agent->id; ?>"
                                                           data-placement="right"
                                                           data-placeholder="Required"
                                                           data-original-title="Enter Email Address">
                                                            <?php echo $agent->email_address; ?>
                                                            </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width:25%">
                                                        Office Phone
                                                    </td>
                                                    <td style="width:75%">
                                                        <a href="#" id="office_phone" data-type="text"
                                                           data-pk="<?php echo $agent->id; ?>"
                                                           data-placement="right"
                                                           data-placeholder="Required"
                                                           data-original-title="Enter Email Address">
                                                            <?php echo $agent->office_phone; ?>
                                                        </a>


                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width:25%">
                                                        Mobile Phone
                                                    </td>
                                                    <td style="width:75%">
                                                        <a href="#" id="mobile_phone" data-type="text"
                                                           data-pk="<?php echo $agent->id; ?>"
                                                           data-placement="right"
                                                           data-placeholder="Required"
                                                           data-original-title="Enter Mobile Phone">
                                                            <?php echo $agent->mobile_phone; ?>
                                                            </a>
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
                                                        Office
                                                    </td>
                                                    <td style="width:75%">

                                                            <?php echo $agent->office; ?>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width:25%">
                                                        In Test Group?
                                                    </td>
                                                    <td style="width:75%">
                                                        <a href="#" id="is_test" data-type="select"
                                                           data-pk="<?php echo $agent->id; ?>"
                                                           data-placement="right"
                                                           data-placeholder="Required"
                                                           data-original-title="Enter Last Name">
                                                            {{changeBoolean($agent->is_test)}}
                                                        </a>

                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width:25%">
                                                        Is Active?
                                                    </td>
                                                    <td style="width:75%">
                                                        <a href="#" id="is_active" data-type="select"
                                                           data-pk="<?php echo $agent->id; ?>"
                                                           data-placement="right"
                                                           data-placeholder="Required"
                                                           data-original-title="Enter Status">
                                                           {{changeBoolean($agent->is_active)}}
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width:25%">
                                                        Days Red
                                                    </td>
                                                    <td style="width:75%">
                                                        <a href="#" id="days_red" data-type="text"
                                                           data-pk="<?php echo $agent->id; ?>"
                                                           data-placement="right"
                                                           data-placeholder="Required"
                                                           data-original-title="Enter Email Address">
                                                            <?php echo $agent->days_red; ?>
                                                        </a>


                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width:25%">
                                                        Agent's Order
                                                    </td>
                                                    <td style="width:75%">

                                                            <?php echo $agent->agent_order; ?>



                                                    </td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">


                                        </div>
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
                <div class="row">
                    <div class="col-md-12">
                      <div class="box">
                          <div class="box-header">
                              <h3 class="box-title">Additional Information</h3>
                          </div>
                          <div class="box-body">
                              <!-- Nav tabs -->
                              <ul class="nav nav-tabs" role="tablist">
                                  <li role="presentation" class="active"><a href="#zipcodes" aria-controls="zipcodes" role="tab" data-toggle="tab">Zipcodes</a></li>
                                  <li role="presentation"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Texts</a></li>
                              </ul>

                              <!-- Tab panes -->
                              <div class="tab-content">
                                  <div role="tabpanel" class="tab-pane fade in active" id="zipcodes">
                                      <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Zipcode</th>
                                                <th>Why</th>
                                                <th></th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                          <tbody>
                                          @foreach($extra_data as $data)
                                              <tr>
                                                  <td>{{$data->zip}}</td>
                                                  <td class="hidden-phone">
                                                      Lives Here: <?php if($data->home == '1'){echo 'Yes';}else{echo 'No';} ?>
                                                  </td>
                                                  <td class="hidden-phone">
                                                      Works Here: <?php if($data->office == '1'){echo 'Yes';}else{echo 'No';} ?>
                                                  </td>
                                                  <td class="hidden-phone">
                                                      Sold Here: <?php if($data->closings == '0'){echo 'No';}else{echo 'Yes - ' . $data->closings;} ?>
                                                  </td>
                                                  <td class="hidden-phone">
                                                      Exception: <?php if($data->other == '1'){echo 'Yes';}else{echo 'No';} ?>
                                                  </td>
                                              </tr>

                                          @endforeach
                                          </tbody>
                                      </table>
                                  </div>
                                  <div role="tabpanel" class="tab-pane fade" id="messages">

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
    <div class="modal fade" id="add_image" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                    <h4 class="modal-title">Add a new note</h4>
                </div>
                <form action="{{url('admin/users/edit-img')}}" class="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <input type="hidden" name="user_id" id="user_id" value="{{$agent->id}}"/>
                                <input type="file" name="file"/>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn default" data-dismiss="modal">Close</button>
                        <input type="submit" value="Save" class="btn blue">
                    </div>
                </form>
            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
@stop
@section('footer-content')

    <script src="{{asset('global/plugins/bootstrap-editable/bootstrap-editable/js/bootstrap-editable.min.js')}}"
            type="text/javascript"></script>
    <script src="{{asset('adminlte/js/agents_editable.js')}}"
            type="text/javascript"></script>

@stop

@section('init')
    FormEditable.init();
@stop