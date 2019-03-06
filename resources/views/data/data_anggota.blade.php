@extends('template')

@section('judul')
Data anggota
@stop

@section('ac-ang')
active
@stop

@section('content')
    <div class="box">
        <div class="box-header">
        @if(Auth::user()->level==1)
            <a href="{{ url('anggota/add') }}" target="_BLANK"><button class="btn btn-green btn-flat" ><i class="fa fa-user"></i> Tambah</button></a>
            <a href="{{ url('rpt/anggota') }}" target="_BLANK"><button class="btn btn-green btn-flat"><i class="fa fa-print"></i> Report  Anggota</button></a>
            <a href="{{ url('rpt/qrcode_anggota') }}" target="_BLANK"><button class="btn btn-green btn-flat"><i class="fa fa-qrcode"></i> Report  Anggota</button></a>
        @else
        <a href="{{ url('rpt/anggota') }}" target="_BLANK"><button class="btn btn-green btn-flat"><i class="fa fa-print"></i> Report  Anggota</button></a>
        @endif
        </div>
    <!-- /.box-header -->
        <div class="box-body">
 
            <table id="data" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>No Anggota</th>
                        <th>Nama</th>
                        <th>Lahir</th>
                        <th>Alamat</th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <!-- menampilkan data -->
                @foreach($anggota as $rsAng)
                    <tr>
                        <td>{{ $rsAng['kd_anggota'] }}</td>
                        <td><a href="{{ url('anggota/history',$rsAng['no_anggota']) }}" target="_BLANK">{{ $rsAng['no_anggota'] }}</a></td>
                        <td>{{ $rsAng['nama'] }}</td>
                        <td>{{ $rsAng['tempat']." , ".$rsAng['tgl_lahir'] }}</td>
                        <td>{{ $rsAng['alamat']." , ".$rsAng['kota'] }}</td>
                        <td>{{ $rsAng['email']}}</td>
                        <td>
                        <a href="{{ url('anggota/edit',$rsAng['kd_anggota']) }}"><button class="btn bg-yellow btn-flat" ><i class="fa fa-pencil"></i></button></a>
                        <a href="/anggota/delete/{{$rsAng['kd_anggota'] }}"><button class="btn btn-danger btn-flat" ><i class="fa fa-trash"></i></button></a>
                        <a href="/rpt/kartu_anggota/{{$rsAng['kd_anggota'] }}" target="_BLANK"><button class="btn bg-primary btn-flat" ><i class="fa fa-qrcode"></i></button></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            
            </table>
        </div>
    </div>

@stop