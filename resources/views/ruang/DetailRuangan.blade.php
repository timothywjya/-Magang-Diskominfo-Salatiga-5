@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')

@stop

@section('content')
<style>
.center {
    text-align: center;
    font-size: large;
}
</style>
<h1 class="m-0 text-dark">Detail Ruangan {{$data[0]->nama_ruangan}}</h1>
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
<div class="center">
    <span class="badge badge-danger">{!! session()->get('error') !!}</span>
    <span class="badge badge-success">{!! session()->get('success') !!}</span>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <form action="{{route('simpanpinjaman')}}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Ruangan di Dinas</label>
                        <div class="col-sm-10">
                            <p name="dinas_awal">{{$data[0]->Dinas->nama_dinas}}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Ruangan</label>
                        <div class="col-sm-10">
                            <p name="nama_ruangan">{{$data[0]->nama_ruangan}}</p>
                        </div>
                    </div>
                    <input type="hidden" name="user_gmail" value="{{$data3[0]->gmail}}">
                    <input type="hidden" name="dinas_dipinjam_id" value="{{$data[0]->Dinas->id}}">
                    <input type="hidden" name="ruangan_id" value="{{$data[0]->id}}">
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
                            <input type="datetime-local" name="waktu_akhir" id="date2" class="form-control"
                                style="width: 100%; display: inline;" onchange="">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Keperluan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="inputEmail3" name="keperluan"
                                required="required" placeholder="keperluan">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Nama Peminjam</label>
                        <div class="col-sm-10">
                            <input type="hidden" class="form-control" id="inputEmail3" name="nama" required="required"
                                value="{{Auth::user()->name}}" placeholder="Nama">
                                <p name="dinas_awal">{{Auth::user()->name}}</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">NoHp</label>
                        <div class="col-sm-10">
                            <input type="number" maxlength="13" minlength="8" class="form-control" id="inputEmail3" name="no_hp" required="required"
                                placeholder="NoHp">
                        </div>
                    </div>
                    <input type="hidden" name="dinas_id" value="{{Auth::user()->Dinas->id}}">
                    <div class="form-group row">
                        <label for="inputEmail3" class="col-sm-2 col-form-label">Asal Dinas</label>
                        <div class="col-sm-10">
                        <p name="dinas_awal">{{Auth::user()->Dinas->nama_dinas}}</p>
                            <input type="hidden" class="form-control jumlah" id="inputEmail3" name="jumlah"
                                value="{{Auth::user()->Dinas->nama_dinas}}" required="required"
                                placeholder="Asal Dinas">
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
@push('js')
<script>
var now = new Date();
now.setMinutes(now.getMinutes() - now.getTimezoneOffset());
document.getElementById('date').value = now.toISOString().slice(0, 16);
document.getElementById('date2').value = now.toISOString().slice(0, 16);

var today = new Date().toISOString().slice(0, 16);
document.getElementsByName("waktu_awal")[0].min = today;
document.getElementsByName("waktu_akhir")[0].min = today;
</script>
@endpush