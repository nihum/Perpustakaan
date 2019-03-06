@extends('template')

@section('judul')
Form Rak
@stop

@section('content')
<form id="frmRak" class="form-horizontal" action="{{ url('rak/save') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="fForm col-md-8">
            <div class="box">
                <!-- Bidodata Anggota -->
                <div class="box-header with-border">
                    <h3 class="box-title">Data Rak</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="rak" class="col-sm-2 control-label">Rak</label>
                        <div class="col-sm-10">
                            <input type="hidden" class="form-control" id="kd_rak" name="kd_rak" value="{{ $rak['kd_rak'] }}">
                            <input type="text" class="form-control" id="rak" placeholder="Nama Rak" name="rak" value="{{ $rak['nama_rak'] }}">
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
