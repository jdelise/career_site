@extends('admin')
@section('page_title','Task for - ' . $task->recruit->first_name . ' ' . $task->recruit->last_name)
    @stop
@section('content')
    <div class="row">
        <div class="col-md-6">
            <form action="{{url('admin/tasks/update')}}/{{$task->id}}" class="" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>

                    <div class="row">
                        <div class="col-md-12">

                            <div class="form-group">
                                <label for="activity_type">Task Type:</label>
                                <select name="name" class="form-control">
                                    <option value="">Please Choose...</option>
                                    @foreach($task_names as $task_name)
                                        <option value="{{$task_name->task_name}}" {{setSelected($task_name->task_name,$task->name)}}>{{$task_name->task_name}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="user_id">User Assigned:</label>
                                <select name="user_id" class="form-control">
                                    <option value="">Please Choose...</option>
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}" {{setSelected($user->id,$task->user_id)}}>{{$user->first_name}} {{$user->last_name}}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="margin-top:10px">

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="due_date">Due Date:</label>
                                    <div class="input-group date" id="datetimepicker1">
                                        <input type='text' class="form-control" name="due_date" value="{{$task->due_date->format('Y-m-d H:i:s')}}"/>
                                 <span class="input-group-addon">
                                 <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                                    </div>
                                </div>


                                {{-- <input type="text" class="form-control date-picker" name="due_date">--}}
                            </div>
                        {{--<div class="col-sm-6">
                            <label for="due_date">Due Date:</label>
                            <input type="text" class="form-control date-picker" name="due_date" value="{{$task->due_date->format('Y-m-d H:i:s')}}">
                        </div>--}}
                        <div class="col-sm-6">
                            <label for="completed">Completed?</label>

                            <div class="checkbox-list">
                                <!--   <label class="checkbox-inline">
                                <div class="checker" id="uniform-inlineCheckbox1"><span><input type="checkbox" id="inlineCheckbox1" value="no"></span></div>No</label> -->
                                <label class="checkbox-inline">
                                    <input type="radio" name="completed" id="inlineCheckbox2" value="1">Yes</label>
                                <label class="checkbox-inline">
                                    <input type="radio" name="completed" id="inlineCheckbox3" checked value="0">No</label>

                            </div>

                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px">
                        <div class="col-md-12">
                            <label for="note">Note:</label>
                            <textarea name="note" id="note" cols="30" rows="10" class="form-control">{{$task->note}}</textarea>
                        </div>
                    </div>


                <a href="{{url('admin/recruiting')}}/{{$task->recruit->id}}" class="btn btn-info">Cancel</a>
                    <input type="submit" value="Save" class="btn btn-primary pull-right">

            </form>
        </div>
    </div>
    @stop
