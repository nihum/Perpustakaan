@extends('template')

@section('judul')
Riwayat Peminjaman Buku  
@stop

@section('ac-ang')
active
@stop


@section('content')

<div class="box">
    <div class="box-header">

    </div>
    <div class="box-body">
        <table id="data" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Nomor Pinjam</th>
                    <th>Judul</th>
                    <th>Tanggal Peminjaman Buku</th>
                </tr>
            </thead>
            <tbody>
                <!-- Menampilkan Data Pinjam -->
                @foreach($history as $rsHis)
                <tr>
                    <td>{{ $rsHis->nama }}</td>
                    <td>{{ $rsHis->no_pinjam }}</td>   
                    <td>{{ $rsHis->judul }}</td>
                    <td>{{ $rsHis->tgl_pinjam }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@stop
