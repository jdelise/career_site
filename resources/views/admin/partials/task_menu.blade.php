<li class="dropdown dropdown-extended dropdown-tasks" id="header_task_bar">
    <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
        @if($userTasks->count() != 0)
            <i class="icon-calendar"></i>
            <span class="badge badge-default">
						{{$userTasks->count()}} </span>
        @endif

    </a>
    <ul class="dropdown-menu extended tasks">
        <li class="external">
            <h3>You have <span class="bold">{{$userTasks->count()}} pending</span> tasks</h3>
            <a href="">view all</a>
        </li>
        @foreach($userTasks as $task)
            <li>
                <ul class="dropdown-menu-list scroller" style="height: 275px;" data-handle-color="#637283">
                    <li>
                        <a href="javascript:;">
										<span class="task">
										<span class="desc">{{$task->name}}</span>
										</span>
                            <span>
                                {{$task->due_date->diffForHumans()}}
                            </span>
                        </a>
                    </li>
                </ul>
            </li>
        @endforeach

    </ul>
</li>