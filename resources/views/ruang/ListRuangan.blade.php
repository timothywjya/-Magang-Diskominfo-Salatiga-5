@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
@stop

@section('content')
<div class="row">
    <style>
    p {
        text-align: center;
    }
    </style>
    <div class="col-12">
        <div class="card">
    <a href="{{route('ruang.create')}}" class="btn btn-block btn-primary">Tambah Data Ruangan</a>
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
                                    <p>{{ $d->nama_ruangan }}</p>
                                </div>
                                <a href="{{ route('detail', ['id' => $d->id]) }}" class="small-box-footer">Lihat Detail Ruangan  <i class="fas fa-arrow-circle-right"></i></a>
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