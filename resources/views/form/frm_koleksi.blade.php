@extends('template')

@section('judul')
Form Koleksi Buku
@stop

@section('content')
<form id="frmKoleksi" class="form-horizontal" action="{{ url('koleksi/save') }}" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" class="form-control" id="kd_koleksi" placeholder="kd_koleksi" name="kd_koleksi" value="{{ $koleksi['kd_koleksi'] }}">
    <div class="row">        
        <div class="fForm col-md-12">
            <div class="box">
                <!-- biodata buku-->
                <div class="box-header with-border">
                    <h3 class="box-title">Koleksi buku</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="kd_buku" class="col-sm-2 control-label">Buku</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="kd_buku" {{ $koleksi['kd_buku']!="" ? 'disabled' : "" }} value="{{ $koleksi['kd_buku'] }}">
                                <option value="">- Pilih Buku -</option>
                                @foreach($buku as $rsBuku)
                                <option {{ $koleksi['kd_buku']==$rsBuku['kd_buku'] ? 'selected' : "" }} value="{{ $rsBuku['kd_buku'] }}">{{ $rsBuku['judul'] }}</option>   
                                @endforeach                             
                            </select>
                        </div>
                    </div> 
                    <div class="form-group">
                        <label for="tgl_pengadaan" class="col-sm-2 control-label">Tanggal Pengadaan</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>        
                                <input id="datepicker" type="text" class="form-control" id="tgl_pengadaan" placeholder="Tanggal Pengadaan" name="tgl_pengadaan" value="{{ $koleksi['tgl_pengadaan'] }}">
                            </div>
                        </div>                        
                    </div>
                    <div class="form-group">
                        <label for="akses" class="col-sm-2 control-label">Akses</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="akses" value="{{ $koleksi['akses'] }}">
                                <option value="">- Pilih Akses -</option>
                                <option {{ $koleksi['akses']=="Boleh Dipinjam" ? 'selected' : "" }} value="Boleh Dipinjam">Boleh Dipinjam</option>
                                <option {{ $koleksi['akses']=="Baca di Tempat" ? 'selected' : "" }} value="Baca di Tempat">Boleh Baca di Tempat</option>                        
                            </select>
                        </div>
                    </div> 
                    <div class="form-group">
                        <label for="rak" class="col-sm-2 control-label"><a href="{{ url('/rak') }}" target="_BLANK">Rak</a>  <i class="fa fa-tasks"></i></label>
                        <div class="col-sm-10">
                            <select class="form-control" name="kd_rak" value="{{ $koleksi['kd_rak'] }}">
                                <option value="">- Pilih Rak -</option>
                                @foreach($rak as $rsRak)
                                <option {{ $koleksi['kd_rak']==$rsRak['kd_rak'] ? 'selected' : "" }}  value="{{ $rsRak['kd_rak'] }}">{{ $rsRak['nama_rak'] }}</option>   
                                @endforeach                             
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sumber" class="col-sm-2 control-label">Sumber Buku</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="sumber" placeholder="Sumber Buku" name="sumber" value="{{ $koleksi['sumber'] }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="status" class="col-sm-2 control-label">Status</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="status" {{ $koleksi['status']==1 ? 'disabled' : "" }} value="{{ $koleksi['status'] }}">
                                <option value="">- Pilih Status -</option>
                                <option {{ $koleksi['status']==0 ? 'selected' : "" }} value="0">Tersedia</option>
                                <option {{ $koleksi['status']==1 ? 'selected' : "" }} value="1">Dipinjam</option>  
                                <option {{ $koleksi['status']==2 ? 'selected' : "" }} value="2">Rusak</option>
                                <option {{ $koleksi['status']==3 ? 'selected' : "" }} value="3">Hilang</option>
                            </select>
                        </div>
                    </div>
                    @if($koleksi['kd_koleksi']=="")
                    <div class="form-group">
                        <label for="jumlah" class="col-sm-2 control-label">Jumlah Buku</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="jumlah" placeholder="Jumlah Buku" name="jumlah" value="">
                        </div>
                    </div>
                    @endif
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary pull-right">
                    @if($koleksi['kd_koleksi']=="")
                    SAVE
                    @else
                    UPDATE
                    @endif
                    </button>
                </div>                   
            </div>
        </div>       
    </div>
</form>
@stop
