@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
<h1 class="m-0 text-dark">Detail Ruangan {{$data[0]->NamaRuangan}}</h1>
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <p>fasilitas : </p>{{$data[0]->fasilitas}}
            </div>
            <div class="card-body">
                <p>kapasitas : </p>{{$data[0]->kapasitas}}
            </div>
        </div>
    </div>
</div>
<h1 class="m-0 text-dark">Data Pinjaman</h1>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="/" method="post">
                    {{ csrf_field() }}

                   
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Ruangan di Dinas</label>
                        <div class="col-sm-10">
                            <p>{{$data[0]->Dinas->nama_dinas}}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Ruangan</label>
                        <div class="col-sm-10">
                            <p>{{$data[0]->nama_ruangan}}</p>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Waktu Awal</label>
                        <div class="col-sm-10">
                            <input type="datetime-local" name="waktu_awal" id="date" class="form-control"
                                style="width: 100%; display: inline;" onchange="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Waktu Akhir</label>
                        <div class="col-sm-10">
                            <input type="datetime-local" name="waktu_akhir" id="date" class="form-control"
                                style="width: 100%; display: inline;" onchange="" >
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Peminjam</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail3" name="nama" required="required"
                                placeholder="Nama">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Asal Dinas</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control jumlah" id="inputEmail3" name="jumlah"
                                required="required" placeholder="Asal Dinas">
                        </div>
                    </div>


                    <div class="form-group row">
                        <div class="col-sm-10">
                            <input type="submit" class="btn btn-primary" value="Pinjam">

                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@stop