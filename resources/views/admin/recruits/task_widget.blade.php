<div class="box tasks-widget">
    <div class="box-header">
        <h3 class="box-title">{{$tasks->count()}} pending</h3>
        <div class="actions pull-right">
            <a href="#add_task" class="btn btn-circle btn-default" data-toggle="modal">
                <i class="fa fa-plus"></i> Add </a>
        </div>
    </div>
    <div class="box-body">
        <div class="task-content">
            <div class="scroller" style="height: 150px;"
                 data-always-visible="1" data-rail-visible1="0"
                 data-handle-color="#D7DCE2">
                <!-- START TASK LIST -->
                <ul class="task-list">

                    @foreach ($tasks as $task)
                        @if($task->user_id == Auth::user()->id or Auth::user()->id == 1)
                            <li class="clearfix">
                                <div class="task-title">
                            <span class="task-title-sp">
                                {{$task->name}}
                            </span>
                            <span class="task-bell">
                                <i class="fa fa-bell-o"></i>
                                {{$task->due_date->diffForHumans()}}
                            </span>
                                    <div class="task-config pull-right">
                                        <div class="task-config-btn btn-group">
                                            <a class="btn btn-xs default"
                                               href="#"
                                               data-toggle="dropdown"
                                               data-hover="dropdown"
                                               data-close-others="true">
                                                <i class="fa fa-cog"></i><i
                                                        class="fa fa-angle-down"></i>
                                            </a>
                                            <ul class="dropdown-menu pull-right">
                                                <li>
                                                    <a href="{{url('admin/task/add_to_outlook')}}?task_id={{$task->id}}" target="_blank">Add to Outlook</a>
                                                </li>
                                                <li>
                                                    <a href="{{url('admin/complete_task')}}?task_id={{$task->id}}&recruit_id={{$recruit->id}}">
                                                        <i class="fa fa-check"></i>
                                                        Complete </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-pencil"></i>
                                                        Edit </a>
                                                </li>
                                                <li>
                                                    <a href="#">
                                                        <i class="fa fa-trash-o"></i>
                                                        Cancel </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </li>
                        @endif

                    @endforeach

                </ul>
                <!-- END START TASK LIST -->
            </div>
        </div>
        <div class="task-footer">

        </div>
    </div>
</div>