@extends('admin')
@section('content')
    <div class="row">
        <div class="col-sm-6">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Surveys Not Complete</h3>
                </div>
                <div class="box-body">
                    <div class="list-group">
                        @foreach($surveys['not_completed'] as $not_completed)
                            <div class="list-group-item">
                                <h5 class="list-group-item-header">
                                    {{$not_completed->recruit->first_name}} {{$not_completed->recruit->last_name}}
                                </h5>

                                <p class="list-group-item-text clearfix">
                                    <span class="pull-left">
                                        Sent {{$not_completed->created_at->diffForHumans()}}
                                    </span>

                                    <a href="/admin/survey/resend/{{$not_completed->id}}" class="btn btn-primary pull-right">Resend Survey</a>
                                </p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6"></div>
    </div>
@stop