<div class="modal fade" id="add_task" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Add New Task</h4>
            </div>
            <form action="{{url('admin/task/create_task')}}" class="" method="post">
                <input type="hidden" name="_token" value="{{csrf_token()}}"/>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                               <div class="form-group">
                                   <label for="recruit_id">Recruit:</label>
                                   <input type="hidden" name="recruit_id" id="recruit_id" value="{{$recruit->id}}"/>
                                   <input type="text" class="form-control" value="{{$recruit->first_name}} {{$recruit->last_name}}">
                               </div>
                            <div class="form-group">
                                <label for="activity_type">Task Type:</label>
                                <select name="activity_type" class="form-control">
                                    <option value="">Please Choose...</option>
                                    @foreach($task_names as $task_name)
                                        <option value="{{$task_name->task_name}}">{{$task_name->task_name}}</option>
                                    @endforeach

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="user_id">User Assigned:</label>
                                <select name="user_id" class="form-control">
                                    <option value="">Please Choose...</option>
                                    @foreach($users as $user)
                                        <option value="{{$user->id}}" {{setSelected($user->id,Auth::user()->id)}}>{{$user->first_name}} {{$user->last_name}}</option>
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
                                    <input type='text' class="form-control" name="due_date"/>
                                 <span class="input-group-addon">
                                 <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                                </div>
                            </div>

                        </div>
                        <div class="col-sm-6">
                            <label for="completed">Completed?</label>

                            <div class="checkbox-list">
                                <!--   <label class="checkbox-inline">
                                <div class="checker" id="uniform-inlineCheckbox1"><span><input type="checkbox" id="inlineCheckbox1" value="no"></span></div>No</label> -->
                                <label class="checkbox-inline">
                                    <input type="radio" name="completed" id="inlineCheckbox2" value="1">Yes</label>
                                <label class="checkbox-inline">
                                    <input type="radio" name="completed" id="inlineCheckbox2" checked value="0">No</label>

                            </div>

                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px">
                        <div class="col-md-12">
                            <label for="note">Add note:</label>
                            <textarea name="note" id="note" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">

                    <div class="loading_ajax pull-left hide">

                        <img src="{{asset('global\img\loading-spinner-default.gif')}}"
                             alt="">
                    </div>
                    <button type="button" class="btn default" data-dismiss="modal">Close</button>
                    <input type="submit" value="Save" class="btn blue">
                </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>