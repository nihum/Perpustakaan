@extends('template')

@section('judul')
Form Peminjaman
@stop

@section('ac-pin')
active
@stop

@section('content')

<div class="box">
    <div class="box-body">
    @if($anggota=="")
        <form id="frmPinjam" class="form-horizontal" action="{{ url('trans/peminjaman') }}" method="post">
        @csrf
            <div class="form-group">
                <label for="no_anggota" class="col-sm-12 control-label" style="text-align:center;">NO ANGGOTA</label>
                <div class="col-md-4"></div>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="no_anggota" name="no_anggota" >
                </div>
                <div class="col-md-4"></div>
            </div>
        </form>
    @else

        <form id="frmPinjam" class="form-horizontal" action="{{ url('trans/peminjaman/save') }}" method="post">
        @csrf
            <!--input no anggota-->
            <!-- <input type="hidden" class="form-control" id="kd_anggota" name="kd_anggota" value="{{ $anggota->kd_anggota }}"> -->
            <input type="hidden" class="form-control" id="no_anggota" name="no_anggota" value="{{ $anggota->no_anggota }}">
            <input type="hidden" name="nama" value="{{ $anggota->nama }}">  
            <div class="box-header">
                <h3 class="box-title">Data Peminjam</h3>
                <br/><br/>
                <b>{{ $anggota->nama }} {{ $anggota->no_anggota }}</b><br/>
                {{ $anggota->alamat." ".$anggota->kota }}<br/>
                Email : {{$anggota->email}}
            </div>
            <div class="box-header">
                <h3 class="box-title">Detail Peminjaman</h3>
                <div class="box-tools">
                <button type="button" class="btn btn-primary btn-flat" data-toggle="modal" data-target="#m-buku">Tambahkan Buku</button>
                </div>
            </div>
            <!-- Tabel List Buku Yang Dipinjam -->
            <table class="table table-hover" style="margin-top: 15px">
                <tbody id="lsBuku">
                    <tr style="background: #ccc;">
                        <th>#</th>
                        <th>No Induk Buku</th>
                        <th>Judul</th>
                        <th>Action</th>
                    </tr>
                </tbody>
            </table>
            <div class="box-footer">
                <button type="submit" class="btn btn-success btn-flat">SIMPAN</button>
                <a href="{{ url('trans/peminjaman') }}"><button type="button" class="btn btn-warning btn-flat">BATAL</button></a>
            </div>
        </form>
    @endif
    </div>
</div>

@if($buku!="")
<!--List Data Buku -->
<div class="modal modal-default fade" id="m-buku">
    <div class="modal-dialog modal-lg">
    <div class="modal-content">
        <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Data Buku</h4>
        </div>
        <div class="modal-body">
            <table id="data" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>No Induk</th>
                            <th>Judul</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>

                    <!--Menampilkan Data Anggota -->
                        @foreach($buku as $rsBuku)
                            <tr>
                                <td>{{ $rsBuku->kd_koleksi }}</td>
                                <td>{{ $rsBuku->no_induk_buku }}</td>
                                <td>{{ $rsBuku->judul }}</td>
                                <td>
                                    <button class="btn btn-primary btn-xs btn-flat" onclick="add_buku('{{ $rsBuku->no_induk_buku }}','{{ $rsBuku->judul }}')" data-dismiss="modal">PILIH</button>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
            </table>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-warning pull-left" data-dismiss="modal">Close</button>
        </div>
    </div>
    <!-- /.modal-content -->

    </div>
</div>
@endif
@stop

