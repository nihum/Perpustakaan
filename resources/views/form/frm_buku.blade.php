@extends('template')

@section('judul')
Form Buku
@stop

@section('ac-buku')
active
@stop

@section('content')

@if (count($errors) > 0 )
<div class="alert alert-danger">
    <ul>
        @foreach($errors->all() as $error )
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form id="frmbuku" class="form-horizontal" action="{{ url('buku/save') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="fFoto col-md-3">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Foto</h3>
                </div>
                <div class="box-body">
                    @if($buku['cover'])
                        <img id="avatar" src="{{ asset('img/'.$buku['cover']) }}" style="width:100%;border: 2px solid #ccc;">
                    @else
                        <img id="avatar" src="{{ asset('img/no-photo.jpg') }}" style="width:100%;border: 2px solid #ccc;">
                    @endif
                    <input id="file" type="file" name="foto" style="display: none">
                    <input type="hidden" name="old_foto" value="{{ $buku['cover'] }}">

                </div>
            </div>

        </div>
        <div class="fForm col-md-9">
            <div class="box">
                <!--frm buku -->
                <div class="box-header with-border">
                    <h3 class="box-title">Data Buku</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="nama" class="col-sm-2 control-label">Judul buku</label>
                        <div class="col-sm-10">
                            <input type="hidden" class="form-control" name="kd_buku" value="{{ $buku['kd_buku'] }}">
                            <input type="text" class="form-control" id="judul" placeholder="judul buku" name="judul" value="{{ $buku['judul'] }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="pengarang" class="col-sm-2 control-label"><a href="{{ url('/pengarang') }}" target="_BLANK">Pengarang <i class="fa fa-pencil"></i></a></label>
                        <div class="col-sm-10">
                                <select class="form-control" name="pengarang" value="{{ $buku['kd_pengarang'] }}">
                                    <option  value="" >- Pilih Pengarang -</option>
                                    @foreach($pengarang as $rsPeng)
                                    <option {{ $buku['kd_pengarang']==$rsPeng['kd_pengarang'] ? 'selected' : "" }} value="{{ $rsPeng['kd_pengarang'] }}">{{ $rsPeng['nama_pengarang'] }}</option>
                                    @endforeach                             
                                </select>
                        </div>
                    </div> 
                    <div class="form-group">
                        <label for="penerbit" class="col-sm-2 control-label"><a href="{{ url('/penerbit') }}" target="_BLANK">Penerbit <i class="fa fa-print"></i></a></label>
                        <div class="col-sm-10">
                            <select class="form-control" name="penerbit" value="{{ $buku['kd_penerbit'] }}">
                                <option  value="" >- Pilih Penerbit -</option>
                                @foreach($penerbit as $rsPen)
                                <option {{ $buku['kd_penerbit']==$rsPen['kd_penerbit'] ? 'selected' : "" }} value="{{ $rsPen['kd_penerbit'] }}">{{ $rsPen['nama_penerbit'] }}</option>   
                                @endforeach                             
                            </select>
                        </div>
                    </div> 
                    <div class="form-group">
                        <label for="tempat" class="col-sm-2 control-label">Tempat / Tahun Terbit</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="tempat" placeholder="Tempat Terbit" name="tempat_terbit" value="{{ $buku['tempat_terbit'] }}">
                        </div>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="tahun" placeholder="Tahun Terbit" name="tahun_terbit" value="{{ $buku['tahun_terbit'] }}">
                        </div>
                    </div>
                   <div class="form-group">
                        <label for="kategori" class="col-sm-2 control-label"> <a href="{{ url('/kategori') }}" target="_BLANK">Kategori <i class="fa fa-tag"></i> </a></label>
                        <div class="col-sm-10">
                            <select class="form-control" name="kategori" value="{{ $buku['kd_kategori'] }}">
                                <option value="">- Pilih Kategori -</option>
                                @foreach($kategori as $rsKat)
                                <option {{ $buku['kd_kategori']==$rsKat['kd_kategori'] ? 'selected' : "" }} value="{{ $rsKat['kd_kategori'] }}">{{ $rsKat['nama_kategori'] }}</option> 
                                @endforeach                             
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="halaman" class="col-sm-2 control-label">Halaman</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="halaman" placeholder="Halaman" name="halaman" value="{{ $buku['halaman'] }}">
                        </div>
                    </div>                        
                    <div class="form-group">
                        <label for="edisi" class="col-sm-2 control-label">Edisi</label>
                        <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="Edisi" name="edisi" value="{{ $buku['edisi'] }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="isbn" class="col-sm-2 control-label">ISBN</label>
                        <div class="col-sm-10">
                                <input type="text" class="form-control" placeholder="ISBN" name="isbn" value="{{ $buku['ISBN'] }}">
                        </div>
                    </div> 
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary pull-right">
                    @if($buku['kd_buku']=="")
                    SAVE
                    @else
                    UPDATE
                    @endif</button>
                </div>                   
            </div>
        </div>       
    </div>
</form>
@stop
