@extends('template')

@section('judul')
Form user
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

<form id="frmUser" class="form-horizontal" action="{{ url('user/save') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="row">
        <div class="fFoto col-md-4">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Foto</h3>
                </div>
                <div class="box-body">
                    @if($user['avatar'])
                        <img id="avatar" src="{{ asset('img/'.$user['avatar']) }}" style="width:100%;border: 2px solid #ccc;">
                    @else
                        <img id="avatar" src="{{ asset('img/no-photo.jpg') }}" style="width:100%;border: 2px solid #ccc;">
                    @endif
                    <input id="file" type="file" name="avatar" style="display: none">
                    <input type="hidden" name="old_foto" value="{{ $user['avatar'] }}">
                </div>
            </div>

        </div>
        <div class="fForm col-md-8">
            <div class="box">
                <!-- Bidodata Anggota -->
                <div class="box-header with-border">
                    <h3 class="box-title">Data User</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="hidden" class="form-control" id="id" name="id" value="{{ $user['id'] }}">
                            <input type="text" class="form-control" id="name" placeholder="Nama " name="name" value="{{ $user['name'] }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="alamat" class="col-sm-2 control-label">Alamat</label>
                        <div class="col-sm-10">
                            <textarea class="form-control" rows="3" placeholder="Alamat" name="alamat">{{ $user['alamat'] }}</textarea>
                        </div>
                    </div>        
                    <div class="form-group">
                        <label for="telp" class="col-sm-2 control-label">Telepon</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                                <input type="text" class="form-control" placeholder="Telepon" name="telp" value="{{ $user['telp'] }}">
                            </div> 
                        </div>
                    </div> 
                    <div class="form-group">
                        <label for="email" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon">@</span>
                                <input type="email" class="form-control" placeholder="Email" name="email" value="{{ $user['email'] }}">
                            </div> 
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-sm-2 control-label">Password</label>
                        <div class="col-sm-10">
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-lock"></i></span>             
                                <input type="password" class="form-control" id="password" placeholder="Password" name="password">
                                <input type="hidden" value="{{ $user['password'] }}" name="old_password">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="level" class="col-sm-2 control-label">Level</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="level" value="{{ $user['level'] }}">
                                <option value="">- Pilih Akses -</option>
                                <option {{ $user['level']==1 ? 'selected' : "" }} value="1">Admin</option>
                                <option {{ $user['level']==2 ? 'selected' : "" }} value="2">Operator</option>                        
                            </select>
                        </div>
                    </div> 
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary pull-right">
                    @if($user['id']=="")
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
