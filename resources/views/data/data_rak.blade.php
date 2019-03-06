@extends('template')

@section('judul')
Data Rak
@stop

@section('content')

    <div class="box">
        <div class="box-header">
        <a href="{{ url('rak/add') }}"><button class="btn btn-green btn-flat" ><i class="fa fa-print"></i> Tambah</button></a>
        </div>
    <!-- /.box-header -->
        <div class="box-body">
            <table id="data" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Rak</th>
                    </tr>
                </thead>
                <tbody>
                <!-- menampilkan data -->
                @foreach($rak as $rsRak)
                    <tr>
                        <td>{{ $rsRak['kd_rak'] }}</td>
                        <td>{{ $rsRak['nama_rak'] }}</td>
                        <td>
                        <a href="{{ url('rak/edit',$rsRak['kd_rak']) }}"><button class="btn bg-yellow btn-flat" ><i class="fa fa-pencil"></i></button></a>
                        <a href="/rak/delete/{{ $rsRak['kd_rak'] }}"><button class="btn btn-danger btn-flat" ><i class="fa fa-trash"></i></button></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            
            </table>
        </div>
    </div>

@stop