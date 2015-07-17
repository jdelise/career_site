@extends('emails')
@section('content')

    <table class="row note">
        <tr>
            <td class="wrapper last">
                <table class="">
                    <tr>
                        <th>Lead Source</th>
                        <th>Lead Type</th>
                        <th>Totals</th>
                    </tr>
                    @foreach($leads as $lead)
                        <tr>
                            <td>{{ $lead->lead_source }}</td>
                            <td>{{ $lead->type }}</td>
                            <td>{{ $lead->count }}</td>
                        </tr>
                    @endforeach
                </table>
                <!-- END: Note Panel -->
            </td>
        </tr>
    </table>
@stop