@extends('adminlte::page')
@section('title', 'Edit Dinas')
@section('content_header')
<h1 class="m-0 text-dark">Edit Dinas</h1>
@stop
@section('content')
<form action="{{route('dinas.update', $data)}}" method="post">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputName">Nama Dinas</label>
                        <input type="text" class="form-control @error('nama_dinas') is-invalid @enderror" id="exampleInputName" placeholder="Nama Dinas" name="nama_dinas" value="{{$data->nama_dinas ?? old('nama_dinas')}}">
                        @error('nama_ruang') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Alamat</label>
                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="exampleInputEmail" placeholder="Alamat" name="alamat" value="{{$data->alamat ?? old('alamat')}}">
                        @error('fasilitas') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('dinas.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
    @stop