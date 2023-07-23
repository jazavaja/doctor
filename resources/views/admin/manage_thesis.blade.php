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
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
