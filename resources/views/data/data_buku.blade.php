@extends('template')

@section('judul')
Data Buku
@stop

@section('ac-buku')
active
@stop


@section('content')

    <div class="box">
        <div class="box-header">
        @if(Auth::user()->level==1)
        <a href="{{ url('buku/add') }}" target="_BLANK"><button class="btn btn-green btn-flat" ><i class="fa fa-book"></i> Tambah</button></a>
        <a href="{{ url('/rpt/buku') }}" target="_BLANK"><button class="btn btn-green btn-flat" ><i class="fa fa-print"></i> Report Buku</button></a>
        @else
        <a href="{{ url('/rpt/buku') }}" target="_BLANK"><button class="btn btn-green btn-flat" ><i class="fa fa-print"></i> Report Buku</button></a>
        @endif
        </div>
    <!-- /.box-header -->
        <div class="box-body">
            <table id="data" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Judul</th>
                        <th>Pengarang</th>
                        <th>Penerbit</th>
                        <th>Kategori</th>
                        <th>Halaman</th>
                        <th>Edisi</th>
                        <th>ISBN</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <!-- menampilkan data -->
                @foreach($buku as $rsBuku)
                    <tr>
                        <td>{{ $rsBuku->kd_buku }}</td>
                        <td>{{ $rsBuku->judul }}</td>
                        <!--ini menggunakan Function di MGlobal-->
                        <td>{{ App\MGlobal::Get_Pengarang($rsBuku->kd_pengarang) }}</td>
                        <td>{{ App\MGlobal::Get_Penerbit($rsBuku->kd_penerbit)." / ".$rsBuku->tempat_terbit."/".$rsBuku->tahun_terbit }}</td>
                        <td>{{ App\MGlobal::Get_Kategori($rsBuku->kd_kategori) }}</td>

                        <!--ini jika menggunakan Query builder
                        <td>{{ $rsBuku->nama_pengarang }}</td>
                        -->
                        <!--ini jika menggunakan Query builder
                        <td>{{ $rsBuku->nama_penerbit .'/'.$rsBuku->tempat_terbit. '/' .$rsBuku->tahun_terbit  }}</td>
                        -->
                        <!--ini jika menggunakan Query builder
                        <td>{{ $rsBuku->nama_kategori  }}</td>
                        -->
                        <td>{{ $rsBuku->halaman }}</td>
                        <td>{{ $rsBuku->edisi }}</td>
                        <td>{{ $rsBuku->ISBN }}</td>
                        <td>
                        <a href="{{ url('buku/edit' , $rsBuku->kd_buku) }}"><button class="btn bg-yellow btn-flat" ><i class="fa fa-pencil"></i></button></a>
                        <a href="{{ url('buku/delete' , $rsBuku->kd_buku) }}"><button class="btn btn-danger btn-flat" ><i class="fa fa-trash"></i></button></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            
            </table>
        </div>
    </div>

@stop