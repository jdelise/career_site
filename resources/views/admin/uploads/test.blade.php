@extends('admin')
@section('content')
    <h2>Import All Leads</h2>
    <form action="{{url('admin/leadrouter/import')}}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="file" name="file"/>
        <input type="submit" value="submit"/>
    </form>
    <h2>Import Closed Leads</h2>
    <form action="{{url('uploads')}}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="file" name="file"/>
        <input type="submit" value="submit"/>
    </form>
    <hr/>
    <h2>Import Pendig Leads</h2>
    <form action="{{url('admin/uploads/import_pendings')}}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="file" name="file"/>
        <input type="submit" value="submit"/>
    </form>
    <h2>Import Appointments</h2>
    <form action="{{url('admin/uploads/import_appointments')}}" method="post" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <input type="file" name="file"/>
        <input type="submit" value="submit"/>
    </form>
@endsection