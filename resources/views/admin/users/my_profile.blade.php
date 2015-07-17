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
            @include('admin.users.profile_sidebar')
            <!-- END BEGIN PROFILE SIDEBAR -->
            <!-- BEGIN PROFILE CONTENT -->
            <div class="profile-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="box">
                            <div class="box-header tabbable-line">
                                <div class="caption caption-md">
                                    <h3 class="box-title">{{$user->first_name}} {{$user->last_name}}</h3>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="tab-content">
                                    <!-- PERSONAL INFO TAB -->

                                    <div class="row">
                                        <div class="col-md-12">
                                            <input type="hidden" class="uid" value="<?php echo $user->id; ?>">
                                            <input type="hidden" id="_token" name="_token" value="{{csrf_token()}}"/>
                                            <table id="user" class="table table-bordered table-striped">
                                                <tbody>
                                                <tr>
                                                    <td style="width:25%">
                                                        First Name
                                                    </td>
                                                    <td style="width:75%">
                                                        <a href="#" id="first_name" data-type="text"
                                                           data-pk="<?php echo $user->id; ?>"
                                                           data-placement="right"
                                                           data-placeholder="Required"
                                                           data-original-title="Enter first Name">
                                                            <?php echo $user->first_name; ?>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width:25%">
                                                        Last Name
                                                    </td>
                                                    <td style="width:75%">
                                                        <a href="#" id="last_name" data-type="text"
                                                           data-pk="<?php echo $user->id; ?>"
                                                           data-placement="right"
                                                           data-placeholder="Required"
                                                           data-original-title="Enter lastname">
                                                            <?php echo $user->last_name; ?>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width:25%">
                                                        E-Mail
                                                    </td>
                                                    <td style="width:75%">
                                                        <a href="#" id="email" data-type="text"
                                                           data-pk="<?php echo $user->id; ?>"
                                                           data-placement="right"
                                                           data-placeholder="Required"
                                                           data-original-title="Enter email address">
                                                            <?php echo $user->email; ?>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width:25%">
                                                        Experienced Agent Goal
                                                    </td>
                                                    <td style="width:75%">
                                                        <a href="#" id="experienced_agent_goal" data-type="text"
                                                           data-pk="<?php echo $user->id; ?>"
                                                           data-placement="right"
                                                           data-placeholder="Required"
                                                           data-original-title="Experienced Agent Goal">
                                                            <?php echo $user->experienced_agent_goal; ?>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td style="width:25%">
                                                        New Agent Goal
                                                    </td>
                                                    <td style="width:75%">
                                                        <a href="#" id="new_agent_goal" data-type="text"
                                                           data-pk="<?php echo $user->id; ?>"
                                                           data-placement="right"
                                                           data-placeholder="Required"
                                                           data-original-title="New Agent Goal">
                                                            <?php echo $user->new_agent_goal; ?>
                                                        </a>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td style="width:25%">
                                                        Office
                                                    </td>
                                                    <td style="width: 75%;">
                                                        <a href="#" id="office_id" data-type="select"
                                                           data-pk="<?php echo $user->id; ?>" data-value=""
                                                           data-original-title="Select status">
                                                            <?php echo $user->office->name; ?> </a>
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
                                <input type="hidden" name="user_id" id="user_id" value="{{$user->id}}"/>
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
    <script src="{{asset('adminlte/js/users_editable.js')}}"
            type="text/javascript"></script>

@stop

@section('init')
    FormEditable.init();
@stop