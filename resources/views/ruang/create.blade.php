@extends('adminlte::page')
@section('title', 'Tambah Ruangan')
@section('content_header')
<h1 class="m-0 text-dark">Tambah Ruangan</h1>
@stop
@section('content')
<form action="{{route('ruang.store')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                     <div class="form-group">
                        <label for="exampleInputDinas">Dinas</label>
                        <br>
                        <select name="dinas_id" id="dinas_id">
                            @foreach($data_dinas as $d => $datas_dinas)
                                <option value="{{$datas_dinas->id}}" disabled {{$datas_dinas->id == Auth::user()->dinas_id ? 'selected readonly':''}}>{{$datas_dinas->nama_dinas}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">Nama Ruangan</label>
                        <input type="text" class="form-control @error('nama_ruang') is-invalid @enderror" id="exampleInputName" placeholder="Nama Ruangan" name="nama_ruang" value="{{old('nama_ruang')}}">
                        @error('nama_ruang') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Fasilitas</label>
                        <input type="text" class="form-control @error('fasilitas') is-invalid @enderror" id="exampleInputEmail" placeholder="Fasilitas" name="fasilitas" value="{{old('fasilitas')}}">
                        @error('fasilitas') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputLevel">Kapasitas</label>
                        <input type="text" class="form-control @error('kapasitas') is-invalid @enderror" id="exampleInputLevel" placeholder="Kapasitas" name="kapasitas" value="{{old('kapasitas')}}">
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