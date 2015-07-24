@extends('admin')
@section('page_title','Recruiting Dashboard')
@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{$experienced_agents}} of {{$user->experienced_agent_goal}}</h3>

                    <p>Experienced Agent Goal</p>
                </div>
                <div class="icon">
                    <i class="fa fa-money"></i>
                </div>


                <div class="hide">
                    <ul>
                    </ul>
                </div>
            </div>

        </div>
        <div class="col-md-3">
            <div class="small-box bg-blue">
                <div class="inner">
                    <h3>{{$new_agents}} of {{$user->new_agent_goal}}</h3>

                    <p>New Agent Goals</p>
                </div>
                <div class="icon">
                    <i class="fa fa-money"></i>
                </div>


                <div class="hide">
                    <ul>
                    </ul>
                </div>
            </div>

        </div>
        <div class="col-md-3">
            <div class="small-box bg-purple">
                <div class="inner">
                    <h3>{{$appointments}}</h3>

                    <p>Appointments This Month</p>
                </div>
                <div class="icon">
                    <i class="fa fa-users"></i>
                </div>


                <div class="hide">
                    <ul>
                    </ul>
                </div>
            </div>

        </div>
        <div class="col-md-3">
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3>{{$calls}}</h3>

                    <p>Calls This Month</p>
                </div>
                <div class="icon">
                    <i class="fa fa-phone"></i>
                </div>


                <div class="hide">
                    <ul>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="row">

        <div class="col-sm-6">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">My Recruits</h3>
                </div>
                <div class="box-body">
                    @include('admin.partials.dashboard_activities')
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Latest Leads</h3>
                </div>
                <div class="box-body">
                    <table class="table table-bordered">
                        <tbody>
                        @foreach($user->leads as $lead)
                        <tr>
                            <td><a href="/admin/leads/{{$lead->id}}">{{$lead->first_name}} {{$lead->last_name}}</a></td>
                            <td><a href="mailto:{{$lead->email}}">{{$lead->email}}</a></td>
                            <td>{{$lead->updated_at->diffForHumans()}}</td>
                            <td>{{$lead->source}}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-sm-4">

        </div>
    </div>

@stop