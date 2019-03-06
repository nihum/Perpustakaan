@extends('template')

@section('judul')
Data Peminjam Yang Belum Mengembalikan Buku
@stop

@section('ac-pin')
active
@stop


@section('content')

<div class="box">
    <div class="box-header">
    <a href="{{ url('rpt/pinjam') }}" targen="blank"><button type="button" class="btn btn-green btn-flat"><i class="fa fa-print" ></i> Print PDF</button></a>
    </div>
    <div class="box-body">
        <table id="data" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No Pinjam</th>
                    <th>Tanggal Buku Kembali</th>
                    <th>Judul</th>
                    <th>Nama Peminjam</th>
                </tr>
            </thead>
            <tbody>
                <!-- Menampilkan Data Pinjam -->
                @foreach($pinjam as $rsPin)
                <tr>
                    <td>{{ $rsPin->no_pinjam }}</td>
                    <td>{{ $rsPin->tgl_kembali }}</td>   
                    <td>{{ $rsPin->judul }}</td>
                    <td>{{ $rsPin->nama }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@stop
