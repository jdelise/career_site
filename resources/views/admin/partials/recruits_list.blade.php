<table class="table table-bordered">
    <thead>
    <th></th>
    <th>Last Name</th>
    <th>First Name</th>
    <th>Mls ID</th>
    <th>Office Id</th>
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
            <td>{{$recruit->mls_id}}</td>
            <td>{{$recruit->brokerage_code}}</td>
            <td>
                <a href="{{url("admin/recruiting/$recruit->id/edit")}}">
                    <i class="fa fa-edit"></i>
                </a>
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