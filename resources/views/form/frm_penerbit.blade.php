@extends('template')

@section('judul')
Form penerbit
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

<form id="frmPenerbit" class="form-horizontal" action="{{ url('penerbit/save') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="fForm col-md-8">
            <div class="box">
                <!-- Bidodata Anggota -->
                <div class="box-header with-border">
                    <h3 class="box-title">Data Penerbit</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="penerbit" class="col-sm-2 control-label">Penerbit</label>
                        <div class="col-sm-10">
                            <input type="hidden" class="form-control" id="kd_penerbit" name="kd_penerbit" value="{{ $penerbit['kd_penerbit'] }}">
                            <input type="text" class="form-control" id="penerbit" placeholder="Nama Penerbit" name="penerbit" value="{{ $penerbit['nama_penerbit'] }}">
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
