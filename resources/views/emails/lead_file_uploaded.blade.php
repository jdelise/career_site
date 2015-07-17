@extends('emails')
@section('content')

    <table class="row note">
        <tr>
            <td class="wrapper last">
                <h4 style="font-size: 22px;display: block;margin: 5px 0 15px 0;">Thank you {{--{{$first_name}}--}}</h4>
                <p>
                    Your file has been processed and is complete.
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