@extends('reports.reports')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Closed Leads Report</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="table">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Lead Source</th>
                        <th>Lead Type</th>
                        <th>Count</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($leads as $lead)
                        <tr>
                            <td>{{ $lead->lead_source }}</td>
                            <td>{{ $lead->type }}</td>
                            <td>{{ $lead->count }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
    @stop