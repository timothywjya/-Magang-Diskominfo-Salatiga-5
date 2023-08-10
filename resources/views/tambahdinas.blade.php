@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<h1 class="m-0 text-dark">List Ruangan</h1>
@stop

@section('content')

<form action="{{route('dinascreate')}}" method="post">
    @csrf
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
               
                    <!-- <div class="form-group">
                        <label for="inputEmail3">KodeDinas</label>
                        
                            <input type="text" class="form-control" id="inputEmail3" name="KodeDinas" required="required" placeholder="Kode Dinas" value="">
                        
                    </div> -->
                    <div class="form-group">
                        <label for="exampleInputName">Nama Dinas</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputName" placeholder="Nama Dinas" name="NamaDinas" value="">
                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail">Alamat</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail" placeholder="Alamat Dinas" name="Alamat" value="">
                        @error('email') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="exampleInputName">User ID</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputName" placeholder="userid" name="NamaDinas" value="">
                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                </div>
            </div>
            @stop