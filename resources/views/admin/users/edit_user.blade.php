@extends('admin')
@section('page_title', 'Edit User')
@section('header-section')

@endsection
@section('content')
    <div class="portlet box blue ">
        <div class="portlet-title">
            <div class="caption">
                <i class="fa fa-gift"></i>Edit User
            </div>
        </div>
        <div class="portlet-body form">
            <!-- BEGIN FORM-->
            {!!Form::model($user,['url' => 'admin/users/update/' . $user->id, 'method' => 'PATCH', 'class'=>'form-horizontal form-bordered form-row-stripped'])!!}
            <div class="form-body">
                <div class="form-group">
                    <label class="control-label col-md-3">First Name</label>
                    <div class="col-md-9">
                        {!! Form::text('first_name',null,['class'=>'form-control'])!!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Last Name</label>
                    <div class="col-md-9">
                        {!! Form::text('last_name',null,['class'=>'form-control'])!!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Email Address</label>
                    <div class="col-md-9">
                        <p class="form-control-static">
                            {{$user->email}}
                        </p>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Can user recruit?</label>
                    <div class="col-md-9">
                        <select name="can_recruit" id="" class="">
                            <option value="0" {{setSelected($user->can_recruit,0)}}>No</option>
                            <option value="1" {{setSelected($user->can_recruit,1)}}>Yes</option>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">Office?</label>
                    <div class="col-md-9">
                        {!! Form::select('office_id',$offices,$user->office_id)!!}
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3">User Role</label>
                    <div class="col-md-9">
                        {!! Form::select('role_list[]',$roles,null)!!}
                    </div>
                </div>
            </div>
            <div class="form-actions">
                <div class="row">
                    <div class="col-md-offset-3 col-md-9">
                        <button type="submit" class="btn green"><i class="fa fa-check"></i> Edit User</button>
                        <a href="{{url('admin/users')}}" class="btn default">Cancel</a>
                    </div>
                </div>
            </div>
            {!! Form::close() !!}
            <!-- END FORM-->
        </div>
    </div>
    @include('admin.partials.forms.errors')
@endsection
@section('footer-content')

@endsection