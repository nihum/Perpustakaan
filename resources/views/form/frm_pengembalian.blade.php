@extends('template')

@section('judul')
Form Pengembalian
@stop

@section('ac-pin')
active
@stop

@section('content')

<!-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif -->

<div class="box">
    <div class="box-body">
    @if($pinjam=="")
        <form id="frmKembali" class="form-horizontal" action="{{ url('trans/pengembalian') }}" method="post">
        @csrf
            <div class="form-group">
                <label for="no_pinjam" class="col-sm-12 control-label" style="text-align:center;">NO PINJAM</label>
                <div class="col-md-4"></div>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="no_pinjam" name="no_pinjam" >
                </div>
                <div class="col-md-4"></div>
            </div>
        </form>
    @else

        <form id="frmPinjam" class="form-horizontal" action="{{ url('trans/pengembalian/save') }}" method="post">
        @csrf
            <!--input no pinjam-->
            <input type="hidden" class="form-control" id="no_pinjam" name="no_pinjam" value="{{ $pinjam[0]->no_pinjam }}"> 
            <div class="box-header">
                <h3 class="box-title">#{{ $pinjam[0]->no_pinjam }}</h3>
                <br/><br/>
                No Anggota : <strong>{{$pinjam[0]->no_anggota}}</strong><br/>
                Nama       : {{$pinjam[0]->nama}}
            </div>

            <div class="box-header">
                <h3 class="box-title">Detail Peminjaman</h3>
            </div>
            <!-- Tabel List Buku Yang Dipinjam -->
            <table class="table table-hover" style="margin-top: 15px">
                <tbody id="lsBuku">
                    <tr style="background: #ccc;">
                        <th width="15%">No Induk Buku</th>
                        <th>Judul</th>
                        <th width="5%">Telat</th>
                        <th width="5%">Denda</th>
                    </tr>
                    @foreach($pinjam as $rsPinjam)
                    <tr>
                        <th width="10%">
                        {{ $rsPinjam->no_induk_buku }}
                        <input type="hidden" name="no_induk[]" value="{{ $rsPinjam->no_induk_buku }}">
                        </th>
                        <th>{{ $rsPinjam->judul }}</th>
                        <th width="8%">
                        <!--menghitung selisih hari -->
                        @php
                            $kembali = new DateTime
                            ($rsPinjam->tgl_kembali);
                            $hariini = new DateTime;
                            $selisih =$kembali->diff($hariini);
                            $lamadenda = 0;
                            if($hariini>$kembali){
                                $lamadenda = $selisih->d;
                            }
                            echo $lamadenda;
                        @endphp
                        Hari
                        </th>
                        <th width="8%">
                            {{ $lamadenda * 2000}}
                            <input type="hidden" name="denda" value="{{ $selisih->d * 2000 }}">
                        </th>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="box-footer">
                <button type="submit" class="btn btn-success btn-flat">SIMPAN</button>
                <a href="{{ url('trans/pengembalian') }}"><button type="button" class="btn btn-warning btn-flat">BATAL</button></a>
            </div>
        </form>
    @endif
    </div>
</div>


@stop

