@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
@stop

@section('content')

<h1 class="m-0 text-dark">Data Pinjaman</h1>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                
                <form action="{{ url('KonfirmasiStore', $data[0]->id) }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">

                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Peminjam</label>
                                        <div class="col-sm-10">
                                            <div class="col-sm-10">
                                                <p name="dinas_awal">{{$data[0]->nama_peminjam}}</p>
                                            </div>
                                            <input type="hidden" class="form-control" id="inputEmail3" name="nama_peminjam"
                                                required="required" value="{{$data[0]->nama_peminjam}} {{old('nama_peminjam')}}"
                                                placeholder="Nama">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Asal Dinas</label>
                                        <div class="col-sm-10">
                                            <div class="col-sm-10">
                                                <p name="dinas_awal">{{$data[0]->Dinas->nama_dinas}}</p>
                                            </div>
                                            <input type="hidden" class="form-control" id="inputEmail3" name="nama"
                                                required="required" value="{{$data[0]->Dinas->nama_dinas}}"
                                                placeholder="Nama">
                                        </div>
                                    </div>
                                    <input type="hidden" name="user_gmail" value="{{$data1[0]->gmail}}">
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">No Hp</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputEmail3" name="no_hp"
                                                required="required" value="{{$data[0]->no_hp}} {{old('no_hp')}}" placeholder="Nama">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Keperluan</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputEmail3" name="keperluan"
                                                required="required" value="{{$data[0]->keperluan}} {{old('keperluan')}}" placeholder="Nama">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Waktu Awal</label>
                                        <div class="col-sm-10">
                                            <div class="col-sm-10">
                                                <p name="dinas_awal">{{($data[0]->waktu_awal)->isoFormat('D MMMM Y HH:mm')}}</p>
                                            </div>
                                            <input type="hidden" name="waktu_awal" id="date" class="form-control"
                                                style="width: 100%; display: inline;"
                                                value="{{($data[0]->waktu_awal)->isoFormat('D MMMM Y HH:mm');}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Waktu Akhir</label>
                                        <div class="col-sm-10">
                                            <div class="col-sm-10">
                                                <p name="dinas_awal">{{($data[0]->waktu_akhir)->isoFormat('D MMMM Y HH:mm')}}</p>
                                            </div>
                                            <input type="hidden" name="waktu_akhir" id="date2" class="form-control"
                                                style="width: 100%; display: inline;"
                                                value="{{($data[0]->waktu_akhir)->isoFormat('D MMMM Y HH:mm');}}">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-2 col-form-label">Status</label>
                                        <div class="col-sm-10">
                                            <select id="status" name="status">
                                                <option value="<?php echo $data[0]->status;?>" hidden>
                                                    <?php echo ucwords($data[0]->status); ?></option>
                                                <option value="terima">terima</option>
                                                <option value="tolak">tolak</option>
                                                <option value="pending">pending</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-10">
                                            <input type="submit" class="btn btn-primary" value="Konfirmasi">

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>

        @stop