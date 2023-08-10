@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
@stop

@section('content')
<div class="row">
<a href="/tambahruangan/{{$data[0]->Dinas->id}}" class="btn mr-2">Tambah Data Ruangan</a>
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <!DOCTYPE html>
                <html lang="en">

                <head>
                    <meta charset="UTF-8">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <link rel="stylesheet" type="text/css" href="{{ asset('/css/style.css') }}">
                </head>

                <body>
                
                    <div class="row">
                        @foreach($data as $d)
                        <div class="col-3">
                            <div class="produk">
                                <p>{{ $d->nama_ruangan }}</p>
                                <a href="/detail/{{ $d['id'] }}" class="btn mr-2">Lihat Detail Ruangan</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </body>

                </html>
            </div>
        </div>
    </div>
</div>
@stop