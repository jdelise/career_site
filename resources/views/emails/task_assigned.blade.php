@extends('emails')
@section('content')

    <table class="row note">
        <tr>
            <td class="wrapper last">
                <h4 style="font-size: 22px;display: block;margin: 5px 0 15px 0;">A new task has been assigned to you.</h4>
                <p>
                    Task Name: {{$task->name}}
                </p>
                <p>
                    Due Date: {{$task->due_date->diffForHumans()}}
                </p>
                <p>
                    Notes: {{$task->note}}
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