@extends('admin')
@section('page_title','Dashboard')
@section('content')
    <div class="row">
        <div class="col-md-3">
            <div class="small-box bg-purple">
                <div class="inner">
                    <h3>{{$appointments}}</h3>

                    <p>System Appointments This Month</p>
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

                    <p>System Calls This Month</p>
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
        <div class="col-md-3">
            <div class="small-box bg-green">
                <div class="inner">
                    <h3>{{$experienced_agents}}</h3>

                    <p>Experienced Agents Hired</p>
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
                    <h3>{{$new_agents}}</h3>

                    <p>New Agents Hired</p>
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
    </div>
    <div class="row">
        <div class="col-md-4">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">
                        Latest Website Leads
                    </h3>
                </div>
                <div class="box-body no_overflow">
                    <div class="list-group">
                        @foreach($leads as $lead)

                            <a href="/admin/leads/{{$lead->id}}" class="list-group-item">
                                <h5 class="list-group-item-heading">
                                    {{ucwords($lead->first_name)}} {{ucwords($lead->last_name)}}
                                </h5>
                                <p class="list-group-item-text text-primary">
                                    {{$lead->updated_at->diffForHumans()}} - {{$lead->source}}
                                </p>
                            </a>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Users Activity</h3>
                </div>
                <div class="box-body no_overflow">
                    <div class="list-group">
                        @foreach($users as $user)
                            <a class="list-group-item" href="">
                                <h5 class="list-group-item-header">
                                    {{$user->first_name}} {{$user->last_name}}
                                </h5>
                                <p class="list-group-item-text">
                                    Calls: {{userActions('Call',$user->id)}} - Appointments: {{userActions('Appointment',$user->id)}} - Emails: {{userActions('Email',$user->id)}}
                                </p>
                            </a>
                            @endforeach
                    </div>
                </div>
            </div>
            {{--Users Box End--}}

        </div>

        <div class="col-md-4">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Overdue User Tasks</h3>
                </div>
                <div class="box-body no_overflow">
                    <div class="list-group">
                        @foreach($overdue_tasks as $overdue_task)
                            <a class="list-group-item" href="{{url('admin/recruiting')}}/{{$overdue_task->recruit->id}}">
                                <h5 class="list-group-item-heading">
                                    {{$overdue_task->name}} - {{$overdue_task->due_date->diffForHumans()}}
                                </h5>
                                <p class="list-group-item-text">
                                    {{$overdue_task->user->first_name}} {{$overdue_task->user->last_name}}
                                </p>
                            </a>
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection