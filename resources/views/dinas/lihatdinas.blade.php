@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<h1 class="m-0 text-dark">List Ruangan</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <a href="{{ route('tambahdinas') }}" class="btn btn-block btn-primary">Tambah Data Dinas</a>
        </div>
    </div>


    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="container-fluid">
                    <div class="row">
                        @foreach($data as $d)
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <p>{{ $d->nama_dinas }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop