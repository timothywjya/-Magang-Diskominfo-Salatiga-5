@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<h1 class="m-0 text-dark">Dashboard</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
            <h1>Selamat Datang Admin {{Auth::user()->Dinas['nama_dinas']}}</h1>
            </div>
        </div>
    </div>
</div>
@stop