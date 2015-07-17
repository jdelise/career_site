<li class="dropdown notifications-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
        @if($userTasks->count() != 0)
            <i class="fa fa-bell-o"></i>
            <span class="label label-warning">{{$userTasks->count()}}</span>
        @endif

    </a>
    <ul class="dropdown-menu">
        <li class="header">You have {{$userTasks->count()}} notifications</li>
        <li>
            <!-- inner menu: contains the actual data -->
            <ul class="menu">
                @foreach($userTasks as $task)
                    <li>
                        <a href="{{url('admin/recruiting')}}/{{$task->recruit->id}}">
                            {{$task->name}} - {{$task->due_date->diffForHumans()}}
                        </a>
                    </li>
                @endforeach
            </ul>
        </li>
        <li class="footer"><a href="#">View all</a></li>
    </ul>
</li>