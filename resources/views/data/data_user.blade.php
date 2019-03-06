@extends('template')

@section('judul')
Data user
@stop



@section('content')

    <div class="box">
        <div class="box-header">
        <a href="{{ url('user/add') }}" target="_BLANK"><button class="btn btn-green btn-flat" ><i class="fa fa-user"></i> Tambah</button></a>
        </div>
    <!-- /.box-header -->
        <div class="box-body">
            <table id="data" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Telepon</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <!-- menampilkan data -->
                @foreach($user as $rsUser)
                    <tr>
                        <td>{{ $rsUser->id }}</td>
                        <td>{{ $rsUser->name }}</td>
                        <td>{{ $rsUser->alamat }}</td>
                        <td>{{ $rsUser->telp }}</td>
                        <td>{{ $rsUser->email }}</td>
                        <td>
                        <a href="{{ url('user/edit', $rsUser->id) }}"><button class="btn bg-yellow btn-flat" ><i class="fa fa-pencil"></i></button></a>
                        <a href="/user/delete/{{ $rsUser->id }}"><button class="btn btn-danger btn-flat" ><i class="fa fa-trash"></i></button></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            
            </table>
        </div>
    </div>

@stop