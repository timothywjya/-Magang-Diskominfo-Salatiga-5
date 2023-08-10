@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<h1 class="m-0 text-dark">List Ruangan</h1>
@stop

@section('content')

<form action="{{route('ruangancreate')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
               
                    <!-- <div class="form-group">
                        <label for="inputEmail3">KodeRuangan</label>
                        
                            <input type="text" class="form-control" id="inputEmail3" name="KodeRuangan" required="required" placeholder="Kode Ruangan" value="">
                        
                    </div> -->
                    <div class="form-group">
                        <label for="exampleInputName">NamaRuangan</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputName" placeholder="Nama Ruangan" name="NamaRuangan" value="">
                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Fasilitas</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail" placeholder="Fasilitas" name="Fasilitas" value="">
                        @error('email') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3">Kapasitas</label>
                        
                            <input type="text" class="form-control" id="inputEmail3" name="Kapasitas" required="required" placeholder="Kapasitas" value="">
                        
                    </div>
                    <input type="hidden" name="KodeDinas" Value="{{$ids}}">
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
            @stop