@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<h1 class="m-0 text-dark">List Ruangan</h1>
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
            <div class="card-body">
                <div class="container-fluid">
                    <div class="row">
                        @foreach($data as $d)
                        <div class="col-lg-3 col-6">
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <p>{{ $d->nama_dinas }}</p>
                                </div>
                                @foreach($d->Ruangan as $e)
                                <a href="{{route('detail', ['id' => $e->id])}}" class="small-box-footer">{{$e->nama_ruangan}}  <i class="fas fa-arrow-circle-right"></i></a>
                                @endforeach
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
