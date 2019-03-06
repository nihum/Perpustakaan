@extends('template')

@section('judul')
Data Kategori
@stop

@section('content')

    <div class="box">
        <div class="box-header">
        <a href="{{ url('kategori/add') }}"><button class="btn btn-green btn-flat" ><i class="fa fa-print"></i> Tambah</button></a>
        </div>
    <!-- /.box-header -->
        <div class="box-body">
            <table id="data" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Kategori</th>
                    </tr>
                </thead>
                <tbody>
                <!-- menampilkan data -->
                @foreach($kategori as $rsKat)
                    <tr>
                        <td>{{ $rsKat['kd_kategori'] }}</td>
                        <td>{{ $rsKat['nama_kategori'] }}</td>
                        <td></td>
                        <td>
                        <a href="{{ url('kategori/edit',$rsKat['kd_kategori']) }}"><button class="btn bg-yellow btn-flat" ><i class="fa fa-pencil"></i></button></a>
                        <a href="/kategori/delete/{{ $rsKat['kd_kategori'] }}"><button class="btn btn-danger btn-flat" ><i class="fa fa-trash"></i></button></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            
            </table>
        </div>
    </div>

@stop