@extends('admin')
@section('content')
    <div class="row">
        <div class="col-sm-8">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Lead Details - <small><a href="/admin/leads/{{$lead->id}}/edit">Edit</a></small></h3>
                    <h5><span class="text-primary">Created On: {{$lead->created_at->format('M d Y')}}</span></h5>
                    <h5><span class="text-primary">Last Updated: {{$lead->updated_at->format('M d Y')}}</span></h5>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <form action="/admin/leads/{{$lead->id}}" class="" method="POST">
                                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                                <input type="hidden" name="_method" value="PATCH"/>
                                <div class="form-group">
                                    <label for="first_name">First Name:</label>
                                    <input type="text" name="first_name" class="form-control" value="{{$lead->first_name}}"/>
                                </div>
                                <div class="form-group">
                                    <label for="last_name">Last Name:</label>
                                    <input type="text" name="last_name" class="form-control" value="{{$lead->last_name}}"/>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="text" name="email" class="form-control" value="{{$lead->email}}"/>
                                </div>
                                <div class="form-group">
                                    <label for="phone_1">Phone:</label>
                                    <input type="text" name="phone_1" class="form-control" value="{{$lead->phone_1}}"/>
                                </div>
                                <div class="form-group">
                                    <label for="">User Assigned:</label>
                                    <input type="text" name="" class="form-control" disabled value="{{$lead->user->first_name}} {{$lead->user->last_name}}"/>
                                </div>
                                <div class="form-group">

                                    <label for="staus">Status:</label>
                                    <select name="status" id="" class="form-control">

                                        @foreach($statuses as $status)
                                            <option value="{{$status}}" {{setSelected($lead->status,$status)}}>{{$status}}</option>
                                            @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="source">Source:</label>
                                    <input class="form-control" type="text" name="source" value="{{$lead->source}}"/>
                                </div>
                                <div class="form-group">
                                    <label for="experience_level">Experience Level:</label>
                                    <input class="form-control" type="text" name="experience_level" value="{{$lead->experience_level}}"/>
                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary pull-right" value="Submit"/>
                                    <a href="/admin/leads/{{$lead->id}}" class="btn btn-default pull-right" style="margin-right: 10px">Cancel</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            @include('admin.leads.parts.actions')
        </div>
    </div>
@stop
@section('models')
    @include('admin.leads.parts.reassign_lead')
    @include('admin.leads.parts.delete_lead')
@stop