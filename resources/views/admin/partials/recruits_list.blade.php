<table class="table table-bordered">
    <thead>
    <th></th>
    <th>Last Name</th>
    <th>First Name</th>
    <th>Status</th>
    <th>Assigned To</th>
    <th>Synced?</th>
    <th></th>
    </thead>
    <tbody>
    @foreach($recruits as $recruit)
        <tr>
            <td>
                @if ($recruit->profile_img == '')
                @else
                    <img src="{{$recruit->profile_img}}?w=30&h=30&fit=crop" class="img-circle" alt="">
                @endif
            </td>
            <td>{{$recruit->last_name}}</td>
            <td>{{$recruit->first_name}}</td>
            <td>{{$recruit->status}}</td>
            <td>{{$recruit->user->first_name}} {{$recruit->user->last_name}}</td>
            <td>{{changeBoolean($recruit->synced)}}</td>
            <td>
                <a href="{{url("admin/recruiting/$recruit->id")}}">
                    <i class="fa fa-user"></i>
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
    <tfoot>
    <tr>
        <td colspan="4">

        </td>
    </tr>
    </tfoot>
</table>