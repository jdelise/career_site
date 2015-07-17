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
            {!! Form::text('email',null,['class'=>'form-control'])!!}
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3">User Role</label>
        <div class="col-md-9">
            {!! Form::select('role_list',$roles,null)!!}


        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-md-3">Password</label>
        <div class="col-md-9">
            {!! Form::password('password',null,['class'=>'form-control'])!!}        </div>
    </div>
</div>
<div class="form-actions">
    <div class="row">
        <div class="col-md-offset-3 col-md-9">
            <button type="submit" class="btn green"><i class="fa fa-check"></i> {{$submitButtonText}}</button>
            <button type="button" class="btn default">Cancel</button>
        </div>
    </div>
</div>