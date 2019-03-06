@extends('template')

@section('judul')
Data Penerbit
@stop

@section('content')

    <div class="box">
        <div class="box-header">
        <a href="{{ url('penerbit/add') }}"><button class="btn btn-green btn-flat" ><i class="fa fa-print"></i> Tambah</button></a>
        </div>
    <!-- /.box-header -->
        <div class="box-body">
            <table id="data" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Penerbit</th>
                    </tr>
                </thead>
                <tbody>
                <!-- menampilkan data -->
                @foreach($penerbit as $rsPen)
                    <tr>
                        <td>{{ $rsPen['kd_penerbit'] }}</td>
                        <td>{{ $rsPen['nama_penerbit'] }}</td>
                        <td>
                        <a href="{{ url('penerbit/edit',$rsPen['kd_penerbit']) }}"><button class="btn bg-yellow btn-flat" ><i class="fa fa-pencil"></i></button></a>
                        <a href="/penerbit/delete/{{ $rsPen['kd_penerbit'] }}"><button class="btn btn-danger btn-flat" ><i class="fa fa-trash"></i></button></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            
            </table>
        </div>
    </div>

@stop