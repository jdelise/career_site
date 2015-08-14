@extends('admin')
@section('page_title','Search Results')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="box">
                    <div class="box-header">
                    </div>
                    <div class="box-body">
                        @include('admin.partials.recruits_list')
                    </div>
                </div>
            </div>
        </div>
    </div>

@stop