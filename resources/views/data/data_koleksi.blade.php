@extends('template')

@section('judul')
Data Koleksi Buku
@stop

@section('ac-buku')
active
@stop

@section('content')

<div class="box">
    <div class="box-header">
    <a href="{{ url('koleksi/add') }}" target="_BLANK"><button type="button" class="btn btn-green btn-flat">Tambah</button></a>
    <a href="{{ url('rpt/qrcode_buku') }}" targen="blank"><button type="button" class="btn btn-green btn-flat"><i class="fa fa-qrcode" ></i> Print QR Code</button></a>
    </div>
    <div class="box-body">
        <table id="data" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>No Induk</th>
                    <th>Judul</th>
                    <th>Tanggal</th>
                    <th>Akses</th>
                    <th>Rak</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <!-- Menampilkan Data Anggota -->
                @foreach($koleksi as $rsKoleksi)
                <tr>
                    <td>{{ $rsKoleksi->kd_koleksi }}</td>
                    <td>{{ $rsKoleksi->no_induk_buku }}</td>                    
                    <td>{{ $rsKoleksi->judul }}</td>
                    <td>{{ $rsKoleksi->tgl_pengadaan }}</td>
                    <td>{{ $rsKoleksi->akses }}</td>
                    <td>{{ $rsKoleksi->nama_rak }}</td>
                    <td>{{ ($rsKoleksi->status==0 ? "Tersedia" : ($rsKoleksi->status==1 ? "Dipinjam" : ($rsKoleksi->status==2 ? "Rusak" : "Hilang"))) }}</td>
                    <td>
                        <a href="{{ url('koleksi/edit',$rsKoleksi->kd_koleksi) }}"><button type="button" class="btn bg-yellow btn-flat"><i class="fa fa-pencil"></i></button></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@stop
