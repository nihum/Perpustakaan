@extends('template')

@section('judul')
Data Pengarang
@stop

@section('content')

    <div class="box">
        <div class="box-header">
        <a href="{{ url('pengarang/add') }}"><button class="btn btn-green btn-flat" ><i class="fa fa-pencil"></i> Tambah</button></a>
        </div>
    <!-- /.box-header -->
        <div class="box-body">
            <table id="data" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Pengarang</th>
                    </tr>
                </thead>
                <tbody>
                <!-- menampilkan data -->
                @foreach($pengarang as $rsPeng)
                    <tr>
                        <td>{{ $rsPeng['kd_pengarang'] }}</td>
                        <td>{{ $rsPeng['nama_pengarang'] }}</td>
                        <td>
                        <a href="{{ url('pengarang/edit',$rsPeng['kd_pengarang']) }}"><button class="btn bg-yellow btn-flat" ><i class="fa fa-pencil"></i></button></a>
                        <a href="/pengarang/delete/{{$rsPeng['kd_pengarang'] }}"><button class="btn btn-danger btn-flat" ><i class="fa fa-trash"></i></button></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            
            </table>
        </div>
    </div>

@stop