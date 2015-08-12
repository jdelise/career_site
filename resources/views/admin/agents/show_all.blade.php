@extends('admin')
@section('page_title','Show Agents')
    @stop
@section('content')
    <div class="box">
        <div class="box-header"></div>
        <div class="box-body no_overflow">
            <div class="list-group">
                @foreach($agents as $agent)
                    <a class="list-group-item" href="/admin/agents/show-agent/{{$agent->id}}">
                        <h4 class="list-group-item-header">
                            {{$agent->last_name}}, {{$agent->first_name}}
                        </h4>
                    </a>
                    @endforeach
            </div>
        </div>
    </div>
    @stop