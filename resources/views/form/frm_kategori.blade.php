@extends('template')

@section('judul')
Form Kategori
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


<form id="frmKategori" class="form-horizontal" action="{{ url('kategori/save') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="fForm col-md-8">
            <div class="box">
                <!-- Bidodata Anggota -->
                <div class="box-header with-border">
                    <h3 class="box-title">Data Kategori</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="kategori" class="col-sm-2 control-label">kategori</label>
                        <div class="col-sm-10">
                            <input type="hidden" class="form-control" id="kd_kategori" name="kd_kategori" value="{{ $kategori['kd_kategori'] }}">
                            <input type="text" class="form-control" id="kategori" placeholder="Nama Kategori" name="kategori" value="{{ $kategori['nama_kategori'] }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="singkatan" class="col-sm-2 control-label">Singkatan</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="singkatan" placeholder="Singkatan" name="singkatan" value="{{ $kategori['singkatan'] }}">
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary pull-right">SAVE</button>
                </div>                   
            </div>
        </div>       
    </div>
</form>
@stop
