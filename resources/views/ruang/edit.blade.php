@extends('adminlte::page')
@section('title', 'Edit Ruangan')
@section('content_header')
<h1 class="m-0 text-dark">Edit Ruangan</h1>
@stop
@section('content')
<form action="{{route('ruang.update', $data)}}" method="post">
    @method('PUT')
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="form-group">
                        <label for="exampleInputName">Nama Ruangan</label>
                        <input type="text" class="form-control @error('nama_ruang') is-invalid @enderror" id="exampleInputName" placeholder="Nama Ruangan" name="nama_ruang" value="{{$data->nama_ruangan ?? old('nama_ruang')}}">
                        @error('nama_ruang') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Fasilitas</label>
                        <input type="text" class="form-control @error('fasilitas') is-invalid @enderror" id="exampleInputEmail" placeholder="Fasilitas" name="fasilitas" value="{{$data->fasilitas ?? old('fasilitas')}}">
                        @error('fasilitas') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputLevel">Kapasitas</label>
                        <input type="text" class="form-control @error('kapasitas') is-invalid @enderror" id="exampleInputLevel" placeholder="Kapasitas" name="kapasitas" value="{{$data->kapasitas ?? old('kapasitas')}}">
                        @error('kapasitas') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <a href="{{route('ruang.index')}}" class="btn btn-default">
                        Batal
                    </a>
                </div>
            </div>
        </div>
    </div>
    @stop