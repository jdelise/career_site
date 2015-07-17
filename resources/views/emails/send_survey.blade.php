@extends('emails')
@section('content')

    <table class="row note">
        <tr>
            <td class="wrapper last">
                <h4 style="font-size: 22px;display: block;margin: 5px 0 15px 0;">{{$user}}, please click the link below to fill out the survey from your meeting.</h4>
                <a href="{{url('admin/complete_survey_request')}}/{{$survey_id}}">Complete the survey now.</a>
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