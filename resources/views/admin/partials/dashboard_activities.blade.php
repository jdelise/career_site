<table class="table table-bordered">
    <tbody>
    @foreach($recruits as $recruit)
        <tr>
            <td>
                @if ($recruit->profile_img == '')
                @else
                    <img src="{{$recruit->profile_img}}?w=30&h=30&fit=crop" class="img-circle" alt="">

                @endif
                    <a href="{{url("admin/recruiting/$recruit->id")}}">{{$recruit->first_name}} {{$recruit->last_name}}</a>
            </td>
           <td>
               <a href="mailto:{{$recruit->email}}">{{$recruit->email}}</a>
           </td>

            <td>{{$recruit->updated_at->diffForHumans()}}</td>

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