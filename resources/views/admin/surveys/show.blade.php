@extends('admin')
@section('page_title','Survey')
    @stop
@section('content')
    @foreach($survey as $key => $value)
        {{$key}} - {{$value}} <br/>
    @endforeach
    @stop