@extends('template')

@section('judul')
Form Pengarang
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

<form id="frmPengarang" class="form-horizontal" action="{{ url('pengarang/save') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="fForm col-md-8">
            <div class="box">
                <!-- Bidodata Anggota -->
                <div class="box-header with-border">
                    <h3 class="box-title">Data Pengarang</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="pengarang" class="col-sm-2 control-label">Pengarang</label>
                        <div class="col-sm-10">
                            <input type="hidden" class="form-control" id="kd_pengarang" name="kd_pengarang" value="{{ $pengarang['kd_pengarang'] }}">
                            <input type="text" class="form-control" id="pengarang" placeholder="Nama Pengarang" name="pengarang" value="{{ $pengarang['nama_pengarang'] }}">
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
