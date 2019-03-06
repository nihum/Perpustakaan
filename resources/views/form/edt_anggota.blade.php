<!-- tampil errors -->
@if ($errors->any())
    @foreach($errors->all() as $err)
    <p>{{ $err }}</p>
    @endforeach
@endif

@extends('template')

@section('judul')
Form Anggota
@stop

@section('content')
<form id="edtAnggota" class="form-horizontal" action="{{ url('anggota/update') }}" method="post">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <div class="row">
        <div class="fFoto col-md-4">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Foto</h3>
                </div>
            </div>
            <div class="box-body">
                    @if($anggota['foto'])
                        <img id="avatar" src="{{ asset('img/'.$anggota['foto']) }}" style="width:100%;border: 2px solid #ccc;">
                    @else
                        <img id="avatar" src="{{ asset('img/no-image.png') }}" style="width:100%;border: 2px solid #ccc;">
                    @endif
                        <input id="file" type="file" name="foto" style="display: none">
                        <input type="hidden" name="old_foto" value="{{ $anggota['foto'] }}">

                </div>
        </div>
        <div class="fForm col-md-8">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Data Anggota</h3>
                </div>
                <div class="box-body">
                    <input type="hidden" class="form-control" id="kd_anggota" name="kd_anggota" value="{{ $anggota['kd_anggota'] }}">
                    <input type="hidden" class="form-control" id="no_anggota" name="no_anggota" value="{{ $anggota['no_anggota'] }}">
                    <div class="form-group">
                        <label for="nama" class="col-sm-2 control-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ $anggota['nama'] }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="lahir" class="col-sm-2 control-label">Tanggal Lahir</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="tempat" name="tempat" value="{{ $anggota['tempat'] }}">
                        </div>
                        <div class="col-sm-5">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                                <input id="datepicker" type="text" class="form-control" id="tgl_lahir" name="tgl_lahir" name="tempat" value="{{ $anggota['tgl_lahir'] }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="jk" class="col-sm-2 control-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="jk" value="{{ $anggota['jk'] }}">
                                <option value="1">Laki Laki</option>
                                <option value="2">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat" class="col-sm-2 control-label">Alamat</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="3" name="alamat" value="{{ $anggota['alamat'] }}"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="telp" class="col-sm-2 control-label">Telepon</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                <input type="text" class="form-control" id="telp" name="telp" value="{{ $anggota['telp'] }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="kota" class="col-sm-2 control-label">kota</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="kota" name="kota" value="{{ $anggota['kota'] }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon">@</span>
                                <input type="email" class="form-control" name="email" value="{{ $anggota['email'] }}">
                            </div>
                        </div>
                    </div>
                    <div class="box-header with-border">
                        <h3 class="box-title">Data Login</h3>
                    </div>
                    <div class="form-group">
                        <label for="username" class="col-sm-2 control-label">Username</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-user"></i></span>
                                <input type="text" class="form-control" id="username" name="user_name" value="{{ $anggota['user_name'] }}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon">@</span>
                                <input type="password" class="form-control" id="password" name="user_password" value="{{ $anggota['user_password'] }}">
                            </div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary pull-right">SAVE</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@stop