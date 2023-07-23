@extends('adminlte::page')

@section('title', 'پایان نامه')

@section('content_header')
    <h1>مدیریت پایان نامه ها</h1>
@stop

@section('content')
    @livewire('admin.manage-thesis')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link rel="stylesheet" href="{{asset('persiandate/css/persian-datepicker.css')}}"/>
@stop

@section('js')
    <script src="{{asset('persiandate/js/jquery-2.2.4.min.js')}}"></script>
    <script src="{{asset('persiandate/js/persian-datepicker.js')}}"></script>
    <script src="{{asset('persiandate/js/persian-date.js')}}"></script>
    @stack('scripts')
@stop
