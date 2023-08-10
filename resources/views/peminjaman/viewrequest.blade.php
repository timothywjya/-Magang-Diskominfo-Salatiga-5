<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css">
@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
@stop

@section('content')

<h1 class="m-0 text-dark">Data Pinjaman</h1>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Aksi</th>
                                    <th>Peminjam</th>
                                    <th>Asal Dinas</th>
                                    <th>Nama Ruangan</th>
                                    <th>Waktu Awal</th>
                                    <th>Waktu Akhir</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $d)
                                <tr>
                                    <td>
                                        <a href="{{ route('KonfirmasiPinjaman', ['id' => $d->id]) }}" class="btn btn-primary btn-xs">
                                            PROSES
                                        </a>
                                    </td>
                                    <td>{{$d->nama_peminjam}}</td>
                                    <td>{{$d->Dinas->nama_dinas}}</td>
                                    <td>{{$d->Ruangan->nama_ruangan}}</td>
                                    <td>{{($d->waktu_awal)->isoFormat('D MMMM Y HH:mm');}}</td>
                                    <td>{{($d->waktu_akhir)->isoFormat('D MMMM Y HH:mm');}}</td>
                                    <td><?php if ($d->status == "terima") {
                                    echo "<span class='badge badge-success'>{$d->status}</span>";
                                    } elseif ($d->status == "tolak") {
                                    echo "<span class='badge badge-danger'>{$d->status}</span>";
                                    } else {
                                    echo "<span class='badge badge-warning'>{$d->status}</span>";
                                    }
                                ?></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@stop
@push('js')
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>

<script>
$(function() {
    $("#example1").DataTable({
        "responsive": true,
        "lengthChange": false,
        "autoWidth": false,
    });
});
</script>
@endpush