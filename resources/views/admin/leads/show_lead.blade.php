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
                    <table class="table table-bordered">
                        <tr>
                            <td>First Name: {{$lead->first_name}}</td>
                        </tr>
                        <tr>
                            <td>Last Name: {{$lead->last_name}}</td>
                        </tr>
                        <tr>
                            <td>
                                Email Address: <a href="mailto:{{$lead->email}}">{{$lead->email}}</a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Phone: {{$lead->phone_1}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                User Assigned: {{$lead->user->first_name}} {{$lead->user->last_name}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Status: {{$lead->status}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Source: {{$lead->source}}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Experience Level: {{$lead->experience_level}}
                            </td>
                        </tr>
                    </table>
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