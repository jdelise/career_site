@extends('emails')
@section('content')

    <table class="row note">
        <tr>
            <td class="wrapper last">
                <h4 style="font-size: 22px;display: block;margin: 5px 0 15px 0;">A recruit has been assigned to you.</h4>
                <p>
                    Recruit Name: {{$recruit->first_name}} {{$recruit->last_name}}
                </p>
                <p>
                    Recruit Email:  {{$recruit->email}}
                </p>
                <p>
                    Recruit Phone: {{$recruit->phone}}
                </p>
                <p>
                    <a href="{{url('admin/recruiting')}}/{{$recruit->id}}">You can view full details here.</a>
                </p>
                <!-- BEGIN: Note Panel -->
                <table class="twelve columns" style="margin-bottom: 10px">
                    <tr>

                    </tr>
                </table>
                <!-- END: Note Panel -->
            </td>
        </tr>
    </table>
@stop