@extends('admin')
@section('page_title','All Recruits')
@section('content')
    <div class="row">

        <div class="col-sm-12">
            <div class="box">
                <div class="box-header">
                   <div class="pull-left" style="margin: 20px 0;margin-right: 20px">
                       <div class="btn-group">
                      {{--     <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                               Action <span class="caret"></span>
                           </button>
                           <ul class="dropdown-menu">
                               <li><a href="#">Action</a></li>
                               <li><a href="#">Another action</a></li>
                               <li><a href="#">Something else here</a></li>
                               <li role="separator" class="divider"></li>
                               <li><a href="#">Separated link</a></li>
                           </ul>
                       </div>--}}
                   </div>
                    <div class="pull-right" >

                        <?php echo $recruits->render(); ?>
                    </div>
                    <div class="pull-right" style="margin: 20px 0;margin-right: 20px">
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Sort By <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <li><a href="{{url('admin/recruiting/all_recruits')}}?sort_by=created_at">Most Recent</a></li>
                                <li><a href="{{url('admin/recruiting/all_recruits')}}?sort_by=created_at&order=desc">Least Recent</a></li>
                                <li><a href="{{url('admin/recruiting/all_recruits')}}?sort_by=first_name">First Name</a></li>
                                <li><a href="{{url('admin/recruiting/all_recruits')}}?sort_by=first_name&order=desc">First Name Z - A</a></li>
                                <li><a href="{{url('admin/recruiting/all_recruits')}}?sort_by=last_name">Last Name</a></li>
                                <li><a href="{{url('admin/recruiting/all_recruits')}}?sort_by=last_name&order=desc">Last Name Z - A</a></li>
                                <li><a href="{{url('admin/recruiting/all_recruits')}}?sort_by=status">Status</a></li>
                                <li><a href="{{url('admin/recruiting/all_recruits')}}?sort_by=status&order=desc">Status Z - A</a></li>
                                <li><a href="{{url('admin/recruiting/all_recruits')}}?sort_by=synced">Synced</a></li>
                                <li><a href="{{url('admin/recruiting/all_recruits')}}?sort_by=synced&order=desc">Status Z - A</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="box-body">
                   @include('admin.partials.recruits_list')
                </div>
            </div>
        </div>
    </div>

@stop